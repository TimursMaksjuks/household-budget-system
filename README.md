# Household Budget System

A web application for managing personal finances, budgets, and financial records developed using Laravel MVC.

## Features

- User registration and authentication
- Password recovery via email
- Multi-language support (English and Latvian)
- Automatic language detection based on browser settings
- Financial records management
- Categories management
- Budget planning and tracking
- Financial statistics and charts
- User profile management
- Administrator panel
- Role-based access control

## Technologies Used

- PHP 8.4
- Laravel 13
- MySQL
- Blade Templates
- Tailwind CSS
- Laravel Breeze

## Installation

### 1. Clone the repository

```bash
git clone https://github.com/TimursMaksjuks/household-budget-system.git
```

### 2. Navigate to the project directory

```bash
cd household-budget-system
```

### 3. Install PHP dependencies

```bash
composer install
```

### 4. Install Node.js dependencies

```bash
npm install
```

### 5. Create environment file

```bash
cp .env.example .env
```

### 6. Generate application key

```bash
php artisan key:generate
```

### 7. Configure database connection

Update the database settings in the `.env` file.

### 8. Run database migrations

```bash
php artisan migrate
```

### 9. Start Vite development server

```bash
npm run dev
```

### 10. Start the Laravel application

```bash
php artisan serve
```

The application will be available at:

```text
http://127.0.0.1:8000
```