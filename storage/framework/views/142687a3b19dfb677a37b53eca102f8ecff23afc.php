<!DOCTYPE html>

<html class="dark" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>FS86 Sahiwal | Premium Sports Inventory & Equipment</title>
<meta name="description" content="Discover elite-performance bats, balls, and athletic gear at FS86 Sahiwal. Engineered for professionals, available to everyone." />
<link rel="icon" type="image/jpg" href="<?php echo e(asset('assets/logo.jpg')); ?>" />

<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700;800;900&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            colors: {
              "surface-bright": "#2c2c2c",
              "tertiary-container": "#b91c1c",
              "on-secondary-container": "#fed7aa",
              "outline": "#767575",
              "error-container": "#9f0519",
              "inverse-primary": "#9a3412",
              "outline-variant": "#484847",
              "secondary-container": "#7c2d12",
              "primary-fixed": "#fdba74",
              "primary-fixed-dim": "#fb923c",
              "on-tertiary-fixed": "#450a0a",
              "tertiary-dim": "#b91c1c",
              "background": "#090909",
              "inverse-surface": "#fcf9f8",
              "surface-container-low": "#131313",
              "surface-container-lowest": "#000000",
              "on-primary-fixed-variant": "#c2410c",
              "on-error": "#7f1d1d",
              "on-primary-container": "#7c2d12",
              "primary": "#f97316",
              "on-tertiary": "#ffffff",
              "secondary-fixed": "#fed7aa",
              "on-background": "#ffffff",
              "secondary-fixed-dim": "#fdba74",
              "inverse-on-surface": "#565555",
              "tertiary-fixed": "#fca5a5",
              "on-secondary": "#ffffff",
              "on-secondary-fixed": "#7c2d12",
              "on-tertiary-fixed-variant": "#991b1b",
              "on-secondary-fixed-variant": "#9a3412",
              "secondary-dim": "#ea580c",
              "on-tertiary-container": "#450a0a",
              "surface-dim": "#090909",
              "on-surface-variant": "#adaaaa",
              "secondary": "#fb923c",
              "surface": "#090909",
              "tertiary-fixed-dim": "#f87171",
              "on-primary-fixed": "#9a3412",
              "surface-tint": "#f97316",
              "on-primary": "#ffffff",
              "primary-dim": "#ea580c",
              "on-error-container": "#fca5a5",
              "surface-container-highest": "#262626",
              "error": "#ef4444",
              "tertiary": "#dc2626",
              "on-surface": "#ffffff",
              "surface-variant": "#262626",
              "error-dim": "#dc2626",
              "primary-container": "#fb923c",
              "surface-container": "#1a1a1a",
              "surface-container-high": "#20201f"
            },
            fontFamily: {
              "headline": ["Nunito"],
              "body": ["Nunito"],
              "label": ["Nunito"]
            },
            borderRadius: {"DEFAULT": "0.125rem", "lg": "0.25rem", "xl": "0.5rem", "full": "0.75rem"},
          },
        },
      }
    </script>


<style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            vertical-align: middle;
        }
        body { font-family: 'Nunito', sans-serif; }
    </style>
</head>
<body class="bg-background text-on-background selection:bg-primary selection:text-on-primary">

<?php echo $__env->make('frontend.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<main class="pt-32 pb-20 px-8 max-w-[1600px] mx-auto min-h-screen">
<!-- Shop Header & Editorial Text -->
<div class="mb-16">
<h1 class="text-6xl md:text-8xl font-black font-headline tracking-tighter text-on-surface leading-none mb-4 uppercase">
                Peak<br/><span class="text-primary italic">Performance.</span>
</h1>
<p class="max-w-xl text-on-surface-variant font-body text-lg">
                Engineered for the elite. Our curated selection of high-velocity gear represents the intersection of technical innovation and raw athletic power.
            </p>
</div>
<div class="flex flex-col lg:flex-row gap-12">
<!-- Sidebar Filtering (Dynamic Categories) -->
<aside class="w-full lg:w-72 flex-shrink-0 space-y-10">
<section>
<h3 class="font-label text-xs uppercase tracking-widest text-primary mb-6">Categories</h3>
<ul id="category-filters" class="space-y-4 font-body">
  <!-- Dynamic categories loaded via API -->
  <li class="skeleton-pulse h-6 rounded"></li>
  <li class="skeleton-pulse h-6 rounded"></li>
  <li class="skeleton-pulse h-6 rounded"></li>
</ul>
</section>
<section>
<h3 class="font-label text-xs uppercase tracking-widest text-primary mb-6">Price Range</h3>
<div class="px-2">
<input id="price-range" class="w-full h-1 bg-surface-container-highest appearance-none rounded-full accent-primary cursor-pointer" type="range" min="0" max="1500" value="1500"/>
<div class="flex justify-between mt-4 font-label text-sm text-on-surface-variant">
<span>Rs. 0</span>
<span id="price-max-label">Rs. 1500+</span>
</div>
</div>
</section>
<section>
<h3 class="font-label text-xs uppercase tracking-widest text-primary mb-6">Brand Heritage</h3>
<ul class="space-y-4 font-body">
<li><label class="flex items-center gap-3 cursor-pointer group"><input id="filter-inhouse" class="w-4 h-4 bg-surface-container-highest border-none rounded text-primary focus:ring-primary ring-offset-background" type="checkbox"/><span class="group-hover:text-primary transition-colors">In-House Brand Only</span></label></li>
</ul>
</section>
<button onclick="resetFilters()" class="w-full py-3 bg-surface-container-highest hover:bg-surface-bright transition-colors font-label text-xs uppercase tracking-widest text-white">
                    Reset Filters
                </button>
</aside>
<!-- Product Grid Area -->
<div class="flex-1">
<!-- Category Toggles (Top of Grid) -->
<div id="category-tabs" class="flex flex-wrap gap-3 mb-10 pb-8 border-b border-outline-variant/15">
<button class="px-6 py-2 bg-gradient-to-br from-primary to-error text-white shadow-[0_4px_10px_rgba(249,115,22,0.4)] hover:shadow-[0_6px_15px_rgba(249,115,22,0.6)] font-label text-sm rounded-md transition-all scale-100 hover:brightness-110" onclick="filterByCategory(null)">All Gear</button>
</div>
<!-- Product Grid - Dynamic -->
<div id="product-grid" class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
  <!-- Skeleton Loading -->
  <div class="bg-surface-container-low h-[450px] skeleton-pulse"></div>
  <div class="bg-surface-container-low h-[450px] skeleton-pulse"></div>
  <div class="bg-surface-container-low h-[450px] skeleton-pulse"></div>
</div>
<!-- Empty State -->
<div id="empty-state" class="hidden text-center py-20">
  <span class="material-symbols-outlined text-6xl text-outline-variant mb-4">inventory_2</span>
  <p class="font-headline text-xl text-on-surface-variant">No products found.</p>
  <p class="font-body text-on-surface-variant mt-2">Try adjusting your filters or add products in the admin panel.</p>
</div>
</div>
</div>
</main>

<?php echo $__env->make('frontend.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script src="<?php echo e(asset('js/frontend-api.js')); ?>"></script>
<script>
  let allProducts = [];
  let allCategories = [];
  let activeCategory = null;

  document.addEventListener('DOMContentLoaded', async () => {
    await loadProducts();
    await loadCategories();

    // Price range filter
    document.getElementById('price-range').addEventListener('input', (e) => {
      document.getElementById('price-max-label').textContent = `Rs. ${e.target.value}`;
      renderProducts();
    });

    // In-house filter
    document.getElementById('filter-inhouse').addEventListener('change', () => {
      renderProducts();
    });
  });

  async function loadCategories() {
    const res = await FrontendAPI.getCategories();
    if (res.success && res.data) {
      allCategories = res.data;
      const filterEl = document.getElementById('category-filters');
      const tabsEl = document.getElementById('category-tabs');

      let filterHtml = '<li><label class="flex items-center gap-3 cursor-pointer group"><input type="checkbox" id="cb-all" class="category-cb w-4 h-4 bg-surface-container-highest border-none rounded text-primary focus:ring-primary ring-offset-background" value="" checked onchange="toggleAllCategories(this)"/><span class="group-hover:text-primary transition-colors">All</span></label></li>';
      let tabsHtml = '<button class="category-tab px-6 py-2 bg-gradient-to-br from-primary to-error text-white shadow-[0_4px_10px_rgba(249,115,22,0.4)] hover:shadow-[0_6px_15px_rgba(249,115,22,0.6)] font-label text-sm rounded-md transition-all" data-id="" onclick="filterByCategory(null)">All Gear</button>';

      allCategories.forEach(cat => {
        filterHtml += `<li><label class="flex items-center gap-3 cursor-pointer group"><input type="checkbox" class="category-cb w-4 h-4 bg-surface-container-highest border-none rounded text-primary focus:ring-primary ring-offset-background" value="${cat.id}" checked onchange="toggleCategoryCheckbox()"/><span class="group-hover:text-primary transition-colors">${cat.category_name}</span></label></li>`;
        tabsHtml += `<button class="category-tab px-6 py-2 bg-surface-container-low text-on-surface-variant font-label text-sm rounded-md hover:text-white transition-all" data-id="${cat.id}" onclick="filterByCategory(${cat.id})">${cat.category_name}</button>`;
      });

      const hasDiscount = allProducts.some(p => p.discount_percentage > 0);
      if (hasDiscount) {
        tabsHtml += `<button class="category-tab px-6 py-2 bg-surface-container-low text-on-surface-variant font-label text-sm rounded-md hover:text-white transition-all" data-id="discount" onclick="filterByCategory('discount')">Discount</button>`;
      }

      filterEl.innerHTML = filterHtml;
      tabsEl.innerHTML = tabsHtml;
    }
  }

  async function loadProducts() {
    const res = await FrontendAPI.getProducts();
    if (res.success && res.data) {
      allProducts = res.data;
      renderProducts();
    }
  }

  function toggleAllCategories(masterCb) {
    document.querySelectorAll('.category-cb').forEach(cb => {
      cb.checked = masterCb.checked;
    });
    syncTabsFromCheckboxes();
    renderProducts();
  }

  function toggleCategoryCheckbox() {
    const allCb = document.getElementById('cb-all');
    const individualCbs = document.querySelectorAll('.category-cb:not(#cb-all)');
    const checkedCbs = document.querySelectorAll('.category-cb:not(#cb-all):checked');
    
    if (allCb) {
      allCb.checked = (individualCbs.length === checkedCbs.length);
    }
    syncTabsFromCheckboxes();
    renderProducts();
  }

  function syncTabsFromCheckboxes() {
    const checkedCbs = Array.from(document.querySelectorAll('.category-cb:not(#cb-all):checked'));
    const totalCbs = document.querySelectorAll('.category-cb:not(#cb-all)').length;
    const allCb = document.getElementById('cb-all');
    const isAllChecked = allCb ? allCb.checked : false;

    if (isAllChecked || checkedCbs.length === totalCbs) {
      activeCategory = null;
      updateTabStyles(null);
    } else if (checkedCbs.length === 1) {
      activeCategory = parseInt(checkedCbs[0].value);
      updateTabStyles(activeCategory);
    } else {
      activeCategory = null;
      // Deactivate all tabs since multiple/none are selected
      document.querySelectorAll('.category-tab').forEach(tab => {
        tab.className = 'category-tab px-6 py-2 bg-surface-container-low text-on-surface-variant font-label text-sm rounded-md hover:text-white transition-all';
      });
    }
  }

  function updateTabStyles(activeId) {
    document.querySelectorAll('.category-tab').forEach(tab => {
      const tabId = tab.dataset.id;
      if ((activeId === null && tabId === '') || String(activeId) === tabId) {
        tab.className = 'category-tab px-6 py-2 bg-gradient-to-br from-primary to-error text-white shadow-[0_4px_10px_rgba(249,115,22,0.4)] hover:shadow-[0_6px_15px_rgba(249,115,22,0.6)] font-label text-sm rounded-md transition-all scale-100 hover:brightness-110';
      } else {
        tab.className = 'category-tab px-6 py-2 bg-surface-container-low text-on-surface-variant font-label text-sm rounded-md hover:text-white transition-all';
      }
    });
  }

  function filterByCategory(catId) {
    activeCategory = catId;
    
    const allCb = document.getElementById('cb-all');
    if (allCb) {
      if (catId === null) {
        allCb.checked = true;
        document.querySelectorAll('.category-cb').forEach(cb => cb.checked = true);
      } else if (catId === 'discount') {
        allCb.checked = false;
        document.querySelectorAll('.category-cb').forEach(cb => cb.checked = false);
      } else {
        allCb.checked = false;
        document.querySelectorAll('.category-cb:not(#cb-all)').forEach(cb => {
          cb.checked = (parseInt(cb.value) === catId);
        });
      }
    }

    updateTabStyles(catId);
    renderProducts();
  }

  function renderProducts() {
    const maxPrice = parseFloat(document.getElementById('price-range').value);
    const inHouseOnly = document.getElementById('filter-inhouse').checked;

    const checkedCbs = Array.from(document.querySelectorAll('.category-cb:not(#cb-all):checked')).map(cb => parseInt(cb.value));
    const allCb = document.getElementById('cb-all');
    const isAllChecked = allCb ? allCb.checked : true;

    let filtered = allProducts.filter(p => {
      if (activeCategory === 'discount') {
        if (!(p.discount_percentage > 0)) return false;
      } else {
        // If "All" checkbox is not checked, filter by checked individual categories
        if (!isAllChecked) {
          if (checkedCbs.length > 0) {
            if (!checkedCbs.includes(p.category_id)) return false;
          } else {
            return false; // Show nothing if no category checked
          }
        }
      }
      const effectivePrice = (p.discounted_price !== null && p.discounted_price !== undefined) ? p.discounted_price : p.price;
      if (effectivePrice > maxPrice) return false;
      if (inHouseOnly && p.is_in_house_brand != 1) return false;
      return true;
    });

    const grid = document.getElementById('product-grid');
    const emptyState = document.getElementById('empty-state');

    if (filtered.length === 0) {
      grid.classList.add('hidden');
      emptyState.classList.remove('hidden');
      return;
    }

    grid.classList.remove('hidden');
    emptyState.classList.add('hidden');

    grid.innerHTML = filtered.map(product => DOMUtils.productCard(product, `/product/${product.id}`)).join('');
  }

  function resetFilters() {
    document.getElementById('price-range').value = 1500;
    document.getElementById('price-max-label').textContent = 'Rs. 1500+';
    document.getElementById('filter-inhouse').checked = false;
    
    const allCb = document.getElementById('cb-all');
    if (allCb) allCb.checked = true;
    document.querySelectorAll('.category-cb').forEach(cb => cb.checked = true);
    
    filterByCategory(null);
  }
</script>
</body></html>
<?php /**PATH D:\CUI Data\6th Semester\Advance Web\AdvanceWebProject\resources\views\frontend\shop_page.blade.php ENDPATH**/ ?>