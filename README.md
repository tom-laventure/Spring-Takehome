# Spring-Takehome

## Installation

### Frontend

install the files

`npm install`

then run the server

`npm run dev`

### Backend

install the files

`composer install`

configure .env file with Mysql connection data

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=spring_takehome
DB_USERNAME={username}
DB_PASSWORD={password}
```

run migrations and seed the database

`php artisan migrate:fresh --seed`

start the server

`php artisan serve`

## Commands

Reset User Scores to 0

`php artisan reset:scores`

Run scheduled commands

`php artisan queue:work`

## API's

Most API's can be tested from the frontend application

If you would like to get a list of the current winners in the winners table, start the backend server and visit

`/api/v1/winners`
