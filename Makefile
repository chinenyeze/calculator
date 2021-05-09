.PHONY: help all

help:
	@echo
	@echo usage: make cmd

setup: ## Set up the service
	@composer install

run: ## Run the service
	@php -S localhost:8000 bootstrap.php

lint: ## Run lint test
	@bin/phpcs --standard=PSR2 --ignore=tests -np src/

cbf: ## Run cbf
	@bin/phpcbf --standard=PSR2 --ignore=tests -np src/

test: ## Run unit test
	@XDEBUG_MODE=coverage bin/phpunit --configuration tests/unit/phpunit.xml --coverage-html tests-report
