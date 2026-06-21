<?php

use App\Http\Controllers\Backend\AdminFaqsController;
use App\Http\Controllers\Backend\AdminHomeController;
use App\Http\Controllers\Backend\AdminLoginController;
use App\Http\Controllers\Backend\AdminProjectsController;
use App\Http\Controllers\Backend\TeamMemberController;
use App\Http\Controllers\Backend\StatusController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AdminAuditLogController;
use App\Http\Controllers\Backend\AuditTrailController;
use App\Http\Controllers\Backend\BranchController;
use App\Http\Controllers\Backend\CartController;
use App\Http\Controllers\Backend\CartItemController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ContactController as BackendContactController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\FaqController as BackendFaqController;
use App\Http\Controllers\Backend\FinanceReportController;

use App\Http\Controllers\Backend\InventoryLogController;
use App\Http\Controllers\Backend\LoginSecurityLogController;
use App\Http\Controllers\Backend\ManufacturingPartnerController;
use App\Http\Controllers\Backend\NewsletterSubscriberController;
use App\Http\Controllers\Backend\OnlinePaymentLogController;
use App\Http\Controllers\Backend\OrderItemController;
use App\Http\Controllers\Backend\OrdersTransactionController;
use App\Http\Controllers\Backend\PaymentTransactionController;
use App\Http\Controllers\Backend\ProductReviewController;
use App\Http\Controllers\Backend\ProductsInventoryController;
use App\Http\Controllers\Backend\ProjectController;

use App\Http\Controllers\Backend\RegistrationController;
use App\Http\Controllers\Backend\RolesPermissionController;
use App\Http\Controllers\Backend\SearchLogController;
use App\Http\Controllers\Backend\ShippingDetailController;
use App\Http\Controllers\Backend\SiteSettingController;
use App\Http\Controllers\Backend\StaffManagementController;
use App\Http\Controllers\Backend\StockManagementController;
use App\Http\Controllers\Backend\SupplierController;
use App\Http\Controllers\Backend\TeamController;

use App\Http\Controllers\Backend\WishlistController;
use App\Http\Controllers\Backend\DashboardStatsController;
use App\Http\Controllers\FrontendController;

use App\Http\Controllers\Api\FrontendApiController;
use App\Http\Controllers\Api\StripePaymentController;


// Frontend Pages (API-First — all data fetched via /api/frontend/*)

Route::get('/', [FrontendController::class, 'home'])->name('homepage.html');
Route::get('/shop', [FrontendController::class, 'shop'])->name('shop_page.html');
Route::get('/about', [FrontendController::class, 'aboutUs'])->name('about_us.html');
Route::get('/stores', [FrontendController::class, 'storeLocator'])->name('store_locator.html');


Route::get('/wishlist', fn() => view('frontend.wishlist'))->name('wishlist.html');
Route::get('/faqs', [FrontendController::class, 'faqs'])->name('faqs.html');
Route::get('/cart', fn() => view('frontend.cart_checkout'))->name('cart_checkout.html');
Route::get('/product/{id}', [FrontendController::class, 'productDetails'])->name('products_details.html');
Route::get('/account', fn() => view('frontend.my_account'))->name('my_account.html');
Route::get('/login', fn() => view('frontend.login_signup'))->name('login_signup.html');
Route::post('/register', [FrontendApiController::class, 'register']);
Route::get('/clear', function () {
    \Illuminate\Support\Facades\Artisan::call('config:clear');
    return 'Cleared';
});


// Frontend API (under web middleware for session support)

Route::prefix('fe-api')->group(function () {
    // Public: Site Settings
    Route::get('/site-settings', [FrontendApiController::class, 'siteSettings']);

    // Public: Categories
    Route::get('/categories', [FrontendApiController::class, 'categories']);

    // Public: Products
    Route::get('/products', [FrontendApiController::class, 'products']);
    Route::get('/products/search', [FrontendApiController::class, 'searchProducts']);
    Route::get('/products/{id}', [FrontendApiController::class, 'productDetail']);
    Route::get('/featured-products', [FrontendApiController::class, 'featuredProducts']);

    // Public: Team
    Route::get('/team', [FrontendApiController::class, 'team']);

    // Public: FAQs
    Route::get('/faqs', [FrontendApiController::class, 'faqs']);

    // Public: Branches (Store Locator)
    Route::get('/branches', [FrontendApiController::class, 'branches']);





    // Public: Reviews
    Route::get('/reviews/{productId}', [FrontendApiController::class, 'reviews']);

    // Public: Contact Form
    Route::post('/contact', [FrontendApiController::class, 'submitContact']);

    // Public: Newsletter
    Route::post('/newsletter', [FrontendApiController::class, 'subscribeNewsletter']);

    // Public: WhatsApp Click Logging
    Route::post('/whatsapp-click', [FrontendApiController::class, 'logWhatsappClick']);

    // Auth
    Route::post('/login', [FrontendApiController::class, 'login']);
    Route::post('/logout', [FrontendApiController::class, 'logout']);
    Route::get('/user-session', [FrontendApiController::class, 'userSession']);

    // Wishlist (session-protected)
    Route::get('/wishlist', [FrontendApiController::class, 'getWishlist']);
    Route::post('/wishlist', [FrontendApiController::class, 'addToWishlist'])->middleware('auth');
    Route::delete('/wishlist/{id}', [FrontendApiController::class, 'removeFromWishlist']);

    // Cart (session-protected)
    Route::get('/cart', [FrontendApiController::class, 'getCart']);
    Route::post('/cart', [FrontendApiController::class, 'addToCart'])->middleware('auth');
    Route::delete('/cart/{id}', [FrontendApiController::class, 'removeFromCart']);

    // Checkout (session-protected)
    Route::post('/checkout', [FrontendApiController::class, 'checkout']);

    // Order History (session-protected)
    Route::get('/orders', [FrontendApiController::class, 'getOrders']);

    // Product Reviews (session-protected)
    Route::post('/reviews', [FrontendApiController::class, 'submitReview']);

    // Stripe Checkout (session-protected)
    Route::post('/stripe/checkout/{order_id}', [StripePaymentController::class, 'checkout'])->name('stripe.checkout');

});

// Stripe Return URLs (browser-redirected by Stripe)
Route::get('/stripe/success/{order_id}', [StripePaymentController::class, 'paymentSuccess'])->name('stripe.success');
Route::get('/stripe/cancel/{order_id}', [StripePaymentController::class, 'paymentCancel'])->name('stripe.cancel');

// Backend

Route::middleware(['admin_auth'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('admin-audit-log', AdminAuditLogController::class);
        Route::resource('audit-trail', AuditTrailController::class);
        Route::resource('branch', BranchController::class);
        Route::resource('cart', CartController::class);
        Route::resource('cart-item', CartItemController::class);
        Route::resource('category', CategoryController::class);
        Route::resource('contact', BackendContactController::class);
        Route::resource('customer', CustomerController::class);
        Route::resource('faq', BackendFaqController::class);
        Route::resource('finance-report', FinanceReportController::class);

        Route::resource('inventory-log', InventoryLogController::class);
        Route::resource('login-security-log', LoginSecurityLogController::class);
        Route::resource('manufacturing-partner', ManufacturingPartnerController::class);
        Route::resource('newsletter-subscriber', NewsletterSubscriberController::class);
        Route::resource('online-payment-log', OnlinePaymentLogController::class);
        Route::resource('order-item', OrderItemController::class);
        Route::resource('orders-transaction', OrdersTransactionController::class);
        Route::resource('payment-transaction', PaymentTransactionController::class);
        Route::post('product-review/{id}/toggle', [ProductReviewController::class, 'toggleVisibility'])->name('product-review.toggle');
        Route::resource('product-review', ProductReviewController::class);
        Route::resource('products-inventory', ProductsInventoryController::class);
        Route::resource('project', ProjectController::class);

        Route::resource('registration', RegistrationController::class);
        Route::resource('roles-permission', RolesPermissionController::class);
        Route::resource('search-log', SearchLogController::class);
        Route::resource('shipping-detail', ShippingDetailController::class);
        Route::resource('site-setting', SiteSettingController::class);
        Route::resource('staff-management', StaffManagementController::class);
        Route::resource('supplier', SupplierController::class);
        Route::resource('team', TeamController::class);

        Route::resource('wishlist', WishlistController::class);
    });

    Route::get('/admin', [AdminHomeController::class, 'index']);
    Route::get('/admin/dashboard-stats', [DashboardStatsController::class, 'index'])->name('admin.dashboard-stats');
    Route::patch('/admin/toggle-status/{model}/{id}', [StatusController::class, 'toggle'])->name('admin.status.toggle');

    //Admin Management
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/register', [AdminHomeController::class, 'registerAdmin'])->name('create');
        Route::post('/register', [AdminHomeController::class, 'submitAdminRecord'])->name('store');
        Route::get('/admins-list', [AdminHomeController::class, 'showAdminRecord'])->name('show');
        Route::get('/delete/{id}', [AdminHomeController::class, 'deleteAdminRecord'])->name('delete');
        Route::get('/edit/{id}', [AdminHomeController::class, 'editAdminRecord'])->name('edit');
        Route::post('/update/{id}', [AdminHomeController::class, 'updateAdminRecord'])->name('update');
        Route::get('/change-password', [AdminHomeController::class, 'changePassword'])->name('change-password');
        Route::post('/change-password', [AdminHomeController::class, 'updatePassword'])->name('update-password');
    });

    // Team Management
    Route::prefix('admin')->name('team.')->group(function () {
        Route::get('/team', [TeamMemberController::class, 'index'])->name('show');
        Route::get('/team-member-details/{id}', [TeamMemberController::class, 'showTeamMember'])->name('details');

        Route::get('/team-add', [TeamMemberController::class, 'registerTeam'])->name('add');
        Route::post('/team-add', [TeamMemberController::class, 'submitTeamRecord']);

        Route::get('/team-edit/{id}', [TeamMemberController::class, 'editTeam'])->name('edit');
        Route::put('/team-edit/{id}', [TeamMemberController::class, 'updateTeam'])->name('update');

        Route::delete('/team-delete/{id}', [TeamMemberController::class, 'deleteTeam'])->name('delete');
    });

    // FAQs Management
    Route::prefix('admin')->name('faq.')->group(function () {
        Route::get('/faqs', [AdminFaqsController::class, 'index'])->name('show');

        Route::get('/faq-add', [AdminFaqsController::class, 'addFAQ'])->name('add');
        Route::post('/faq-add', [AdminFaqsController::class, 'submitFaqRecord']);

        Route::get('/faq-edit/{id}', [AdminFaqsController::class, 'editFAQ'])->name('edit');
        Route::put('/faq-edit/{id}', [AdminFaqsController::class, 'updateFAQ'])->name('update');

        Route::delete('/faq-delete/{id}', [AdminFaqsController::class, 'deleteFAQ'])->name('delete');
    });

    // Project Management
    Route::prefix('admin')->name('project.')->group(function () {
        Route::get('/projects', [AdminProjectsController::class, 'index'])->name('show');  // list projects

        Route::get('/project-add', [AdminProjectsController::class, 'addProject'])->name('add');
        Route::post('/project-add', [AdminProjectsController::class, 'submitProjectRecord']);

        Route::get('/project-edit/{id}', [AdminProjectsController::class, 'editProject'])->name('edit');
        Route::put('/project-edit/{id}', [AdminProjectsController::class, 'updateProject'])->name('update');

        Route::delete('/project-delete/{id}', [AdminProjectsController::class, 'deleteProject'])->name('delete');
    });
});

//Login Page
Route::get('/admin/login', [AdminLoginController::class, 'index']);

Route::get('/admin/login', function () {
    if (session()->has('email')) {
        return redirect('/admin');
    } else {
        return view('backend.login');
    }
});

Route::post('/admin/login', [AdminLoginController::class, 'onLogin']);
Route::get('/admin/logout', [AdminLoginController::class, 'logoutAdmin']);

Route::get('/admin', [AdminHomeController::class, 'index']);
Route::get('/admin/dashboard-stats', [DashboardStatsController::class, 'index'])->name('admin.dashboard-stats');
Route::patch('/admin/toggle-status/{model}/{id}', [StatusController::class, 'toggle'])->name('admin.status.toggle');

// Route::get('/admin', [AdminHomeController::class, 'index'])->middleware('admin_auth')->name('admin.dashboard');

//Admin Management
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/register', [AdminHomeController::class, 'registerAdmin'])->name('create');
    Route::post('/register', [AdminHomeController::class, 'submitAdminRecord'])->name('store');
    Route::get('/admins-list', [AdminHomeController::class, 'showAdminRecord'])->name('show');
    Route::get('/delete/{id}', [AdminHomeController::class, 'deleteAdminRecord'])->name('delete');
    Route::get('/edit/{id}', [AdminHomeController::class, 'editAdminRecord'])->name('edit');
    Route::post('/update/{id}', [AdminHomeController::class, 'updateAdminRecord'])->name('update');
});

// Team Management
Route::prefix('admin')->name('team.')->group(function () {
    Route::get('/team', [TeamMemberController::class, 'index'])->name('show');
    Route::get('/team-member-details/{id}', [TeamMemberController::class, 'showTeamMember'])->name('details');

    Route::get('/team-add', [TeamMemberController::class, 'registerTeam'])->name('add');
    Route::post('/team-add', [TeamMemberController::class, 'submitTeamRecord']);

    Route::get('/team-edit/{id}', [TeamMemberController::class, 'editTeam'])->name('edit');
    Route::put('/team-edit/{id}', [TeamMemberController::class, 'updateTeam'])->name('update');

    Route::delete('/team-delete/{id}', [TeamMemberController::class, 'deleteTeam'])->name('delete');
});

// FAQs Management
Route::prefix('admin')->name('faq.')->group(function () {
    Route::get('/faqs', [AdminFaqsController::class, 'index'])->name('show');

    Route::get('/faq-add', [AdminFaqsController::class, 'addFAQ'])->name('add');
    Route::post('/faq-add', [AdminFaqsController::class, 'submitFaqRecord']);

    Route::get('/faq-edit/{id}', [AdminFaqsController::class, 'editFAQ'])->name('edit');
    Route::put('/faq-edit/{id}', [AdminFaqsController::class, 'updateFAQ'])->name('update');

    Route::delete('/faq-delete/{id}', [AdminFaqsController::class, 'deleteFAQ'])->name('delete');
});

// Project Management
Route::prefix('admin')->name('project.')->group(function () {
    Route::get('/projects', [AdminProjectsController::class, 'index'])->name('show');  // list projects

    Route::get('/project-add', [AdminProjectsController::class, 'addProject'])->name('add');
    Route::post('/project-add', [AdminProjectsController::class, 'submitProjectRecord']);

    Route::get('/project-edit/{id}', [AdminProjectsController::class, 'editProject'])->name('edit');
    Route::put('/project-edit/{id}', [AdminProjectsController::class, 'updateProject'])->name('update');

    Route::delete('/project-delete/{id}', [AdminProjectsController::class, 'deleteProject'])->name('delete');
});



Route::get('admin/logout', function () {
    if (session()->has('email')) {
        session()->pull('id', null);
        session()->pull('first_name', null);
        session()->pull('last_name', null);
        session()->pull('email', null);
    }
    return redirect('/admin/login');
});
