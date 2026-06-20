<!-- Alpine.js CDN (loaded once via header partial on every page) -->
<script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/persist@3.x.x/dist/cdn.min.js"></script>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<!-- TopNavBar with Page Navigation -->
<header class="fixed top-0 w-full z-50 bg-[#090909]/60 backdrop-blur-xl shadow-[0_20px_40px_rgba(0,0,0,0.4)]" x-data="{ mobileMenuOpen: false }">
  <nav class="flex justify-between items-center px-8 h-20 w-full font-['Nunito'] tracking-tighter">
    <div class="flex items-center gap-8">
      <a class="flex items-center gap-3 decoration-transparent" href="<?php echo e(route("homepage.html")); ?>" aria-label="FS86 Sahiwal Home">
          <div class="flex items-center justify-center w-[72px] h-12 rounded-xl bg-[#141414]/90 border border-white/10 overflow-hidden shadow-[0_4px_10px_rgba(0,0,0,0.5)] hover:shadow-[0_6px_15px_rgba(249,115,22,0.3)] hover:scale-105 transition-all duration-300">
            <img src="<?php echo e(asset('assets/image/logo.png')); ?>" alt="FS Logo" class="w-full h-full object-cover">
          </div>
        </a>
      <div class="hidden md:flex items-center gap-4 text-sm">
        <a class="text-white/70 hover:text-primary transition-colors px-3 py-1 rounded hover:bg-white/10" href="<?php echo e(route("homepage.html")); ?>">Home</a>
        <a class="text-white/70 hover:text-primary transition-colors px-3 py-1 rounded hover:bg-white/10" href="<?php echo e(route("shop_page.html")); ?>">Shop</a>
        <a class="text-white/70 hover:text-primary transition-colors px-3 py-1 rounded hover:bg-white/10" href="<?php echo e(route("about_us.html")); ?>">About</a>
        <a class="text-white/70 hover:text-primary transition-colors px-3 py-1 rounded hover:bg-white/10" href="<?php echo e(route("store_locator.html")); ?>">Stores</a>


        <a class="text-white/70 hover:text-primary transition-colors px-3 py-1 rounded hover:bg-white/10" href="<?php echo e(route('faqs.html')); ?>">FAQs</a>
      </div>
    </div>
    <div class="flex items-center gap-4">
      <a href="<?php echo e(route("wishlist.html")); ?>" class="p-2 hover:bg-white/10 transition-all duration-300 scale-95 active:scale-90" title="Wishlist">
        <span class="material-symbols-outlined text-[#f97316]">favorite</span>
      </a>

      
      <div x-data="{
              query: '',
              results: [],
              isOpen: false,
              isLoading: false,
              searched: false,
              async search() {
                  if (this.query.length === 0) {
                      this.results = [];
                      this.isOpen = false;
                      this.searched = false;
                      return;
                  }
                  if (this.query.length <= 2) {
                      this.results = [];
                      this.searched = false;
                      this.isOpen = true;
                      return;
                  }
                  this.isLoading = true;
                  this.searched = false;
                  try {
                      const res = await fetch(`/api/frontend/products/search?query=${encodeURIComponent(this.query)}`);
                      const json = await res.json();
                      if (this.query.length > 2) {
                          this.results = json.data || [];
                      }
                  } catch (e) {
                      this.results = [];
                  } finally {
                      this.isLoading = false;
                      if (this.query.length > 2) {
                          this.searched = true;
                          this.isOpen = true;
                      }
                  }
              },
              close() {
                  this.isOpen = false;
              },
              clear() {
                  this.query = '';
                  this.results = [];
                  this.isOpen = false;
                  this.searched = false;
              },
              imgSrc(product) {
                  if (!product.image) return null;
                  return product.image.startsWith('http') ? product.image : `/storage/${product.image}`;
              }
          }"
          x-on:keydown.escape.window="close()"
          x-on:click.outside="close()"
          class="relative"
      >
        
        <button
          x-on:click="isOpen = !isOpen; if (isOpen) { $nextTick(() => $refs.searchInput.focus()) }"
          class="p-2 hover:bg-white/10 transition-all duration-300 scale-95 active:scale-90"
          title="Search Products"
          id="global-search-toggle"
        >
          <span class="material-symbols-outlined text-[#f97316]">search</span>
        </button>

        
        <div
          x-show="isOpen"
          x-transition:enter="transition ease-out duration-200"
          x-transition:enter-start="opacity-0 translate-y-2 scale-95"
          x-transition:enter-end="opacity-100 translate-y-0 scale-100"
          x-transition:leave="transition ease-in duration-150"
          x-transition:leave-start="opacity-100 translate-y-0 scale-100"
          x-transition:leave-end="opacity-0 translate-y-2 scale-95"
          class="absolute right-0 top-full mt-3 w-[360px] sm:w-[420px] bg-[#141414]/95 backdrop-blur-2xl border border-white/10 rounded-xl shadow-[0_20px_60px_rgba(0,0,0,0.7)] overflow-hidden z-[100]"
          style="display: none;"
          id="global-search-dropdown"
        >
          
          <div class="p-4 border-b border-white/10">
            <div class="relative">
              <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-white/40 text-xl">search</span>
              <input
                x-ref="searchInput"
                x-model="query"
                x-on:input.debounce.300ms="search()"
                x-on:focus="if (query.length > 0) isOpen = true"
                type="text"
                placeholder="Search products..."
                class="w-full bg-white/5 border border-white/10 rounded-lg pl-10 pr-10 py-3 text-white placeholder-white/40 text-sm focus:outline-none focus:border-[#f97316]/50 focus:ring-1 focus:ring-[#f97316]/30 transition-all"
                id="global-search-input"
                autocomplete="off"
              >
              
              <button
                x-show="query.length > 0"
                x-on:click="clear()"
                class="absolute right-3 top-1/2 -translate-y-1/2 text-white/40 hover:text-white transition-colors"
              >
                <span class="material-symbols-outlined text-lg">close</span>
              </button>
            </div>
          </div>

          
          <div x-show="isLoading" class="px-4 py-6 text-center">
            <div class="inline-block w-6 h-6 border-2 border-white/20 border-t-[#f97316] rounded-full animate-spin"></div>
            <p class="text-white/50 text-xs mt-2 font-['Nunito']">Searching...</p>
          </div>

          
          <div x-show="!isLoading && results.length > 0" class="max-h-[320px] overflow-y-auto overscroll-contain" style="scrollbar-width: thin; scrollbar-color: #f97316 transparent;">
            <template x-for="product in results" :key="product.id">
              <a
                :href="'/product/' + product.id"
                class="flex items-center gap-4 px-4 py-3 hover:bg-white/5 transition-colors group border-b border-white/5 last:border-b-0"
              >
                
                <div class="w-14 h-14 flex-shrink-0 rounded-lg overflow-hidden bg-white/5 border border-white/10">
                  <template x-if="imgSrc(product)">
                    <img :src="imgSrc(product)" :alt="product.title" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                  </template>
                  <template x-if="!imgSrc(product)">
                    <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-[#1a1a1a] to-[#0a0a0a]">
                      <span class="text-[#f97316] font-black text-lg" x-text="(product.title || 'FS').substring(0,2).toUpperCase()"></span>
                    </div>
                  </template>
                </div>

                
                <div class="flex-1 min-w-0">
                  <p class="text-white text-sm font-semibold truncate group-hover:text-[#f97316] transition-colors" x-text="product.title"></p>
                  <p class="text-[#f97316] text-sm font-bold mt-0.5">
                    Rs. <span x-text="parseFloat(product.price).toFixed(0)"></span>
                  </p>
                </div>

                
                <span class="material-symbols-outlined text-white/20 group-hover:text-[#f97316] group-hover:translate-x-1 transition-all text-lg">arrow_forward</span>
              </a>
            </template>
          </div>

          
          <div x-show="!isLoading && searched && results.length === 0 && query.length > 2" class="px-4 py-8 text-center">
            <span class="material-symbols-outlined text-4xl text-white/15 mb-2 block">search_off</span>
            <p class="text-white/60 text-sm font-['Nunito'] font-semibold">No products found</p>
            <p class="text-white/30 text-xs mt-1 font-['Nunito']">Try a different search term</p>
          </div>

          
          <div x-show="!isLoading && !searched && query.length <= 2 && results.length === 0" class="px-4 py-6 text-center">
            <span class="material-symbols-outlined text-3xl text-white/15 mb-1 block">inventory_2</span>
            <p class="text-white/40 text-xs font-['Nunito']">Type at least 3 characters to search</p>
          </div>
        </div>
      </div>
      

      <a href="<?php echo e(route("cart_checkout.html")); ?>" class="p-2 hover:bg-white/10 transition-all duration-300 scale-95 active:scale-90 relative" title="Shopping Cart">
        <span class="material-symbols-outlined text-[#f97316]">shopping_cart</span>
        <span id="cart-badge" class="absolute top-1 right-1 w-2 h-2 bg-tertiary rounded-full hidden"></span>
      </a>
      <a href="<?php echo e(route("my_account.html")); ?>" class="p-2 hover:bg-white/10 transition-all duration-300 scale-95 active:scale-90" title="My Account">
        <span class="material-symbols-outlined text-[#f97316]">person</span>
      </a>
      <a id="auth-link" href="<?php echo e(route("login_signup.html")); ?>" class="p-2 hover:bg-white/10 transition-all duration-300 scale-95 active:scale-90" title="Login/Signup">
        <span class="material-symbols-outlined text-[#f97316]">login</span>
      </a>
      
      <!-- Mobile Hamburger Button -->
      <button 
        @click="mobileMenuOpen = !mobileMenuOpen" 
        class="md:hidden p-2 hover:bg-white/10 transition-all duration-300 scale-95 active:scale-90 flex items-center justify-center focus:outline-none" 
        title="Open Menu"
      >
        <span class="material-symbols-outlined text-[#f97316] text-2xl" x-text="mobileMenuOpen ? 'close' : 'menu'">menu</span>
      </button>
    </div>
  </nav>
  
  <!-- Mobile Dropdown Menu -->
  <div 
    x-show="mobileMenuOpen"
    x-transition:enter="transition ease-out duration-200"
    x-transition:enter-start="opacity-0 -translate-y-4"
    x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition ease-in duration-150"
    x-transition:leave-start="opacity-100 translate-y-0"
    x-transition:leave-end="opacity-0 -translate-y-4"
    @click.outside="mobileMenuOpen = false"
    class="absolute top-full left-0 w-full bg-[#090909]/95 backdrop-blur-xl border-t border-white/10 shadow-[0_20px_40px_rgba(0,0,0,0.5)] md:hidden z-40"
    style="display: none;"
  >
    <div class="flex flex-col p-6 gap-4 font-['Nunito'] tracking-tighter">
      <a @click="mobileMenuOpen = false" class="text-white/80 hover:text-[#f97316] hover:bg-white/5 transition-all px-4 py-3 rounded-lg text-lg font-semibold" href="<?php echo e(route("homepage.html")); ?>">Home</a>
      <a @click="mobileMenuOpen = false" class="text-white/80 hover:text-[#f97316] hover:bg-white/5 transition-all px-4 py-3 rounded-lg text-lg font-semibold" href="<?php echo e(route("shop_page.html")); ?>">Shop</a>
      <a @click="mobileMenuOpen = false" class="text-white/80 hover:text-[#f97316] hover:bg-white/5 transition-all px-4 py-3 rounded-lg text-lg font-semibold" href="<?php echo e(route("about_us.html")); ?>">About</a>
      <a @click="mobileMenuOpen = false" class="text-white/80 hover:text-[#f97316] hover:bg-white/5 transition-all px-4 py-3 rounded-lg text-lg font-semibold" href="<?php echo e(route("store_locator.html")); ?>">Stores</a>
      <a @click="mobileMenuOpen = false" class="text-white/80 hover:text-[#f97316] hover:bg-white/5 transition-all px-4 py-3 rounded-lg text-lg font-semibold" href="<?php echo e(route('faqs.html')); ?>">FAQs</a>
    </div>
  </div>
</header>

<?php echo $__env->make('frontend.loader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH D:\CUI Data\6th Semester\Advance Web\AdvanceWebProject\resources\views/frontend/header.blade.php ENDPATH**/ ?>