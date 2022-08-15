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

Ping-pong consists of next services:
- **Spatie**: A class to validate SSL certificates
- **Guzzle**: Is a PHP HTTP client that makes it easy to send HTTP requests and trivial to integrate with web services
- **Maknz Slack**: A simple PHP package for sending messages to Slack, with a focus on ease of use and elegant syntax

## Installing

1. Clone this repository
```git clone http://``` 
2. open ping-pong-service dir

3. ```docker-compose pull```

4. ```cp .env.example .env```

5. ```docker-compose build```

6. ```docker-compose run --no-deps php composer clear-cache```

7. ```docker-compose run --no-deps php composer update --no-progress```

8. ```docker-compose run --no-deps php vendor/bin/codecept build```

9. ```docker-compose up -d chrome && sleep 5 && docker-compose up -d vnc-recorder```

10. ```docker-compose run --no-deps php vendor/bin/codecept run acceptance --env chrome --xml --html```


## Run scenario

1. ``make run``
