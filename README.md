# Events_project

# GestionEvent

Event Management SaaS Platform — Symfony 6.4 + PHP 8.1

A comprehensive event management system built with Symfony 6.4 and PHP 8.1. GestionEvent helps organizers, venues, and attendees manage events, venues, rentals, reservations, and ticketing in one unified platform.

---

## 👥 Team & Methodology

**Developed collaboratively by:**
- **Nourhene Ferchichi** — Full-stack Developer
- - **Jesser Mdimagh ** — Full-stack Developer

**Methodology:** Agile (Scrum) — Iterative development with real-time feedback integration and bi-weekly sprints.

---

## 🎫 About GestionEvent

"Simplifying event management, one booking at a time."

GestionEvent is a secure, scalable SaaS platform designed to help event organizers, venue owners, and attendees streamline event planning. It eliminates manual booking chaos, paperwork, and fragmented communication.

### Key Capabilities

| Feature | Description |
|---------|-------------|
| **Event Management** | Create, organize, and manage events with details, scheduling, and categorization |
| **Venue Management** | Manage venues (Local) with capacity, location, and availability tracking |
| **Rental System** | Handle equipment and space rentals (Louer) with pricing and availability |
| **Reservations** | Online booking system with user reservations and status tracking |
| **Ticketing** | Generate and manage tickets with QR codes and validation |
| **User Authentication** | Secure login with email verification and role-based access |
| **Dashboard Analytics** | Overview of events, bookings, and revenue metrics |

---

## 🏗️ Architecture Overview

```
┌─────────────────────────────────────────────────────────────────────────┐
│                       GestionEvent Frontend                              │
├─────────────────────────────────────────────────────────────────────────┤
│  ┌──────────────┐  ┌──────────────┐  ┌──────────────┐  ┌──────────────┐│
│  │   Admin      │  │  Organizer   │  │   Venue      │  │   Attendee   ││
│  │  Dashboard   │  │   Console    │  │   Manager    │  │    Portal    ││
│  └──────────────┘  └──────────────┘  └──────────────┘  └──────────────┘│
│  ┌─────────────────────────────────────────────────────────────────────┐│
│  │                     Public Event Discovery                           ││
│  │    Browse Events • Book Tickets • View Venues • Manage Reservations││
│  └─────────────────────────────────────────────────────────────────────┘│
├─────────────────────────────────────────────────────────────────────────┤
│  🔐 Symfony Security • 🎨 Twig + Bootstrap • ⚡ Doctrine ORM             │
└─────────────────────────────────────────────────────────────────────────┘
                              │
                              ▼
                    ┌─────────────────────┐
                    │   Database Layer    │
                    │  (PostgreSQL/MySQL) │
                    └─────────────────────┘
```

---

## 🎯 Role-Based Access Control (RBAC)

| Role | Access Level | Key Pages |
|------|--------------|-----------|
| **Administrator** | Super Admin — Full system control | `/admin/*` — Users, Events, Venues, Settings |
| **Organizer** | Event management | `/events/*` — Create/Edit events, Manage bookings |
| **Venue Manager** | Venue operations | `/local/*` — Venue details, Availability, Rentals |
| **Attendee** | Self-service portal | `/reservation/*` — Book events, View tickets, History |

---

## 🛠️ Tech Stack

### Core Framework

| Technology | Version | Purpose |
|------------|---------|---------|
| PHP | 8.1+ | Server-side scripting |
| Symfony | 6.4.* | MVC framework, routing, security |
| Doctrine ORM | 3.3 | Database abstraction, entities, migrations |
| Twig | 3.0 | Template engine |
| Composer | 2.x | Dependency management |

### Authentication & Security

| Technology | Purpose |
|------------|---------|
| Symfony Security Bundle | Authentication, authorization, firewalls |
| SymfonyCasts Verify Email | Email verification for user registration |
| Password Hashing | Secure password storage (bcrypt) |
| CSRF Protection | Form security |

### Frontend & UI

| Technology | Purpose |
|------------|---------|
| Twig Templates | Server-side rendering |
| Symfony Asset Mapper | Asset management, import maps |
| Bootstrap / CSS | Responsive styling |
| Stimulus | JavaScript behavior framework |
| Symfony UX Turbo | SPA-like navigation |

### Database & Storage

| Technology | Purpose |
|------------|---------|
| Doctrine DBAL | Database abstraction layer |
| Doctrine Migrations | Schema versioning |
| PostgreSQL / MySQL | Primary database |

### Development Tools

| Technology | Purpose |
|------------|---------|
| Symfony Maker Bundle | Code generation |
| Web Profiler Bundle | Debug toolbar |
| PHPUnit | Unit & functional testing |
| PHPStan | Static analysis |

---

## 📁 Project Structure

```
events_project/
├── assets/                     # Frontend assets (JS, CSS, images)
│   ├── app.js                  # Main JavaScript entry
│   └── styles/                 # CSS/SCSS files
├── bin/                        # Executable scripts
│   └── console                 # Symfony CLI
├── config/                     # Configuration files
│   ├── packages/               # Bundle configurations
│   ├── routes/                 # Route definitions
│   └── services.yaml           # Service container config
├── migrations/                 # Doctrine database migrations
├── public/                     # Web server root
│   └── index.php               # Front controller
├── src/                        # Application source code
│   ├── Controller/             # Request handlers
│   │   ├── EventsController.php
│   │   ├── LocalController.php
│   │   ├── LouerController.php
│   │   ├── ReservationController.php
│   │   ├── TicketsController.php
│   │   ├── UserController.php
│   │   ├── SecurityController.php
│   │   ├── RegistrationController.php
│   │   └── ApiLoginController.php
│   ├── Entity/                 # Doctrine entities
│   │   ├── User.php              # User accounts
│   │   ├── Events.php            # Events
│   │   ├── Local.php             # Venues
│   │   ├── Louer.php             # Rentals
│   │   ├── Reservation.php       # Bookings
│   │   └── Tickets.php           # Tickets
│   ├── Form/                   # Form types
│   ├── Repository/             # Doctrine repositories
│   ├── Security/               # Security utilities
│   └── Kernel.php              # Application kernel
├── templates/                  # Twig templates
│   ├── base.html.twig          # Base layout
│   ├── events/                 # Event pages
│   ├── local/                  # Venue pages
│   ├── louer/                  # Rental pages
│   ├── reservation/            # Reservation pages
│   ├── tickets/                # Ticket pages
│   ├── user/                   # User profile pages
│   ├── security/               # Login/logout pages
│   └── registration/           # Sign-up pages
├── tests/                      # PHPUnit tests
├── translations/               # i18n files
├── compose.yaml                # Docker Compose config
├── composer.json               # PHP dependencies
├── importmap.php               # Asset import map
└── .env                        # Environment variables
```

---

## 🚀 Getting Started

### Prerequisites

- PHP 8.1 or higher
- Composer 2.x
- PostgreSQL or MySQL
- Node.js (optional, for asset building)

### Installation

```bash
# Clone the repository
cd events_project

# Install PHP dependencies
composer install

# Install JavaScript dependencies (if using Node)
npm install
```

### Environment Configuration

Copy `.env` to `.env.local` and configure:

```bash
# Database configuration
DATABASE_URL="postgresql://user:password@localhost:5432/gestionevent_db"
# Or for MySQL:
# DATABASE_URL="mysql://user:password@localhost:3306/gestionevent_db"

# Email configuration (for verification)
MAILER_DSN=smtp://user:pass@smtp.gmail.com:587

# App environment
APP_ENV=dev
APP_SECRET=your_random_secret_here
```

### Database Setup

```bash
# Create database
php bin/console doctrine:database:create

# Run migrations
php bin/console doctrine:migrations:migrate

# (Optional) Load fixtures
php bin/console doctrine:fixtures:load
```

### Development

```bash
# Start the Symfony development server
symfony server:start

# Or with PHP built-in server
php -S localhost:8000 -t public/

# Watch assets (if using Webpack Encore or AssetMapper)
php bin/console asset-map:compile
```

App runs at `http://localhost:8000`

---

## 🔐 How Authentication Works

### 1. Login Flow

```
User → /login page → SecurityController → Symfony Security
                                               │
                                               ▼
User ← Session Cookie ←─── Authentication Success
```

The `SecurityController` handles:

- Username/password authentication
- Session-based security (no JWT tokens)
- Role-based access control
- CSRF protection on all forms

### 2. Session & Security Strategy

```
┌─────────────┐     ┌─────────────┐     ┌─────────────┐
│   Login     │────▶│  Session    │────▶│   Access    │
│   Form      │     │   Handler   │     │   Control   │
└─────────────┘     └─────────────┘     └─────────────┘
      │                   │                   │
      ▼                   ▼                   ▼
 Credentials          Stores:             Checks:
 - email              - user_id             - ROLE_USER
 - password           - roles               - ROLE_ADMIN
                      - isVerified          - ROLE_ORGANIZER
```

### 3. Route Protection (Security)

Security configuration enforces role-based access:

```yaml
# config/packages/security.yaml
access_control:
    - { path: ^/admin, roles: ROLE_ADMIN }
    - { path: ^/events/new, roles: ROLE_ORGANIZER }
    - { path: ^/local/manage, roles: [ROLE_ADMIN, ROLE_VENUE_MANAGER] }
    - { path: ^/reservation, roles: ROLE_USER }
```

**Security Features:**

- ✅ Hashed passwords (bcrypt)
- ✅ CSRF token protection on all forms
- ✅ Session-based authentication
- ✅ Role-based access control
- ✅ Email verification for new accounts
- ✅ Automatic logout on inactivity

---

## 📊 Key Features Explained

### 🎫 Event Management

- Create and manage events with details (name, date, location, description)
- Categorize events by type
- Set capacity limits and pricing
- View event listings and details

### 🏢 Venue (Local) Management

- Manage venue information (name, address, capacity)
- Track venue availability
- Associate events with venues
- Venue gallery and amenities

### 🛒 Rental (Louer) System

- Manage rental items (equipment, spaces)
- Pricing and availability tracking
- Rental booking integration with events
- Rental history and returns

### 📅 Reservation System

- Online booking for events
- Reservation status tracking (pending, confirmed, cancelled)
- User reservation history
- Capacity management

### 🎟️ Ticketing

- Automatic ticket generation
- QR code support for validation
- Ticket types (VIP, Standard, Early Bird)
- Download and email delivery

---

## 🐳 Docker

```bash
# Build and start containers
docker-compose up -d

# Run database migrations
docker-compose exec php php bin/console doctrine:migrations:migrate

# Access the application
curl http://localhost:8000
```

Docker Compose includes:

- PHP 8.1 + Apache/Nginx
- PostgreSQL database
- Mailpit (for email testing)

---

## 📚 Documentation

- [Symfony Documentation](https://symfony.com/doc/6.4/index.html)
- [Doctrine ORM Documentation](https://www.doctrine-project.org/projects/orm.html)
- [Twig Documentation](https://twig.symfony.com/doc/3.x/)
- [SymfonyCasts Tutorials](https://symfonycasts.com/)

---

## 🧪 Testing

```bash
# Run PHPUnit tests
php bin/phpunit

# Run specific test suite
php bin/phpunit --filter ReservationTest

# Code coverage
php bin/phpunit --coverage-html coverage/
```

---

## 📦 Deployment

### Production Checklist

1. Set `APP_ENV=prod` in `.env`
2. Generate unique `APP_SECRET`
3. Configure production database
4. Set up mailer DSN for production
5. Optimize autoloader: `composer install --optimize-autoloader --no-dev`
6. Clear and warm up cache: `php bin/console cache:clear --env=prod`
7. Compile assets: `php bin/console asset-map:compile`

### Production Server Requirements

- PHP 8.1+ with extensions: `pdo_pgsql`, `intl`, `mbstring`, `xml`
- PostgreSQL 13+ or MySQL 8.0+
- Web server (Nginx/Apache) with rewrite rules
- SSL certificate (HTTPS)

---

## 🔧 Common Commands

```bash
# Clear cache
php bin/console cache:clear

# Create new entity
php bin/console make:entity

# Create migration
php bin/console make:migration

# Run migrations
php bin/console doctrine:migrations:migrate

# Validate database schema
php bin/console doctrine:schema:validate

# Debug router
php bin/console debug:router

# Debug container services
php bin/console debug:container

# Check security vulnerabilities
symfony security:check
```

---

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/new-feature`)
3. Commit your changes (`git commit -m 'Add new feature'`)
4. Push to the branch (`git push origin feature/new-feature`)
5. Open a Pull Request

---

## 📝 License

This project is proprietary software. All rights reserved.


Built with ❤️ using Symfony

