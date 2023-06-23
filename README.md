# GestionDesEtudiants

1. Open the command prompt or terminal on your PC.

2. Navigate to the root directory of your Laravel project using the `cd` command. For example:
   
```bash
cd V1_API
```

or

```bash
cd V2_VIEWS
```

3. Install the required dependencies for the project by running the Composer install command:

```bash
composer install
```

4. Create a new .env file by copying the .env.example file:

On Windows (using Command Prompt):

```bash
copy .env.example .env
```

1. Generate a new application key by running the following command:

```bash
php artisan key:generate
```

6. Create the storage directory if it doesn't exist:

```bash
mkdir storage
```

7. Set the appropriate permissions on the storage and bootstrap cache directories:

On Windows (using Command Prompt):

```bash
attrib +w storage
attrib +w bootstrap/cache
```

1. Run the database migrations:

```bash
php artisan migrate
```