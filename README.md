# Laravel API

### Info
Basic laravel api with authentication

### Required commands to run this project
`composer install`
`php artisan key:generate`
`php artisan migrate`
`php artisan db:seed --class=UsersTableSeeder` is for creating test users.
`php artisan passport:install` this command will create the encryption keys needed to generate secure access tokens.

### API endpoints
Authenticate user and get access token
Method: POST,
Endpoint: `/api/login`,
Params: email, password

Get user's documents
Method: GET,
Endpoint: `/api/documents`

Store documents
Method: POST,
Endpoint: `/api/documents`,
Params: name, file (pdf)