# Waroma - Full Stack School Management System
Waroma is a full stack school management system with functionalities for the students, teachers, and course administrators. The project was built as part of the coursework in the 2nd year for the unit Internet Application Programming. It is developed in HTML, CSS, and JS for the frontend and Laravel, XAMPP, and MySQL for the backend. We have also implemented the use of APIs for certain features.

## Features
The school management system includes the following features:

* Student and Teacher Registration
* Course Registration and Management
* Class Creation
* Attendance Management
* Exam Management
* Class enrolment
* Grading and Progress Tracking
* Online Learning and Course Material Access
* Messaging and Communication System(inbuilt video calling feature)
## Screenshots
[Add screenshots here]

## Installation
To use Waroma, follow these steps:

* Clone the repository: git clone https://github.com/[username]/waroma.git
* Install dependencies: composer install
* Copy the .env.example file to .env and configure the database settings: cp .env.example .env
* Generate a new key for the application: php artisan key:generate
* Run database migrations: php artisan migrate
* Start the server: php artisan serve
* Open the application in your browser at http://localhost:8000
Note: If you're using XAMPP, make sure to start the Apache and MySQL services before running the application.
## API Integration
Waroma uses APIs to perform certain tasks, including:

* Integrating with payment gateways for fee payment
* Retrieving soft copy library books from external sources
* Sending email notifications to users
## Contributors
The following people contributed to the development of Waroma:

Venessa Nalugala
Caleb Etemesi

## License
The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).



