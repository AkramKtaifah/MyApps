# Car Rental Web Application

This is a web application for **car rental**, developed using **PHP Laravel** and based on the **MVC architecture pattern**.
The project uses **Composer** for dependency management and **MySQL Server** as the database management system.

## App Overview

The application consists of two main sections:

### 1. Admin Panel
This section is dedicated to the website administrator and includes the following features:
- Add new cars to the website.
- Upload images for each car.
- Edit or delete car information.
- Assign each car to a specific branch/location of the company.
- Manage car availability and rental status.

### 2. User Interface
Users can:
- Browse available cars across different locations.
- View detailed information about each car (type, price, availability, images, etc.).
- Check whether a car is available for rent or not.
- Make a reservation for the desired car.
- **Payment is made only on-site**, at a company office within a specified time after booking.

## Technologies Used

- **Programming Language**: PHP
- **Framework**: Laravel (MVC structure)
- **Dependency Management**: Composer
- **Database**: MySQL Server
- **Frontend**: Blade + HTML/CSS + JavaScript

## Running the Project Locally

To run the project on your local machine, follow these steps:

```bash
git clone https://github.com/your-username/your-repo-name.git
cd your-repo-name
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
