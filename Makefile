prod:
	@composer install --no-dev
	make clean

dev:
	@composer install
	@npm install --only=dev

watch:
	@gulp watch

install:
	@composer install

update:
	@composer update

npm:
	@npm install --only=dev

clean:
	@rm -rf vendor/
	@rm -rf assets/.cache
	@rm -rf assets/.sass-cache
	@rm -rf assets/*/*.map
	@rm -rf node_modules/
	@composer install --no-dev
