
.PHONY: run stop

run:
	docker run -d --rm --name php-fpm-app -v $(PWD):/var/www \
    --network dev \
    php:7.2-fpm

stop:
	docker stop php-fpm-app