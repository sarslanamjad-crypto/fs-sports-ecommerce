<!DOCTYPE html>
<html class="dark" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>FS86 Sahiwal | Join the Elite Sports Community</title>
<meta name="description" content="Access your FS86 Sahiwal account to manage your performance gear, track orders, and join exclusive sports events." />
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
<main class="pt-32 pb-20 px-8 max-w-xl mx-auto min-h-screen">

<div class="text-center mb-12">
  <h1 class="font-headline text-4xl md:text-5xl font-black italic tracking-tighter uppercase mb-2">Welcome <span class="text-primary">Back</span></h1>
  <p class="text-on-surface-variant font-body">Access your elite FS Sports experience.</p>
</div>

<!-- Tab Toggle -->
<div class="flex mb-8 bg-surface-container-low rounded-lg overflow-hidden">
  <button id="tab-login" onclick="showTab('login')" class="flex-1 py-3 font-label text-sm uppercase tracking-widest bg-gradient-to-br from-primary to-error text-white shadow-[0_4px_10px_rgba(249,115,22,0.4)] hover:shadow-[0_6px_15px_rgba(249,115,22,0.6)] transition-all">Login</button>
  <button id="tab-signup" onclick="showTab('signup')" class="flex-1 py-3 font-label text-sm uppercase tracking-widest text-on-surface-variant hover:text-white transition-all">Sign Up</button>
</div>

<!-- Login Form -->
<div id="login-form" class="space-y-6">
  <div>
    <label class="font-label text-xs uppercase tracking-widest text-on-surface-variant block mb-2">Email</label>
    <input id="login-email" type="email" class="w-full bg-surface-container-highest border-none rounded-md text-white font-body px-4 py-3 focus:ring-primary" placeholder="you@example.com" />
  </div>
  <div>
    <label class="font-label text-xs uppercase tracking-widest text-on-surface-variant block mb-2">Password</label>
    <input id="login-password" type="password" class="w-full bg-surface-container-highest border-none rounded-md text-white font-body px-4 py-3 focus:ring-primary" placeholder="••••••••" />
  </div>
  <p id="login-error" class="text-error text-sm hidden"></p>
  <button onclick="handleLogin()" class="w-full py-4 bg-gradient-to-br from-primary to-error text-white shadow-[0_4px_10px_rgba(249,115,22,0.4)] hover:shadow-[0_6px_15px_rgba(249,115,22,0.6)] font-headline font-bold rounded-md hover:bg-primary-dim transition-all uppercase tracking-wider">
    Login
  </button>
</div>

<!-- Signup Form -->
<div id="signup-form" class="space-y-6 hidden">
  <div class="grid grid-cols-2 gap-4">
    <div>
      <label class="font-label text-xs uppercase tracking-widest text-on-surface-variant block mb-2">First Name</label>
      <input id="reg-fname" type="text" class="w-full bg-surface-container-highest border-none rounded-md text-white font-body px-4 py-3 focus:ring-primary" placeholder="John" />
    </div>
    <div>
      <label class="font-label text-xs uppercase tracking-widest text-on-surface-variant block mb-2">Last Name</label>
      <input id="reg-lname" type="text" class="w-full bg-surface-container-highest border-none rounded-md text-white font-body px-4 py-3 focus:ring-primary" placeholder="Doe" />
    </div>
  </div>
  <div>
    <label class="font-label text-xs uppercase tracking-widest text-on-surface-variant block mb-2">Email</label>
    <input id="reg-email" type="email" class="w-full bg-surface-container-highest border-none rounded-md text-white font-body px-4 py-3 focus:ring-primary" placeholder="you@example.com" />
  </div>
  <div>
    <label class="font-label text-xs uppercase tracking-widest text-on-surface-variant block mb-2">Password</label>
    <input id="reg-password" type="password" class="w-full bg-surface-container-highest border-none rounded-md text-white font-body px-4 py-3 focus:ring-primary" placeholder="••••••••" />
  </div>
  <p id="reg-error" class="text-error text-sm hidden"></p>
  <button onclick="handleRegister()" class="w-full py-4 bg-gradient-to-br from-primary to-error text-white shadow-[0_4px_10px_rgba(249,115,22,0.4)] hover:shadow-[0_6px_15px_rgba(249,115,22,0.6)] font-headline font-bold rounded-md hover:bg-primary-dim transition-all uppercase tracking-wider">
    Create Account
  </button>
</div>

</main>
<?php echo $__env->make('frontend.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script src="<?php echo e(asset('js/frontend-api.js')); ?>"></script>
<script>
// Get redirect URL from localStorage (set when user was redirected to login)
const loginRedirectUrl = localStorage.getItem('fs_login_redirect') || '<?php echo e(route("homepage.html")); ?>';

function showTab(tab) {
  if (tab === 'login') {
    document.getElementById('login-form').classList.remove('hidden');
    document.getElementById('signup-form').classList.add('hidden');
    document.getElementById('tab-login').className = 'flex-1 py-3 font-label text-sm uppercase tracking-widest bg-gradient-to-br from-primary to-error text-white shadow-[0_4px_10px_rgba(249,115,22,0.4)] hover:shadow-[0_6px_15px_rgba(249,115,22,0.6)] transition-all';
    document.getElementById('tab-signup').className = 'flex-1 py-3 font-label text-sm uppercase tracking-widest text-on-surface-variant hover:text-white transition-all';
  } else {
    document.getElementById('signup-form').classList.remove('hidden');
    document.getElementById('login-form').classList.add('hidden');
    document.getElementById('tab-signup').className = 'flex-1 py-3 font-label text-sm uppercase tracking-widest bg-gradient-to-br from-primary to-error text-white shadow-[0_4px_10px_rgba(249,115,22,0.4)] hover:shadow-[0_6px_15px_rgba(249,115,22,0.6)] transition-all';
    document.getElementById('tab-login').className = 'flex-1 py-3 font-label text-sm uppercase tracking-widest text-on-surface-variant hover:text-white transition-all';
  }
}

async function handleLogin() {
  const email = document.getElementById('login-email').value;
  const password = document.getElementById('login-password').value;
  const errorEl = document.getElementById('login-error');

  if (!email || !password) {
    errorEl.textContent = 'Please fill in all fields.';
    errorEl.classList.remove('hidden');
    return;
  }

  const res = await FrontendAPI.login(email, password);
  if (res.success) {
    DOMUtils.toast('Login successful!');
    localStorage.removeItem('fs_login_redirect');
    setTimeout(() => window.location.href = loginRedirectUrl, 1000);
  } else {
    errorEl.textContent = res.message || 'Invalid credentials.';
    errorEl.classList.remove('hidden');
  }
}

async function handleRegister() {
  const data = {
    first_name: document.getElementById('reg-fname').value,
    last_name: document.getElementById('reg-lname').value,
    email: document.getElementById('reg-email').value,
    password: document.getElementById('reg-password').value
  };
  const errorEl = document.getElementById('reg-error');

  if (!data.first_name || !data.last_name || !data.email || !data.password) {
    errorEl.textContent = 'Please fill in all fields.';
    errorEl.classList.remove('hidden');
    return;
  }

  const res = await FrontendAPI.register(data);
  if (res.success) {
    DOMUtils.toast('Account created successfully!');
    localStorage.removeItem('fs_login_redirect');
    setTimeout(() => window.location.href = loginRedirectUrl, 1000);
  } else {
    errorEl.textContent = res.message || 'Registration failed.';
    errorEl.classList.remove('hidden');
  }
}

// If user is already logged in, redirect them away from login page
document.addEventListener('DOMContentLoaded', async () => {
  const session = await FrontendAPI.getUserSession();
  if (session.success && session.logged_in) {
    window.location.href = '<?php echo e(route("my_account.html")); ?>';
  }
});
</script>
</body></html>
<?php /**PATH D:\CUI Data\6th Semester\Advance Web\AdvanceWebProject\resources\views\frontend\login_signup.blade.php ENDPATH**/ ?>