install:
	@composer install --no-dev

update:
	@composer update

clean:
	@rm -rf vendor/
	@rm -rf tmp/
	@rm -rf assets/.sass-cache
	@composer install --no-dev
