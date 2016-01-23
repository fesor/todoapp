project_name = "todoapp"
current_dir = $(shell pwd)

.PHONY: build install

build: install

	@echo Build images...
	docker-compose -p $(project_name) build

install:
	@echo Install dependencies
	docker run --rm -v $(current_dir):/app composer/composer install
