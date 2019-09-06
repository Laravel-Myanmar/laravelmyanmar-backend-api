format_check:
	@./vendor/bin/phpcs --standard=tests/phpcs.xml

format_fix:
	@./vendor/bin/phpcbf --standard=tests/phpcs.xml