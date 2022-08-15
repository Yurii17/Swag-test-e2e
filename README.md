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

## Installing

1. Clone this repository
```git clone https://github.com/Yurii17/Swag-test-e2e.git``` 
2. open Swag-test-e2e dir

3. ```docker-compose pull```

4. ```cp .env.example .env```

5. ```docker-compose build```

6. ```docker-compose run --no-deps php composer clear-cache```

7. ```docker-compose run --no-deps php composer update --no-progress```

8. ```docker-compose run --no-deps php vendor/bin/codecept build```

9. ```docker-compose up -d chrome && sleep 5 && docker-compose up -d vnc-recorder```

10. ```docker-compose run --no-deps php vendor/bin/codecept run acceptance --env chrome --xml --html```


## Run scenario

**If you are using docker**

1. ```make run```

**Without docker**

1. ```cp .env.example .env```

2. ```composer clear-cache```

3. ```composer install```

4. ```codecept build```

5. ```codecept run acceptance --env chrome --xml --html```