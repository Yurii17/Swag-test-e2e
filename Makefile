.PHONY: run


run:
	docker-compose up -d chrome && sleep 5 && docker-compose run --no-deps php vendor/bin/codecept run acceptance --env chrome --xml --html
