project_name = "todoapp"
current_dir = $(shell pwd)

.PHONY: build install metrics

build: install

	@echo Build images...
	docker-compose -p $(project_name) build

install:
	@echo Install dependencies
	docker run --rm -v $(current_dir):/app composer/composer install

metrics:
	@echo Generate static analyse reports
	docker run -t -i -v $(current_dir):/srv fesor/phpqatools phpmetrics \
		--report-html=reports/metrics.html src/
