#!/bin/bash
set -e

echo "🚀 Running Laravel migrations..."
php artisan migrate --force

echo "✅ Migrations completed successfully!"
