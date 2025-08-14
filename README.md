# Ihrachane - Laravel Business Application

A modern Laravel 11 business application for managing services, clients, and marketplace operations. Deployed on Render with PostgreSQL database.

## 🌟 Features

- **Service Management**: Create and manage business services and categories
- **Client Portfolio**: Manage client information and relationships
- **Contact System**: Handle customer inquiries with marketplace integration
- **Partner Management**: Maintain business partnerships
- **Testimonials**: Showcase customer feedback
- **Social Media Integration**: Connect social media accounts
- **Admin Dashboard**: Complete backend management system
- **Responsive Design**: Mobile-friendly interface

## 🚀 Live Application

- **Production URL**: [https://ihrachane-app.onrender.com](https://ihrachane-app.onrender.com)
- **Platform**: Render (Docker deployment)
- **Database**: PostgreSQL

## 🛠️ Technology Stack

- **Backend**: Laravel 11 (PHP 8.2)
- **Frontend**: Blade Templates, Bootstrap, JavaScript
- **Database**: PostgreSQL
- **Containerization**: Docker
- **Deployment**: Render
- **Version Control**: Git (GitHub)

## 📋 Prerequisites

- PHP 8.2 or higher
- Composer
- Node.js & NPM
- PostgreSQL (for local development)
- Docker (optional)

## 🔧 Local Development Setup

### 1. Clone the Repository
```bash
git clone https://github.com/IT21182914/drylif-project.git
cd drylif-project
```

### 2. Install Dependencies
```bash
# Install PHP dependencies
composer install

# Install Node.js dependencies
npm install
```

### 3. Environment Configuration
```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### 4. Database Setup
```bash
# Configure your .env file with database credentials
DB_CONNECTION=pgsql
DB_HOST=your_host
DB_PORT=5432
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password

# Run migrations
php artisan migrate

# Seed the database (optional)
php artisan db:seed
```

### 5. Build Assets
```bash
npm run build
```

### 6. Start Development Server
```bash
php artisan serve
```

Visit `http://localhost:8000` to access the application.

## 🐳 Docker Deployment

The application includes a Dockerfile for containerized deployment:

```bash
# Build Docker image
docker build -t ihrachane-app .

# Run container
docker run -p 80:80 ihrachane-app
```

## 📁 Project Structure

```
├── app/
│   ├── Http/Controllers/    # Application controllers
│   ├── Models/             # Eloquent models
│   └── Providers/          # Service providers
├── config/                 # Configuration files
├── database/
│   ├── migrations/         # Database migrations
│   └── seeders/           # Database seeders
├── public/                # Public assets
├── resources/
│   ├── views/             # Blade templates
│   ├── css/               # Stylesheets
│   └── js/                # JavaScript files
├── routes/                # Application routes
└── storage/               # File storage
```

## 🌐 Key Routes

- `/` - Homepage
- `/admin` - Admin dashboard (requires authentication)
- `/contact` - Contact form
- `/services` - Services listing
- `/about` - About page

## 📊 Database Schema

### Main Tables
- `users` - System users and administrators
- `services` - Business services
- `categories` - Service categories
- `sub_categories` - Service subcategories
- `clients` - Client information
- `contacts` - Contact form submissions
- `partners` - Business partners
- `testimonials` - Customer testimonials
- `social_media` - Social media links

## 🔐 Authentication

The application uses Laravel's built-in authentication system:
- User registration and login
- Password reset functionality
- Admin panel access control

## 🚀 Deployment

### Render Deployment

The application is configured for automatic deployment on Render:

1. **Database**: PostgreSQL database is pre-configured
2. **Environment Variables**: Set in Render dashboard
3. **Build Process**: Automated via Docker
4. **Domain**: Custom domain available

### Environment Variables (Production)
```
APP_NAME=ihrachane
APP_ENV=production
APP_KEY=base64:Edr0vS4NJ8ZsNdqGhrwCsZBe/eJBT/+ZMovLBMO0PEk=
APP_DEBUG=false
APP_URL=https://ihrachane-app.onrender.com
DATABASE_URL=postgresql://[credentials]
DB_CONNECTION=pgsql
SESSION_DRIVER=database
CACHE_STORE=database
QUEUE_CONNECTION=database
LOG_LEVEL=error
```

## 🔄 Development Workflow

1. **Feature Development**: Create feature branches from `main`
2. **Testing**: Run local tests before pushing
3. **Deployment**: Push to `master` branch for automatic deployment
4. **Monitoring**: Check Render dashboard for deployment status

## 📝 Available Commands

```bash
# Laravel Commands
php artisan migrate          # Run database migrations
php artisan db:seed          # Seed database
php artisan cache:clear      # Clear application cache
php artisan config:clear     # Clear config cache
php artisan route:list       # List all routes

# Asset Commands
npm run dev                  # Development build
npm run build               # Production build
npm run watch               # Watch for changes

# Docker Commands
docker build -t ihrachane-app .    # Build Docker image
docker run -p 80:80 ihrachane-app  # Run container
```

## 🐛 Troubleshooting

### Common Issues

1. **Permission Errors**: Ensure storage and cache directories are writable
```bash
chmod -R 755 storage
chmod -R 755 bootstrap/cache
```

2. **Database Connection**: Verify database credentials in `.env`

3. **Asset Loading**: Run `npm run build` after pulling changes

4. **Application Key**: Generate new key with `php artisan key:generate`

## 📈 Performance Optimization

- **Caching**: Redis/Database caching enabled
- **Asset Optimization**: Minified CSS/JS in production
- **Database Indexing**: Optimized database queries
- **Docker Multi-stage Build**: Efficient container builds

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/new-feature`)
3. Commit changes (`git commit -am 'Add new feature'`)
4. Push to branch (`git push origin feature/new-feature`)
5. Create Pull Request

## 📄 License

This project is proprietary software. All rights reserved.

## 👥 Team

- **Developer**: IT21182914
- **Platform**: Render
- **Repository**: [drylif-project](https://github.com/IT21182914/drylif-project)

## 📞 Support

For technical support or questions:
- **GitHub Issues**: [Create an issue](https://github.com/IT21182914/drylif-project/issues)
- **Email**: Contact through the application contact form

---

**Last Updated**: August 2025  
**Version**: 1.0.0  
**Laravel Version**: 11.x  
**PHP Version**: 8.2+

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
