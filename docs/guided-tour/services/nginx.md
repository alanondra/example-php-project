# [Example PHP Project](../../index.md)

## [Guided Tour](../index.md) / [Services](index.md) / Nginx

[Nginx](https://nginx.org/) is a lightweight web server with very easy
configuration and a flexible set of features.

In this example project, Nginx is used as the primary web server. It
handles easy static content, like images, fonts, CSS and scripts, and
forwards requests to PHP files to PHP instances using a protocol called
[FastCGI](https://en.wikipedia.org/wiki/FastCGI).

While a PHP project could just as well use PHP's
[built-in web server](https://www.php.net/manual/en/features.commandline.webserver.php),
this project opts to use Nginx in combination with it because it allows
the PHP application to handle actual application requests instead of
wasting processing power on requests to static assets.

### Service Definition

If we look at `docker-compose.yml` the start of configuring our Nginx
instance is defined under `example.nginx`.

It is configured to depend on the PHP service, as the PHP service needs
to exist in order to route requests to it, or starting Nginx will fail.

Web servers traditionally listen to two ports:

- `80` - This handles traditional (insecure) HTTP requests.
- `443` - This handles HTTPS requests, backed up by an SSL certificate.

For this example project, we will only be worrying about port `80`.
In our Docker Compose file, we are mapping a port on our host machine
(our real computer) to port `80`, so that we can access it through a
web browser.

We will also be mapping the root for our web server to the `public`
directory in the project.

### Containerization

Next, we'll look at `.docker/nginx/Dockerfile`.

The service is based on the
[official Nginx Docker image](https://hub.docker.com/_/nginx).
This image runs as `root`, so writing files (like logs) to the project
directory is not recommended. The reason it runs as root is because
the lower port numbers that Nginx typically listens to require elevated
privileges.

### Configuration

Finally, let's look at `.docker/nginx/conf.d/default.conf`, which
overrides `/etc/nginx/conf.d/default.conf`, the
[default `server` configuration](https://docs.nginx.com/nginx/admin-guide/web-server/web-server/)
in this image.

Here we set up `index.php` as the default handler for 404 errors -
requests to non-existent resources. We also establish that any requests
for `.php` and `.phtml` files are forwarded to the PHP service using
the aforementioned FastCGI protocol. By default, it is configured to
listen on port `9000`.

Included in our configuration are defensive measures against
[clickjacking](https://owasp.org/www-community/attacks/Clickjacking)
and [MIME-sniffing attacks](https://www.keycdn.com/support/what-is-mime-sniffing).

We also arbitrarily turn off some logging to static assets so that logs
are not rapidly filled with useless information.
