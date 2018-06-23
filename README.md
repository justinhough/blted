# BLTed powered by Docksal

A base or sample Drupal 8 project defined by Acquia BLT and powered by Docksal.

BLT is an open-source project template and tool that enables building, testing, and deploying Drupal installations following Acquia Professional Services' best practices.

Docksal is a Docker tool for building containerized development environments. From a zero-config setup to a fully customized build, along with the command-line tool `fin`, Docksal provides a powerful and flexible development platform.

## Getting Started

You must first have [Docksal installed](http://docksal.readthedocs.io/en/master/getting-started/env-setup/) and setup on your computer.

If you are using an Acquia Cloud production environment, follow instructions for [adding your Acquia Cloud API key](http://docksal.readthedocs.io/en/master/tools/acquia-drush/) to the Docksal environment.

To use this project as a starter, clone this repo to your local machine.

From your terminal, go to the directory where you have cloned the repo and enter the following command:
```
fin init
```

When complete, you can access the site by running:

```
fin drush uli
```

Additional [BLT documentation](http://blt.readthedocs.io) may be useful. You may also access a list of BLT commands by running:
```
fin blt
```

Additional [Docksal documentation](http://docs.docksal.io) may also be helpful. You can access a list of commands simply by running:
```
fin
```

## Working With a BLT Project

BLT projects are designed to instill software development best practices (including git workflows).

Acquia BLT Developer documentation includes an (example workflow)[http://blt.readthedocs.io/en/latest/readme/dev-workflow/#workflow-example-local-development].

### Important Configuration Files

BLT uses a number of configuration (.yml or .json) files to define and customize behaviors. Some examples of these are:

* blt/blt.yml (formerly blt/project.yml prior to BLT 9.x)
* blt/local.blt.yml
* box/config.yml (if using Drupal VM)
* drush/sites (contains Drush aliases for this project)
* composer.json (includes required components, including Drupal Modules, for this project)

## Resources

* [BLT Documentation](http://blt.readthedocs.io)
* [BLT GitHub](https://github.com/acquia/blt)
* [Docksal Documentation](http://docs.docksal.io)
* [Docksal GitHub](https://github.com/docksal/docksal)
