build:
	docker-compose build --no-cache --force-rm
stop:
	docker-compose stop
up
	docker-compose -up -d

#Entrar no container:
#docker exec -it eugenio-docker

#docker exec eugenio-docker bash -c "php artisan migrate"