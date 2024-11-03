# [Example PHP Project](../../index.md)

## [Guided Tour](../index.md) / [Services](index.md) / MariaDB

This example is set up to use [MariaDB](https://mariadb.com) for the
database by default. It is a fully open-source variant of
[MySQL](https://www.mysql.com), but it has a number of additional
features, faster performance, and first-class support by hosting
vendors like Amazon Web Services.

### Service Definition

If we look at `docker-compose.yml` the start of configuring our Nginx
instance is defined under `example.mariadb`.

[Environment variables](https://mariadb.com/kb/en/mariadb-server-docker-official-image-environment-variables/)
are set in order to create the default database and credentials.

We also set up a Docker volume so that the database data is not lost
whenever the project is restarted.

By default, MySQL and MariaDB run on port `3306`. In our Docker Compose
file, we are mapping a port on our host machine (our real computer) to
port `3306`, so that we can access it through a client such as
[DBeaver](https://dbeaver.io) or
[MySQL Workbench](https://www.mysql.com/products/workbench/).

We also set up a healthcheck, which monitors the status of the database
server. The [MariaDB Docker image](https://hub.docker.com/_/mariadb)
comes with a script specifically for that purpose.

### Containerization

Next, we'll look at `.docker/mariadb/Dockerfile`.

At the moment, there is nothing here except building from the official
[MariaDB Docker image](https://hub.docker.com/_/mariadb).

Note that it is run as an elevated user by default, so it's not a good
idea for it to write to files in the project directory.
