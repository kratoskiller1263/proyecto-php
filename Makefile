start:
	docker-compose up -d --build

stop:
	docker-compose down

logs:
	docker-compose logs -f
