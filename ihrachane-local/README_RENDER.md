# Ihrachane - Render Deployment Guide

This Laravel application is ready for deployment on Render with PostgreSQL database.

## 🚀 Deployment Steps

### Step 1: Prepare Your Repository
Ensure your code is pushed to GitHub (which you already have).

### Step 2: Create Render Account
1. Go to [render.com](https://render.com)
2. Sign up/login with your GitHub account

### Step 3: Create PostgreSQL Database
1. In Render Dashboard, click **"New +"**
2. Select **"PostgreSQL"**
3. Configure:
   - **Name**: `ihrachane-db`
   - **Database**: `ihrachane`
   - **User**: `ihrachane_user`
   - **Region**: Choose closest to your users
   - **Plan**: Free tier (for testing) or paid (for production)
4. Click **"Create Database"**
5. **Save the connection details** (you'll need them next)

### Step 4: Deploy Web Service
1. Click **"New +"** → **"Web Service"**
2. Connect your GitHub repository
3. Configure the service:

#### Basic Settings:
- **Name**: `ihrachane-app`
- **Region**: Same as your database
- **Branch**: `main`
- **Runtime**: `PHP`
- **Build Command**: 
  ```bash
  composer install --no-dev --optimize-autoloader && npm ci && npm run build
  ```
- **Start Command**: 
  ```bash
  php artisan serve --host=0.0.0.0 --port=$PORT
  ```

#### Environment Variables:
Add these in the **Environment** section:

```env
APP_NAME=ihrachane
APP_ENV=production
APP_KEY=base64:Edr0vS4NJ8ZsNdqGhrwCsZBe/eJBT/+ZMovLBMO0PEk=
APP_DEBUG=false
APP_URL=https://your-service-name.onrender.com

# Database (Copy from your PostgreSQL service)
DB_CONNECTION=pgsql
DB_HOST=your-postgres-host
DB_PORT=5432
DB_DATABASE=ihrachane
DB_USERNAME=ihrachane_user
DB_PASSWORD=your-postgres-password

# Session & Cache
SESSION_DRIVER=database
CACHE_STORE=database
QUEUE_CONNECTION=database

# Logging
LOG_CHANNEL=stack
LOG_LEVEL=error
```

### Step 5: Deploy
1. Click **"Create Web Service"**
2. Render will automatically build and deploy your app
3. Monitor the build logs for any issues

### Step 6: Run Database Migrations
After successful deployment:

1. Go to your **Web Service** → **Shell**
2. Run migrations:
   ```bash
   php artisan migrate --force
   ```
3. Seed admin user:
   ```bash
   php artisan db:seed --class=AdminUserSeeder
   ```

## 🎉 Post-Deployment

### Admin Access
- **URL**: `https://your-app.onrender.com/login`
- **Email**: `admin@ihrachane.com`
- **Password**: `admin123456`

### Test Your App
1. Visit your Render domain
2. Test the contact form
3. Access admin panel
4. Verify all features work

## 🔧 Render Configuration Features

Your app includes:
- ✅ **PostgreSQL database support**
- ✅ **Automatic HTTPS**
- ✅ **Environment-based configuration**
- ✅ **Optimized for production**
- ✅ **Database migrations**
- ✅ **Admin user seeding**
- ✅ **Asset compilation**
- ✅ **Cache optimization**

## 📊 App Features

- **Business Website**: Product sourcing and drop shipping
- **Contact Form**: Multi-marketplace selection
- **Admin Dashboard**: Complete CRUD operations
- **API Endpoints**: For integrations
- **Responsive Design**: Mobile-friendly
- **Authentication**: Secure login system

## 🔍 Troubleshooting

### Common Issues:

1. **Build Fails**: Check composer.json and package.json
2. **Database Connection**: Verify environment variables
3. **Asset Loading**: Ensure APP_URL is correct
4. **Migrations Fail**: Run them manually in Shell

### Debugging:
- Check **Logs** in Render dashboard
- Use **Shell** to run artisan commands
- Verify **Environment Variables**

## 💰 Costs

- **Database**: $7/month (PostgreSQL)
- **Web Service**: $7/month (512MB RAM)
- **Total**: ~$14/month for production

Free tier available for testing!

---

**Ready for deployment!** 🚀
