# ----Task Management System---- #

## --project instalation process-- ##
# git clone https://github.com/Tutulhosen/task-management-system.git #
# git checkout tutul #
# composer update #
# create .env file and configaration with database #
# php artisan migrate #
# npm install and npm run dev #
# php artisan serve #
and run with 127.0.0.1:8000

## --Starting-- ##
# register first amd then login #
# You have access a dashboard #
# Go to tesk menu #
# create new and then Filtering and Sorting #

## --Api documentation-- ##
#     --Login: #
# URL:http://127.0.0.1:8000/api/login #
# Method: POST #
# Body: (email(required), password(required)) #

#     --list: #
# URL:http://127.0.0.1:8000/api/tasks #
# Method: GET #
# authorize token from login #

#     --create: #
# URL:http://127.0.0.1:8000/api/tasks #
# Method: POST #
# authorize token from login #
# Body: (title(required), description, status, due_date(required)) #

#     --update: #
# URL:http://127.0.0.1:8000/api/tasks/{task_id} #
# Method: POST #
# authorize token from login #
# Body: (title(required), description, status, due_date(required)) #

#     --single task view: #
# URL:http://127.0.0.1:8000/api/tasks/{task_id} #
# Method: GET #
# authorize token from login #

#     --Delete: #
# URL:http://127.0.0.1:8000/api/tasks/{task_id} #
# Method: DELETE #
# authorize token from login #

##    --Version-- ##
# Laravel v-10 #
# PHP v-8.1 #






