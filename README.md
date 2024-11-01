# Jonathan Natannael Zefanya Portfolio

Welcome to my portfolio! This project is created using **Laravel 11**.

## Tech Stack
- **Client:** TailwindCSS, Flowbite
- **Server:** Laragon, MySQL, Laravel

## Run Project
To get the project up and running, follow these steps:

1. **Install Composer dependencies:**
    ```sh
    composer install
    ```

2. **Install Node.js dependencies:**
    ```sh
    npm install
    ```

3. **Copy the example environment file and generate the application key:**
    ```sh
    cp .env.example .env
    php artisan key:generate
    ```

4. **Run database migrations and seed the database:**
    ```sh
    php artisan migrate --seed
    ```

5. **Create symbolic links to storage:**
    ```sh
    php artisan storage:link
    ```

6. **Serve the application:**
    ```sh
    php artisan serve
    ```

7. **Compile assets:**
    ```sh
    npm run dev
    ```

---

Feel free to explore and contribute to the project. Happy coding!