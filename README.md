Technical Assessment for 1-grid By Vikash Gokool

Task:
This App, is a simple To-Do App, were the user can Add/View/Delete/Update Tasks. This App has Laravel’s built in Authentication and Login/Register systems.

Tech Stack:

- Laravel 11 framework
- Node/Composer
- Git
- Docker
- Laravel Breeze
- Vue 3
- Inertia JS
- MySql 5.7
- PHP ^8.2

Home Screen:

 ![WhatsApp Image 2024-04-04 at 10 40 55 PM](https://github.com/VikashGokool86/1grid/assets/107156013/5141c5b9-2d41-45ce-a9bf-836e823894bb)

The Login/ Register Screen

![WhatsApp Image 2024-04-04 at 10 41 09 PM](https://github.com/VikashGokool86/1grid/assets/107156013/c643caf6-1b63-4183-8f3e-ddb565ab7214)

![WhatsApp Image 2024-04-04 at 10 41 32 PM](https://github.com/VikashGokool86/1grid/assets/107156013/50b86567-017f-40f7-a62f-a5fb430fd761)


ToDo Home Screen:

![WhatsApp Image 2024-04-04 at 10 38 43 PM](https://github.com/VikashGokool86/1grid/assets/107156013/92d0914a-577f-4d44-8b63-27239c2ce1e7)

![WhatsApp Image 2024-04-04 at 11 09 26 PM](https://github.com/VikashGokool86/1grid/assets/107156013/cfbf4314-b6ab-4485-b2fd-a40d97bc3b8d)



Add Task Screen:

![WhatsApp Image 2024-04-04 at 11 34 09 PM](https://github.com/VikashGokool86/1grid/assets/107156013/c07d8f69-e907-4806-b33b-821e9fb6758a)


Steps Needed to Run the Project:

- Make sure you have all the items on the tech stack installed
- Run “cd todo-app”
- Navigate to the root directory and make sure you .env file is correct, alter the DB details to match your’s.
- Run “php artisan migrate”
- Run npm install
- Run “php artisan serve”
- Open a new terminal
- Run “cd todo-app”
- Run “npm run dev”
 
Current Issues:
- The Add Task Navigation does not have an active class when the pages is active
- Docker Seems to have a caching issue and does not build on windows machines all the time

Setting up the docker enviroment

- Run “docker-compose up -d –build”

![WhatsApp Image 2024-04-04 at 5 50 27 AM](https://github.com/VikashGokool86/1grid/assets/107156013/755d1b5d-1cbf-4052-a928-b34a90741160)

- Run “docker-compose exec app composer require laravel/breeze --dev”
- Run “docker-compose exec app php artisan breeze:install”, please select options from the screenshot.

![WhatsApp Image 2024-04-04 at 5 41 57 AM](https://github.com/VikashGokool86/1grid/assets/107156013/90574f05-5d2f-4ff8-b97a-536d3599220f)


![WhatsApp Image 2024-04-04 at 5 42 46 AM](https://github.com/VikashGokool86/1grid/assets/107156013/9a714b33-5804-4ef5-8d21-595bd2fba00c)

![WhatsApp Image 2024-04-04 at 5 43 05 AM](https://github.com/VikashGokool86/1grid/assets/107156013/f2752d0e-e2b4-4755-b701-5a4defe9fec9)


![WhatsApp Image 2024-04-04 at 5 45 00 AM](https://github.com/VikashGokool86/1grid/assets/107156013/06cf8502-6df2-4881-a934-fb0d1b44af11)


- Run “docker-compose exec app npm install”
- Run “docker-compose exec app npm run dev”
- Run “docker-compose exec app php artisan migrate”


Go to local host in browser.







