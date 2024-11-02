# Example PHP Project

This is meant to serve as an example of a PHP project using Docker.

To learn more about this project, such as how services are set up, how
the project is structured, and tutorials,
[check out the documentation](docs/index.md).

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
