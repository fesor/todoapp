General Backend Template Project
===================================

## What included

This is our day-to-day backend dev stack

 - Configured PHP 5.6
 - Configured Nginx
 - Configured PostgreSQL 9.3 (via [ANXS.postgresql](https://github.com/ANXS/postgresql))
 - Symfony 2.7 standard edition
 - Doctrine ORM 2.5

This skeleton includes several optimizations:

 - Enabled APCu cache for Doctrine and Validator (only in prod environment)

## Required software

 - VirtualBox
 - [Vagrant](https://www.vagrantup.com/)
 - [vagrant-host-shell](https://github.com/phinze/vagrant-host-shell) for auto install galaxy roles
 - [Vagrant Host Manager](https://github.com/smdahlen/vagrant-hostmanager) for handling local DNS and DHCP instead of static IP
 - [Ansible](http://docs.ansible.com/intro_installation.html)

### Vagrant and plugins

`vagrant-host-shell` will check that you have installed ansible galaxy roles before provisioning

*NOTE*: If galaxy roles list file not exists, this part will be skipped. Path to this file and directory with roles configurable in vagrantfile

```
ansible_dir = 'devops'
galaxy_roles_file = 'galaxy_roles.yml'
```

To make life less painful, we suggest to use DHCP instead of static IPs for private networking. In this case we don't know IP address of vagrant box before we log in into it. The solution is to use `vagrant-hostmanager`. It will check current box IP and add alias to `/etc/hosts` of your host and guest machine. Hostname of VM should be configured in `Vagrantfile`:

```
hostname = 'example.vagrant'
```

*NOTE*: Since this vagrantfile uses DHCP, plese checkout [this issue](https://github.com/mitchellh/vagrant/issues/3083) in Vagrant bug tracker. If your virtual machine is not starts, you can use workaround from this topic:

```
VBoxManage dhcpserver remove --netname HostInterfaceNetworking-vboxnet0
```

### Ansible verbocity level

If you want to debug your ansible provisioner, you can just run `vagrant provision --debug`. Also you can specify verbosity level via `VAGRANT_LOG` env variable (`info` or `debug`)

## Development

To prepare your local dev environment just run `vagrant up`. All actions to setup projects should be automated and ideally shouldn't require any manual actions.

### GIT Hooks

This template includes git hooks to improve development experience and unify coding standards. To enable git hooks, just run `./devops/install_hooks` command.

Hooks included:

 - pre-commit hooks:
    - Pass changed PHP files thought `php-cs-fixer`

If you don't want to use pre-hooks you can manually remove symlinks or just use `--no-verify`. Please not that this is not so good idea.

### XDebug

This project template provides simple remote debugging with xdebug. To use xdebug sessions verify that your IDE KEY is `PHPSTORM` and xdebug port is `9009`.
