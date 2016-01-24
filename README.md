TODO App
===================================

This is very simple example of layered architecture using aggregates.

## Hacking

All environment handled via [Docker](https://www.docker.com/), so all you need to start digging in this example is docker installed on your machine. For Mac OS users I recommend you to use [dinghy](https://github.com/codekitchen/dinghy).

First of all we need to install dependencies:

 - [Docker](https://www.docker.com/) and docker-compose
 - Composer dependencies via `make install`

When you are done, start containers by running `docker-compose up -d` and we are ready to go.

## Running tests

Test are written using [phpspec](http://phpspec.readthedocs.org/en/latest/) and can be found in `spec` directory.

To run test just make sure that you installed dependencies and then run:

```bash
docker-compose run --no-deps php bin/phpspec run
```
