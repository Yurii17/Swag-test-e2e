<!--- 
Copyright © 2022 Yurii Lobas. Contacts: yurii.lobas@gmail.com
-->

# Swag-test-e2e

Current project only checks acceptance e2e test cases flows.

### Custom Swag-test-e2e features:
* **login with different accounts** application/successful logging. 
* **analyze** errors cause with detailed traces for failed requests
* **compare** different request in scripted dashboard

## Getting Started

Swag-test-e2e consists of next services:
- **codeception**: Codeception collects and shares best practices and solutions for testing PHP web applications.
- **faker**: Generate by faker data/value.
- **allure**: A simple reporter.

## Installing using docker

1. Clone this repository
```git clone https://github.com/Yurii17/Swag-test-e2e.git``` 
2. open Swag-test-e2e dir

3. ```cp .env.example .env```

4. ```docker-compose pull```

5. ```docker-compose build```

6. ```docker-compose run --no-deps php composer clear-cache```

7. ```docker-compose run --no-deps php composer update --no-progress```

8. ```docker-compose run --no-deps php vendor/bin/codecept build```

## Installing without docker

1. ```cp .env.example .env```

2. ```composer clear-cache```

3. ```composer install```

4. ```codecept build```

## Run scenario using docker

1. Run in one command - ```make run```

2. ```docker-compose up -d chrome && sleep 5```

3. ```docker-compose run --no-deps php vendor/bin/codecept run acceptance --env chrome --xml --html```

4. ```docker-compose down```

**Without docker**

- chrome ```codecept run acceptance --env chrome --xml --html```

- headless ```codecept run acceptance --env headless --xml --html```
