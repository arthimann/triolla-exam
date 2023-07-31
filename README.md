# Triolla Exam

---

### Mandatory Requirements

- PHP >= 8.2.x
- Node >= 19.4.x
- Composer >= 2.5.x

### Installation & Running

1. Clone repo
2. Create DB and specify your connection details in `.env` file.
3. In project directory run:
    1. `composer install`
    2. `php artisan migrate`
    3. `npm install`
4. Open new terminal window and run `php artisan serve`
5. Open new terminal window and run `npm run dev`

#### DOT ENV FILE DB SECTION:
```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=bylith
DB_USERNAME=root
DB_PASSWORD=
```

#### DOT ENV FILE CHANGE BASE URL:
```dotenv
APP_URL=http://triolla.loc/
```
