<!-- Footer -->
<footer class="bg-[#000000] w-full pt-20 pb-10">
  <div class="max-w-7xl mx-auto px-8 grid grid-cols-1 md:grid-cols-4 gap-12 font-['Nunito'] text-sm">
    <div class="col-span-1 md:col-span-1">
      <span id="footer-brand" class="text-[#f97316] font-black text-2xl italic mb-6 block">FS Sports</span>
      <p id="footer-about" class="text-gray-500 max-w-xs mb-6">
        Redefining athletic performance through curated engineering and editorial design. Since 2024.
      </p>

    </div>
    <div>
      <h5 class="text-white font-headline font-bold mb-6 uppercase tracking-widest text-xs">Pages</h5>
      <ul class="space-y-4">
        <li><a class="text-gray-500 hover:text-[#f97316] transition-colors" href="<?php echo e(route("homepage.html")); ?>">Home</a></li>
        <li><a class="text-gray-500 hover:text-[#f97316] transition-colors" href="<?php echo e(route("shop_page.html")); ?>">Shop</a></li>
        <li><a class="text-gray-500 hover:text-[#f97316] transition-colors" href="<?php echo e(route("my_account.html")); ?>">My Account</a></li>
        <li><a class="text-gray-500 hover:text-[#f97316] transition-colors" href="<?php echo e(route("cart_checkout.html")); ?>">Checkout</a></li>
      </ul>
    </div>
    <div>
      <h5 class="text-white font-headline font-bold mb-6 uppercase tracking-widest text-xs">More</h5>
      <ul class="space-y-4 text-gray-500">
        <li><a class="hover:text-[#f97316] transition-colors" href="<?php echo e(route('about_us.html')); ?>">About Us</a></li>
        <li><a class="hover:text-[#f97316] transition-colors" href="<?php echo e(route('store_locator.html')); ?>">Store Locator</a></li>
        <li><a class="hover:text-[#f97316] transition-colors" href="<?php echo e(route('wishlist.html')); ?>">Wishlist</a></li>
        <li><a class="hover:text-[#f97316] transition-colors" href="<?php echo e(route('faqs.html')); ?>">FAQs</a></li>
      </ul>
    </div>
    <div>
      <h5 class="text-white font-headline font-bold mb-6 uppercase tracking-widest text-xs">Join Our WhatsApp Community</h5>
      <p class="text-gray-500 mb-5 leading-relaxed">Get instant alerts on new arrivals, limited equipment drops, and exclusive community announcements straight to your phone.</p>
      <a href="https://chat.whatsapp.com/GWtdSiTzckAEk0ccqIL54P" target="_blank" rel="noopener noreferrer"
         class="inline-flex items-center gap-2 bg-gradient-to-br from-primary to-error text-white shadow-[0_4px_10px_rgba(249,115,22,0.4)] hover:shadow-[0_6px_15px_rgba(249,115,22,0.6)] px-5 py-2.5 rounded-md font-headline font-bold text-sm uppercase tracking-wider transition-all duration-300 transform hover:-translate-y-0.5 active:scale-95">
        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
        JOIN THE GROUP
      </a>
    </div>
  </div>
  <div class="max-w-7xl mx-auto px-8 mt-20 pt-8 border-t border-white/5 flex flex-col md:flex-row justify-between items-center gap-4">
    <div class="order-2 md:order-1">
      <a href="/admin/login" class="text-gray-600 hover:text-[#f97316] transition-colors flex items-center gap-1.5 text-xs font-semibold uppercase tracking-wider">
        <span class="material-symbols-outlined text-base">admin_panel_settings</span>
        Admin Panel
      </a>
    </div>
    <p class="text-gray-500 opacity-80 order-1 md:order-2">© 2024 FS Sports. Engineered for Performance.</p>
  </div>
</footer>

<!-- Cookie Consent & WhatsApp FAB Wrapper (shared Alpine scope) -->
<div x-data="{ cookiesAccepted: $persist(false), toastActive: false }" @toast-state.window="toastActive = $event.detail.active">
  <!-- Cookie Consent Banner -->
  <div
    x-show="!cookiesAccepted"
    x-transition:enter="transition ease-out duration-500"
    x-transition:enter-start="opacity-0 translate-y-full"
    x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="opacity-100 translate-y-0"
    x-transition:leave-end="opacity-0 translate-y-full"
    class="fixed bottom-0 left-0 right-0 z-50"
    style="display: none;"
  >
    <div class="bg-[#111111]/95 backdrop-blur-xl border-t border-white/10 shadow-[0_-10px_40px_rgba(0,0,0,0.6)]">
      <div class="max-w-7xl mx-auto px-6 py-5 flex flex-col md:flex-row items-center gap-5 font-['Nunito']">
        <!-- Cookie Icon -->
        <div class="flex-shrink-0 w-12 h-12 rounded-xl bg-[#f97316]/10 border border-[#f97316]/20 flex items-center justify-center">
          <span class="material-symbols-outlined text-[#f97316] text-2xl">cookie</span>
        </div>
        <!-- Text -->
        <p class="flex-1 text-white/80 text-sm leading-relaxed text-center md:text-left">
          We use cookies to maintain your active shopping cart memory and secure login sessions.
        </p>
        <!-- Buttons -->
        <div class="flex items-center gap-3 flex-shrink-0">
          <button
            @click="alert('Note: Rejecting cookies means your active cart memory and login sessions won\'t be saved when you close the tab.'); cookiesAccepted = true"
            class="px-4 py-2 text-sm font-semibold text-white/50 hover:text-white border border-white/10 hover:border-white/25 rounded-lg transition-all duration-200"
          >Reject</button>
          <button
            @click="cookiesAccepted = true"
            class="px-6 py-2 text-sm font-bold text-white bg-gradient-to-br from-[#f97316] to-[#dc2626] rounded-lg shadow-[0_4px_10px_rgba(249,115,22,0.4)] hover:shadow-[0_6px_15px_rgba(249,115,22,0.6)] hover:-translate-y-0.5 transition-all duration-300 active:scale-95"
          >Accept</button>
        </div>
      </div>
    </div>
  </div>

  
  <style>
    @keyframes  wa-pulse-ring {
      0%   { transform: scale(1);   opacity: 0.5; }
      70%  { transform: scale(1.45); opacity: 0; }
      100% { transform: scale(1.45); opacity: 0; }
    }
    @keyframes  wa-float {
      0%, 100% { transform: translateY(0); }
      50%      { transform: translateY(-4px); }
    }
    .wa-fab:hover .wa-ring {
      animation: wa-pulse-ring 1.4s cubic-bezier(0.215, 0.61, 0.355, 1) infinite;
    }
    .wa-fab:hover .wa-icon-wrap {
      transform: scale(1.1);
    }
    .wa-fab .wa-icon-wrap {
      transition: transform 0.3s ease;
    }
    .wa-fab {
      animation: wa-float 3s ease-in-out infinite;
      transition: bottom 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }
  </style>

  <a
    href="https://wa.me/923225402571?text=Hey%20FS%20Sports!%20I'm%20interested%20in%20buying%20some%20gear.%20Are%20you%20guys%20available%20to%20chat?"
    target="_blank"
    rel="noopener noreferrer"
    class="wa-fab fixed right-6 z-[9999] flex flex-col items-center gap-2 group"
    :style="'bottom: ' + (cookiesAccepted ? (toastActive ? '6.5rem' : '1.5rem') : (toastActive ? '10.5rem' : '5.5rem'))"
    aria-label="Chat with us on WhatsApp"
    id="whatsapp-fab"
    @click="fetch('/fe-api/whatsapp-click', { method: 'POST', headers: { 'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>' } })"
  >
    
    <div class="relative">
      
      <div
        class="wa-ring absolute inset-0 bg-gradient-to-br from-[#f97316] to-[#dc2626] opacity-0"
        style="border-radius: 50%;"
      ></div>

      
      <div
        class="wa-icon-wrap relative w-16 h-16 flex items-center justify-center bg-gradient-to-br from-[#f97316] to-[#dc2626] shadow-[0_6px_20px_rgba(249,115,22,0.5)] group-hover:shadow-[0_8px_30px_rgba(249,115,22,0.7)] transition-shadow duration-300"
        style="border-radius: 50%;"
      >
        
        <svg class="w-8 h-8 fill-white" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
        </svg>
      </div>
    </div>

    
    <span
      class="text-[10px] font-['Nunito'] font-black tracking-[0.15em] uppercase text-white drop-shadow-[0_2px_8px_rgba(249,115,22,0.6)]"
    >Chat With Us</span>
  </a>
</div>

<script>
  // Load dynamic site settings into footer
  (async () => {
    try {
      const res = await FrontendAPI.getSiteSettings();
      if (res.success && res.data) {
        if (res.data.shop_name) {
          document.getElementById('footer-brand').textContent = res.data.shop_name;
        }
        if (res.data.about_us_content) {
          document.getElementById('footer-about').textContent = res.data.about_us_content.substring(0, 150) + '...';
        }
      }
    } catch (e) {}
  })();
</script>
<?php /**PATH D:\PerfectProjects\FS Sports Ecommerce\resources\views/frontend/footer.blade.php ENDPATH**/ ?>