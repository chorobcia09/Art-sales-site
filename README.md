# Artworks Sales Website

## Project Overview
This project is a web application for selling artworks. Its goal is to provide artists and collectors with a platform to easily showcase, browse, and purchase various works of art. The application offers an intuitive and efficient environment for managing artwork sales and purchases.

---

## Tools and Technologies

### Programming Languages:
- **PHP 8.2.12:** Licensed under PHP License v3.01, compatible with the Open Source Initiative (OSI).
- **JavaScript:** Standardized under ECMA-262. Most libraries and tools use licenses like MIT, Apache, or GPL.

### Frameworks:
- **Laravel 11.4:** Licensed under the MIT License.
- **Bootstrap 5.3:** Licensed under the MIT License.

### Databases:
- **MySQL 10.4.32 (MariaDB):** Licensed under GNU General Public License (GPL) and commercially by Oracle.

### Development Environment:
- **Visual Studio Code 14.0:** Licensed under Microsoft Software License Terms.

### Other Tools:
- **XAMPP v3.3.0:** Licensed under GNU General Public License (GPL).
- **Composer 2.7.6:** Licensed under the MIT License.

### Useful Links:
- [Visual Studio Code](https://code.visualstudio.com/Download)
- [PHP Downloads](https://www.php.net/downloads.php)
- [XAMPP](https://www.apachefriends.org/pl/download.html)
- [Composer](https://getcomposer.org/download/)
- [Laravel Documentation](https://laravel.com/docs/11.x/installation)
- [Bootstrap Documentation](https://getbootstrap.com/docs/4.0/getting-started/download/)
- [MySQL Documentation](https://dev.mysql.com/doc/)

---

## Database Structure

### ERD Diagram
![alt text](https://github.com/chorobcia09/Art-sales-site/blob/main/erd.png)

### Tables Description
- **users:** Stores user information such as name, email, password, role, and profile picture.
- **transactions:** Records transactions, including amounts and descriptions.
- **artworks:** Contains details of artworks such as title, description, price, and image.
- **artists:** Stores information about artists, including name, date of birth, and description.
- **migrations:** Tracks database migration changes.
- **sessions:** Manages user session data.

### Table Relationships
- **users - transactions:** One-to-many relationship. A user can have multiple transactions.
- **artists - artworks:** One-to-many relationship. An artist can create multiple artworks.
- **users - sessions:** One-to-many relationship. A user can have multiple sessions.

---

## Application Features

### Main Functionalities:
1. **User Registration and Login:**  
   - Users can create accounts and log in to access full functionality.
2. **CRUD Operations:**  
   - **Artworks:** Create, read, update, and delete artworks.  
   - **Users:** Manage user accounts (by admin).  
   - **Artists:** Add and manage artist profiles.
3. **Purchasing Artworks:**  
   - Users can purchase available artworks using card or cash payment options.

### Responsive Design:
The website is fully responsive, ensuring usability on both desktop and mobile devices. Responsiveness is achieved using:
- Bootstrap’s grid system.
- Dynamic DOM manipulation via JavaScript.
- Flexible images and components.

---

## How to Run the Application

1. **Using XAMPP:**
   - Start Apache and MySQL modules in XAMPP.

2. **Setting Up the Project:**
   - Open the project folder in **Visual Studio Code**.
   - Open a new terminal and run:
     ```bash
     php artisan serve
     ```
   - Run database migrations and seed the database:
     ```bash
     php artisan migrate
     php artisan db:seed
     ```
   - Access the application in your browser at [http://127.0.0.1:8000](http://127.0.0.1:8000).

---

## Validation
The application includes backend validation for forms like registration, adding artworks, and updating artist details. 

### Registration Validation:
- **Email:** Must be unique, valid, and have a maximum of 255 characters.
- **Password:** Must be at least 8 characters long and match the confirmation field.
- **Profile Image:** Optional but must be a valid image file (e.g., JPEG, PNG).

### Artworks Validation:
- **Title:** Required, string format.
- **Price:** Numeric, greater than or equal to 0.
- **Image:** Required, must be an image file under 2MB.
- **Artist Name:** Required, string format.

---

## License
This project is licensed under the MIT License.
