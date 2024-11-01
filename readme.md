# Example PHP Project

This is meant to serve as an example of a PHP project using Docker.

## Prerequisites

### Windows Users
- [WSL2](https://learn.microsoft.com/en-us/windows/wsl/install)
- [Docker for WSL2](https://docs.docker.com/desktop/wsl/)

### Linux / OS X
- [Docker](https://www.docker.com/resources/what-container/)
- [Docker Compose](https://docs.docker.com/compose/)

### IDE Support
- [Visual Studio Code (VSCode)](https://code.visualstudio.com/blogs/2019/09/03/wsl2#_wsl-2-and-visual-studio-code)
- [PHPStorm](https://www.jetbrains.com/help/phpstorm/how-to-use-wsl-development-environment-in-product.html)

## Features

- Barebones scaffolding of these services:
    - [Nginx](https://nginx.org/) to serve static content
    - [PHP](https://www.php.net/) to serve dynamic content
        - Comes with [Composer](https://getcomposer.org/) and
            [Node.JS](https://nodejs.org/) as tools
    - [MariaDB](https://mariadb.org/) as the database
- Basic configuration via Vance Lucas' [PHP dotenv
](https://github.com/vlucas/phpdotenv)
- Basic layout renderer using
    [output buffering](https://www.php.net/manual/en/book.outcontrol.php)
- Basic database layer via
    [PDO](https://www.php.net/manual/en/book.pdo.php)

## Getting Started
1. Create a folder for your project in the desired location
2. Download and extract from 
    [Releases](https://github.com/alanondra/example-php-project/releases)
3. Copy the file `.env.example` as `.env`
    - Change `HOST_USERNAME` to your username
    - To get the value of `HOST_UID`:
        ```sh
        id -u
        ```
    - To get the value of `HOST_GID`:
        ```sh
        id -g
        ```
    - To get the value of `HOST_DOCKER_GID`:
        ```sh
        getent group docker | cut -d: -f3
        ```
    - Change `PORT_HTTP` to your desired web server port
    - Change `DB_PORT` to your desired database port
    - Change `DB_*` credentials to your desired values
4. Open your project in your IDE
5. Start up DevContainer:
    - VSCode:
        1. Open Command Palette (Ctrl+Shift+P)
        2. Run the command `Dev Containers: Rebuild and Reopen in Container`
    - PHPStorm:
        1. Under Services, go to DevContainers
        2. Select the DevContainer
        3. Build the DevContainer and click Connect
6. Run `composer install`
7. Navigate to `localhost:8080`; replace `8080` with the value in `PORT_HTTP`
8. Connect [MySQL Workbench](https://www.mysql.com/products/workbench/)
    or [DBeaver](https://dbeaver.io) to `localhost:8036`; replace `8036`
    with the value in `PORT_DB`

## Project Structure

Some directories are empty, containing only a `.gitignore` to keep their
place. This is because this project is meant to be a quick-start template
for you to change as you desire.

Configurations for third-party services are usually prefixed with `.`
to visually separate them from your application files.

- `.devcontainer/` - Contains configurations for DevContainer
    - `devcontainer.json` - [DevContainer file](https://containers.dev/implementors/json_schema/)
    - `sh/` - Contains scripts to handle different states of the container
        - `create.sh` - Handles creation of the DevContainer
            - Installs development tools like [Git](https://git-scm.com),
                database clients and [Vim](https://www.vim.org)
        - `start.sh` - Handles start of the DevContainer
        - `attach.sh` - Handles attachment of the DevContainer to your IDE
    - `home/` - The contents of your user home directory in the container
        - `.config/fish/` - Configures [Fish](https://fishshell.com),
            the default shell for this DevContainer
            - `functions/` - Create `.fish` files to
              [make your own terminal commands](https://fishshell.com/docs/current/cmds/function.html)
- `.docker/` - Contains configurations for Docker containers
    - `nginx/` - Nginx web server configurations
        - `conf.d/` - Server configurations
            - `default.conf` - Overrides the the default settings provided
              by Nginx out of the box to handle requests to PHP.
    - `php/` - PHP service configuraitons
        - `Dockerfile` - Installs PHP extensions,
            [Composer](https://getcomposer.org/), and
            [Node.JS](https://nodejs.org/)
        - `php.conf.d/` - [PHP configurations](https://www.php.net/manual/en/ini.list.php)
        - `fpm.conf.d/` - [PHP-FPM configurations](https://www.php.net/manual/en/install.fpm.configuration.php)
- `.vscode/` - Configurations for VSCode users
    - `extensions.json` - Recommended (not essential) extensions
- `etc/` - Miscellaneous code files for application setup
    - `config/` - Configuration files
    - `data/` - Database files
    - `routes/` - Routing tables
- `public/` - Publicly-facing files and Nginx server root
- `res/` - Pre-processed resources, assets and templates
  - `views/` - Templates
- `src/` - Main source code files
- `start/` - Application initialization files
    - `app.php` - Suggested entrypoint to `require`
- `tests/` - Unit tests
- `var/` - Miscellaneous, non-code files
    - `cache/` - Cache files
    - `key/` - SSH keys
    - `log/` - Log files
    - `session/` - PHP session files
    - `upload/` - User uploads
    - `wsdl/` - WSDL/SOAP cache
- `docker-compose.yml` - [Docker Compose file](https://docs.docker.com/reference/compose-file/)
    to orchestrate project services
- `composer.json` - [Composer file](https://getcomposer.org/doc/04-schema.md)
    for dependency management and autoload configuration

## Recommended Next Steps

1. Change your project settings in
    [`composer.json`](https://getcomposer.org/doc/04-schema.md)
2. Change the name of your application and services in:
    - `.env`
    - `docker-compose.yml`
    - `.devcontainer/devcontainer.json`
    - `.docker/nginx/conf.d/default.conf`
    - `public/site.webmanifest`
3. Create your own [favicon](https://favicon.io)
4. Tinker with your services and workspace
    - Go through the `docker-compose.yml` file
    - Go through the `.docker/` directory
    - Go through the `.devcontainer/` directory
5. Learn about [HTTP messages](https://developer.mozilla.org/en-US/docs/Web/HTTP/Messages)
6. Learn [SQL](https://www.w3schools.com/sql/)
7. Learn how to [use Composer](https://getcomposer.org/doc/01-basic-usage.md)
8. Learn about [PHP Standards Recommendations](https://www.php-fig.org/psr/)
9. Learn how to compile assets with [Vite](https://vite.dev)
    or [Webpack](https://webpack.js.org)
10. Learn to [add new services](https://docs.docker.com/compose/gettingstarted/)
