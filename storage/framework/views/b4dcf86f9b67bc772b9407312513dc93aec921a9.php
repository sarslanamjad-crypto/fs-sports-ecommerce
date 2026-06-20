<!DOCTYPE html>
<html class="dark" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>FS86 Sahiwal | My Elite Profile & Performance Tracking</title>
<meta name="description" content="View your order history, manage your performance wishlist, and update your FS86 Sahiwal profile." />
<link rel="icon" type="image/jpg" href="<?php echo e(asset('assets/logo.jpg')); ?>" />

<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700;800;900&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<script id="tailwind-config">
    tailwind.config = { darkMode:"class", theme:{ extend:{
      colors:{"surface-bright":"#2c2c2c","tertiary-container":"#b91c1c","on-secondary-container":"#fed7aa","outline":"#767575","error-container":"#9f0519","inverse-primary":"#9a3412","outline-variant":"#484847","secondary-container":"#7c2d12","primary-fixed":"#fdba74","primary-fixed-dim":"#fb923c","on-tertiary-fixed":"#450a0a","tertiary-dim":"#b91c1c","background":"#090909","inverse-surface":"#fcf9f8","surface-container-low":"#131313","surface-container-lowest":"#000000","on-primary-fixed-variant":"#c2410c","on-error":"#7f1d1d","on-primary-container":"#7c2d12","primary":"#f97316","on-tertiary":"#ffffff","secondary-fixed":"#fed7aa","on-background":"#ffffff","secondary-fixed-dim":"#fdba74","inverse-on-surface":"#565555","tertiary-fixed":"#fca5a5","on-secondary":"#ffffff","on-secondary-fixed":"#7c2d12","on-tertiary-fixed-variant":"#991b1b","on-secondary-fixed-variant":"#9a3412","secondary-dim":"#ea580c","on-tertiary-container":"#450a0a","surface-dim":"#090909","on-surface-variant":"#adaaaa","secondary":"#fb923c","surface":"#090909","tertiary-fixed-dim":"#f87171","on-primary-fixed":"#9a3412","surface-tint":"#f97316","on-primary":"#ffffff","primary-dim":"#ea580c","on-error-container":"#fca5a5","surface-container-highest":"#262626","error":"#ef4444","tertiary":"#dc2626","on-surface":"#ffffff","surface-variant":"#262626","error-dim":"#dc2626","primary-container":"#fb923c","surface-container":"#1a1a1a","surface-container-high":"#20201f"},
      fontFamily:{"headline":["Nunito"],"body":["Nunito"],"label":["Nunito"]},
      borderRadius:{"DEFAULT":"0.125rem","lg":"0.25rem","xl":"0.5rem","full":"0.75rem"}
    }}}
</script>


<style>.material-symbols-outlined{font-variation-settings:'FILL' 0,'wght' 400,'GRAD' 0,'opsz' 24}body{background-color:#090909;color:#fff;font-family:'Nunito',sans-serif}</style>
</head>
<body class="bg-background text-on-background selection:bg-primary selection:text-on-primary">
<?php echo $__env->make('frontend.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<main class="pt-32 pb-20 px-8 max-w-4xl mx-auto min-h-screen">

<!-- Logged In State -->
<div id="account-logged-in" class="hidden">
  <div class="mb-16">
    <span class="font-label text-primary uppercase tracking-[0.3em] text-[10px] mb-2 block">Dashboard</span>
    <h1 class="font-headline text-5xl md:text-7xl font-black italic tracking-tighter uppercase leading-none mb-4">My <span class="text-primary">Account</span></h1>
  </div>

  <div class="bg-surface-container-low p-8 rounded-lg mb-8">
    <div class="flex items-center gap-6">
      <div class="w-20 h-20 bg-primary rounded-full flex items-center justify-center">
        <span id="user-initial" class="font-headline text-3xl font-black text-on-primary">U</span>
      </div>
      <div>
        <h2 id="user-name" class="font-headline text-2xl font-bold"></h2>
        <p id="user-email" class="font-label text-on-surface-variant"></p>
      </div>
    </div>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
    <a href="<?php echo e(route('wishlist.html')); ?>" class="bg-surface-container-low p-6 rounded-lg hover:bg-surface-container-high transition-all group">
      <span class="material-symbols-outlined text-primary text-3xl mb-3">favorite</span>
      <h3 class="font-headline font-bold group-hover:text-primary transition-colors">Wishlist</h3>
      <p class="text-on-surface-variant text-sm">View saved items</p>
    </a>
    <a href="<?php echo e(route('cart_checkout.html')); ?>" class="bg-surface-container-low p-6 rounded-lg hover:bg-surface-container-high transition-all group">
      <span class="material-symbols-outlined text-primary text-3xl mb-3">shopping_cart</span>
      <h3 class="font-headline font-bold group-hover:text-primary transition-colors">Cart</h3>
      <p class="text-on-surface-variant text-sm">View your cart</p>
    </a>
    <a href="<?php echo e(route('shop_page.html')); ?>" class="bg-surface-container-low p-6 rounded-lg hover:bg-surface-container-high transition-all group">
      <span class="material-symbols-outlined text-primary text-3xl mb-3">storefront</span>
      <h3 class="font-headline font-bold group-hover:text-primary transition-colors">Shop</h3>
      <p class="text-on-surface-variant text-sm">Browse products</p>
    </a>
  </div>

  <div class="mb-12">
    <h3 class="font-headline text-2xl font-bold mb-6">Order History</h3>
    <div id="orders-container" class="space-y-6">
      <div class="bg-surface-container-low h-32 skeleton-pulse rounded-lg"></div>
    </div>
    <div id="orders-empty" class="hidden bg-surface-container-low p-8 text-center rounded-lg">
      <span class="material-symbols-outlined text-4xl text-outline-variant mb-2">receipt_long</span>
      <p class="text-on-surface-variant">You haven't placed any orders yet.</p>
    </div>
  </div>

  <button onclick="logoutUser()" class="px-8 py-3 bg-surface-container-highest text-on-surface font-label text-xs uppercase tracking-widest hover:bg-error hover:text-on-error transition-all rounded-md">
    Logout
  </button>
</div>

<!-- Not Logged In State -->
<div id="account-logged-out" class="hidden text-center py-20">
  <span class="material-symbols-outlined text-6xl text-outline-variant mb-4">account_circle</span>
  <h2 class="font-headline text-3xl font-bold mb-4">Welcome to FS Sports</h2>
  <p class="font-body text-on-surface-variant mb-8">Log in or create an account to manage your orders, wishlist, and more.</p>
  <a href="<?php echo e(route('login_signup.html')); ?>" class="px-12 py-4 bg-gradient-to-br from-primary to-error text-white shadow-[0_4px_10px_rgba(249,115,22,0.4)] hover:shadow-[0_6px_15px_rgba(249,115,22,0.6)] font-headline font-bold rounded-md hover:bg-primary-dim transition-all inline-block uppercase tracking-wider">Login / Sign Up</a>
</div>
</main>
<?php echo $__env->make('frontend.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script src="<?php echo e(asset('js/frontend-api.js')); ?>"></script>
<script>
document.addEventListener('DOMContentLoaded', async () => {
  const res = await FrontendAPI.getUserSession();
  if (res.success && res.logged_in) {
    document.getElementById('account-logged-in').classList.remove('hidden');
    document.getElementById('user-name').textContent = res.data.name;
    document.getElementById('user-email').textContent = res.data.email;
    document.getElementById('user-initial').textContent = (res.data.name || 'U')[0].toUpperCase();
    
    loadOrders();
  } else {
    document.getElementById('account-logged-out').classList.remove('hidden');
  }
});

async function loadOrders() {
  const container = document.getElementById('orders-container');
  const empty = document.getElementById('orders-empty');
  const res = await FrontendAPI.getOrders();
  
  if (res.success && res.data && res.data.length > 0) {
    container.innerHTML = res.data.map(order => `
      <div class="bg-surface-container-low p-6 rounded-lg border border-outline-variant/20">
        <div class="flex flex-wrap justify-between items-start gap-4 mb-4 border-b border-outline-variant/20 pb-4">
          <div>
            <span class="font-label text-xs text-on-surface-variant uppercase tracking-wider">Order ID</span>
            <p class="font-headline font-bold text-lg">${order.reference}</p>
          </div>
          <div>
            <span class="font-label text-xs text-on-surface-variant uppercase tracking-wider">Date</span>
            <p class="font-body">${new Date(order.date).toLocaleDateString()}</p>
          </div>
          <div>
            <span class="font-label text-xs text-on-surface-variant uppercase tracking-wider">Total</span>
            <p class="font-bold text-primary">Rs. ${parseFloat(order.total).toFixed(0)}</p>
          </div>
          <div>
            <span class="font-label text-xs text-on-surface-variant uppercase tracking-wider">Status</span>
            <p class="font-bold uppercase ${order.status === 'pending' ? 'text-yellow-500' : 'text-green-500'}">${order.status}</p>
          </div>
        </div>
        <div class="space-y-2">
          ${order.items.map(item => `
            <div class="flex justify-between text-sm">
              <span class="text-on-surface-variant">${item.quantity}x ${item.product_title}</span>
              <span>Rs. ${parseFloat(item.subtotal).toFixed(0)}</span>
            </div>
          `).join('')}
        </div>
      </div>
    `).join('');
  } else {
    container.classList.add('hidden');
    empty.classList.remove('hidden');
  }
}

async function logoutUser() {
  await FrontendAPI.logout();
  DOMUtils.toast('Logged out successfully.');
  setTimeout(() => window.location.href = '<?php echo e(route("homepage.html")); ?>', 1000);
}
</script>
</body></html>
<?php /**PATH D:\CUI Data\6th Semester\Advance Web\AdvanceWebProject\resources\views\frontend\my_account.blade.php ENDPATH**/ ?>