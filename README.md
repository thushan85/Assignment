I'm working on Ubuntu so this project has developed in Ubuntu. 

#Server Requirements
    PHP >= 5.4
    MCrypt PHP Extension
    
#Permissions
    Laravel may require one set of permissions to be configured: folders within app/storage require write access by the web server.

For more details see Laraavel documention (http://laravel.com/docs/4.2/installation)


#Please go through following steps to setup the project.

1. Database backup contains in db_sql folder (assignment/db_sql) 

2. Change database configuration file (LINE# 57 to 60 in app/config/database.php)

3. There are two options to run the project

 a. Go to project directory from comman line and run following command (You may require php cli ) 
    php artisan serve

 b. Create a vhost on apache
 
 4. run following command on your terminal to download dependemcies
    composer update
 
Plase Note: ER Diagram contains in Diagrams folder
 
