# KPI Project

This is the repo of the KPI project.

# Installation

## Requirements

Make sure that you have [composer](https://getcomposer.org/download/) and PHP 8.2 minimum installed on your system.

[Docker compose](https://docs.docker.com/compose/) is recommended for database, although you can use PostgreSQL without container if you rather.

A Google project with OAuth 2.0 keys are required.

## Install dependencies

```bash
$ composer install
```

## Set up database

Run database with docker-compose file :
```bash
$ docker-compose up -d
```

... Or with any other way you choose.

Then, create your database using this command :
```bash
$ bin/console doctrine:database:create
```

And run migrations (you can use quick notation as follow) :
```bash
$ bin/console do:mi:mi
```

## Running the App

If you have the Symfony CLI, just run :
```bash
$ symfony serve
```

Otherwise, use just php and run :
```bash
$ php -S 127.0.0.1:8000 -t public
```

# Tests & Static analysis

A Makefile is provided to ease tests & static analysis commands.

## PHPcs

```bash
$ make phpcs
```

## PHPstan

```bash
$ make phpstan
```

## Unit tests

```bash
$ make unit-tests
```

## Functional tests

```bash
$ make functional-tests
```
