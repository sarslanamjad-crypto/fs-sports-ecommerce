# FS Sports - Project Guide & Strategic Workflow

Welcome to the **FS Sports** project documentation. This guide provides a comprehensive overview of the current system architecture, detailed manuals for both Administrators and Customers, and a strategic roadmap for future feature implementation focusing on AI integration.

---

## 1. Project Overview & Architecture
FS Sports is a premium e-commerce and community engagement platform built on a modern, decoupled architecture.

### Technology Stack
- **Backend**: Laravel (PHP) — Powers the core business logic, database management, and API endpoints.
- **Frontend**: Blade Templating + Tailwind CSS + Vanilla JS — Consumes internal APIs for a dynamic, "App-like" feel while maintaining SEO benefits.
- **Data Flow**: **API-First Architecture**. The frontend rarely queries the database directly. Instead, it makes asynchronous requests to `/api/frontend/*` endpoints, ensuring that any changes in the backend data (like inventory or FAQs) reflect instantly on the frontend without code changes.

### Core System Dependencies
- **Frontend Dependency**: All frontend logic depends on a valid session (for Cart/Wishlist) and a properly configured Tailwind CDN for the modern dark-mode theme.
- **Backend Dependency**: The backend relies on the `customer` and `user` relationship for order processing and secure management of inventory.

---

## 2. Admin Panel: The Command Center
The Admin Panel (`/admin`) is where the entire platform is managed. Each feature in the sidebar is directly connected to the database and reflected on the frontend.

### A. Main Menu & Operations
| Module | Feature | Implementation Detail | Frontend Impact |
| :--- | :--- | :--- | :--- |
| **Authentication & Roles** | RBAC | Manage Admin access and permissions. | Controls who can see backend data. |
| **Company & Staff** | Branches & Staff | Manage different outlets and employees. | Populates the "Store Locator" page. |
| **Branding & Supply Chain** | Suppliers/Partners | Track where your stock comes from. | Internal tracking of product origins. |
| **Content Management (CMS)** | Site Settings/FAQs | Edit the site logo, footer links, and FAQs. | Controls global site brand and FAQ page. |
| **Catalog Operations** | Categories/Products | Centralized product management and stock. | Powers the Home, Shop, and Product Details. |
| **Customer & Orders** | Orders/Reviews | Manage sales and moderate customer feedback. | Verifies orders and makes reviews visible. |

---

## 3. Customer Experience Guide
The frontend is designed to be immersive, fast, and high-performance.

### The Shopping Journey
1.  **Onboarding**: Customers sign up at `/login`. This creates a `User` and a `Customer` record, enabling personalization.
2.  **Discovery**:
    - **Homepage**: Uses a dynamic **Bento Grid** (6 columns) that highlights "Featured" and "New Drop" items automatically from the API.
    - **Shop**: Real-time category filtering (API-driven).
    - **Product Details**: Fetches depth data, high-res images, and moderated **Product Reviews**.
3.  **Checkout**:
    - **Wishlist**: Saved items are stored in the DB and persistent across devices.
    - **Dynamic Cart**: Uses session-based storage that syncs to the Orders table upon checkout.
    - **My Account**: A centralized hub for order history and profile management.

---

## 4. Feature Connectivity (BE <-> FE)
Example of how features are linked:

- **Product Review Flow**:
    1.  **Frontend**: Customer submits a review on a product page (`POST /api/frontend/reviews`).
    2.  **Backend**: Review is saved to the `product_reviews` table but marked as `is_visible = 0`.
    3.  **Admin Panel**: Admin approves the review via the "Product Reviews" section.
    4.  **Frontend**: The review now appears dynamically on the product page (`GET /api/frontend/reviews/{id}`).

- **Inventory Sync**:
    1.  **Admin**: Updates stock for "FS Cricket Bat".
    2.  **Frontend**: The product instantly updates its "Add to Bag" availability across the site.

---

## 5. Strategic Roadmap & AI Implementation
The following sections are the **"Engagement & Innovation"** pillars that are currently being developed.

### A. Video Profiles (Community Media)
- **Current State**: Backend handles video links; Frontend displays an interactive gallery.
- **Future AI Integration**:
    - **AI Moderation**: Use **Google Cloud Video Intelligence** to automatically scan user-uploaded videos for inappropriate content before they are visible.
    - **Smart Highlights**: Automate the generation of video thumbnails and tags based on the content (e.g., "Cricket", "Football").


### C. Group Purchases (Innovation)
- **Current State**: Backend logic for group thresholds exists.
- **Implementation Goal**: 
    - Enable "Collective Buying" where a discount is only unlocked if X number of people join the group within 24 hours.
    - **AI Upselling**: Suggest "Similar Groups" to customers based on their purchase history.

### D. Smart Search (UX Innovation)
- **Implementation Goal**: 
    - **Live Search Suggestions**: Provide product names and thumbnails as the user types.
- **Future AI Integration**:
    - **Semantic Search**: Use AI to understand customer intent (e.g., searching "running gear" suggests relevant apparel and shoes automatically).

---

## 6. How to Complete the Project Effectively
1.  **Finalize the API Logic**: Ensure every `/api/frontend` endpoint is robust and handles errors gracefully.
2.  **Complete the Engaging Modules**: Focus on the logic for Group Buy thresholds and Video Profile storage.
3.  **AI Integration**: Start with a simple **GPT-4o API** implementation for Smart Search to show "Innovation" immediately.
4.  **Premium Polishing**: Continuously audit the Tailwind config to ensure the logo's premium font and gradient remain consistent across all new modules.

---
