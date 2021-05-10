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

* After running the service you can use the API or access the UI at [http://localhost:8000](http://localhost:8000)

### API docs

To see the endpoints supported by this API check the docs at `docs/postman/Calculator.postman_collection.json`

* The POST endpoint is at `http://localhost:8000/calculate`
* The request body:

```
{
    "left": 2,
    "right": 5,
    "operator": "*"
}
```

* Sample 202 response:
```
{
    "left": 2,
    "right": 5,
    "operator": "*",
    "result": 10
}
```

* Sample 400 response:
```
{
    "error": "Cannot divide by zero"
}
```

* Sample 500 response:
```
{
    "error": "Internal Server Error"
}
```

### Code Linting

```
make lint
make cbf
```

### Unit Tests

```
make test
```

### Todo

* Add Error logging and handler
* Dockerize the project
