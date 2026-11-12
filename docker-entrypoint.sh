#!/bin/bash
set -e

# If SQLite is used, ensure database file exists and is writable
if [ "$DB_CONNECTION" = "sqlite" ] || [ -z "$DB_CONNECTION" ]; then
    mkdir -p database
    touch database/database.sqlite
    chown -R www-data:www-data database
    chmod -R 775 database
fi

# Run database migrations
php artisan migrate --force || true

# Cache Laravel configs if APP_KEY is provided
if [ -n "$APP_KEY" ]; then
    php artisan config:cache || true
    php artisan route:cache || true
    php artisan view:cache || true
fi

# Bind Apache to Render's dynamic $PORT (default 10000 on Render)
if [ -n "$PORT" ]; then
    sed -i "s/80/$PORT/g" /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf
fi

exec apache2-foreground

