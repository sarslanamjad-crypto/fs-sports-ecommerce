<!DOCTYPE html>
<html class="dark" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>FS86 Sahiwal | My Performance Wishlist</title>
<meta name="description" content="Keep track of the elite sports gear you need. Save your favorites to your FS86 Sahiwal wishlist." />
<link rel="icon" type="image/jpg" href="<?php echo e(asset('assets/logo.jpg')); ?>" />
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700;800;900&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>

<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<script id="tailwind-config">
    tailwind.config = {
      darkMode: "class",
      theme: { extend: {
        colors: {
          "surface-bright":"#2c2c2c","tertiary-container":"#b91c1c","on-secondary-container":"#fed7aa","outline":"#767575",
          "error-container":"#9f0519","inverse-primary":"#9a3412","outline-variant":"#484847","secondary-container":"#7c2d12",
          "primary-fixed":"#fdba74","primary-fixed-dim":"#fb923c","on-tertiary-fixed":"#450a0a","tertiary-dim":"#b91c1c",
          "background":"#090909","inverse-surface":"#fcf9f8","surface-container-low":"#131313","surface-container-lowest":"#000000",
          "on-primary-fixed-variant":"#c2410c","on-error":"#7f1d1d","on-primary-container":"#7c2d12","primary":"#f97316",
          "on-tertiary":"#ffffff","secondary-fixed":"#fed7aa","on-background":"#ffffff","secondary-fixed-dim":"#fdba74",
          "inverse-on-surface":"#565555","tertiary-fixed":"#fca5a5","on-secondary":"#ffffff","on-secondary-fixed":"#7c2d12",
          "on-tertiary-fixed-variant":"#991b1b","on-secondary-fixed-variant":"#9a3412","secondary-dim":"#ea580c",
          "on-tertiary-container":"#450a0a","surface-dim":"#090909","on-surface-variant":"#adaaaa","secondary":"#fb923c",
          "surface":"#090909","tertiary-fixed-dim":"#f87171","on-primary-fixed":"#9a3412","surface-tint":"#f97316",
          "on-primary":"#ffffff","primary-dim":"#ea580c","on-error-container":"#fca5a5","surface-container-highest":"#262626",
          "error":"#ef4444","tertiary":"#dc2626","on-surface":"#ffffff","surface-variant":"#262626","error-dim":"#dc2626",
          "primary-container":"#fb923c","surface-container":"#1a1a1a","surface-container-high":"#20201f"
        },
        fontFamily: { "headline":["Nunito"],"body":["Nunito"],"label":["Nunito"] },
        borderRadius: {"DEFAULT":"0.125rem","lg":"0.25rem","xl":"0.5rem","full":"0.75rem"},
      }},
    }
  </script>


<style>
    .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
    body { background-color: #090909; color: #ffffff; font-family: 'Nunito', sans-serif; }
  </style>
</head>
<body class="bg-background text-on-background min-h-screen flex flex-col">

<?php echo $__env->make('frontend.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<main class="flex-grow pt-32 px-8 max-w-7xl mx-auto w-full">
<header class="mb-16">
<div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
<div>
<span class="font-label text-primary uppercase tracking-[0.3em] text-[10px] mb-2 block">Curation Hub</span>
<h1 class="font-headline text-5xl md:text-7xl font-black italic tracking-tighter uppercase leading-none">Your Wishlist</h1>
</div>
<div class="flex items-center gap-4">
<p id="wishlist-count" class="font-label text-neutral-500 text-sm tracking-widest uppercase">Loading...</p>
<div class="h-[1px] w-12 bg-outline-variant/30"></div>
</div>
</div>
</header>

<!-- Dynamic Wishlist Grid -->
<section id="wishlist-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
  <div class="bg-surface-container-low h-[400px] skeleton-pulse"></div>
  <div class="bg-surface-container-low h-[400px] skeleton-pulse"></div>
  <div class="bg-surface-container-low h-[400px] skeleton-pulse"></div>
</section>

<!-- Empty State -->
<div id="wishlist-empty" class="hidden text-center py-20">
  <span class="material-symbols-outlined text-6xl text-outline-variant mb-4">favorite_border</span>
  <h3 class="font-headline text-2xl text-on-surface-variant mb-2">Your wishlist is empty</h3>
  <p class="font-body text-on-surface-variant mb-6">Start adding products to your wishlist from the shop!</p>
  <a href="<?php echo e(route('shop_page.html')); ?>" class="px-8 py-3 bg-gradient-to-br from-primary to-error text-white shadow-[0_4px_10px_rgba(249,115,22,0.4)] hover:shadow-[0_6px_15px_rgba(249,115,22,0.6)] font-label text-xs uppercase tracking-widest">Browse Shop</a>
</div>

<!-- Login Required State -->
<div id="wishlist-login" class="hidden text-center py-20">
  <span class="material-symbols-outlined text-6xl text-outline-variant mb-4">lock</span>
  <h3 class="font-headline text-2xl text-on-surface-variant mb-2">Please log in</h3>
  <p class="font-body text-on-surface-variant mb-6">You need to be logged in to view your wishlist.</p>
  <a href="<?php echo e(route('login_signup.html')); ?>" class="px-8 py-3 bg-gradient-to-br from-primary to-error text-white shadow-[0_4px_10px_rgba(249,115,22,0.4)] hover:shadow-[0_6px_15px_rgba(249,115,22,0.6)] font-label text-xs uppercase tracking-widest">Login / Sign Up</a>
</div>
</main>

<?php echo $__env->make('frontend.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script src="<?php echo e(asset('js/frontend-api.js')); ?>"></script>
<script>
  async function loadWishlist() {
    const grid = document.getElementById('wishlist-grid');
    const empty = document.getElementById('wishlist-empty');
    const loginEl = document.getElementById('wishlist-login');
    const countEl = document.getElementById('wishlist-count');

    const res = await FrontendAPI.getWishlist();

    if (!res.success && res.message === 'Please login first.') {
      grid.classList.add('hidden');
      loginEl.classList.remove('hidden');
      countEl.textContent = '';
      return;
    }

    if (res.success && res.data && res.data.length > 0) {
      grid.classList.remove('hidden');
      empty.classList.add('hidden');
      loginEl.classList.add('hidden');
      countEl.textContent = `${res.data.length} Saved High-Performance Assets`;

      let html = res.data.map(item => DOMUtils.wishlistCard(item)).join('');
      // Discover more card
      html += `
      <article class="flex flex-col items-center justify-center border-2 border-dashed border-outline-variant/20 p-12 text-center bg-surface/50">
        <span class="material-symbols-outlined text-5xl text-neutral-700 mb-4">search</span>
        <h3 class="font-headline text-lg font-bold uppercase tracking-widest text-neutral-500 mb-2">Looking for more?</h3>
        <p class="font-body text-xs text-neutral-600 mb-6 max-w-[200px]">Our new drop just landed. Explore the latest in kinetic innovation.</p>
        <a href="<?php echo e(route('shop_page.html')); ?>" class="px-6 py-2 border border-outline-variant text-on-surface font-label text-[10px] tracking-widest uppercase hover:bg-white hover:text-black transition-all">Explore Shop</a>
      </article>`;
      grid.innerHTML = html;
    } else {
      grid.classList.add('hidden');
      empty.classList.remove('hidden');
      countEl.textContent = '0 Items';
    }
  }

  document.addEventListener('DOMContentLoaded', loadWishlist);
</script>
</body></html>
<?php /**PATH D:\CUI Data\6th Semester\Advance Web\AdvanceWebProject\resources\views\frontend\wishlist.blade.php ENDPATH**/ ?>