
# Social Media Using Laravel

## Introduction
This is a social media application built with Laravel, allowing users to create posts, comment on posts, like posts, and connect with other users. This README provides instructions on how to set up the project on your local machine.

## Prerequisites
- PHP >=7.4
- MySQL or any other compatible database
- Node.js and NPM

## Setup
Follow these steps to set up the project:

1. **Clone the Repository**
   ```bash
   git clone https://github.com/neel-ast01/Social-Page-laravel.git
   ```

2. **Navigate to the Project Directory**
   ```bash 
    cd social-media-laravel
    ```

3. **Install Dependencies**
   ```bash
   composer install
   npm install
   ```

4. **Copy Environment File**
   ```bash
   cp .env.example .env  
   ``` 

5. **Generate Application Key**
   ```bash
   php artisan key:generate 
   ``` 

6. **Configure Database**
   Edit the .env file and update the following variables with your MySQL database credentials:
   ```bash
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_database_username
   DB_PASSWORD=your_database_password  
   ```

7. **Migrate Database**Run the database migrations to create the necessary tables:
   ```bash
   php artisan migrate 
   ``` 
   
8. **NPM Mix With Laravel**
   ```bash
   npm install laravel-mix@latest
   ```
   
9. **Build Assets**
   ```bash
   npm run dev
   ```
   or

   ```bash
   npm run prod
   ```
   

10. **Start the Development Server**
    ```bash
    php artisan serve
    ```


## Usage
The application will be available at http://localhost:8000.

Visit http://localhost:8000/register to create a new account. Once logged in, you can create posts, comment on posts, like posts, and connect with other users. Explore the various features of the application and have fun socializing!

## Features
- User authentication (register, login, logout)
- Post creation, editing, and deletion
- Commenting on posts
- Liking posts
- User connections (friendship)
- and more!

## Contributing
Contributions are welcome! Feel free to open issues and pull requests to suggest improvements or report bugs.

## License
This project is licensed under the MIT License - see the LICENSE file for details.

This Markdown content can be directly added to the README.md file in your GitHub repository. Adjustments can be made based on your preferences or specific project details.
