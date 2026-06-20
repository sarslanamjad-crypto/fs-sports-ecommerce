<!DOCTYPE html>

<html class="dark" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>FS86 Sahiwal | Our Journey, Mission & Innovation</title>
    <meta name="description" content="Discover the heritage and innovation behind FS86 Sahiwal. Learn how we engineer performance gear for elite athletes worldwide." />
    <link rel="icon" type="image/jpg" href="{{ asset('assets/logo.jpg') }}" />

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700;800;900&amp;display=swap"
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
                        "inverse-surface": "#fcf9f8",
                        "surface-container-low": "#131313",
                        "surface-container-lowest": "#000000",
                        "on-primary-fixed-variant": "#c2410c",
                        "on-error": "#7f1d1d",
                        "on-primary-container": "#7c2d12",
                        "primary": "#f97316",
                        "on-tertiary": "#ffffff",
                        "secondary-fixed": "#fed7aa",
                        "on-background": "#ffffff",
                        "secondary-fixed-dim": "#fdba74",
                        "inverse-on-surface": "#565555",
                        "tertiary-fixed": "#fca5a5",
                        "on-secondary": "#ffffff",
                        "on-secondary-fixed": "#7c2d12",
                        "on-tertiary-fixed-variant": "#991b1b",
                        "on-secondary-fixed-variant": "#9a3412",
                        "secondary-dim": "#ea580c",
                        "on-tertiary-container": "#450a0a",
                        "surface-dim": "#090909",
                        "on-surface-variant": "#adaaaa",
                        "secondary": "#fb923c",
                        "surface": "#090909",
                        "tertiary-fixed-dim": "#f87171",
                        "on-primary-fixed": "#9a3412",
                        "surface-tint": "#f97316",
                        "on-primary": "#ffffff",
                        "primary-dim": "#ea580c",
                        "on-error-container": "#fca5a5",
                        "surface-container-highest": "#262626",
                        "error": "#ef4444",
                        "tertiary": "#dc2626",
                        "on-surface": "#ffffff",
                        "surface-variant": "#262626",
                        "error-dim": "#dc2626",
                        "primary-container": "#fb923c",
                        "surface-container": "#1a1a1a",
                        "surface-container-high": "#20201f"
                    },
                    fontFamily: {
                        "headline": ["Nunito"],
                        "body": ["Nunito"],
                        "label": ["Nunito"]
                    },
                    borderRadius: {
                        "DEFAULT": "0.125rem",
                        "lg": "0.25rem",
                        "xl": "0.5rem",
                        "full": "0.75rem"
                    },
                },
            },
        }
    </script>


    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        body {
            background-color: #090909;
            color: #ffffff;
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>

<body class="bg-background text-on-background selection:bg-primary selection:text-on-primary">

    @include('frontend.header')

    <main class="pt-20">
        <!-- Hero Section -->
        <section class="relative h-[819px] flex items-center overflow-hidden">
            <div class="absolute inset-0 z-0">
                <img class="w-full h-full object-cover opacity-50 grayscale hover:grayscale-0 transition-all duration-1000"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuBdaWn6OdiXDe6mj7vQLfDSSJHlK0m4vRLxCFaZtZwFbsrSGnh8uwI3uOEkNYWGOkWZvssiIGT49XYud8J1gSn2pirJWK35D1pDsNKMrBiqYjRoRUTQmxvqP6l2geLDkNs6udNQWoE95A5J6Uu30yyK07ROVOzCfS9JpRRUI10Z8Pind4SONrcRv2zWJEgvYDPTeAN0Q8EsTtmZd20yor7JuEs5lxBRawhlVwxaGYHgG3euhsTvhcz7IPfMq8KRth3N2DwiQRUhV9R0"
                    alt="Athletic Lab" />
                <div class="absolute inset-0 bg-gradient-to-r from-background via-background/60 to-transparent"></div>
            </div>
            <div class="relative z-10 max-w-7xl mx-auto px-8 w-full">
                <span class="font-label text-primary tracking-[0.3em] uppercase text-sm mb-4 block">Engineered for
                    Performance</span>
                <h1
                    class="font-headline text-7xl md:text-9xl font-black italic tracking-tighter leading-[0.9] text-white">
                    BEYOND THE <br /> <span class="text-primary">EQUIPMENT.</span>
                </h1>
                <p id="about-hero-text" class="mt-8 max-w-xl text-on-surface-variant font-body text-lg leading-relaxed">
                    FS Sports isn't just a retailer. We are the kinetic link between human potential and elite
                    engineering.
                </p>
            </div>
        </section>

        <!-- Dynamic Content: Mission & History -->
        <section class="py-32 bg-surface">
            <div class="max-w-7xl mx-auto px-8 grid grid-cols-1 md:grid-cols-12 gap-12 items-center">
                <div class="md:col-span-5 space-y-8">
                    <div
                        class="inline-block px-4 py-1 border border-outline-variant rounded-full font-label text-xs uppercase tracking-widest text-on-surface-variant">
                        Our Launch</div>
                    <h2 class="font-headline text-4xl font-bold tracking-tight text-white">Built by athletes, for athletes.</h2>
                    <p id="about-content" class="font-body text-on-surface-variant leading-relaxed">
                        Started in 2014 by a group of materials scientists and retired pro-athletes, FS Sports began
                        with a single mission: to eliminate the gap between professional-grade gear and the aspiring
                        athlete.
                    </p>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-surface-container-low p-6 rounded-xl">
                            <div class="text-primary font-headline text-3xl font-black">2026</div>
                            <div class="font-label text-xs uppercase text-on-surface-variant mt-1">The year we started shaking up the game
                            </div>
                        </div>
                        <div class="bg-surface-container-low p-6 rounded-xl">
                            <div class="text-primary font-headline text-3xl font-black">100%</div>
                            <div class="font-label text-xs uppercase text-on-surface-variant mt-1">Commitment to the next generation of athletes</div>
                        </div>
                    </div>
                </div>
                <div class="md:col-span-7 relative">
                    <div class="aspect-[4/5] bg-surface-container-highest relative overflow-hidden group rounded-xl">
                        <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 opacity-80"
                            src="{{ asset('assets/About-Main.jpg') }}"
                            alt="Design Studio" />
                        <div class="absolute bottom-0 left-0 p-12 bg-gradient-to-t from-black to-transparent w-full">
                            <div class="font-label text-primary text-sm mb-2"></div>
                            <div class="font-headline text-xl font-bold"></div>
                        </div>
                    </div>
                    <div class="absolute -bottom-10 -left-10 hidden lg:block bg-primary p-10 max-w-sm shadow-2xl rounded-xl">
                        <h3 class="font-headline text-on-primary text-2xl font-black italic mb-4 uppercase">The Mission
                        </h3>
                        <p class="font-body text-on-primary text-sm leading-relaxed font-medium">
                            To empower every individual with the precision engineering required to shatter their own
                            limits.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Team Info Section (Dynamic via API) -->
        <section class="py-32 bg-background">
            <div class="max-w-7xl mx-auto px-8">
                <div class="flex justify-between items-end mb-20">
                    <div>
                        <span class="font-label text-tertiary uppercase text-sm tracking-widest">The Collective</span>
                        <h2 class="font-headline text-5xl font-bold text-white mt-2">Visionaries Behind FS.</h2>
                    </div>
                </div>
                <div id="team-grid" class="grid grid-cols-1 md:grid-cols-4 gap-6">
                    <!-- Skeleton Loading -->
                    <div class="md:col-span-2 bg-surface-container-high h-96 skeleton-pulse rounded-xl"></div>
                    <div class="bg-surface-container-high h-64 skeleton-pulse rounded-xl"></div>
                    <div class="bg-surface-container-high h-64 skeleton-pulse rounded-xl"></div>
                </div>
            </div>
        </section>

        <!-- WhatsApp Community Announcement Section -->
        <section class="py-32 bg-surface-container-lowest">
            <div class="max-w-4xl mx-auto px-8 text-center">
                <div class="mb-12">
                    <svg class="w-16 h-16 mx-auto mb-6 text-primary fill-current" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                    <h2 class="font-headline text-5xl font-black italic tracking-tighter text-white">JOIN OUR WHATSAPP
                        COMMUNITY.</h2>
                    <p class="font-body text-on-surface-variant mt-4 text-lg">Get instant alerts on new arrivals, limited equipment drops, and exclusive community announcements straight to your phone.</p>
                </div>
                <a href="https://chat.whatsapp.com/GWtdSiTzckAEk0ccqIL54P" target="_blank" rel="noopener noreferrer"
                   class="inline-flex items-center gap-3 bg-gradient-to-br from-primary to-error text-white shadow-[0_4px_10px_rgba(249,115,22,0.4)] hover:shadow-[0_6px_15px_rgba(249,115,22,0.6)] font-headline font-black italic text-lg px-12 py-5 uppercase tracking-tighter transition-all duration-300 transform hover:-translate-y-1 active:scale-95">
                    <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                    JOIN THE GROUP
                </a>
                <p class="font-label text-[10px] text-outline-variant mt-6 uppercase tracking-[0.2em]">Tap to join our official WhatsApp community channel.</p>
            </div>
        </section>
    </main>

    @include('frontend.footer')
    <script src="{{ asset('js/frontend-api.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', async () => {
            // ─── Load Site Settings ─────────────────────────────────
            try {
                const settingsRes = await FrontendAPI.getSiteSettings();
                if (settingsRes.success && settingsRes.data) {
                    const s = settingsRes.data;
                    if (s.about_us_content) {
                        document.getElementById('about-content').textContent = s.about_us_content;
                    }
                    if (s.about_us_title) {
                        document.getElementById('about-hero-text').textContent = s.about_us_title;
                    }
                }
            } catch (e) {}

            // ─── Load Team Members ──────────────────────────────────
            try {
                const teamRes = await FrontendAPI.getTeam();
                if (teamRes.success && teamRes.data && teamRes.data.length > 0) {
                    const teamGrid = document.getElementById('team-grid');
                    let html = '';

                    teamRes.data.forEach((member, i) => {
                        const imgSrc = member.image ?
                            (member.image.startsWith('http') ? member.image :
                                `/backend/images/team/${member.image}`) :
                            'https://via.placeholder.com/400x400/1a1a1a/f97316?text=' +
                            encodeURIComponent(member.fullname);

                        if (i === 0) {
                            // Featured large card
                            html += `
            <div class="md:col-span-2 bg-surface-container-high relative overflow-hidden group rounded-xl">
              <div class="h-96 w-full">
                <img class="w-full h-full object-cover opacity-80 group-hover:scale-105 transition-transform duration-500"
                     src="${imgSrc}" alt="${member.fullname}"
                     onerror="this.onerror=null;this.src='https://via.placeholder.com/400x400/1a1a1a/f97316?text=' + encodeURIComponent('${member.fullname}');" />
              </div>
              <div class="absolute bottom-0 left-0 p-8 w-full bg-gradient-to-t from-black to-transparent">
                <div class="text-white font-headline text-2xl font-bold">${member.fullname}</div>
                <div class="text-primary font-label text-sm uppercase">${member.designation || ''}</div>
                ${member.shortintro ? `<p class="text-on-surface-variant text-sm mt-2">${member.shortintro}</p>` : ''}
              </div>
            </div>`;
                        } else {
                            // Standard cards
                            html += `
            <div class="md:col-span-1 bg-surface-container-high overflow-hidden group rounded-xl">
              <div class="h-64 w-full">
                <img class="w-full h-full object-cover opacity-80 group-hover:scale-105 transition-transform duration-500"
                     src="${imgSrc}" alt="${member.fullname}"
                     onerror="this.onerror=null;this.src='https://via.placeholder.com/400x400/1a1a1a/f97316?text=' + encodeURIComponent('${member.fullname}');" />
              </div>
              <div class="p-6">
                <div class="text-white font-headline text-xl font-bold">${member.fullname}</div>
                <div class="text-primary font-label text-sm uppercase">${member.designation || ''}</div>
                <div class="flex gap-2 mt-3">
                  ${member.linkedin ? `<a href="${member.linkedin}" class="text-on-surface-variant hover:text-primary text-xs" target="_blank">LinkedIn</a>` : ''}
                  ${member.insta ? `<a href="${member.insta}" class="text-on-surface-variant hover:text-primary text-xs" target="_blank">Instagram</a>` : ''}
                  ${member.twitter ? `<a href="${member.twitter}" class="text-on-surface-variant hover:text-primary text-xs" target="_blank">Twitter</a>` : ''}
                </div>
              </div>
            </div>`;
                        }
                    });

                    teamGrid.innerHTML = html;
                } else {
                    document.getElementById('team-grid').innerHTML = `
          <div class="md:col-span-4 text-center py-16">
            <span class="material-symbols-outlined text-5xl text-outline-variant mb-4">groups</span>
            <p class="font-headline text-lg text-on-surface-variant">Team members coming soon!</p>
          </div>`;
                }
            } catch (e) {
                console.error('Failed to load team', e);
            }
        });


    </script>
</body>

</html>
