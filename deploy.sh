#!/bin/bash

# Laravel DIMMAF Deploy Script for Render
echo "Starting Laravel DIMMAF deployment..."

# Install dependencies
echo "Installing Composer dependencies..."
composer install --no-dev --optimize-autoloader

# Generate application key if not exists
echo "Generating application key..."
php artisan key:generate --force

# Run database migrations
echo "Running database migrations..."
php artisan migrate --force

# Seed database
echo "Seeding database..."
php artisan db:seed --force

# Clear and cache configurations
echo "Caching configurations..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Create storage link
echo "Creating storage link..."
php artisan storage:link

echo "Deployment completed successfully!"
