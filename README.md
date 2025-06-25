<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Encore Concert Management System

Encore is a modern web application for managing concerts, venues, tickets, singers, genres, and bookings. Built with Laravel, it provides a robust admin dashboard and a user-friendly public interface for booking and managing concert events.

## Features

- Admin dashboard for CRUD management of:
  - Concerts (with many-to-many singer relationships)
  - Venues and venue sections
  - Singers and genres
  - Tickets (with dynamic section filtering)
  - Bookings
- User-facing concert discovery and ticket booking
- Dynamic forms and modals with validation and filtering
- Responsive, modern UI with clear order summary and checkout
- Dockerized for easy local development and deployment

## Tech Stack
- Laravel (PHP)
- MySQL
- Tailwind CSS (UI)
- Docker & Docker Compose
- Nginx (production)

## Getting Started

1. Clone the repository
2. Copy `.env.example` to `.env` and configure your environment variables
3. Build and run with Docker Compose:
   ```sh
   docker-compose up -d --build
   ```
4. Run migrations and seeders:
   ```sh
   docker-compose exec php-fpm php artisan migrate --seed
   ```
5. Access the app at [http://localhost:8080](http://localhost:8080)

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
