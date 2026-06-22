<!-- Themed Premium Loader Overlay Component -->
<div id="global-loader"
     x-data="{ loading: false }" 
     x-show="loading" 
     x-cloak
     x-on:submitting-form.window="loading = true"
     style="position: fixed !important; top: 0 !important; left: 0 !important; width: 100vw !important; height: 100vh !important; background-color: rgba(0, 0, 0, 0.9) !important; backdrop-filter: blur(8px) !important; z-index: 999999 !important; display: flex !important; flex-direction: column !important; align-items: center !important; justify-content: center !important; margin: 0 !important; padding: 0 !important;">
    
    <div style="position: absolute !important; top: 50% !important; left: 50% !important; transform: translate(-50%, -50%) !important; display: flex !important; flex-direction: column !important; align-items: center !important; justify-content: center !important; text-align: center !important; width: 100% !important;">
        <div class="animate-bounce" style="color: #f97316 !important; margin-bottom: 20px !important; display: flex !important; align-items: center !important; justify-content: center !important; width: 144px !important; height: 144px !important; position: relative !important; margin: 0 auto !important;">
            <!-- Glowing swing arc trail in background -->
            <svg class="absolute w-full h-full animate-trail-pulse" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg" style="position: absolute !important; width: 144px !important; height: 144px !important; top: 0 !important; left: 0 !important;">
                <path d="M15 65 C 25 85, 75 85, 85 65" stroke="#f97316" stroke-opacity="0.45" stroke-width="6" stroke-linecap="round" class="filter drop-shadow-[0_0_8px_rgba(249,115,22,0.8)]"/>
            </svg>
            
            <!-- Swinging Bat SVG -->
            <svg class="w-20 h-20 drop-shadow-[0_0_15px_rgba(251,146,60,0.6)] animate-bat-swing" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg" style="transform-origin: 50% 15px !important; width: 80px !important; height: 80px !important; display: block !important; margin: 0 auto !important;">
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
        <p style="color: #ffffff !important; font-weight: bold !important; letter-spacing: 0.15em !important; font-size: 14px !important; text-transform: uppercase !important; font-family: monospace !important; margin: 0 !important;">
            PREPARING YOUR GEAR...
        </p>
    </div>
</div>

<style>
  [x-cloak] { display: none !important; }
  
  @keyframes bat-swing {
    0%, 100% { transform: rotate(-25deg); }
    50% { transform: rotate(50deg); }
  }

  @keyframes trail-pulse {
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
  let loaderTimeout = null;

  window.addEventListener('pageshow', function (event) {
    if (event.persisted) {
      const loaderEl = document.querySelector('#global-loader');
      if (loaderEl && loaderEl.__x) {
        loaderEl.__x.$data.loading = false;
      }
    }
  });

  function triggerLoader() {
    // Dispatch window event to turn Alpine state to true
    window.dispatchEvent(new CustomEvent('submitting-form'));

    if (loaderTimeout) {
      clearTimeout(loaderTimeout);
    }

    // 8-Second Safety Timeout Circuit Breaker
    loaderTimeout = setTimeout(() => {
      const loaderEl = document.querySelector('#global-loader');
      if (loaderEl && loaderEl.__x) {
        loaderEl.__x.$data.loading = false;
      }
    }, 8000);
  }
  
  // Set global handler
  window.triggerLoader = triggerLoader;

  // Escape any unclosed wrappers by moving the loader directly under body on script execution
  (function() {
    const loader = document.getElementById('global-loader');
    if (loader && loader.parentElement !== document.body) {
      document.body.appendChild(loader);
    }
  })();

  document.addEventListener('DOMContentLoaded', () => {
    // Re-verify after DOM is parsed in case of timing delays
    const loader = document.getElementById('global-loader');
    if (loader && loader.parentElement !== document.body) {
      document.body.appendChild(loader);
    }

    // Intercept standard form submissions to show the loader automatically
    document.addEventListener('submit', (e) => {
      const form = e.target;
      if (form && form.tagName === 'FORM' && !form.hasAttribute('data-no-loader') && form.getAttribute('target') !== '_blank') {
        triggerLoader();
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
          triggerLoader();
        }
      }
    });
  });
</script>
