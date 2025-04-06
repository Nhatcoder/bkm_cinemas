# BKM Cinemas

## Introduction

BKM Cinemas is a web application for managing cinemas, allowing users to view movie schedules, book tickets, and manage personal information. This project is developed using main languages and technologies such as JavaScript, HTML, CSS, Blade, PHP, and SCSS.

## Table of Contents

- [Introduction](#introduction)
- [Installation](#installation)
- [Usage](#usage)
- [Directory Structure](#directory-structure)
- [Contribution](#contribution)
- [License](#license)

## Installation

### Requirements

- Node.js and npm
- Composer
- A web server like Apache or Nginx

### Installation Guide

1. Clone the repository to your machine:

    ```sh
    git clone https://github.com/Nhatcoder/bkm_cinemas.git
    ```

2. Install backend dependencies:

    ```sh
    composer install
    ```

3. Install frontend dependencies:

    ```sh
    npm install
    ```

4. Create the `.env` file from the example file `.env.example` and update the necessary configuration information:

    ```sh
    cp .env.example .env
    ```

5. Run migrations and seed data:

    ```sh
    php artisan migrate --seed
    ```

6. Start the server:

    ```sh
    php artisan serve
    npm run dev
    php artisan queue:work --sleep=0
    ```

## Usage

After successful installation, you can access the web application at `http://localhost:8000`.

- Register/Login account
- View movie schedules
- Book tickets online
- Manage personal information

## Directory Structure

```plaintext
bkm_cinemas/
├── app/                # Directory containing backend PHP files
├── public/             # Directory containing static files like images, CSS, JavaScript
├── resources/          # Directory containing Blade templates and frontend source files
├── routes/             # Directory containing route definition files
├── storage/            # Directory containing cache and logs files
├── tests/              # Directory containing test files
├── .env.example        # Example environment configuration file
├── composer.json       # Composer configuration file
├── package.json        # npm configuration file
└── README.md           # This file
