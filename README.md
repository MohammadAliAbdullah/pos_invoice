# Sales Management System

A modern Laravel-based Sales Management System with customer management, product handling, sales entry, notes, and soft-delete support. Built with Tailwind CSS for a clean UI.

## ✨ Features

- 👥 Customer Management (Add, Edit, Delete, Soft Delete)
- 📦 Product Management with Notes
- 🧾 Sales Entry with Dynamic Line Items
- 🔍 Sales Filter, Search, and Pagination
- 🗑️ Trash View with Restore Option
- 📝 Attach Notes to Sales and Products (Polymorphic Relation)
- ✅ Advanced Form Validation
- 💻 Responsive UI with Tailwind CSS
- 📄 Pagination, Soft Deletes, and Alerts


---

## 📸 Screenshots

### 👤 Customer Add
![Customer Add](screenshots/customer%20add.png)

### 👤 Customer Edit
![Customer Edit](screenshots/customer%20edit.png)

### 👥 Customer List
![Customer List](screenshots/customer%20list.png)

### ➕ Product Add
![Product Add](screenshots/product%20add.png)

### ✏️ Product Edit
![Product Edit](screenshots/product%20edit.png)

### 📦 Product List with Notes
![Product List with Notes](screenshots/product_list_with_note.png)

### 📋 Sales List with Filters, Invoice, Delete
![Sales List](screenshots/sales%20list%20with%20filter%20invoice%20delter.png)

### 📋 Sales Add With Notes
![Sales Add](screenshots/add%20sales.png)

### 🧾 Invoice View with Notes
![Invoice View](screenshots/invoice%20view%20with%20note.png)

### ♻️ Trash with Restore
![Trash with Restore](screenshots/trash%20with%20restore.png)

---


## Technologies

- Laravel 12
- MySQL
- Tailwind CSS
- Blade templating
- Eloquent ORM

## Installation

```bash
git clone https://github.com/MohammadAliAbdullah/it-way-task2.git
cd it-way-task2
cp .env.example .env
composer install
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

## Database Configuration

Update the `.env` file with your DB settings:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sales_db
DB_USERNAME=root
DB_PASSWORD=
```

## Seeder Info

Seeders provide dummy products and customers:

```bash
php artisan db:seed
```

## Available Routes

- `/customers` – Manage customers
- `/products` – Manage products
- `/sales/create` – Add sales with notes
- `/trash` – Soft-deleted items

## Git Workflow

```bash
# Make sure you're on dev branch
git checkout dev

# Pull latest changes
git pull origin dev

# Create a feature branch
git checkout -b feature/your-feature-name

# After your changes
git add .
git commit -m "Add: Short description of your feature"
git push origin feature/your-feature-name

# Open a pull request to `dev` branch on GitHub
```

## Deployment

- Ensure `.env` is set up for production
- Run the following:

```bash
php artisan config:cache
php artisan route:cache
php artisan migrate --force
```

## Contributing

Pull requests are welcome. For major changes, open an issue first to discuss.

## License

[MIT](LICENSE)
