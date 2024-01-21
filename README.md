<p style="text-align: center"><img src="./public/site/assets/img/logo.png"></p>

<div style="text-align: center">

# ZigCMS 🚀

</div>

Zig CMS is an open source CMS made with Laravel. You can use it as a starting point for your project, or even as a
reference for your studies.

- [See the project demo](https://zigcms.com).

## Install

⚠️ This project was developed in the [Laravel Sail](https://laravel.com/docs/10.x/sail)
environment,
so if you already have `Docker` in your development environment, this will make your life easier
😁

<br> 

Clone this repository

```shell
git clone https://github.com/ewvlnet/zigcms.git NAMEOFYOURPROJECT
```

<br>

Enter the created folder

```shell
cd NAMEOFYOURPROJECT/
```

<br>

Now run the commands below

```shell
composer install

cp .env.example .env

php artisan key:generate
```

<br>

Do the `require` of `Laravel Sail`, then run the installation command

```shell
composer require laravel/sail --dev

# Select MySQL and any other services you want
php artisan sail:install
```

<br>

💡After the `Sail Installation command`, the mysql container access data will be written to the .env file, and you can
change them if you want

```dotenv
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=YOURDATABASENAME
DB_USERNAME=sail
DB_PASSWORD=password
```

<br>

Also, after the `Sail installation command`, in the next step it will create the images (making the `build`), and you
only need to run the up command, after that

```shell
./vendor/bin/sail up -d
```

The `-d` at the end of the command prevents the terminal from becoming locked, and you will be able to execute new
commands

<br>

Run the migrations

```shell
sail artisan migrate:fresh --seed
```

# 🥳🥂🎉🍻🎈

#### Once this is done, just access `localhost` in your browser and see the screen `ZigCMS` home page

### 📄 License

[MIT](./LICENSE.md)

