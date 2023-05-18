REPORTS_DIR ?= build/reports

.PHONY: audit
audit: phpcs phpstan

.PHONY: prepare-ci
prepare-ci:
	@mkdir -p build/reports

.PHONY: phpstan
phpstan:
	vendor/bin/phpstan analyse --memory-limit=-1 src tests --level max

.PHONY: phpstan-ci
phpstan-ci: prepare-ci
	vendor/bin/phpstan analyse --memory-limit=-1 --level max --error-format checkstyle src tests | awk NF > $(REPORTS_DIR)/phpstan.xml

.PHONY: phpcs
phpcs:
	vendor/bin/phpcs -sp --standard=phpcs.xml --extensions=php --ignore=*/tests/bootstrap.php src tests

.PHONY: phpcs-ci
phpcs-ci: prepare-ci
	vendor/bin/phpcs -sp --report=checkstyle --report-file=$(REPORTS_DIR)/phpcs.xml --standard=phpcs.xml --extensions=php --ignore=*/tests/bootstrap.php src tests

.PHONY: unit-tests
unit-tests:
	echo "no unit test implemented yet"

.PHONY: unit-tests
unit-tests-ci: prepare-ci
	echo "no CI unit test implemented yet"

.PHONY: functional-tests
functional-tests:
	echo "no functional test implemented yet"

.PHONY: functional-tests-ci
functional-tests-ci: prepare-ci ## Run functional tests and generate report file
	echo "no CI functional test implemented yet"
