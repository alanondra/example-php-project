# [Example PHP Project](../index.md)

## [Guided Tour](index.md) / DevContainer

This project comes with with the defaults for a
[DevContainer](https://containers.dev) which allows you to use a
containerized project not just as a configurable platform for your
project but as a development environment with a toolchain that is
independent from any software installed on your machine.

In other words, you can have multiple projects on your machine with
different versions of software with different features, but because
they exist in containers, they do not conflict with each other.

### Configuration

All the files specific to the DevContainer are in the `.devcontainer`
directory. The main configuration file is
[`devcontainer.json`](https://containers.dev/implementors/json_reference/),
which is configured to point to the
[PHP service container](services/php.md).

Since that service container is already configured to mock your user
account, no user creation needs to take place at this step.

We place an additional mount here, to bind our host machine's Docker
socket to that of the guest machine. This would allow the DevContainer
to also run Docker.

DevContainers are set to use their own workspace distinct from that set
up in a Dockerfile or Docker Compose file, so it needs to be set again
here.

Next, we set up some shell commands to act as hooks for different
states of the DevContainer:

- `postCreateCommand` - Executes after the container is created. If the
    container was never deleted but merely restarted, this won't run
    again.
- `postStartCommand` - Executes every time the container is started.
- `postAttachCommand` - Executes every time your IDE attaches to the container.

Note that these three scripts are not executed as `root` but as the
user, so any guest OS modifications need to be performed while properly
elevated.

Next, we tell it that when the DevContainer is brought down, the Docker
Compose project that it's based on needs to be shut down along with it.

In the `customizations` key, we add some base settings and extension
installations for IDEs. These are placed here instead of in respective
IDE-specific directories in the project root to indicate these are hard
requirements distinct from any user-variable settings and extensions.

Lastly, we add some `features` to the DevContainer to extend the
container with some preset functionality. At this moment, the main
features are Docker-in-Docker support, and the
[Fish shell](https://fishshell.com).

### Events

At the moment, the only event that is actively handled is the creation
event. The other events mentioned are handled with stub scripts that
you can extend.

If we look at `.devcontainer/sh/create.sh`, we'll see that we first add
the `docker` group using the group ID from the host's `docker` group.
This ensures that the mocked user in the container can use the same
Docker socket as the host machine.

Next, we copy over the `.devcontainer/home` directory to the mocked
user's home directory. At the moment, this only contains a Fish script
to remove its default greeting text.

There is also a scaffolding for
extending Fish by adding new
[Fish functions](https://fishshell.com/docs/current/tutorial.html#functions)
so that you can create your own commands.

Lastly we install some additional tools, such as Git, Vim, and several
different SQL clients so that you can test database connections.
