# Project Name: Task Management System

## Overview
This project is a Task Management System built using Laravel. The system allows users to create, update, delete, and list tasks. The application is fully dockerized for easier setup and deployment. The repository also includes unit tests for the application functionality to ensure everything works as expected.

## Prerequisites

Before setting up the project, ensure you have the following tools installed:

- **Docker**: [Install Docker](https://docs.docker.com/get-docker/)
- **Docker Compose**: [Install Docker Compose](https://docs.docker.com/compose/install/)
- **PHP** (for running the project locally without Docker)
- **Composer** [Install composer](https://getcomposer.org/)

## Project Setup

### 1. Clone the Repository

Start by cloning the repository to your local machine:

```bash
git clone https://github.com/princessvincent/Interview_Task.git
cd  Interview_Task
```
### 2. Setup your Environment Variables
```
cp .env.example .env
```
### 3. Install Dependencies(run)
### You can run the below command to get into the docker container so you can run your normal php command for installing dependencies

```docker exec -it TaskManagementApi sh```
### If you prefer to run the command without going into the docker container then use the below command to install composer and run other dependency 
```
docker-compose exec app composer install
```
### 4. Run migrations(run)

```
docker-compose exec app php artisan migrate
```
### 5. Run Docker

```docker-compose up --build```

### 6. Run the unit test (after successfully starting your docker)
```docker-compose exec app php artisan test``` 
Note if you are in the docker container by running the command on step 3 then you can just run 
```php artisan test ```


### 7. Access the Application
### After starting the container by running the command on step 5, then you can access the application using the below url
```http://0.0.0.0:8000/api/```

### 8. Access the Postman Doc for testing the endpoints
```https://documenter.getpostman.com/view/27521377/2sAYQcFATE```



