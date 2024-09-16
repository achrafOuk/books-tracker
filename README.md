# Book Tracker Application

A web-based **Book Tracker** application that allows users to track books, manage notes, and categorize books. The application supports two types of users: **User** and **Admin**, with distinct roles and functionalities.

## Features

### User
- **Add Comment**: Users can leave comments on books.
- **Edit Comment**: Users can edit their comments.
- **Add Book Status**: Track the reading progress of books (e.g., *To Read*, *Reading*, *Completed*).
- **Update Book Status**: Update the status of books as the user progresses through them.
- **Add Note**: Users can add personal notes related to the books they are reading.
- **Update Note**: Users can update their existing notes.
- **Delete Note**: Users can remove notes that are no longer relevant.

### Admin
- **Add Book**: Admins can add new books to the system.
- **Update Book**: Admins can modify the details of existing books.
- **Delete Book**: Admins can remove books from the system.
- **Create Category**: Admins can create categories to organize books.
- **Update Category**: Admins can update the details of existing categories.
- **Delete Category**: Admins can delete categories when necessary.

## Technologies Used
- **PHP**: Backend functionality.
- **Laravel**: PHP framework used to build the application.
- **Tailwind CSS**: For modern and responsive user interface design.
- **Alpine.js**: For lightweight, reactive components on the front end.
- **Spatie**: Laravel package for managing roles and permissions.

## Getting Started

1. Clone the repository:
```bash
   git clone https://github.com/your-username/book-tracker.git
```
2. Install dependencies:
```
composer install
npm install
```
3. Set up the environment:

Copy .env.example to .env.
Set up your database and configure the .env file.

4.Run migrations:
```
php artisan migrate
```

5.Serve the application:

```
php artisan serve
```
visit the link http://localhost:8000 to see the project.
