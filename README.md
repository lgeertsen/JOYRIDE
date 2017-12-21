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
To be able to run the server localy
In .env
```
MAIL_DRIVER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=*yourEmail@gmail.com*
MAIL_PASSWORD=*yourGmailPassword*
MAIL_ENCRYPTION=tls
```
Then go to:
[https://myaccount.google.com/security#connectedapps](https://myaccount.google.com/security#connectedapps)
Take a look at the Sign-in & security -> Connected apps & sites -> Allow less secure apps settings.
You must turn the option "Allow less secure apps" ON.
![alt text](https://learninglaravel.net/img/book/book2-14.png "Photo")

Now go to *\vendor\swiftmailer\swiftmailer\lib\classes\Swift\Transport\StreamBuffer.php*
and add the following:
```php
...
private function establishSocketConnection()
{
  ...
  $options = array();
  if (!empty($this->params['sourceIp'])) {
      $options['socket']['bindto'] = $this->params['sourceIp'].':0';
  }

  // Add these 2 lines
  $options['ssl']['verify_peer'] = FALSE;
  $options['ssl']['verify_peer_name'] = FALSE;
  ...
}
...
```
And last but not least compile Sass and Vue files
```bash
npm install
npm run dev
```
Now you can migrate the database & launch the server
```bash
php artisan migrate
php artisan server
```
You can visit the project on http://localhost:8000

### Seed database

```
php artisan tinker
>> factory('App\Ride', 50)->create(); //Creation of 50 rides, cars and users
>> exit
```
