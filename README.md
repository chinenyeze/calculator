# Calculator

Calculator API using my favourite microframework - Slim 4

First set up the service and then run it.

This service requires that you have PHP 8.0 and composer 2.0.

### Setup

To set up the project and install composer dependencies:

```
make setup
```

### Run

To run the service with PHP Built-in web server:

```
make run
```

### API docs

To see the endpoints supported by this API check the docs at `docs/postman/Calculator.postman_collection.json`

### Code Linting

```
make lint
make cbf
```

### Todo

* Add Error logging and handler
* Dockerize the project
