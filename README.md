# FS Sports Ecommerce - Enterprise-Level Retail Platform

A comprehensive, scalable e-commerce solution built for real-world business operations. 
It features advanced order management, inventory tracking, role-based access control, and comprehensive reporting tailored for an active client.

## Core Tech Stack
- **Framework:** Laravel 8, PHP 7.3/8.0
- **Database:** MySQL
- **Packages/Integrations:** Laravel Sanctum (API Authentication), GuzzleHTTP

## Key Features
- **Role-Based Access Control (RBAC):** Granular permissions for Super Admins, Staff, and regular users.
- **Advanced Inventory Management:** Real-time stock tracking, inventory logging, and multi-branch supplier management.
- **Complete E-Commerce Flow:** Shopping cart, wishlists, order processing, shipping details, and payment transaction logging.
- **Comprehensive Reporting:** Finance and sales reports alongside detailed admin audit trails and search logs.
- **Interactive Features:** Customer quiz competitions and newsletter subscriptions.

## Installation Guide

Follow these steps to set up the project locally:

1. **Clone the repository and install dependencies:**
   ```bash
   composer install
   ```

2. **Set up the environment file:**
   ```bash
   cp .env.example .env
   ```

3. **Generate the application key:**
   ```bash
   php artisan key:generate
   ```

4. **Configure your database in the `.env` file and run migrations:**
   ```bash
   php artisan migrate
   ```

5. **Start the local development server:**
   ```bash
   php artisan serve
   ```

## System Workflow & Future Updates (FS Sports)

This project (internally known as FS Sports) is designed so that the Backend (Admin Panel) and the Frontend (User Shop) are perfectly synced through a MySQL database.

### 1. Admin Panel (Backend) System Workflow - **COMPLETED**
- **Security & Login:** An Admin enters credentials into the Secure Login interface. The system performs Password Hashing and Brute-Force checks before granting access.
- **Admin CRUD Operations:** Once authorized via Role-Based Route Protection, the Master Admin can access the "Admin Management" feature to create, update, or delete other Admins.
- **Staff Management:** Admin performs CRUD operations on employee details (Name, Designation, etc.) without granting them panel access.
- **Branch Initialization:** The Admin can create new physical locations (e.g., Sahiwal Branch, Lahore Branch) in the branches table.
- **Integrated Branding & Supplies:** Admin manages the "In-House Brand" (FS Bats/Bowls) and the Supplier Management feature.
- **Dynamic Content Management:** Admin uses the Site Settings & CMS feature to update the "About Us" text, images, and team info. Once saved, this data is instantly pushed to the Frontend.
- **Category & Product Operations:** Admin performs Dynamic Category Creation and initiates New Product Creation by selecting categories via a Toggle/Dropdown list, entering details, and applying Discount Banners.
- **Engagement & Innovation:** Admin moderates Video Profiles, manages Quiz Competitions, and monitors Group Purchases.

### 2. Frontend System Workflow - **IN PROGRESS**
The customer journey includes intelligent discovery and automated visual cues.
- **Discovery & Intelligent Search:** Live Search Suggestions provide product names and thumbnails as the user types. Automated "New Arrival" Badges identify products created in the last 7 days.
- **Interactive Branding:** The "About Us" page dynamically displays the history and mission of FS Sports as configured by the Admin.
- **The Access Barrier:** Browsing is free, but clicking "Add to Cart" or "Add to Wishlist" triggers a Sign-in/Login popup.
- **Product Deep-Dive:** Users inspect gear via Product Image Zoom and view Cross-Sell Related Equipment (e.g., pads for a bat).
- **Innovative Engagement:** Users participate in Quiz Competitions for rewards and upload Video Profiles to build community trust.
- **Cart & Checkout:** Users manage quantities on the Cart Page. They complete Checkout by choosing between Online Payment or Cash on Delivery.
