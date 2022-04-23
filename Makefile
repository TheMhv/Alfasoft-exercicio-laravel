up:
	docker-compose up
down:
	docker-compose down
php:
	docker-compose exec server /bin/bash
mongo:
	docker exec -it database_mongo mongo
mysql:
	docker exec -it database mysql -u root
install:
	composer install
serve:
	php artisan serve --host 0.0.0.0
migrate:
	php artisan migrate
rollback:
	php artisan migrate:rollback
seed:
	php artisan db:seed
test:
	php artisan test --testsuite=Feature