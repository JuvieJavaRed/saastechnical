## Database Setup

This section will help you setup the persistence side of the project

- Create a mysql database in your enviroment.
- Go to the .env file in the project and input the correct credentials for mysql.
- Run the command "composer require laravel/passport" to install Passport if you do not have it already.
- Run "php artisan migrate" to create database entities.
- Run the command "php artisan passport:install" to install the middleware library.
- Run "php artisan db:seed" to enter dummy data into the database.

At this point if you open your myself and check you should have the tables created along with dummy data inserted.

## Testing the application

The application can now be tested unsing the available endpoints.

- To run the application run "php artisan serve"
- In the root directory of the project is a postman collection that has all the endpoints
- Instructions for importing a postman collection can be found by following this link https://learning.postman.com/docs/getting-started/importing-and-exporting-data/

-Once you have imported the collection you will need to register your own user using the "Register User" collection.
-The user you have registered from "Register User" collection can now be used to login on the "Login Request" collection.

-The login request will return an O2Auth Token which will be used in the "Create Product" , "Delete Product" and "Update Product" requests.

-All other requests can be run used without the token.



