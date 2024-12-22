Task Management System
This project is a Task Management API built with Laravel. It provides endpoints to manage tasks for authenticated users, including features such as CRUD operations, filtering, pagination, and robust validation.

Features
User Authentication

Implemented using Laravel Sanctum to ensure secure API access.
Tokens are generated for each authenticated user.
Task Management

Supports creating, reading, updating, and deleting tasks.
Tasks are associated with users via a one-to-many relationship.
Ensures that users can only access and modify their own tasks.
Dynamic Filtering and Sorting

Tasks can be filtered by status (e.g., Pending, In Progress, Completed).
Sorting is supported based on due_date in ascending or descending order.
Results are paginated to return 10 tasks per page for performance optimization.
Validation and Error Handling

Validation rules ensure that data integrity is maintained (e.g., title, status, and due_date are required).
Returns appropriate error responses for unauthorized actions (403) and missing resources (404).
Authorization

Policies are used to enforce task-specific permissions, ensuring users can only view or update tasks they own.
API Endpoints
Method	Endpoint	Description
POST	/api/login	Authenticates a user and issues an API token.
GET	/api/tasks	Retrieves tasks for the authenticated user.
POST	/api/tasks	Creates a new task for the authenticated user.
GET	/api/tasks/{id}	Retrieves details of a specific task.
POST	/api/tasks/{id}	Updates a specific task.
DELETE	/api/tasks/{id}	Deletes a specific task.
Project Setup
Prerequisites
PHP (v8.0 or higher)
Composer
Laravel (v10)
A database (MySQL or similar)
Installation
Clone the repository:

bash
Copy code
git clone https://github.com/Tutulhosen/task-management-system.git  
Navigate to the project directory:

bash
Copy code
cd task-management-system  
Install dependencies:

bash
Copy code
composer install  
Create a .env file and configure the database settings. Example:

dotenv
Copy code
DB_CONNECTION=mysql  
DB_HOST=127.0.0.1  
DB_PORT=3306  
DB_DATABASE=your_database  
DB_USERNAME=your_username  
DB_PASSWORD=your_password  
Run database migrations:

bash
Copy code
php artisan migrate  
Start the development server:

bash
Copy code
php artisan serve  
Use a tool like Postman or cURL to interact with the API.

Explanation
Approach
Authentication and Security

Laravel Sanctum was chosen for its simplicity and robust token-based authentication.
Routes are protected with middleware to ensure only authenticated users can access task-related endpoints.
Task Management

Used Laravel's Eloquent ORM for managing task data, leveraging relationships to associate tasks with users.
Validation rules were applied to ensure that only valid data is stored in the database.
Authorization

Policies were implemented to restrict access to tasks based on ownership.
Tasks are scoped to the authenticated user, ensuring data security and isolation.
Error Handling

Comprehensive error handling was added to return meaningful responses for unauthorized access, missing resources, and validation errors.
Custom responses were used for a consistent API user experience.
Code Quality

Organized controller methods for readability and separation of concerns.
Leveraged Laravel's built-in features for clean, maintainable code.
Future Improvements
Add unit and feature tests to validate API behavior.
Implement a frontend interface to interact with the API.
Extend task filtering capabilities (e.g., by date range).
Include more detailed documentation for API consumers.
Conclusion
This project demonstrates my ability to build a secure and scalable API using Laravel. It showcases:

Expertise in using Laravel's Eloquent ORM, Policies, and Sanctum.
Strong focus on clean code and maintainable architecture.
Practical implementation of RESTful API principles.
Feel free to explore the code and reach out if you have any questions or feedback.

