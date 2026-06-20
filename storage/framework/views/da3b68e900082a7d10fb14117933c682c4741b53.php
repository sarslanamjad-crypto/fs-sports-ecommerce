<!DOCTYPE html>
<html class="dark" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>FS86 Sahiwal | Secure Your Performance Gear</title>
  <meta name="description" content="Finalize your purchase at FS86 Sahiwal. Secure payment and fast shipping for high-performance sports equipment." />
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
<main class="pt-32 pb-20 px-8 max-w-7xl mx-auto min-h-screen">
<div class="mb-16">
  <span class="font-label text-primary uppercase tracking-[0.3em] text-[10px] mb-2 block">Your Kit</span>
  <h1 class="font-headline text-5xl md:text-7xl font-black italic tracking-tighter uppercase leading-none mb-4">Shopping <span class="text-primary">Cart</span></h1>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
  <!-- Cart Items -->
  <div class="lg:col-span-2">
    <div id="cart-items" class="space-y-6">
      <div class="bg-surface-container-low h-24 skeleton-pulse rounded-lg"></div>
      <div class="bg-surface-container-low h-24 skeleton-pulse rounded-lg"></div>
    </div>
      <div id="shipping-form" class="hidden mt-12 bg-surface-container-low p-8 rounded-lg">
        <h3 class="font-headline text-xl font-bold mb-6 uppercase tracking-widest text-primary">Shipping Details</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div class="md:col-span-2">
            <label class="block font-label text-sm text-on-surface-variant mb-2">Shipping Address *</label>
            <input type="text" id="ship-address" class="w-full bg-surface border border-outline-variant rounded px-4 py-3 text-white focus:border-primary focus:ring-1 focus:ring-primary outline-none" placeholder="123 Main St, Apt 4B">
          </div>
          <div>
            <label class="block font-label text-sm text-on-surface-variant mb-2">City *</label>
            <input type="text" id="ship-city" class="w-full bg-surface border border-outline-variant rounded px-4 py-3 text-white focus:border-primary focus:ring-1 focus:ring-primary outline-none" placeholder="Lahore">
          </div>
          <div>
            <label class="block font-label text-sm text-on-surface-variant mb-2">Phone Number *</label>
            <input type="text" id="ship-phone" class="w-full bg-surface border border-outline-variant rounded px-4 py-3 text-white focus:border-primary focus:ring-1 focus:ring-primary outline-none" placeholder="03001234567">
          </div>
          <div class="md:col-span-2">
            <label class="block font-label text-sm text-on-surface-variant mb-2">Order Notes (Optional)</label>
            <textarea id="ship-notes" class="w-full bg-surface border border-outline-variant rounded px-4 py-3 text-white focus:border-primary focus:ring-1 focus:ring-primary outline-none" rows="3" placeholder="Special instructions for delivery..."></textarea>
          </div>
        </div>
      </div>
    </div>
    <div id="cart-empty" class="hidden col-span-full flex flex-col items-center justify-center text-center py-16">
      <span class="material-symbols-outlined text-6xl text-outline-variant mb-4">shopping_cart</span>
      <h3 class="font-headline text-2xl text-on-surface-variant mb-2">Your cart is empty</h3>
      <a href="<?php echo e(route('shop_page.html')); ?>" class="inline-block mt-4 px-8 py-3 bg-gradient-to-br from-primary to-error text-white shadow-[0_4px_10px_rgba(249,115,22,0.4)] hover:shadow-[0_6px_15px_rgba(249,115,22,0.6)] font-label text-xs uppercase tracking-widest">Browse Shop</a>
    </div>
    <div id="cart-login" class="hidden col-span-full flex flex-col items-center justify-center text-center py-16">
      <span class="material-symbols-outlined text-6xl text-outline-variant mb-4">lock</span>
      <h3 class="font-headline text-2xl text-on-surface-variant mb-2">Please log in to view your cart</h3>
      <a href="<?php echo e(route('login_signup.html')); ?>" class="inline-block mt-4 px-8 py-3 bg-gradient-to-br from-primary to-error text-white shadow-[0_4px_10px_rgba(249,115,22,0.4)] hover:shadow-[0_6px_15px_rgba(249,115,22,0.6)] font-label text-xs uppercase tracking-widest">Login / Sign Up</a>
    </div>

  <!-- Order Summary -->
  <div>
    <div class="bg-surface-container-low p-8 rounded-lg sticky top-28">
      <h3 class="font-headline text-xl font-bold mb-6 uppercase tracking-widest">Order Summary</h3>
      <div class="space-y-4 mb-6 border-b border-outline-variant/20 pb-6">
        <div class="flex justify-between font-label text-sm">
          <span class="text-on-surface-variant">Subtotal</span>
          <span id="cart-subtotal" class="text-white">Rs. 0</span>
        </div>
        <div class="flex justify-between font-label text-sm">
          <span class="text-on-surface-variant">Shipping</span>
          <span class="text-primary">FREE</span>
        </div>
      </div>
      <div class="flex justify-between font-headline text-lg font-bold mb-6">
        <span>Total</span>
        <span id="cart-total" class="text-primary">Rs. 0</span>
      </div>

      <!-- Payment Method Selection -->
      <div id="payment-methods" class="mb-6 border-b border-outline-variant/20 pb-6">
        <h4 class="font-label text-xs uppercase tracking-widest text-on-surface-variant mb-4">Payment Method</h4>
        <label class="flex items-center gap-3 p-3 rounded-md cursor-pointer border border-outline-variant/30 hover:border-primary/50 transition-colors mb-3 has-[:checked]:border-primary has-[:checked]:bg-primary/5">
          <input type="radio" name="payment_method" value="cod" checked class="w-4 h-4 accent-primary" />
          <span class="material-symbols-outlined text-lg text-on-surface-variant">local_shipping</span>
          <span class="font-label text-sm text-white">Cash on Delivery (COD)</span>
        </label>
        <label class="flex items-center gap-3 p-3 rounded-md cursor-pointer border border-outline-variant/30 hover:border-primary/50 transition-colors has-[:checked]:border-primary has-[:checked]:bg-primary/5">
          <input type="radio" name="payment_method" value="stripe" class="w-4 h-4 accent-primary" />
          <span class="material-symbols-outlined text-lg text-on-surface-variant">credit_card</span>
          <span class="font-label text-sm text-white">Credit / Debit Card (Stripe)</span>
          <svg class="ml-auto h-5" viewBox="0 0 60 25" fill="none"><rect width="60" height="25" rx="4" fill="#635BFF"/><text x="30" y="17" text-anchor="middle" fill="#fff" font-size="12" font-family="sans-serif" font-weight="700">stripe</text></svg>
        </label>
      </div>

      <button id="checkout-btn" disabled class="w-full py-4 bg-gradient-to-br from-primary to-error text-white shadow-[0_4px_10px_rgba(249,115,22,0.4)] hover:shadow-[0_6px_15px_rgba(249,115,22,0.6)] font-headline font-bold rounded-md hover:bg-primary-dim transition-all uppercase tracking-wider disabled:opacity-50 disabled:cursor-not-allowed">Proceed to Checkout (COD)</button>
    </div>
  </div>
</div>

<!-- Success Modal -->
<div id="success-modal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/80 backdrop-blur-sm">
  <div class="bg-surface-container-high p-10 rounded-lg max-w-lg w-full text-center border border-outline-variant">
    <span class="material-symbols-outlined text-6xl text-green-500 mb-4">check_circle</span>
    <h3 class="font-headline text-3xl font-black mb-2">Order Confirmed!</h3>
    <p class="text-on-surface-variant mb-6 text-sm">Your order <span id="ref-num" class="text-white font-bold"></span> has been placed successfully. You will pay via Cash on Delivery.</p>
    <a href="<?php echo e(route('my_account.html')); ?>" class="inline-block w-full py-4 bg-gradient-to-br from-primary to-error text-white shadow-[0_4px_10px_rgba(249,115,22,0.4)] hover:shadow-[0_6px_15px_rgba(249,115,22,0.6)] font-headline font-bold rounded-md hover:bg-primary-dim transition-all uppercase tracking-wider">View Order Status</a>
  </div>
</div>
</main>
<?php echo $__env->make('frontend.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script src="<?php echo e(asset('js/frontend-api.js')); ?>"></script>
<script>
document.addEventListener('DOMContentLoaded', async () => {
  const res = await FrontendAPI.getCart();
  const itemsEl = document.getElementById('cart-items');
  const emptyEl = document.getElementById('cart-empty');
  const loginEl = document.getElementById('cart-login');
  const shippingForm = document.getElementById('shipping-form');
  const checkoutBtn = document.getElementById('checkout-btn');
  const paymentMethods = document.getElementById('payment-methods');

  // Show toast if returning from a cancelled Stripe session
  <?php if(session('stripe_cancelled')): ?>
    DOMUtils.toast('Payment was cancelled. You can try again.', 'error');
  <?php endif; ?>

  if (!res.success && res.message === 'Please login first.') {
    itemsEl.classList.add('hidden');
    loginEl.classList.remove('hidden');
    return;
  }

  if (res.success && res.data && res.data.items && res.data.items.length > 0) {
    // Generate initial initials placeholder instead of relying entirely on onerror
    itemsEl.innerHTML = res.data.items.map(item => {
      const p = item.product;
      if (!p) return '';
      const imgSrc = p.image ? (p.image.startsWith('http') ? p.image : `/storage/${p.image}`) : null;
      const initials = (p.title || 'FS').substring(0,2).toUpperCase();
      let imgHTML = '';
      if (imgSrc) {
        imgHTML = `
          <img class="w-20 h-20 object-cover rounded" src="${imgSrc}" alt="${p.title}"
               onerror="this.style.display='none';this.nextElementSibling.style.display='flex'" />
          <div style="display:none;background:linear-gradient(135deg,#1a1a1a,#0a0a0a);" class="w-20 h-20 rounded items-center justify-center">
            <span style="color:#f97316;font-size:1.5rem;font-weight:900;">${initials}</span>
          </div>`;
      } else {
        imgHTML = `
          <div style="background:linear-gradient(135deg,#1a1a1a,#0a0a0a);" class="w-20 h-20 rounded flex items-center justify-center">
            <span style="color:#f97316;font-size:1.5rem;font-weight:900;">${initials}</span>
          </div>`;
      }
      const effectivePrice = p.discounted_price !== null && p.discount_percentage > 0 ? parseFloat(p.discounted_price) : parseFloat(p.price);
      return `
      <div class="bg-surface-container-low p-6 rounded-lg flex items-center gap-6">
        ${imgHTML}
        <div class="flex-1">
          <h4 class="font-headline font-bold text-lg">${p.title}</h4>
          <p class="font-label text-on-surface-variant text-sm">Qty: ${item.quantity}</p>
        </div>
        <span class="font-headline text-xl font-bold text-primary flex flex-col items-end">
          <span>Rs. ${(effectivePrice * item.quantity).toFixed(0)}</span>
          ${p.discounted_price !== null && p.discount_percentage > 0 
            ? `<span class="text-slate-400 line-through text-xs font-normal">Rs. ${(parseFloat(p.price) * item.quantity).toFixed(0)}</span>`
            : ''
          }
        </span>
        <button onclick="removeCartItem(${item.cart_item_id})" class="text-on-surface-variant hover:text-error transition-colors">
          <span class="material-symbols-outlined">delete</span>
        </button>
      </div>`;
    }).join('');

    shippingForm.classList.remove('hidden');
    checkoutBtn.removeAttribute('disabled');

    document.getElementById('cart-subtotal').textContent = `Rs. ${parseFloat(res.data.total).toFixed(0)}`;
    document.getElementById('cart-total').textContent = `Rs. ${parseFloat(res.data.total).toFixed(0)}`;
  } else {
    itemsEl.classList.add('hidden');
    emptyEl.classList.remove('hidden');
  }

  // ── Payment method radio: update button label ──
  document.querySelectorAll('input[name="payment_method"]').forEach(radio => {
    radio.addEventListener('change', () => {
      const method = document.querySelector('input[name="payment_method"]:checked').value;
      checkoutBtn.textContent = method === 'stripe'
        ? 'Pay with Stripe'
        : 'Proceed to Checkout (COD)';
    });
  });

  // ── Checkout handler ──
  checkoutBtn.addEventListener('click', async () => {
    const address = document.getElementById('ship-address').value.trim();
    const city = document.getElementById('ship-city').value.trim();
    const phone = document.getElementById('ship-phone').value.trim();
    const notes = document.getElementById('ship-notes').value.trim();

    if (!address || !city || !phone) {
      DOMUtils.toast('Please fill in all required shipping details.', 'error');
      return;
    }

    const selectedMethod = document.querySelector('input[name="payment_method"]:checked').value;

    checkoutBtn.disabled = true;
    checkoutBtn.textContent = 'Processing...';
    window.dispatchEvent(new CustomEvent('loader-show'));

    const payload = {
      shipping_address: address,
      city: city,
      phone_number: phone,
      order_notes: notes
    };

    // Step 1: Place the order via the existing checkout endpoint
    const out = await FrontendAPI.checkout(payload);

    if (!out.success) {
      DOMUtils.toast(out.message || 'Checkout failed.', 'error');
      checkoutBtn.disabled = false;
      checkoutBtn.textContent = selectedMethod === 'stripe' ? 'Pay with Stripe' : 'Proceed to Checkout (COD)';
      window.dispatchEvent(new CustomEvent('loader-hide'));
      return;
    }

    // Step 2: If Stripe was selected, create a Stripe Checkout Session
    if (selectedMethod === 'stripe') {
      checkoutBtn.textContent = 'Redirecting to Stripe...';

      try {
        const csrfToken = document.querySelector('meta[name="csrf-token"]');
        const stripeRes = await fetch(`/api/frontend/stripe/checkout/${out.data.order_id}`, {
          method: 'POST',
          credentials: 'same-origin',
          headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': csrfToken ? csrfToken.getAttribute('content') : '',
          }
        });

        const stripeData = await stripeRes.json();

        if (stripeData.success && stripeData.url) {
          window.location.href = stripeData.url;
          return;
        } else {
          DOMUtils.toast(stripeData.message || 'Stripe session failed.', 'error');
          checkoutBtn.disabled = false;
          checkoutBtn.textContent = 'Pay with Stripe';
          window.dispatchEvent(new CustomEvent('loader-hide'));
        }
      } catch (err) {
        DOMUtils.toast('Network error connecting to Stripe.', 'error');
        checkoutBtn.disabled = false;
        checkoutBtn.textContent = 'Pay with Stripe';
        window.dispatchEvent(new CustomEvent('loader-hide'));
      }
    } else {
      // COD flow — show success modal
      document.getElementById('ref-num').textContent = out.data.reference;
      document.getElementById('success-modal').classList.remove('hidden');
      window.dispatchEvent(new CustomEvent('loader-hide'));
    }
  });
});

async function removeCartItem(id) {
  const res = await FrontendAPI.removeFromCart(id);
  if (res.success) {
    DOMUtils.toast('Removed from cart.');
    location.reload();
  }
}
</script>
</body></html>

<?php /**PATH D:\CUI Data\6th Semester\Advance Web\AdvanceWebProject\resources\views/frontend/cart_checkout.blade.php ENDPATH**/ ?>