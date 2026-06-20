<!-- Themed Premium Loader Overlay Component -->
<div x-data="{ loading: false }"
     x-show="loading"
     x-cloak
     @loader-show.window="loading = true"
     @loader-hide.window="loading = false"
     @beforeunload.window="loading = true"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     class="fixed inset-0 z-[9999] flex flex-col items-center justify-center bg-black/85 backdrop-blur-md">
  
  <div class="flex flex-col items-center gap-6">
    <div class="relative w-36 h-36 flex items-center justify-center">
      <!-- Glowing swing arc trail in background -->
      <svg class="absolute w-full h-full animate-trail-pulse text-primary/45" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M15 65 C 25 85, 75 85, 85 65" stroke="currentColor" stroke-width="6" stroke-linecap="round" class="filter drop-shadow-[0_0_8px_rgba(249,115,22,0.8)]"/>
      </svg>
      
      <!-- Swinging Bat SVG -->
      <svg class="w-20 h-20 drop-shadow-[0_0_15px_rgba(251,146,60,0.6)] animate-bat-swing" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg" style="transform-origin: 50% 15px;">
        <!-- Blade -->
        <path d="M44 40H56V85C56 87.7614 53.7614 90 51 90H49C46.2386 90 44 87.7614 44 85V40Z" fill="url(#bat-blade-grad)"/>
        <!-- Handle -->
        <rect x="47.5" y="10" width="5" height="30" rx="1.5" fill="url(#bat-handle-grad)"/>
        <!-- Handle Grip Details -->
        <line x1="48" y1="18" x2="52" y2="18" stroke="#111" stroke-width="1.5"/>
        <line x1="48" y1="24" x2="52" y2="24" stroke="#111" stroke-width="1.5"/>
        <line x1="48" y1="30" x2="52" y2="30" stroke="#111" stroke-width="1.5"/>
        
        <defs>
          <linearGradient id="bat-blade-grad" x1="50" y1="40" x2="50" y2="90" gradientUnits="userSpaceOnUse">
            <stop stop-color="#fb923c"/>
            <stop offset="1" stop-color="#ea580c"/>
          </linearGradient>
          <linearGradient id="bat-handle-grad" x1="50" y1="10" x2="50" y2="40" gradientUnits="userSpaceOnUse">
            <stop stop-color="#ffffff"/>
            <stop offset="1" stop-color="#d1d5db"/>
          </linearGradient>
        </defs>
      </svg>
    </div>
    
    <!-- Loader Text -->
    <h3 class="font-headline font-black tracking-[0.2em] text-white text-lg uppercase text-center mt-2 animate-pulse">
      PREPARING YOUR GEAR...
    </h3>
  </div>
</div>

<style>
  [x-cloak] { display: none !important; }
  
  @keyframes  bat-swing {
    0%, 100% { transform: rotate(-25deg); }
    50% { transform: rotate(50deg); }
  }

  @keyframes  trail-pulse {
    0%, 100% { opacity: 0.3; transform: scale(0.95); }
    50% { opacity: 0.9; transform: scale(1.05); }
  }

  .animate-bat-swing {
    animation: bat-swing 1.2s cubic-bezier(0.4, 0, 0.2, 1) infinite;
  }

  .animate-trail-pulse {
    animation: trail-pulse 1.2s ease-in-out infinite;
  }
</style>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    // Intercept standard form submissions to show the loader
    document.addEventListener('submit', (e) => {
      const form = e.target;
      if (form && form.tagName === 'FORM' && !form.hasAttribute('data-no-loader') && form.getAttribute('target') !== '_blank') {
        window.dispatchEvent(new CustomEvent('loader-show'));
      }
    });

    // Intercept internal page link clicks to show loader instantly
    document.addEventListener('click', (e) => {
      const link = e.target.closest('a');
      if (link) {
        const href = link.getAttribute('href');
        if (href && 
            !href.startsWith('#') && 
            !href.startsWith('javascript:') && 
            !href.startsWith('tel:') && 
            !href.startsWith('mailto:') && 
            link.href.startsWith(window.location.origin) &&
            link.target !== '_blank' &&
            !link.hasAttribute('data-no-loader') &&
            !e.defaultPrevented && 
            e.button === 0 && 
            !e.metaKey && !e.ctrlKey && !e.shiftKey && !e.altKey) {
          window.dispatchEvent(new CustomEvent('loader-show'));
        }
      }
    });

    // Automatically hide loader on page show (e.g. back/forward cache restore)
    window.addEventListener('pageshow', (event) => {
      if (event.persisted) {
        window.dispatchEvent(new CustomEvent('loader-hide'));
      }
    });
  });
</script>
<?php /**PATH D:\CUI Data\6th Semester\Advance Web\AdvanceWebProject\resources\views\frontend\loader.blade.php ENDPATH**/ ?>