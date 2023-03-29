
  

# Online Support System

## _About Application

We are active as an open source platform and provide a perfect place for everyone who is interested in education. Our main purpose is to combine gamification with learning to make it a unique experience for learners all over the world. Also, we prepare a valuable field for onboarding and its related features which is a great opportunity for companies to take part.

# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. 
[Official Documentation](https://laravel.com/docs/9.x/installation)

Clone the repository

    git clone https://github.com/antssanjeewa/Online-Support-System.git

Switch to the repo folder

    cd Online-Support-System

Install all the dependencies using composer

    composer install

make the required configuration changes in the .env file

    .env

Generate a new application key

    php artisan key:generate


Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate --seed

Start the local development server

    php artisan serve

You can now access the server at http://127.0.0.1:8000

After Run Application You can Use to Login Below Credential (use route : http://127.0.0.1:8000/login )

    user_name => admin@test.lk
    password  => password



# More About the project


Assumptions :

-   The support agent can provide multiple replies to a single ticket.
    
-   The login path is hidden from guest users.
    
-   Only 'Pending' and 'Checked' statuses were used for tickets

Improvements :

-   Belongs to many relationship for ticket replies
    
-   Use Vuw3 and InertiaJs for Frontend Development.


## License
