![stonks image](./resources/views/images/stonks.jpeg)

## PHP Challenge - Laravel version

This is a Laravel version of the take-home challenge for PHP Developers from Jobsity.

### Features

#### Mandatory

- :heavy_check_mark: An endpoint to retrieve the history of queries made to the API service by that user;
- :heavy_check_mark: An endpoint to create a new User, storing the email and information to log in later;
- :heavy_check_mark: An endpoint to request a stock quote;

#### Extra

- :heavy_check_mark: Add unit tests for the endpoints;
- :grey_exclamation: Use RabbitMQ to send the email asynchronously - Instead of RabbitMQ - **I've added the database queue from laravel, which allows the emails to be sent asynchronously and a docker container that runs the queue:worker;**
- :grey_exclamation: Use JWT instead of basic authentication for endpoints; - **Instead of JWT, I've used the official Laravel solution called Sanctum.**
- :heavy_check_mark: Containerize the app. 

#### Extra-extra

- :heavy_check_mark: Add 30 seconds cache to `api.user.history` and `api.stock.price` endpoints;

### Requirements

- Docker-compose:  >= 1.25.0
- Docker:  >= 20.10.12

### Setup instructions

Execute the following steps:

- Clone the project
- Create `.env` from `.env.example`
- You may add Mailtrap(or other email service) to your .env using the following variables:
```
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=[Your Mailtrap Username]
MAIL_PASSWORD=[Your Mailtrap Password]
MAIL_ENCRYPTION=tls
```
- Run `docker-compose up`
- Wait the laravel-challenge-php-build process finishes

### Testing

- Run `docker exec -it laravel-challenge-php bash`
- Run `php artisan test`

### Using the APP
Once up and running you can make API calls using the following URL: `http://localhost:8019/api`:


When the application starts, the admin user is inserted in the database by the seeder:
- Email: `admin@admin.com`
- Password: `secret` 

These credentials must be used in the login endpoint to authenticate into the system.

After that, you can proceed using all available endpoints. 

The available endpoints can be found [here](https://documenter.getpostman.com/view/15585199/UVXeqxZj)









