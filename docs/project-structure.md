# [Example PHP Project](index.md)

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
