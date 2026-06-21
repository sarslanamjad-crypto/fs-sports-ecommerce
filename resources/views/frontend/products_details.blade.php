<!DOCTYPE html>
<html class="dark" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>FS86 Sahiwal | Professional Gear In-Depth</title>
<meta name="description" content="Explore the technical specifications and performance features of our elite sports gear." />
<link rel="icon" type="image/jpg" href="{{ asset('assets/logo.jpg') }}" />

<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700;800;900&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<script id="tailwind-config">
    tailwind.config = { darkMode:"class", theme:{ extend:{
      colors:{"surface-bright":"#2c2c2c","tertiary-container":"#b91c1c","on-secondary-container":"#fed7aa","outline":"#767575","error-container":"#9f0519","inverse-primary":"#9a3412","outline-variant":"#484847","secondary-container":"#7c2d12","primary-fixed":"#fdba74","primary-fixed-dim":"#fb923c","on-tertiary-fixed":"#450a0a","tertiary-dim":"#b91c1c","background":"#090909","inverse-surface":"#fcf9f8","surface-container-low":"#131313","surface-container-lowest":"#000000","on-primary-fixed-variant":"#c2410c","on-error":"#7f1d1d","on-primary-container":"#7c2d12","primary":"#f97316","on-tertiary":"#ffffff","secondary-fixed":"#fed7aa","on-background":"#ffffff","secondary-fixed-dim":"#fdba74","inverse-on-surface":"#565555","tertiary-fixed":"#fca5a5","on-secondary":"#ffffff","on-secondary-fixed":"#7c2d12","on-tertiary-fixed-variant":"#991b1b","on-secondary-fixed-variant":"#9a3412","secondary-dim":"#ea580c","on-tertiary-container":"#450a0a","surface-dim":"#090909","on-surface-variant":"#adaaaa","secondary":"#fb923c","surface":"#090909","tertiary-fixed-dim":"#f87171","on-primary-fixed":"#9a3412","surface-tint":"#f97316","on-primary":"#ffffff","primary-dim":"#ea580c","on-error-container":"#fca5a5","surface-container-highest":"#262626","error":"#ef4444","tertiary":"#dc2626","on-surface":"#ffffff","surface-variant":"#262626","error-dim":"#dc2626","primary-container":"#fb923c","surface-container":"#1a1a1a","surface-container-high":"#20201f"},
      fontFamily:{"headline":["Nunito"],"body":["Nunito"],"label":["Nunito"]},
      borderRadius:{"DEFAULT":"0.125rem","lg":"0.25rem","xl":"0.5rem","full":"0.75rem"}
    }}}
</script>


<style>
  .material-symbols-outlined { font-variation-settings:'FILL' 0,'wght' 400,'GRAD' 0,'opsz' 24; }
  body { background-color:#090909; color:#ffffff; font-family:'Nunito',sans-serif; }
</style>
</head>
<body class="bg-background text-on-background selection:bg-primary selection:text-on-primary">

@include('frontend.header')

<main class="pt-32 pb-20 px-8 max-w-7xl mx-auto min-h-screen">
  <!-- Breadcrumb -->
  <div class="mb-8 font-label text-sm text-on-surface-variant">
    <a href="{{ route('homepage.html') }}" class="hover:text-primary transition-colors">Home</a>
    <span class="mx-2">/</span>
    <a href="{{ route('shop_page.html') }}" class="hover:text-primary transition-colors">Shop</a>
    <span class="mx-2">/</span>
    <span id="breadcrumb-title" class="text-primary">{{ $product->title }}</span>
  </div>

  <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
    <!-- Product Image -->
    <div class="relative">
      <div id="product-image-container" class="aspect-square bg-surface-container-low rounded-lg overflow-hidden flex items-center justify-center">
        @if ($product->image)
          <img class="w-full h-full object-cover" src="{{ str_starts_with($product->image, 'http') ? $product->image : asset('storage/' . $product->image) }}" alt="{{ $product->title }}" onerror="this.style.display='none';this.nextElementSibling.style.display='flex'" />
          <div style="display:none;background:linear-gradient(135deg,#1a1a1a,#0a0a0a);" class="w-full h-full items-center justify-center">
            <span class="text-[#f97316] font-black text-8xl">{{ strtoupper(substr($product->title, 0, 2)) }}</span>
          </div>
        @else
          <div style="background:linear-gradient(135deg,#1a1a1a,#0a0a0a);" class="w-full h-full flex items-center justify-center">
            <span class="text-[#f97316] font-black text-8xl">{{ strtoupper(substr($product->title, 0, 2)) }}</span>
          </div>
        @endif
      </div>
    </div>

    <!-- Product Info -->
    <div class="flex flex-col">
      <div id="product-badges" class="flex gap-2 mb-4">
        <span class="bg-tertiary text-on-tertiary font-label text-xs px-3 py-1 uppercase font-bold">New Arrival</span>
        @if ($product->is_in_house_brand == 1)
          <span class="bg-secondary-container text-secondary font-label text-xs px-3 py-1 uppercase font-bold">In-House Brand</span>
        @endif
        @if ($product->discount_percentage > 0 && $product->discounted_price !== null)
          <span class="bg-gradient-to-r from-orange-500 to-red-600 text-white font-label text-xs px-3 py-1 uppercase font-bold">{{ $product->discount_percentage }}% OFF</span>
        @endif
      </div>
      <h1 id="product-title" class="font-headline text-4xl md:text-5xl font-black italic tracking-tighter mb-4">{{ $product->title }}</h1>
      <p id="product-price" class="font-headline text-3xl font-bold text-primary mb-6">
        @if ($product->discount_percentage > 0 && $product->discounted_price !== null)
          <span class="text-primary font-bold">Rs. {{ number_format($product->discounted_price, 0) }}</span>
          <span class="text-slate-400 line-through text-lg ml-3 font-normal">Rs. {{ number_format($product->price, 0) }}</span>
        @else
          Rs. {{ number_format($product->price, 0) }}
        @endif
      </p>
      <p id="product-description" class="font-body text-on-surface-variant text-lg mb-8 leading-relaxed">{{ $product->description ?? 'No description available.' }}</p>

      <div class="flex items-center gap-4 mb-8">
        <span id="product-stock" class="font-label text-sm text-on-surface-variant">
          @if ($product->current_stock > 0)
            <span class="text-green-500">● In Stock</span> ({{ $product->current_stock }} available)
          @else
            <span class="text-red-500">● Out of Stock</span>
          @endif
        </span>
      </div>

      <div class="flex gap-4 mb-12">
        <button id="add-to-cart-btn" onclick="addProductToCart()" class="flex-1 bg-gradient-to-br from-primary to-error text-white shadow-[0_4px_10px_rgba(249,115,22,0.4)] hover:shadow-[0_6px_15px_rgba(249,115,22,0.6)] py-4 font-headline font-bold rounded-md hover:bg-primary-dim transition-all active:scale-95 text-lg uppercase tracking-wider">
          ADD TO BAG
        </button>
        <button id="add-to-wishlist-btn" onclick="addProductToWishlist()" class="w-14 h-14 border border-outline-variant rounded-md flex items-center justify-center hover:border-primary hover:text-primary transition-all">
          <span class="material-symbols-outlined">favorite</span>
        </button>
      </div>

      <!-- Product Specs -->
      <div class="border-t border-outline-variant/20 pt-8 space-y-4">
        <div class="flex justify-between font-label text-sm">
          <span class="text-on-surface-variant uppercase tracking-widest">Category</span>
          <span id="product-category" class="text-white">{{ $product->category ? $product->category->category_name : 'Category #' . $product->category_id }}</span>
        </div>
        <div class="flex justify-between font-label text-sm">
          <span class="text-on-surface-variant uppercase tracking-widest">Brand Type</span>
          <span id="product-brand-type" class="text-white">{{ $product->is_in_house_brand == 1 ? 'In-House Brand' : 'Partner Brand' }}</span>
        </div>
      </div>
    </div>
  </div>

  <!-- Reviews Section -->
  <section class="mt-32">
    <h2 class="font-headline text-3xl font-black italic tracking-tighter mb-12">CUSTOMER REVIEWS</h2>
    <div id="reviews-grid" class="grid grid-cols-1 md:grid-cols-2 gap-8">
      @forelse ($reviews as $r)
        <div class="bg-surface-container-low p-8 rounded-lg">
          <div class="flex items-center gap-3 mb-4">
            <div class="w-10 h-10 bg-primary rounded-full flex items-center justify-center font-headline font-bold text-on-primary">{{ strtoupper(substr($r->customer_name ?? 'U', 0, 1)) }}</div>
            <div>
              <p class="font-headline font-bold">{{ $r->customer_name ?? 'Anonymous' }}</p>
              <div class="flex gap-1">
                {{ str_repeat('★', $r->rating ?? 0) }}{{ str_repeat('☆', 5 - ($r->rating ?? 0)) }}
              </div>
            </div>
          </div>
          <p class="font-body text-on-surface-variant">{{ $r->comment }}</p>
        </div>
      @empty
        <div class="col-span-full text-center py-12" id="reviews-empty">
          <p class="font-body text-on-surface-variant">No reviews yet. Be the first to review this product!</p>
        </div>
      @endforelse
    </div>

    <!-- Review Form -->
    <div id="review-form-container" class="mt-12 bg-surface-container-low p-8 rounded-lg max-w-2xl mx-auto">
      <h3 class="font-headline text-2xl font-bold mb-6 text-center">Write a Review</h3>
      @if (session('user_id'))
        <form id="submit-review-form" class="space-y-6">
          <div>
            <label class="block font-label text-sm text-on-surface-variant mb-2">Rating</label>
            <div class="flex gap-2">
              <div id="star-rating" class="flex gap-1" data-rating="0">
                <span class="material-symbols-outlined text-outline-variant cursor-pointer hover:text-primary transition-colors text-3xl" data-val="1">star</span>
                <span class="material-symbols-outlined text-outline-variant cursor-pointer hover:text-primary transition-colors text-3xl" data-val="2">star</span>
                <span class="material-symbols-outlined text-outline-variant cursor-pointer hover:text-primary transition-colors text-3xl" data-val="3">star</span>
                <span class="material-symbols-outlined text-outline-variant cursor-pointer hover:text-primary transition-colors text-3xl" data-val="4">star</span>
                <span class="material-symbols-outlined text-outline-variant cursor-pointer hover:text-primary transition-colors text-3xl" data-val="5">star</span>
              </div>
            </div>
          </div>
          <div>
            <label class="block font-label text-sm text-on-surface-variant mb-2">Comment</label>
            <textarea id="review-comment" class="w-full bg-surface border border-outline-variant rounded px-4 py-3 text-white focus:border-primary focus:ring-1 focus:ring-primary outline-none" rows="4" placeholder="What did you like or dislike?"></textarea>
          </div>
          <button type="submit" class="w-full py-4 bg-gradient-to-br from-primary to-error text-white shadow-[0_4px_10px_rgba(249,115,22,0.4)] hover:shadow-[0_6px_15px_rgba(249,115,22,0.6)] font-headline font-bold rounded-md hover:bg-primary-dim transition-all uppercase tracking-wider">Submit Review</button>
        </form>
      @else
        <div id="review-login-msg" class="text-center text-on-surface-variant mb-4">
          Please <a href="{{ route('login_signup.html') }}" class="text-primary hover:underline">log in</a> to write a review.
        </div>
      @endif
    </div>
  </section>
</main>

@include('frontend.footer')
<script src="{{ asset('js/frontend-api.js') }}"></script>
<script>
  const productId = {{ $product->id }};

  document.addEventListener('DOMContentLoaded', () => {
    // Star Rating Logic
    const stars = document.querySelectorAll('#star-rating span');
    let currentRating = 0;
    
    if (stars.length > 0) {
      stars.forEach(star => {
        star.addEventListener('click', () => {
          currentRating = parseInt(star.getAttribute('data-val'));
          document.getElementById('star-rating').setAttribute('data-rating', currentRating);
          stars.forEach(s => {
            if (parseInt(s.getAttribute('data-val')) <= currentRating) {
              s.classList.remove('text-outline-variant');
              s.classList.add('text-primary');
            } else {
              s.classList.add('text-outline-variant');
              s.classList.remove('text-primary');
            }
          });
        });
      });
    }

    // Submit Review Logic
    const submitForm = document.getElementById('submit-review-form');
    if (submitForm) {
      submitForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        if (currentRating === 0) {
          DOMUtils.toast('Please select a rating.', 'error');
          return;
        }
        const commentInput = document.getElementById('review-comment');
        const comment = commentInput.value.trim();
        if (!comment) {
          DOMUtils.toast('Please enter a comment.', 'error');
          return;
        }

        const revRes = await FrontendAPI.submitReview(productId, currentRating, comment);
        if (revRes.success) {
          DOMUtils.toast('Review submitted! It will appear after admin approval.');
          commentInput.value = '';
          currentRating = 0;
          stars.forEach(s => {
            s.classList.add('text-outline-variant');
            s.classList.remove('text-primary');
          });
        } else {
          DOMUtils.toast(revRes.message || 'Error submitting review.', 'error');
        }
      });
    }
  });

  function addProductToCart() {
    if (productId) addToCartHandler(productId);
  }

  function addProductToWishlist() {
    if (productId) addToWishlistHandler(productId);
  }
</script>
</body></html>
