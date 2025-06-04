# 🏨 Lodge Dashboard + Availability Manager

A simple dashboard app built with **Laravel**, **Inertia.js**, and **Vue 3** to manage room availability. Lodges can log in, add available dates, and view bookings in a calendar.

---

## 🚀 Tech Stack

- **Backend:** Laravel 12
- **Frontend:** Inertia.js + Vue 3
- **Styling:** Tailwind CSS
- **Calendar:** vue-cal

---

## 📦 Installation

### 1. Clone the Repository

```bash
git clone https://github.com/kervin00/test_lodge
```
### 2. Install Dependencies
```bash
composer install
npm install
```

### 3. Create Environment File

```bash
cp .env.example .env
```
### 4. Generate App Key

```bash
php artisan key:generate
```

### 5. Run Migrations

```bash
php artisan migrate
```

### 6. Compile Frontend Assets
```bash
npm run dev
```

### 7. Start the Laravel Server

```bash
php artisan serve
```
