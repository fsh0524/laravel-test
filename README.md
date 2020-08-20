# Simple Messages Board
Really simple messages board web application developed with Laravel 7.

## How to build the web application

### Using Laradock

Reference: https://laradock.io/getting-started/

#### Requirements
- Git
- Docker [ >= 17.12 ]

#### Installation

1. Clone the laradock repository:
	```
	git clone https://github.com/laradock/laradock.git
	```
2. Clone this repository:
	```
	git clone https://github.com/fsh0524/laravel-test.git
	```
3. In laradock, edit your web server sites configuration.
	```
	cp env-example .env
	```
	At the top, change the `APP_CODE_PATH_HOST` variable to the project path.
	```
	APP_CODE_PATH_HOST=/path/to/laravel-test/
	```
	In the project, edit the configuration for this project.
	```
	cp .env.example .env
	```
4. (Optional) Change the port that nginx will use.
    If there are already some services using the port, you may want to change this.
	```
	# Change the port number to whatever you want.
	NGINX_HOST_HTTP_PORT=80
	NGINX_HOST_HTTPS_PORT=443
	```

5. In laradock's directory, build the environment and run it using docker-compose.
	```
	docker-compose up -d nginx
	```
	Enter the Workspace container, to execute commands like (Artisan, Composer, PHPUnit, Gulp, …)
	```
	# With laradock user
	docker-compose exec -u laradock workspace bash
	```

6. Install composer dependencies.
	```
	composer i
	```

7. Migrate the database.
	```
	touch database/database.sqlite
	php artisan migrate:install
	```

8. Generate your application encryption key using:
	```
	php artisan key:generate
	```

9. Enjoy!