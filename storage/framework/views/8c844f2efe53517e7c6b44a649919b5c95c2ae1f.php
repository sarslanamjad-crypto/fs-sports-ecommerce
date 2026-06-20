<!DOCTYPE html>
<html class="dark" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>FS86 Sahiwal | Our Premium Distribution Points</title>
<meta name="description" content="Find an official FS86 Sahiwal store or authorized partner near you for expert gear consultations." />
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


<style>
  .material-symbols-outlined { font-variation-settings:'FILL' 0,'wght' 400,'GRAD' 0,'opsz' 24; }
  body { background-color:#090909; color:#ffffff; font-family:'Nunito',sans-serif; }
</style>
</head>
<body class="bg-background text-on-background selection:bg-primary selection:text-on-primary">

<?php echo $__env->make('frontend.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<main class="pt-32 pb-20 px-8 max-w-7xl mx-auto min-h-screen">
<div class="mb-16">
  <span class="font-label text-primary uppercase tracking-[0.3em] text-[10px] mb-2 block">Network</span>
  <h1 class="font-headline text-5xl md:text-7xl font-black italic tracking-tighter uppercase leading-none mb-4">Store <span class="text-primary">Locator</span></h1>
  <p class="max-w-xl text-on-surface-variant font-body text-lg">Find our retail locations near you. Experience our gear firsthand.</p>
</div>

<div id="branches-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
  <div class="bg-surface-container-low h-48 skeleton-pulse rounded-lg"></div>
  <div class="bg-surface-container-low h-48 skeleton-pulse rounded-lg"></div>
  <div class="bg-surface-container-low h-48 skeleton-pulse rounded-lg"></div>
</div>

<div id="branches-empty" class="hidden text-center py-20">
  <span class="material-symbols-outlined text-6xl text-outline-variant mb-4">location_off</span>
  <p class="font-headline text-xl text-on-surface-variant">No store locations available yet.</p>
</div>
</main>

<?php echo $__env->make('frontend.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script src="<?php echo e(asset('js/frontend-api.js')); ?>"></script>
<script>
document.addEventListener('DOMContentLoaded', async () => {
  const res = await FrontendAPI.getBranches();
  const grid = document.getElementById('branches-grid');
  const empty = document.getElementById('branches-empty');

  if (res.success && res.data && res.data.length > 0) {
    grid.innerHTML = res.data.map(branch => `
      <div class="bg-surface-container-low p-8 rounded-lg border border-outline-variant/10 hover:border-primary/30 transition-all group">
        <div class="flex items-start gap-4 mb-4">
          <span class="material-symbols-outlined text-primary text-3xl" style="font-variation-settings:'FILL' 1;">storefront</span>
          <div>
            <h3 class="font-headline text-xl font-bold text-white group-hover:text-primary transition-colors">${branch.branch_name}</h3>
            <p class="font-label text-primary text-xs uppercase tracking-widest mt-1">${branch.city || ''}</p>
          </div>
        </div>
        <p class="font-body text-on-surface-variant text-sm mb-4">${branch.location || ''}</p>
        ${branch.phone ? `<div class="flex items-center gap-2 text-on-surface-variant text-sm"><span class="material-symbols-outlined text-sm">call</span>${branch.phone}</div>` : ''}
        ${branch.latitude && branch.longitude ? `
          <div class="mt-4 pt-4 border-t border-outline-variant/10">
            <a href="https://www.google.com/maps/dir/?api=1&destination=${branch.latitude},${branch.longitude}" 
               target="_blank" 
               class="inline-flex items-center space-x-2 text-sm text-primary hover:underline font-bold">
                <span>📍 Open in Maps</span>
            </a>
          </div>
        ` : ''}
      </div>
    `).join('');
  } else {
    grid.classList.add('hidden');
    empty.classList.remove('hidden');
  }
});
</script>
</body></html>
<?php /**PATH D:\CUI Data\6th Semester\Advance Web\AdvanceWebProject\resources\views/frontend/store_locator.blade.php ENDPATH**/ ?>