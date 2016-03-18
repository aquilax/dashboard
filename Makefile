BASE = $(realpath ./)
SRC_DIR = $(BASE)/src
COVERAGE_DIR = $(BASE)/coverage
TESTS_DIR = $(BASE)/tests
BIN_DIR = $(BASE)/vendor/bin

test:
	$(BIN_DIR)/phpunit

phpmd:
	$(BIN_DIR)/phpmd $(SRC_DIR) --exclude /includes/ text cleancode,codesize,controversial,design,naming,unusedcode

coverage: clear_coverage
	$(BIN_DIR)/phpunit --coverage-html $(COVERAGE_DIR)

clear_coverage:
	rm -rf $(COVERAGE_DIR)

sniff:
	$(BIN_DIR)/phpcs --standard=PSR2 --extensions=php --ignore=shared,templates,api --colors $(SRC_DIR)

sniff-fix:
	$(BIN_DIR)/phpcbf --standard=PSR2 --extensions=php --ignore=shared,templates,api $(SRC_DIR)
	$(BIN_DIR)/phpcbf --standard=PSR2 --extensions=php $(TESTS_DIR)

init-db:
	sqlite3 $(BASE)/db/data.sqlite3 < $(BASE)/bootstrap/database.sql
