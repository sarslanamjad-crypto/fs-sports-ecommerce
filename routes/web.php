<?php

use App\Http\Controllers\backend\AdminFaqsController;
use App\Http\Controllers\backend\AdminHomeController;
use App\Http\Controllers\backend\AdminLoginController;
use App\Http\Controllers\backend\AdminProjectsController;
use App\Http\Controllers\backend\TeamMemberController;
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
use App\Http\Controllers\Backend\GroupPurchaseController;
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
use App\Http\Controllers\Backend\QuizCompetitionController;
use App\Http\Controllers\Backend\QuizResultController;
use App\Http\Controllers\Backend\RegistrationController;
use App\Http\Controllers\Backend\RolesPermissionController;
use App\Http\Controllers\Backend\SearchLogController;
use App\Http\Controllers\Backend\ShippingDetailController;
use App\Http\Controllers\Backend\SiteSettingController;
use App\Http\Controllers\Backend\StaffManagementController;
use App\Http\Controllers\Backend\StockManagementController;
use App\Http\Controllers\Backend\SupplierController;
use App\Http\Controllers\Backend\TeamController;
use App\Http\Controllers\Backend\VideoProfileController;
use App\Http\Controllers\Backend\WishlistController;

use App\Http\Controllers\frontend\IndexController;
use App\Http\Controllers\frontend\AboutusController;
use App\Http\Controllers\frontend\BlogdetailsController;
use App\Http\Controllers\frontend\CartpageController;
use App\Http\Controllers\frontend\CategoriesController;
use App\Http\Controllers\frontend\ColumnsLeftController;
use App\Http\Controllers\frontend\ColumnsrightController;
use App\Http\Controllers\frontend\ContactController;
use App\Http\Controllers\frontend\FaqController;
use App\Http\Controllers\frontend\ProductdetailsController;
use App\Http\Controllers\frontend\MyaccountController;
use App\Http\Controllers\frontend\ErrorController;
use App\Http\Controllers\frontend\ProductController;
use App\Http\Controllers\frontend\Services01Controller;
use App\Http\Controllers\frontend\WhislistController;


// Front end
Route::get('/', [IndexController::class, 'index'])->name('index');
Route::post('/', [IndexController::class, 'submit'])->name('register');

// Route::get('/register',[RegisterController::class,'register'])->name('register');

Route::get('/1columns-left', [ColumnsLeftController::class, 'columnsleft'])->name('columnsleft');
Route::get('/1columns-right', [ColumnsrightController::class, 'columnsright'])->name('columnsright');

Route::get('/about-us', [AboutusController::class, 'aboutus'])->name('aboutus');
Route::get('/blog-details', [BlogdetailsController::class, 'blogdetails'])->name('blogdetails');

Route::get('/cart-page', [CartpageController::class, 'cartpage'])->name('frontend.cart-page');

Route::post('/cart/add/{project}', [CartpageController::class, 'store'])->name('frontend.cart.add');
Route::delete('/cart/remove/{id}', [CartpageController::class, 'remove'])->name('frontend.cart.remove');
Route::post('/cart/update/{id}/{type}', [CartpageController::class, 'update'])->name('frontend.cart.update');

Route::get('/categories', [CategoriesController::class, 'categories'])->name('categories');
Route::get('/contact', [ContactController::class, 'contact'])->name('contact');
Route::get('/faq', [FaqController::class, 'faq'])->name('faq');
Route::get('/whislist', [WhislistController::class, 'whislist'])->name('whislist');

Route::get('/product-details', [ProductdetailsController::class, 'productdetails'])->name('productdetails');
Route::get('/my-account', [MyaccountController::class, 'myaccount'])->name('myaccount');
Route::get('/error', [ErrorController::class, 'error'])->name('error');
Route::get('/product', [ProductController::class, 'product'])->name('product');
Route::get('/services-01', [Services01Controller::class, 'services01'])->name('services01');

// Backend
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

// Generated Admin Routes
Route::prefix('admin')->middleware(['web'])->name('admin.')->group(function () {
    // Route::resource('admin', AdminController::class); // Conflicted with legacy admin logic
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
    Route::resource('group-purchase', GroupPurchaseController::class);
    Route::resource('inventory-log', InventoryLogController::class);
    Route::resource('login-security-log', LoginSecurityLogController::class);
    Route::resource('manufacturing-partner', ManufacturingPartnerController::class);
    Route::resource('newsletter-subscriber', NewsletterSubscriberController::class);
    Route::resource('online-payment-log', OnlinePaymentLogController::class);
    Route::resource('order-item', OrderItemController::class);
    Route::resource('orders-transaction', OrdersTransactionController::class);
    Route::resource('payment-transaction', PaymentTransactionController::class);
    Route::resource('product-review', ProductReviewController::class);
    Route::resource('products-inventory', ProductsInventoryController::class);
    Route::resource('project', ProjectController::class);
    Route::resource('quiz-competition', QuizCompetitionController::class);
    Route::resource('quiz-result', QuizResultController::class);
    Route::resource('registration', RegistrationController::class);
    Route::resource('roles-permission', RolesPermissionController::class);
    Route::resource('search-log', SearchLogController::class);
    Route::resource('shipping-detail', ShippingDetailController::class);
    Route::resource('site-setting', SiteSettingController::class);
    Route::resource('staff-management', StaffManagementController::class);
    Route::resource('stock-management', StockManagementController::class);
    Route::resource('supplier', SupplierController::class);
    Route::resource('team', TeamController::class);
    Route::resource('video-profile', VideoProfileController::class);
    Route::resource('wishlist', WishlistController::class);
});
