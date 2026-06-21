<!DOCTYPE html>

<html class="dark" lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>FS86 Sahiwal | Engineered for Performance</title>
  <meta name="description" content="FS86 Sahiwal - Your destination for high-performance sports gear, engineered for excellence. Explore our premium collection of professional bats and equipment." />
  <link rel="icon" type="image/jpg" href="{{ asset('assets/logo.jpg') }}" />

  <link
    href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700;800;900&amp;display=swap"
    rel="stylesheet" />
  <link
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
    rel="stylesheet" />
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
            "inverse-surface": "#fefbf9",
            "surface-container-low": "#151515",
            "surface-container-lowest": "#050505",
            "on-primary-fixed-variant": "#c2410c",
            "on-error": "#7f1d1d",
            "on-primary-container": "#7c2d12",
            "primary": "#f97316",
            "on-tertiary": "#ffffff",
            "secondary-fixed": "#fed7aa",
            "on-background": "#ffffff",
            "secondary-fixed-dim": "#fdba74",
            "inverse-on-surface": "#3a3a3a",
            "tertiary-fixed": "#fca5a5",
            "on-secondary": "#ffffff",
            "on-secondary-fixed": "#7c2d12",
            "on-tertiary-fixed-variant": "#991b1b",
            "on-secondary-fixed-variant": "#9a3412",
            "secondary-dim": "#ea580c",
            "on-tertiary-container": "#450a0a",
            "surface-dim": "#0f0f0f",
            "on-surface-variant": "#bbbbbb",
            "secondary": "#fb923c",
            "surface": "#121212",
            "tertiary-fixed-dim": "#f87171",
            "on-primary-fixed": "#9a3412",
            "surface-tint": "#f97316",
            "on-primary": "#ffffff",
            "primary-dim": "#ea580c",
            "on-error-container": "#fca5a5",
            "surface-container-highest": "#282828",
            "error": "#ef4444",
            "tertiary": "#dc2626",
            "on-surface": "#ffffff",
            "surface-variant": "#242424",
            "error-dim": "#dc2626",
            "primary-container": "#fb923c",
            "surface-container": "#1c1c1c",
            "surface-container-high": "#1f1f1f"
          },
          fontFamily: {
            "headline": ["Nunito"],
            "body": ["Nunito"],
            "label": ["Nunito"]
          },
          borderRadius: { "DEFAULT": "0.125rem", "lg": "0.25rem", "xl": "0.5rem", "full": "0.75rem" },
        },
      },
    }
  </script>


  <style>
    .material-symbols-outlined {
      font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
    }

    .text-shadow-hero {
      text-shadow: 0 4px 12px rgba(0, 0, 0, 0.8);
    }
  </style>
</head>

<body class="bg-background text-on-background font-body selection:bg-primary selection:text-on-primary">
  <!-- TopNavBar with Page Navigation -->
  @include('frontend.header')

  <main class="pt-20">
    <!-- Hero Section -->
    <section class="relative h-[921px] w-full overflow-hidden flex items-center">
      <div class="absolute inset-0 z-0">
        <img alt="High Performance Athlete" class="w-full h-full object-cover grayscale brightness-50 contrast-125"
          src="{{ asset('assets/image/hero.jpeg') }}" />
        <div class="absolute inset-0 bg-gradient-to-t from-background via-transparent to-transparent"></div>
      </div>
      <div class="relative z-10 max-w-7xl mx-auto px-8 w-full">
        <div class="max-w-2xl">
          <span class="font-label text-primary text-sm uppercase tracking-widest mb-4 block">Engineered for
            Victory</span>
          <h1
            class="font-headline text-6xl md:text-8xl font-black italic tracking-tighter leading-none mb-6 text-shadow-hero">
            LIMITLESS<br />VELOCITY.
          </h1>
          <p class="font-body text-lg text-white/80 mb-8 max-w-lg">
            Premium sports equipment for the modern curator. From precision bats to elite performance gear, we bridge
            the gap between science and sport.
          </p>
          <div class="flex gap-4">
            <a href="{{ route('shop_page.html') }}"
              class="bg-gradient-to-br from-primary to-error text-white shadow-[0_4px_10px_rgba(249,115,22,0.4)] hover:shadow-[0_6px_15px_rgba(249,115,22,0.6)] px-8 py-4 font-headline font-bold rounded-md hover:bg-primary-dim transition-all duration-300 transform active:scale-95">
              SHOP NEW COLLECTION
            </a>
            <a href="{{ route('about_us.html') }}"
              class="bg-transparent border border-outline-variant text-on-surface px-8 py-4 font-headline font-bold rounded-md hover:bg-white/10 transition-all">
              VIEW MANIFESTO
            </a>
          </div>
        </div>
      </div>
    </section>

    <!-- New Arrivals: Dynamic Bento Grid Layout -->
    <section class="py-24 bg-surface-container-lowest">
      <div class="max-w-7xl mx-auto px-8">
        <div class="flex justify-between items-end mb-12">
          <div>
            <h2 class="font-headline text-4xl font-black italic tracking-tighter">NEW ARRIVALS</h2>
            <p class="font-label text-on-surface-variant mt-2 uppercase">Latest Performance Drops</p>
          </div>
          <a class="font-label text-primary hover:underline transition-all" href="{{ route('shop_page.html') }}">EXPLORE ALL GEAR →</a>
        </div>
        <!-- Dynamic Product Grid -->
        <div id="featured-products-grid" class="grid grid-cols-1 md:grid-cols-4 gap-6">
          @forelse ($featuredProducts as $i => $product)
            @php
              $isDiscounted = $product->discount_percentage > 0 && $product->discounted_price !== null;
              $gridClass = ($i === 0 || $i === 5) ? 'md:col-span-2 md:row-span-2' : '';
              $minHeight = ($i === 0 || $i === 5) ? 'min-h-[500px]' : 'min-h-[300px]';
              $initials = strtoupper(substr($product->title ?: 'FS', 0, 2));
            @endphp
            <div class="{{ $gridClass }} relative group overflow-hidden rounded-xl cursor-pointer {{ $minHeight }}"
                 style="background:linear-gradient(135deg,#1a1a1a,#0a0a0a);"
                 onclick="window.location.href='/product/{{ $product->id }}'">

              <!-- Background Image (Animated on Hover) -->
              <img alt="{{ $product->title }}" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 opacity-80"
                   @if(Str::startsWith($product->image, ['http://', 'https://']))
                     src="{{ $product->image }}"
                   @else
                     src="{{ asset('storage/' . $product->image) }}"
                   @endif
                   onerror="this.style.display='none';this.nextElementSibling.style.display='flex'" />

              <!-- Placeholder display when no image -->
              <div style="display:none;background:linear-gradient(135deg,#111,#1a1a1a);" class="absolute inset-0 items-center justify-center">
                  <span style="color:#f97316;font-size:3rem;font-weight:900;">{{ $initials }}</span>
              </div>

              <!-- Gradient Overlay -->
              <div class="absolute inset-0 bg-gradient-to-t from-background via-background/20 to-transparent"></div>

              <!-- Top Badges -->
              <div class="absolute top-4 left-4 flex gap-2 z-10">
                <span class="bg-tertiary text-on-tertiary font-label text-[10px] px-2 py-0.5 uppercase font-bold rounded-sm shadow-lg">
                  {{ $i === 0 ? 'Featured' : 'New Drop' }}
                </span>
                @if($product->is_in_house_brand == 1)
                  <span class="bg-primary-container text-on-primary-container font-label text-[10px] px-2 py-0.5 uppercase font-bold rounded-sm shadow-lg">In-House</span>
                @endif
              </div>
              @if($isDiscounted)
                <span class="bg-gradient-to-r from-orange-500 to-red-600 text-white font-headline font-black text-xs px-3 py-1.5 uppercase rounded shadow-lg tracking-wider absolute top-4 right-4 z-10">{{ $product->discount_percentage }}% OFF</span>
              @endif

              <!-- Bottom Content -->
              <div class="absolute bottom-6 left-6 right-6 z-10">
                <p class="font-label text-primary font-bold text-[10px] uppercase tracking-widest mb-1 shadow-sm font-black drop-shadow-[0_1px_1px_rgba(0,0,0,0.8)]">
                  {{ $product->category ? $product->category->title : 'Performance Gear' }}
                </p>
                <h3 class="font-headline text-2xl font-black text-white italic leading-tight mb-2 drop-shadow-[0_2px_4px_rgba(0,0,0,0.8)] translate-y-2 group-hover:translate-y-0 transition-transform duration-300">
                  {{ $product->title }}
                </h3>
                <div class="flex items-center justify-between opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                  <span class="font-headline font-bold text-primary text-xl drop-shadow-[0_2px_4px_rgba(0,0,0,0.8)] flex items-center gap-2">
                      @if($isDiscounted)
                        Rs. {{ number_format($product->discounted_price, 0, '.', '') }} <span class="text-slate-400 line-through text-xs font-normal">Rs. {{ number_format($product->price, 0, '.', '') }}</span>
                      @else
                        Rs. {{ number_format($product->price, 0, '.', '') }}
                      @endif
                  </span>
                  <button onclick="event.stopPropagation(); addToCartHandler({{ $product->id }})"
                    class="bg-gradient-to-br from-primary to-error text-white font-headline font-black px-6 py-2 rounded shadow-[0_4px_15px_rgba(249,115,22,0.4)] transform translate-y-4 group-hover:translate-y-0 transition-all duration-300 hover:scale-105 active:scale-95 text-xs">
                    ADD TO BAG
                  </button>
                </div>
              </div>
            </div>
          @empty
            <div class="md:col-span-4 text-center py-20">
              <span class="material-symbols-outlined text-6xl text-outline-variant mb-4 block">inventory_2</span>
              <p class="font-headline text-xl text-on-surface-variant">No products yet. Add products in the admin panel!</p>
            </div>
          @endforelse
        </div>
      </div>
    </section>

    <!-- In-House Brand Highlights -->
    <section class="py-24 bg-surface overflow-hidden">
      <div class="max-w-7xl mx-auto px-8 relative">
        <div class="absolute -right-20 top-0 opacity-10 select-none">
          <span class="font-headline text-[15rem] font-black italic leading-none">FS ELITE</span>
        </div>
        <div class="relative z-10 grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
          <div>
            <span class="font-label text-primary font-bold tracking-widest mb-4 block">CRAFTING THE FUTURE</span>
            <h2 class="font-headline text-5xl font-black italic tracking-tighter mb-8">IN-HOUSE<br />ENGINEERING.</h2>
            <div class="space-y-10">
              <div class="flex gap-6">
                <div class="w-12 h-12 flex-shrink-0 bg-primary-container rounded-md flex items-center justify-center">
                  <span class="material-symbols-outlined text-on-primary-container"
                    style="font-variation-settings: 'FILL' 1;">sports_cricket</span>
                </div>
                <div>
                  <h4 class="font-headline font-bold text-xl mb-2">The FS Bat Series Premium</h4>
                  <p class="font-body text-on-surface-variant">English Willow crafted for professional boundary hitters. Features a sleek 35.5–36 inch profile, an ultra-lightweight 800–820 gram pick-up, and an expanded 8-inch sweet spot.</p>
                </div>
              </div>
              <div class="flex gap-6">
                <div class="w-12 h-12 flex-shrink-0 bg-secondary-container rounded-md flex items-center justify-center">
                  <span class="material-symbols-outlined text-secondary"
                    style="font-variation-settings: 'FILL' 1;">sports_volleyball</span>
                </div>
                <div>
                  <h4 class="font-headline font-bold text-xl mb-2">The FS Match Ball Series</h4>
                  <p class="font-body text-on-surface-variant">Premium alum-tanned tennis balls custom-branded for high-visibility match play. Engineered with heavy-duty felt for maximum bounce retention and ultimate seam stability.</p>
                </div>
              </div>
            </div>
            <a href="{{ route('shop_page.html') }}"
              class="mt-12 group flex items-center gap-4 text-primary font-headline font-bold italic tracking-tighter text-xl">
              EXPLORE THE FS LAB
              <span
                class="material-symbols-outlined group-hover:translate-x-2 transition-transform">arrow_forward</span>
            </a>
          </div>
          <div class="relative">
            <div class="aspect-square bg-surface-container-low rounded-lg overflow-hidden border border-white/5">
              <img alt="FS Workshop" class="w-full h-full object-cover"
                src="{{ asset('assets/HomePage.jpg') }}" />
            </div>
            <div class="absolute -bottom-10 -left-10 w-64 h-64 bg-primary p-8 rounded-lg shadow-2xl hidden md:block">
              <h5 class="font-headline text-on-primary font-black italic text-2xl mb-4">ULTIMATE PERFORMANCE TESTED</h5>
              <p class="font-body text-on-primary/80 text-sm">Every piece of gear undergoes 24 hours of rigorous
                mechanical testing before shipment.</p>
            </div>
          </div>
        </div>
      </div>
    </section>



  </main>

  <!-- Footer -->
  @include('frontend.footer')
</body>

</html>
