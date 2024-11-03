# [Example PHP Project](../../index.md)

## [Guided Tour](../index.md) / [Services](index.md) / PHP

### Service Definition

If we look at `docker-compose.yml` the start of configuring our PHP
instance is defined under `example.php`.

Unlike our Nginx server, the PHP server has no publicly-accessible
port. PHP runs using the
[FastCGI protocol](https://en.wikipedia.org/wiki/FastCGI) which is not
accessible via web browser.

We also add a passthrough so that our container can use Docker.

### Containerization

Next, we'll look at `.docker/php/Dockerfile`.

The service is based on the
[official PHP Docker image](https://hub.docker.com/_/php), specifically
using the FPM variant in order to run with FastCGI. This allows
multiple PHP listeners to run in tandem.

This instance also runs as `root` by default, however, since many PHP
operates require modification of our workspace, we need to create a
user based on our host settings.

Fortunately, this image does not come with any default users or groups
in the typical ID range for users, which makes it easy to create a user
and group from scratch and assign them to the container user.

Toward the start, we set up some environment variables to correctly
handle timezones and some string manipulation libraries.

Next, we install some tools that are necessary for elevating the user
and installing packages.

We also copy over necessary configurations from our project's files.
Note that we are copying over two sets of configurations:

- [Standard PHP configurations](https://www.php.net/manual/en/ini.php)
- [PHP-FPM configurations](https://www.php.net/manual/en/install.fpm.configuration.php)

For the time being, the latter does not need to be configured.

Next, we install a tool to help with the
[installation of PHP extensions](https://github.com/mlocati/docker-php-extension-installer).
We then use that tool to install the `mysqli` and `pdo_mysql`
extensions.

After that, we install [Composer](https://getcomposer.org/) from a
[Docker image](https://hub.docker.com/_/composer). This is used for
dependency management, automatically scaffolding our project files,
and filling out metadata for our project.

Our penultimate change is to install [Node.JS](https://nodejs.org/)
as a package inside our PHP container. While it can be set up as a
separate service from a [Docker image](https://hub.docker.com/_/node),
it also needs to run as a non-root user, however it is more complicated
to set up that way by using the image.

Finally, we use our user configurations before to create the user,
group, and user home directory inside the container. We also grant the
user super user permissions, to that you can make arbitrary changes
inside the container.

### Configuration

Looking at our PHP configurations, We've made the following changes:

- We've [turned off](https://www.php.net/manual/en/ini.core.php#ini.expose-php)
    a supplementary header which PHP adds to responses by default which
    indicate the scripts are served by PHP and which version of PHP
    they are run in.
- We've [explicitly enabled](https://www.php.net/manual/en/ini.core.php#ini.variables-order)
    [environment variables](https://www.php.net/manual/en/reserved.variables.environment.php)
    in the list of [superglobals](https://www.php.net/manual/en/language.variables.superglobals.php).
- We've [set it to redirect errors](https://www.php.net/manual/en/errorfunc.configuration.php#ini.display-errors)
    to `stderr` which is helpful when running PHP in the terminal.
- We've directed various save files to the `var` directory in our
    project.
