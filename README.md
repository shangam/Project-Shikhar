## Installation

Follow these steps to set up the project:

```bash
# 1. Install Dependencies:
composer install

# 2. Configure Environment Variables:
cp .env.example .env

# 3. Generate Application Key:
php artisan key:generate

# 4. Run Database Migrations:
php artisan migrate

# 5. Start the Development Server:
php artisan serve

# 6. Import Postman Collection for api testing:
You can import the Postman collection from the file `postman_collection.json`.
