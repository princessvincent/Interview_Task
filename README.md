# Project Name: Task Management System

## Overview
This project is a Task Management System built using Laravel. The system allows users to create, update, delete, and list tasks. The application is fully dockerized for easier setup and deployment. The repository also includes unit tests for the application functionality to ensure everything works as expected.

## Prerequisites

Before setting up the project, ensure you have the following tools installed:

- **Docker**: [Install Docker](https://docs.docker.com/get-docker/)
- **Docker Compose**: [Install Docker Compose](https://docs.docker.com/compose/install/)
- **PHP** (for running the project locally without Docker)
- **Composer** (for managing PHP dependencies)

## Project Setup

### 1. Clone the Repository

Start by cloning the repository to your local machine:

```bash
git clone https://github.com/your-username/your-repository-name.git
cd into your clone project
```
### 2. Setup your Environment Variables
```
cp .env.example .env
```
### 3. Install Dependencies(run)

```
docker-compose exec app composer install
```
### 4. Run migrations(run)

```
docker-compose exec app php artisan migrate
```
### 5. Run Docker

```docker-compose up --build```
### 6. to go into the container and run your normal php command, run the below command
```docker exec -it TaskManagementApi sh```

### 7. Run the unit test
```docker-compose exec app php artisan test```

### when you go into the container by running the command on instruction 6, then run php artisan test to run the unit test

### 8. Access the Application
### After starting container by running the command on instruction 5, then you can access the application using the below url
```http://0.0.0.0:8000/api/```

### 9. Access the Postman Doc for testing the endpoints
```https://documenter.getpostman.com/view/27521377/2sAYQcFATE```



