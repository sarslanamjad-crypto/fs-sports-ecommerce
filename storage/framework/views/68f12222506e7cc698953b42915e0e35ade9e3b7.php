<!DOCTYPE html>
<html class="dark" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>FS86 Sahiwal | Support & Information Center</title>
    <meta name="description" content="Find answers to common questions about FS86 Sahiwal products, shipping, and community features." />
    <link rel="icon" type="image/jpg" href="<?php echo e(asset('assets/logo.jpg')); ?>" />
    
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700;800;900&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            colors: {
              "surface-bright": "#2c2c2c", "tertiary-container": "#b91c1c", "on-secondary-container": "#fed7aa",
              "outline": "#767575", "error-container": "#9f0519", "inverse-primary": "#9a3412",
              "outline-variant": "#484847", "secondary-container": "#7c2d12", "primary-fixed": "#fdba74",
              "primary-fixed-dim": "#fb923c", "on-tertiary-fixed": "#450a0a", "tertiary-dim": "#b91c1c",
              "background": "#090909", "inverse-surface": "#fcf9f8", "surface-container-low": "#131313",
              "surface-container-lowest": "#000000", "on-primary-fixed-variant": "#c2410c", "on-error": "#7f1d1d",
              "on-primary-container": "#7c2d12", "primary": "#f97316", "on-tertiary": "#ffffff",
              "secondary-fixed": "#fed7aa", "on-background": "#ffffff", "secondary-fixed-dim": "#fdba74",
              "inverse-on-surface": "#565555", "tertiary-fixed": "#fca5a5", "on-secondary": "#ffffff",
              "on-secondary-fixed": "#7c2d12", "on-tertiary-fixed-variant": "#991b1b",
              "on-secondary-fixed-variant": "#9a3412", "secondary-dim": "#ea580c",
              "on-tertiary-container": "#450a0a", "surface-dim": "#090909", "on-surface-variant": "#adaaaa",
              "secondary": "#fb923c", "surface": "#090909", "tertiary-fixed-dim": "#f87171",
              "on-primary-fixed": "#9a3412", "surface-tint": "#f97316", "on-primary": "#ffffff",
              "primary-dim": "#ea580c", "on-error-container": "#fca5a5", "surface-container-highest": "#262626",
              "error": "#ef4444", "tertiary": "#dc2626", "on-surface": "#ffffff", "surface-variant": "#262626",
              "error-dim": "#dc2626", "primary-container": "#fb923c", "surface-container": "#1a1a1a",
              "surface-container-high": "#20201f"
            },
            fontFamily: { "headline": ["Nunito"], "body": ["Nunito"], "label": ["Nunito"] },
            borderRadius: {"DEFAULT": "0.125rem", "lg": "0.25rem", "xl": "0.5rem", "full": "0.75rem"},
          },
        },
      }
    </script>


    <style>
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
        body { background-color: #090909; color: #ffffff; font-family: 'Nunito', sans-serif; }
    </style>
</head>
<body class="bg-background text-on-background selection:bg-primary selection:text-on-primary">

<?php echo $__env->make('frontend.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<main class="pt-32 pb-32 max-w-4xl mx-auto px-8 min-h-screen">
    <div class="mb-16">
        <span class="font-label text-primary tracking-[0.3em] uppercase text-sm mb-4 block">Help Center</span>
        <h1 class="font-headline text-5xl md:text-7xl font-black italic tracking-tighter text-white">
            FREQUENTLY ASKED <br/> <span class="text-primary">QUESTIONS</span>
        </h1>
        <p class="mt-6 text-on-surface-variant font-body text-lg border-l-4 border-primary pl-4">Everything you need to know about our products, operations, and support.</p>
    </div>

    <!-- FAQs Container -->
    <div id="faqs-container" class="space-y-4">
        <!-- Skeleton Loading -->
        <div class="h-20 bg-surface-container-high rounded-xl skeleton-pulse"></div>
        <div class="h-20 bg-surface-container-high rounded-xl skeleton-pulse"></div>
        <div class="h-20 bg-surface-container-high rounded-xl skeleton-pulse"></div>
    </div>
</main>

<?php echo $__env->make('frontend.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script src="<?php echo e(asset('js/frontend-api.js')); ?>"></script>
<script>
document.addEventListener('DOMContentLoaded', async () => {
    try {
        const faqsRes = await FrontendAPI.getFaqs();
        const container = document.getElementById('faqs-container');
        
        if (faqsRes.success && faqsRes.data && faqsRes.data.length > 0) {
            container.innerHTML = faqsRes.data.map((faq, index) => `
                <div class="bg-surface-container-low rounded-xl overflow-hidden border border-outline-variant/20">
                    <button class="w-full px-8 py-6 flex justify-between items-center bg-surface-container-highest hover:bg-surface-container-high transition-colors text-left" onclick="toggleFaq(${index})">
                        <h3 class="font-headline font-bold text-lg pr-8">${faq.question}</h3>
                        <span id="faq-icon-${index}" class="material-symbols-outlined text-primary transition-transform duration-300">expand_more</span>
                    </button>
                    <div id="faq-answer-${index}" class="hidden px-8 pb-6 bg-surface-container-highest">
                        <p class="font-body text-on-surface-variant leading-relaxed border-t border-outline-variant/20 pt-6 mt-2">${faq.answer}</p>
                    </div>
                </div>
            `).join('');
        } else {
            container.innerHTML = `
                <div class="text-center py-16 bg-surface-container-low rounded-xl border border-outline-variant/20">
                    <span class="material-symbols-outlined text-outline-variant text-5xl mb-4">info</span>
                    <p class="font-headline text-on-surface-variant text-lg">No FAQs available yet.</p>
                </div>
            `;
        }
    } catch (e) {
        console.error('Failed to load FAQs:', e);
    }
});

function toggleFaq(index) {
    const answer = document.getElementById('faq-answer-' + index);
    const icon = document.getElementById('faq-icon-' + index);
    if (answer.classList.contains('hidden')) {
        answer.classList.remove('hidden');
        icon.style.transform = 'rotate(180deg)';
    } else {
        answer.classList.add('hidden');
        icon.style.transform = 'rotate(0deg)';
    }
}
</script>
</body>
</html>
<?php /**PATH D:\CUI Data\6th Semester\Advance Web\AdvanceWebProject\resources\views\frontend\faqs.blade.php ENDPATH**/ ?>