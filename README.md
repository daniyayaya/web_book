


# Book Management System

## Overview

The Book Management System is a web application designed to provide an intuitive platform for users to manage a collection of books. This repository contains the code and resources for setting up the system, which features user registration and login, book categorization, and CRUD (Create, Read, Update, Delete) operations on book entries.

## Features

- User Authentication: Secure signup and login process.
- Book Management: Add, view, update, and delete books.
- Categorization: Organize books by categories.
- Search Functionality: Dynamic searching and filtering of book entries.

## Technology Stack

- Front-End: HTML, CSS, JavaScript, Bootstrap for responsive design
- Back-End: PHP for server-side logic
- Database: MySQL for data storage

## Screenshots

### Welcome Page
![首页欢迎界面](https://github.com/danniyh/Interactive-Book-Library-System/assets/134665097/1942c91e-0616-416d-98e2-4593d4c7f2b9)
Here users can choose to sign up or log in if they have an account.

### Sign Up Page
![登录验证界面](https://github.com/danniyh/Interactive-Book-Library-System/assets/134665097/349cf018-e00f-4b63-bd95-b4cf7734e6e6)
New users can create an account using this form.

### Home Page
![主页](https://github.com/danniyh/Interactive-Book-Library-System/assets/134665097/4d501b54-91f9-42c6-a87b-dde0f2e9ff66)
The main page where users can browse books and access different categories.

### Book Details
![书籍信息](https://github.com/danniyh/Interactive-Book-Library-System/assets/134665097/288980c7-95c8-4473-ad99-ebd4948ed9ca)
Users can view detailed information about the book here.

### Responsive Search Feature
![123](https://github.com/danniyh/Responsive-Book-Library-System/assets/134665097/c63a2f23-d431-49b4-b7bf-d18231b45fff)
Quickly find books with our responsive search bar, optimized for all devices.

### Database Interface
![服务器数据库界面](https://github.com/danniyh/Interactive-Book-Library-System/assets/134665097/17c46749-db31-4124-b116-0a3e461d0623)
This is the database view where all books are listed with their details.

## Installation

1. Clone the repository to your local machine.
2. Set up a web server like Apache and point the document root to the cloned directory.
3. Import the provided SQL script into your MySQL database to create the required tables and seed some initial data.
4. Configure your database connection by editing the relevant PHP files with your MySQL credentials.

## Configuration

Edit the **`conn.php`** file to set up your database connection:



## Usage

Navigate to the home page and sign up for an account. Once logged in, you will be able to manage books and perform all related operations.

## License

This project is open-sourced under the MIT License.
