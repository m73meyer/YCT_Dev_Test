# YCT Dev Test

The task was to develop crud for customer, numbers and number preferences. 
For this project I use Laravel 8 and vue 3.

## Creating sample data

```bash
php artisan serve
```

## Usage

First clone the repository. 

```bash
git clone https://github.com/m73meyer/YCT_Dev_Test.git
```

Configure the application.

```bash
cp .env.example .env
```

If your database server host is different from localhost, change in .env file.

Create database structure

```bash

# only table structure
php artisan migrate

# or table structure and sample data
php artisan migrate --seed

```
Execute the project

```bash
# compile javascript
npm rum dev

# execute project
php artisan serve
```

Open url http://localhost:8000 in the browser.

The sample data create a user admin@admin.com and password is the word "password".

## Tasks for this trial:

- [x] 1. Create a new repository on Github
- [x] 2. Start a new project using Laravel on the latest version
- [x] 3. After installing the framework to create a new database called blast with username root and blank password
- [x] 4. Run the initial migrations that Laravel has built in (users, reset passwords..)
- [x] 5. Make sure everything is working fine
- [x] 6. Create the following migration, view and controller
- [x] 7. The user must be able to create a customer, when that's done, he can add numbers and after that number preferences.
- [x] Only authenticated users should be able to create accounts, numbers and preferences
- [x] For all migrations to add timestamps and soft deletes
- [x] For the number preferences, when a new number is created two new preferences should be added by default, one named auto_attendant with value 1 and another one voicemail_enabled also with value 1

This is not a MUST, but will be nice if you

- [x] use Eloquent ORM to deal with database
- [x] use vue.js for your tables instead of reloading the page after each post when adding customers, numbers and number preferences.
- [ ] create a nice UI
- [x] be able to change status of customer and numbers
- [x] be able to change number preferences on screen
- [x] be able to delete records
- [ ] create on your own a way that multiple users can see the same account and different types of permissions
- [x] create a seeder that will automatically create 10 accounts where each should have a rand amount of numbers
- [ ] unit test for create customer
- [ ] unit test for create number
