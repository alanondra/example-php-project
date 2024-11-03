# [Example PHP Project](index.md)

## Getting Started

1. Create a folder for your project in the desired location
2. Download and extract from 
    [Releases]([../releases](https://github.com/alanondra/example-php-project/releases))
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