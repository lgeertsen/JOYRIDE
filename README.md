# JOYRIDE le n°1 site de covoiturage

### Launch project

You need to have PHP7, composer and laravel installed
```bash
git clone https://github.com/lgeertsen/JOYRIDE.git
cd JOYRIDE
```
Create the database
```sql
mysql> CREATE DATABASE joyride;
mysql> exit
```
Copy .env.example to .env
Fill in your information for the database
```
DB_DATABASE=joyride
DB_USERNAME=root
DB_PASSWORD=*yourPassword*
```
Then in the terminal
```bash
composer install
php artisan key:generate
```
Now you can launch the server
```bash
php artisan server
```
You can visit the project on http://localhost:8000

### Seed database

```
php artisan tinker
>> factory('App\Ride', 50)->create'); //Creation of 50 rides, cars and users
>> exit
```
