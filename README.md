## Quick Start

```bash
# Install Dependencies
composer install

# Create Database(laravel) before Migrate

# Run Migrations with seed
php artisan migrate --seed

# If you get an error about an encryption key
php artisan key:generate
```

## Access to Dashboard

```
type: admin
email: admin@notary.mn
password: password
```

```
type: notary
email: notary@notary.mn
password: password
```

```
type: client
email: client@notary.mn
password: password
```
