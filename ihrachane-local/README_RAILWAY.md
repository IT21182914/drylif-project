# Ihrachane - Railway Deployment Guide

This Laravel application is ready for deployment on Railway with MySQL database.

## Deployment Steps

### 1. Prepare Your Repository
Make sure your code is in a Git repository:
```bash
git init
git add .
git commit -m "Initial commit for Railway deployment"
```

### 2. Deploy to Railway

1. **Sign up/Login to Railway**: Go to [railway.app](https://railway.app)
2. **Create New Project**: Click "Deploy from GitHub repo"
3. **Connect Repository**: Connect your GitHub repository
4. **Add MySQL Database**:
   - In your Railway dashboard, click "Add Service"
   - Select "Database" → "MySQL"
   - Railway will automatically provide environment variables

### 3. Configure Environment Variables

In Railway Dashboard → Your Service → Variables, add these:

```env
APP_NAME=ihrachane
APP_ENV=production
APP_KEY=base64:Edr0vS4NJ8ZsNdqGhrwCsZBe/eJBT/+ZMovLBMO0PEk=
APP_DEBUG=false
APP_URL=https://your-app-name.railway.app

# Database (Railway will auto-populate these when you add MySQL)
DB_CONNECTION=mysql
DB_HOST=${{MySQL.MYSQL_HOST}}
DB_PORT=${{MySQL.MYSQL_PORT}}
DB_DATABASE=${{MySQL.MYSQL_DATABASE}}
DB_USERNAME=${{MySQL.MYSQL_USER}}
DB_PASSWORD=${{MySQL.MYSQL_PASSWORD}}

SESSION_DRIVER=database
CACHE_STORE=database
QUEUE_CONNECTION=database
```

### 4. Add Build Command (if needed)
In Railway Settings → Deploy, set:
- **Build Command**: `composer install --no-dev --optimize-autoloader && npm ci && npm run build`
- **Start Command**: `php artisan serve --host=0.0.0.0 --port=$PORT`

### 5. Deploy!
Railway will automatically deploy when you push to your connected repository.

## Post-Deployment

1. **Run Migrations**: Railway will automatically run migrations during deployment
2. **Create Admin User**: You may need to seed admin users via Railway's terminal
3. **Check Logs**: Monitor deployment in Railway dashboard

## Features Included
- ✅ MySQL Database ready
- ✅ Contact form with marketplace selection
- ✅ Admin panel with authentication
- ✅ Responsive design with TailwindCSS
- ✅ API endpoints for data
- ✅ File uploads support
- ✅ Production-ready configuration

## Local Development
```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```
