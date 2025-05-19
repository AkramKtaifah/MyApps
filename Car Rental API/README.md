# Car Rental Web API Application

This is a **Car Rental** web app that follows a **Backend–Frontend architecture**, where the backend is built using **PHP Laravel**
and the frontend is currently simulated using **Postman** for API testing.

## App Overview

The system is designed to serve a car rental company that operates in multiple locations. It consists of two main roles:

### 1. Admin Role
The admin has full control over the system, including:
- Adding new cars to the website.
- Uploading images for each car.
- Updating and deleting car information.
- Assigning each car to a specific branch or location of the company.
- Managing car availability and rental status.

### 2. User Role
Users (customers) can:
- Browse available cars by location.
- View detailed car information (name, type, price, availability, images).
- Check the availability of a car.
- Make a reservation for a car.
- **Note**: Payment is not handled online. Users must complete the payment **in person** at one of the company's offices within a specified period after booking.

## Technologies Used

- **Backend**: PHP Laravel (REST API)
- **API Testing**: Postman
- **Authentication**: JWT (JSON Web Tokens)
- **Database**: MySQL Server

## API Features

- Token-based authentication using JWT.
- Role-based access for Admins and Users.
- Car listing endpoints (with filters by location, availability, etc.).
- Reservation endpoints for users.
- Admin endpoints to manage car data and images.

## How to Run the Project Locally

```bash
git clone https://github.com/your-username/your-api-repo.git
cd your-api-repo
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
