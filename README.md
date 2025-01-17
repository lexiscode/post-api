Make sure you have environment setup properly. You will need PHP8.1, composer and Node.js:

- Clone this project repository `git clone https://github.com/lexiscode/post-api.git`
- Copy `.env.example` into `.env` 
- Navigate to the project's root directory using terminal, `cd post-api`
- Then run `composer install`
- Set the encryption key by executing `php artisan key:generate --ansi`
- Start your XAMPP local server
- Run migrations `php artisan migrate`
- Start local server by executing  `php artisan serve`

