## What is Blog App?

The blog app is a place for writers to share their stories.
In this app, writers and readers can interact with each other through the comments column.

## Release Date

26 November 2023

## Default Account for testing

Admin Default Account
username:admin@admin.com
password:admin123

## How to Install

1. **Clone Repository**

```bash
git clone https://github.com/erwin-perdana/sistem-informasi-akademik-kampus-laravel.git
go to folder
composer install
cp .env.example .env
```

2. **Open `.env` then change the following lines according to the database you want to use**

```bash
DB_PORT=3306
DB_DATABASE=blog-app
DB_USERNAME=root
DB_PASSWORD=
```

3. **Migrate database and seeder admin data**

```bash
php artisan migrate
php artisan db:seed
```

4. **Installation**

```bash
php artisan key:generate
php artisan migrate --seed
```

5. **Run**

```bash
php artisan serve
```

## Author

- E-mail : winp2807@gmail.com
- LinkedIn : <a href="https://www.linkedin.com/in/erwin-perdana28"> Erwin Perdana</a>
