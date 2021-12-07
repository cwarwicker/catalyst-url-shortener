# cat-short-url

## Setup

- Run `npm install` to install all node modules.
- Run `composer update` to install all composer requirements (from inside the web container).
- Copy `.env.example` to a new `.env` file and set the database values to match your database. If you are using the development environment, this will be:
    ```
    DB_CONNECTION=mysql
    DB_HOST=cat-short-url-db
    DB_PORT=3306
    DB_DATABASE=main
    DB_USERNAME=user
    DB_PASSWORD=password
    ```
  
- Run `npm run dev` to build all the JS and CSS.
- Generate an App key. You can either do this by:
    - Loading up the app in the browser and clicking 'Generate Key' as there will be an error about a missing key.
    - Connect to the web container and run `php artisan key:generate`
- Connect to web container and run `php artisan migrate` to setup database tables.    
