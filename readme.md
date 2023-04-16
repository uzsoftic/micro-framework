## OpenSource MicroFramework Build in PHP

### Test

### Usage
```shell
composer install
```
```shell
cp .env.example .env
```

### Configure
#### Database Connection
```dotenv
DB_CONN="mysql"
DB_HOST="127.0.0.1"
DB_PORT="3306"
DB_NAME="database"
DB_USER="root"
DB_PASS=""
```

### Run local server
```shell
php run serve
```

### Clear all caches
```shell
php run optimize
```

### Used Library
- vlucas/phpdotenv
- twig/twig
- symfony/var-dumper

### Used Documents
- https://phprouter.com/
