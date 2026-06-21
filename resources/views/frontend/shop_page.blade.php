<!DOCTYPE html>

<html class="dark" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>FS86 Sahiwal | Premium Sports Inventory & Equipment</title>
<meta name="description" content="Discover elite-performance bats, balls, and athletic gear at FS86 Sahiwal. Engineered for professionals, available to everyone." />
<link rel="icon" type="image/jpg" href="{{ asset('assets/logo.jpg') }}" />

<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700;800;900&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<meta name="csrf-token" content="{{ csrf_token() }}">
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

@include('frontend.header')

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
@php
  $selectedCategories = is_array(request('category')) ? request('category') : (request()->has('category') && request('category') !== '' ? [request('category')] : []);
@endphp
<form id="filter-form" method="GET" action="{{ route('shop_page.html') }}" class="flex flex-col lg:flex-row gap-12 w-full">
<!-- Sidebar Filtering (Dynamic Categories) -->
<aside class="w-full lg:w-72 flex-shrink-0 space-y-10">
<section>
<h3 class="font-label text-xs uppercase tracking-widest text-primary mb-6">Categories</h3>
<ul id="category-filters" class="space-y-4 font-body">
  <li>
    <a href="{{ route('shop_page.html', request()->except('category')) }}" class="flex items-center gap-3 cursor-pointer group">
      <span class="w-4 h-4 rounded-full border border-outline-variant group-hover:border-primary flex items-center justify-center {{ empty($selectedCategories) ? 'bg-primary border-primary' : '' }}">
        @if(empty($selectedCategories)) <div class="w-2 h-2 rounded-full bg-background"></div> @endif
      </span>
      <span class="{{ empty($selectedCategories) ? 'text-primary font-bold' : 'group-hover:text-primary transition-colors' }}">All</span>
    </a>
  </li>
  @foreach ($categories as $cat)
    <li>
      <label class="flex items-center gap-3 cursor-pointer group">
        <input type="checkbox" name="category[]" value="{{ $cat->id }}" class="w-4 h-4 bg-surface-container-highest border-none rounded text-primary focus:ring-primary ring-offset-background" {{ in_array($cat->id, $selectedCategories) ? 'checked' : '' }} onchange="this.form.submit()"/>
        <span class="group-hover:text-primary transition-colors">{{ $cat->category_name }}</span>
      </label>
    </li>
  @endforeach
</ul>
</section>
<section>
<h3 class="font-label text-xs uppercase tracking-widest text-primary mb-6">Price Range</h3>
<div class="px-2">
<input id="price-range" name="price" class="w-full h-1 bg-surface-container-highest appearance-none rounded-full accent-primary cursor-pointer" type="range" min="0" max="15000" value="{{ request('price', 15000) }}" onchange="this.form.submit()"/>
<div class="flex justify-between mt-4 font-label text-sm text-on-surface-variant">
<span>Rs. 0</span>
<span id="price-max-label">Rs. {{ number_format(request('price', 15000)) }}+</span>
</div>
</div>
</section>
<section>
<h3 class="font-label text-xs uppercase tracking-widest text-primary mb-6">Brand Heritage</h3>
<ul class="space-y-4 font-body">
<li><label class="flex items-center gap-3 cursor-pointer group"><input id="filter-inhouse" name="in_house" value="1" class="w-4 h-4 bg-surface-container-highest border-none rounded text-primary focus:ring-primary ring-offset-background" type="checkbox" {{ request('in_house') == '1' ? 'checked' : '' }} onchange="this.form.submit()"/><span class="group-hover:text-primary transition-colors">In-House Brand Only</span></label></li>
</ul>
</section>
<a href="{{ route('shop_page.html') }}" class="block text-center w-full py-3 bg-surface-container-highest hover:bg-surface-bright transition-colors font-label text-xs uppercase tracking-widest text-white">
                    Reset Filters
                </a>
</aside>
<!-- Product Grid Area -->
<div class="flex-1">
<!-- Category Toggles (Top of Grid) -->
<div id="category-tabs" class="flex flex-wrap gap-3 mb-10 pb-8 border-b border-outline-variant/15">
<a href="{{ route('shop_page.html', request()->except('category')) }}" class="px-6 py-2 {{ empty($selectedCategories) ? 'bg-gradient-to-br from-primary to-error text-white shadow-[0_4px_10px_rgba(249,115,22,0.4)]' : 'bg-surface-container-low text-on-surface-variant hover:text-white' }} font-label text-sm rounded-md transition-all">All Gear</a>
@foreach ($categories as $cat)
  @php
    $catRouteParams = request()->except('category');
    $newCats = in_array($cat->id, $selectedCategories) ? array_diff($selectedCategories, [$cat->id]) : array_merge($selectedCategories, [$cat->id]);
    if (!empty($newCats)) $catRouteParams['category'] = $newCats;
  @endphp
  <a href="{{ route('shop_page.html', $catRouteParams) }}" class="px-6 py-2 {{ in_array($cat->id, $selectedCategories) ? 'bg-gradient-to-br from-primary to-error text-white shadow-[0_4px_10px_rgba(249,115,22,0.4)]' : 'bg-surface-container-low text-on-surface-variant hover:text-white' }} font-label text-sm rounded-md transition-all">{{ $cat->category_name }}</a>
@endforeach

@php
  $hasDiscounts = \App\Models\ProductsInventory::where('is_activated', 1)->where('discount_percentage', '>', 0)->exists();
@endphp
@if ($hasDiscounts)
  @php
    $discRouteParams = request()->except('category');
    $newDiscCats = in_array('discount', $selectedCategories) ? array_diff($selectedCategories, ['discount']) : array_merge($selectedCategories, ['discount']);
    if (!empty($newDiscCats)) $discRouteParams['category'] = $newDiscCats;
  @endphp
  <a href="{{ route('shop_page.html', $discRouteParams) }}" class="px-6 py-2 {{ in_array('discount', $selectedCategories) ? 'bg-gradient-to-br from-primary to-error text-white shadow-[0_4px_10px_rgba(249,115,22,0.4)]' : 'bg-surface-container-low text-on-surface-variant hover:text-white' }} font-label text-sm rounded-md transition-all">Discount</a>
@endif
</div>
<!-- Product Grid - Dynamic -->
@if ($products->isEmpty())
  <div id="empty-state" class="text-center py-20">
    <span class="material-symbols-outlined text-6xl text-outline-variant mb-4">inventory_2</span>
    <p class="font-headline text-xl text-on-surface-variant">No products found.</p>
    <p class="font-body text-on-surface-variant mt-2">Try adjusting your filters or add products in the admin panel.</p>
  </div>
@else
  <div id="product-grid" class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
    @foreach ($products as $product)
      <div class="product-card group relative bg-surface-container-low rounded-xl overflow-hidden transition-all duration-500 hover:scale-[1.02] cursor-pointer min-h-[380px]"
           onclick="window.location.href='/product/{{ $product->id }}'">
          <div class="aspect-[4/5] relative overflow-hidden flex items-center justify-center" style="background:linear-gradient(135deg,#111,#1a1a1a);">
              @if ($product->image)
                  <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                       @if(Str::startsWith($product->image, ['http://', 'https://'])) src="{{ $product->image }}" @else src="{{ asset('storage/' . $product->image) }}" @endif alt="{{ $product->title }}"
                       onerror="this.style.display='none';this.nextElementSibling.style.display='flex'" />
                  <div style="display:none;" class="absolute inset-0 items-center justify-center">
                      <span class="text-primary font-black text-5xl">{{ strtoupper(substr($product->title ?? 'FS', 0, 2)) }}</span>
                  </div>
              @else
                  <span class="text-primary font-black text-5xl">{{ strtoupper(substr($product->title ?? 'FS', 0, 2)) }}</span>
              @endif
              <div class="absolute top-4 left-4 flex flex-col gap-2">
                  <span class="bg-tertiary text-on-tertiary font-label text-[10px] px-2 py-1 uppercase tracking-tighter font-bold">New Arrival</span>
                  @if ($product->is_in_house_brand == 1)
                      <span class="bg-secondary-container text-secondary font-label text-[10px] px-2 py-1 uppercase tracking-tighter font-bold">In-House Brand</span>
                  @endif
              </div>
              @if ($product->discount_percentage > 0 && $product->discounted_price !== null)
                  <span class="bg-gradient-to-r from-orange-500 to-red-600 text-white font-headline font-black text-xs px-3 py-1.5 uppercase rounded shadow-lg tracking-wider absolute top-4 right-4 z-10">{{ $product->discount_percentage }}% OFF</span>
              @endif
          </div>
          <div class="p-6">
              <div class="flex justify-between items-start mb-2">
                  <h3 class="text-xl font-headline font-bold text-on-surface tracking-tight group-hover:text-primary transition-colors">{{ $product->title }}</h3>
                  @if ($product->discount_percentage > 0 && $product->discounted_price !== null)
                      <div class="flex items-center gap-2">
                          <span class="font-label text-primary font-bold text-lg">Rs. {{ number_format($product->discounted_price, 0) }}</span>
                          <span class="text-slate-400 line-through text-xs">Rs. {{ number_format($product->price, 0) }}</span>
                      </div>
                  @else
                      <span class="font-label text-primary font-bold">Rs. {{ number_format($product->price, 0) }}</span>
                  @endif
              </div>
              <p class="text-sm text-on-surface-variant font-body mb-6 line-clamp-2">{{ $product->description ?? 'Premium performance gear' }}</p>
              <button class="add-to-cart-btn w-full py-3 bg-white/5 group-hover:bg-primary group-hover:text-on-primary transition-all font-label text-xs uppercase tracking-widest"
                      data-product-id="{{ $product->id }}" onclick="event.stopPropagation(); addToCartHandler({{ $product->id }})">
                  Add to Kit
              </button>
          </div>
      </div>
    @endforeach
  </div>
  
  <div class="mt-12 flex justify-center">
    {{ $products->links() }}
  </div>
@endif
</div>
</form>
</main>

@include('frontend.footer')

<script src="{{ asset('js/frontend-api.js') }}"></script>
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const priceRange = document.getElementById('price-range');
    const priceMaxLabel = document.getElementById('price-max-label');
    if (priceRange && priceMaxLabel) {
      priceRange.addEventListener('input', (e) => {
        priceMaxLabel.textContent = `Rs. ${new Intl.NumberFormat().format(e.target.value)}`;
      });
    }
  });
</script>
</body></html>
