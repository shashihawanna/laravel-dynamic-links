## Table of contents

- [About webPageBuilder](#about-webpagebuilder)
- [Features](#features)
- [Download](#download)
- [Getting Started](#getting-started)
- [Technologies Used](#technologies-used)

## About webPageBuilder

WebPageBuilder is a project designed to provide a powerful and intuitive web page creation experience using the GrapesJS framework. It enables users to visually build, edit, and manage web pages through a drag-and-drop interface, integrated with Laravel for back-end support and data persistence.

## Features

- GrapesJS Integration: A full-featured visual editor allowing users to drag-and-drop elements, create layouts, and style web pages without writing code.
- Custom Plugins: Includes various GrapesJS plugins like grapesjs-plugin-forms, grapesjs-navbar, grapesjs-tabs, and more for extended functionality like form building, navigation bar creation, and image editing.
- Dynamic Page Management: Users can create, edit, and delete pages, complete with slug-based URLs, content management, and Laravel policies for secure access control.
- DataTables Integration: A user-friendly way to list and manage pages using DataTables, including search, sort, pagination, and action buttons for viewing, editing, or deleting pages
- Page Save via AJAX: Pages are saved asynchronously using AJAX, ensuring a smooth user experience without full page reloads.
- Laravel Backend: Provides secure routing, models, and controllers for handling page management and data persistence.
## Download
 - GIT
      ```sh
      git clone https://github.com/shashihawanna/webPageBuilder.git
      ```

## Getting Started:
 1. Installation:
    - Clone repo and configure your environment.
    - Run command composer install in the terminal  
      ```sh
       composer install
      ```
    - Create the .env file from .env.example.
    - Add database details such as DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, and DB_PASSWORD in the .env file.
    - Run command php artisan migrate in the terminal to set up the database.
      ```sh
       php artisan migrate
      ```
    - Run command php artisan key:generate in the terminal
      ```sh
       php artisan key:generate
      ```
    - Run command npm install in the terminal
      ```sh
       npm install
      ```
    - Run command npm run build in the terminal
      ```sh
       npm run build
      ```
    - Run command php artisan serve to start the application.
      ```sh
       php artisan serve
      ```  
    - Create a user by visiting http://127.0.0.1:8000/register.
    - Log in with the newly created user to view the dashboard and manage pages.
 2. Customization:
    - Modify the provided blade templates and JavaScript files to customize the page builder to your needs.
    - Adjust the GrapesJS editor configuration to add/remove plugins or modify its behavior.
 3. Usage:
    - Use the builder to create new pages or edit existing ones visually.
    - Save the pages to the database with the ability to retrieve and modify them later.

### Technologies Used

- **[Laravel](https://laravel.com/docs/11.x/installation)**Back-end framework for routing and data management.
- **[GrapesJS](https://github.com/GrapesJS/grapesjs)**Front-end drag-and-drop page builder.
- **[Mysql](https://www.mysql.com/downloads) ** Relational database management system.
- **[IndexedDB] ** Local storage support for saving progress.
