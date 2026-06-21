/**
 * FS Sports — Frontend API Client
 * ═══════════════════════════════════════════════════════════════
 * Centralized API interface for all frontend pages.
 * All data on the frontend is fetched dynamically via these endpoints.
 */

const FrontendAPI = {
    baseUrl: '/fe-api',

    // ─── Generic Fetch Wrapper ─────────────────────────────────
    async _fetch(endpoint, options = {}) {
        try {
            const url = `${this.baseUrl}${endpoint}`;
            const csrfToken = document.querySelector('meta[name="csrf-token"]');
            const config = {
                credentials: 'same-origin',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': csrfToken ? csrfToken.getAttribute('content') : '',
                },
                ...options,
            };

            if (config.body && typeof config.body === 'object') {
                config.body = JSON.stringify(config.body);
            }

            const response = await fetch(url, config);
            let data = {};
            try {
                data = await response.json();
            } catch (e) {}

            if (data && typeof data === 'object') {
                data._status = response.status;
            }

            if (response.status === 401 && endpoint !== '/login') {
                const error = new Error('Unauthorized');
                error.response = { status: 401 };
                throw error;
            }

            if (!response.ok) {
                console.error(`API Error [${endpoint}]:`, data);
            }

            return data;
        } catch (error) {
            console.error(`API Network Error [${endpoint}]:`, error);
            return { success: false, message: 'Network error. Please try again.' };
        }
    },

    // ─── Site Settings ─────────────────────────────────────────
    async getSiteSettings() {
        return this._fetch('/site-settings');
    },

    // ─── Categories ────────────────────────────────────────────
    async getCategories() {
        return this._fetch('/categories');
    },

    // ─── Products ──────────────────────────────────────────────
    async getProducts(filters = {}) {
        const params = new URLSearchParams();
        if (filters.category_id) params.append('category_id', filters.category_id);
        if (filters.search) params.append('search', filters.search);
        if (filters.min_price) params.append('min_price', filters.min_price);
        if (filters.max_price) params.append('max_price', filters.max_price);
        if (filters.in_house !== undefined) params.append('in_house', filters.in_house);
        const query = params.toString();
        return this._fetch(`/products${query ? '?' + query : ''}`);
    },

    async getProduct(id) {
        return this._fetch(`/products/${id}`);
    },

    async getFeaturedProducts() {
        return this._fetch('/featured-products');
    },

    // ─── Team ──────────────────────────────────────────────────
    async getTeam() {
        return this._fetch('/team');
    },

    // ─── FAQs ──────────────────────────────────────────────────
    async getFaqs() {
        return this._fetch('/faqs');
    },

    // ─── Branches ──────────────────────────────────────────────
    async getBranches() {
        return this._fetch('/branches');
    },




    // ─── Videos ────────────────────────────────────────────────
    async getVideos() {
        return this._fetch('/videos');
    },

    // ─── Groups ────────────────────────────────────────────────
    async getGroups() {
        return this._fetch('/groups');
    },

    // ─── Reviews ───────────────────────────────────────────────
    async getReviews(productId) {
        return this._fetch(`/reviews/${productId}`);
    },

    // ─── Contact ───────────────────────────────────────────────
    async submitContact(data) {
        return this._fetch('/contact', {
            method: 'POST',
            body: data,
        });
    },

    // ─── Newsletter ────────────────────────────────────────────
    async subscribeNewsletter(email) {
        return this._fetch('/newsletter', {
            method: 'POST',
            body: { email },
        });
    },

    // ─── Auth ──────────────────────────────────────────────────
    async register(data) {
        const csrfToken = document.querySelector('meta[name="csrf-token"]');
        const response = await fetch('/register', {
            method: 'POST',
            credentials: 'same-origin',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': csrfToken ? csrfToken.getAttribute('content') : '',
            },
            body: JSON.stringify(data)
        });
        
        let resData = {};
        try {
            resData = await response.json();
        } catch (e) {}
        
        if (resData && typeof resData === 'object') {
            resData._status = response.status;
        }
        return resData;
    },

    async login(email, password) {
        return this._fetch('/login', {
            method: 'POST',
            body: { email, password },
        });
    },

    async logout() {
        return this._fetch('/logout', { method: 'POST' });
    },

    async getUserSession() {
        return this._fetch('/user-session');
    },

    // ─── Wishlist ──────────────────────────────────────────────
    async getWishlist() {
        return this._fetch('/wishlist');
    },

    async addToWishlist(productId) {
        return this._fetch('/wishlist', {
            method: 'POST',
            body: { product_id: productId },
        });
    },

    async removeFromWishlist(id) {
        return this._fetch(`/wishlist/${id}`, { method: 'DELETE' });
    },

    // ─── Cart ──────────────────────────────────────────────────
    async getCart() {
        return this._fetch('/cart');
    },

    async addToCart(productId, quantity = 1) {
        return this._fetch('/cart', {
            method: 'POST',
            body: { product_id: productId, quantity },
        });
    },

    async removeFromCart(id) {
        return this._fetch(`/cart/${id}`, { method: 'DELETE' });
    },

    // ─── Checkout ──────────────────────────────────────────────
    async checkout(shippingData) {
        return this._fetch('/checkout', {
            method: 'POST',
            body: shippingData,
        });
    },

    // ─── Orders ───────────────────────────────────────────────
    async getOrders() {
        return this._fetch('/orders');
    },

    // ─── Reviews ──────────────────────────────────────────────
    async submitReview(productId, rating, comment) {
        return this._fetch('/reviews', {
            method: 'POST',
            body: { product_id: productId, rating, comment },
        });
    },




    // ─── Group Purchase ───────────────────────────────────────
    async joinGroup(groupId) {
        return this._fetch(`/groups/${groupId}/join`, {
            method: 'POST',
        });
    },
};

// ─── DOM Utility Helpers ───────────────────────────────────────
const DOMUtils = {
    /**
     * Create a skeleton loading placeholder
     */
    skeleton(width = '100%', height = '20px', rounded = '4px') {
        return `<div style="width:${width};height:${height};border-radius:${rounded};background:linear-gradient(90deg,#1a1a1a 25%,#2a2a2a 50%,#1a1a1a 75%);background-size:200% 100%;animation:shimmer 1.5s infinite;" class="skeleton-pulse"></div>`;
    },

    /**
     * Create product card HTML from product data
     */
    productCard(product, clickUrl = null) {
        const imgSrc = product.image
            ? (product.image.startsWith('http') ? product.image : `/storage/${product.image}`)
            : null;
        const inHouse = product.is_in_house_brand == 1;
        const initials = (product.title || 'FS').substring(0, 2).toUpperCase();

        const isDiscounted = product.discount_percentage > 0 && product.discounted_price !== null;
        const discountBadgeHtml = isDiscounted
            ? `<span class="bg-gradient-to-r from-orange-500 to-red-600 text-white font-headline font-black text-xs px-3 py-1.5 uppercase rounded shadow-lg tracking-wider absolute top-4 right-4 z-10">${product.discount_percentage}% OFF</span>`
            : '';

        const priceHtml = isDiscounted
            ? `<div class="flex items-center gap-2">
                <span class="font-label text-primary font-bold text-lg">Rs. ${parseFloat(product.discounted_price).toFixed(0)}</span>
                <span class="text-slate-400 line-through text-xs">Rs. ${parseFloat(product.price).toFixed(0)}</span>
               </div>`
            : `<span class="font-label text-primary font-bold">Rs. ${parseFloat(product.price).toFixed(0)}</span>`;

        return `
        <div class="product-card group relative bg-surface-container-low rounded-xl overflow-hidden transition-all duration-500 hover:scale-[1.02] cursor-pointer min-h-[380px]"
             onclick="${clickUrl ? `window.location.href='${clickUrl}'` : ''}">
            <div class="aspect-[4/5] relative overflow-hidden flex items-center justify-center" style="background:linear-gradient(135deg,#111,#1a1a1a);">
                ${imgSrc
                    ? `<img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                           src="${imgSrc}" alt="${product.title}"
                           onerror="this.style.display='none';this.nextElementSibling.style.display='flex'" />
                       <div style="display:none;" class="absolute inset-0 items-center justify-center">
                           <span style="color:#f97316;font-size:3rem;font-weight:900;">${initials}</span>
                       </div>`
                    : `<span style="color:#f97316;font-size:3rem;font-weight:900;">${initials}</span>`
                }
                <div class="absolute top-4 left-4 flex flex-col gap-2">
                    <span class="bg-tertiary text-on-tertiary font-label text-[10px] px-2 py-1 uppercase tracking-tighter">New Arrival</span>
                    ${inHouse ? '<span class="bg-secondary-container text-secondary font-label text-[10px] px-2 py-1 uppercase tracking-tighter">In-House Brand</span>' : ''}
                </div>
                ${discountBadgeHtml}
            </div>
            <div class="p-6">
                <div class="flex justify-between items-start mb-2">
                    <h3 class="text-xl font-headline font-bold text-on-surface tracking-tight group-hover:text-primary transition-colors">${product.title}</h3>
                    ${priceHtml}
                </div>
                <p class="text-sm text-on-surface-variant font-body mb-6 line-clamp-2">${product.description || 'Premium performance gear'}</p>
                <button class="add-to-cart-btn w-full py-3 bg-white/5 group-hover:bg-primary group-hover:text-on-primary transition-all font-label text-xs uppercase tracking-widest"
                        data-product-id="${product.id}" onclick="event.stopPropagation(); addToCartHandler(${product.id})">
                    Add to Kit
                </button>
            </div>
        </div>`;
    },

    /**
     * Create wishlist card HTML
     */
    wishlistCard(item) {
        const product = item.product;
        if (!product) return '';
        const imgSrc = product.image
            ? (product.image.startsWith('http') ? product.image : `/storage/${product.image}`)
            : null;
        const inHouse = product.is_in_house_brand == 1;
        const initials = (product.title || 'FS').substring(0, 2).toUpperCase();

        return `
        <article class="group relative flex flex-col bg-surface-container-low rounded-xl overflow-hidden transition-all duration-500 hover:scale-[1.02] hover:bg-surface-container-high">
            <div class="relative aspect-[4/5] overflow-hidden flex items-center justify-center" style="background:linear-gradient(135deg,#111,#1a1a1a);">
                ${imgSrc
                    ? `<img class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-700"
                           src="${imgSrc}" alt="${product.title}"
                           onerror="this.style.display='none';this.nextElementSibling.style.display='flex'" />
                       <div style="display:none;" class="absolute inset-0 items-center justify-center">
                           <span style="color:#f97316;font-size:3rem;font-weight:900;">${initials}</span>
                       </div>`
                    : `<span style="color:#f97316;font-size:3rem;font-weight:900;">${initials}</span>`
                }
                ${inHouse ? '<div class="absolute top-4 left-4 z-10"><span class="font-label text-[10px] bg-secondary-container text-secondary px-2 py-1 uppercase font-bold tracking-widest">In-House Brand</span></div>' : ''}
                <button onclick="removeWishlistHandler(${item.wishlist_id})" class="absolute top-4 right-4 z-10 w-10 h-10 flex items-center justify-center bg-black/40 backdrop-blur-md rounded-md text-white hover:text-error transition-colors">
                    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">close</span>
                </button>
            </div>
            <div class="p-6 flex flex-col gap-4">
                <div class="flex justify-between items-start">
                    <div>
                        <h3 class="font-headline text-xl font-bold uppercase tracking-tight">${product.title}</h3>
                        <p class="font-label text-neutral-500 text-xs tracking-widest">${product.description ? product.description.substring(0, 40) : ''}</p>
                    </div>
                    <span class="font-headline text-xl font-black text-primary">Rs. ${parseFloat(product.price).toFixed(0)}</span>
                </div>
                <button onclick="addToCartHandler(${product.id})"
                        class="w-full bg-primary text-on-primary font-label text-xs font-bold py-3 uppercase tracking-widest flex items-center justify-center gap-2 transition-all hover:bg-primary-dim">
                    Add to Kit <span class="material-symbols-outlined text-sm">add_shopping_cart</span>
                </button>
            </div>
        </article>`;
    },

    /**
     * Show toast notification
     */
    toast(message, type = 'success') {
        const toast = document.createElement('div');
        toast.className = `fixed bottom-6 right-6 z-[10000] px-6 py-4 rounded-md font-label text-sm tracking-wide shadow-2xl transition-all duration-500 transform translate-y-20 opacity-0`;
        toast.style.background = type === 'success' ? '#f97316' : '#dc2626';
        toast.style.color = '#ffffff';
        toast.textContent = message;
        document.body.appendChild(toast);

        // Keep track of active toasts count to float WhatsApp FAB dynamically
        window.toastCount = (window.toastCount || 0) + 1;
        window.dispatchEvent(new CustomEvent('toast-state', { detail: { active: true } }));

        requestAnimationFrame(() => {
            toast.classList.remove('translate-y-20', 'opacity-0');
        });

        setTimeout(() => {
            toast.classList.add('translate-y-20', 'opacity-0');
            setTimeout(() => {
                toast.remove();
                window.toastCount = Math.max(0, window.toastCount - 1);
                if (window.toastCount === 0) {
                    window.dispatchEvent(new CustomEvent('toast-state', { detail: { active: false } }));
                }
            }, 500);
        }, 3000);
    }
};

// ─── Shimmer animation ──────────────────────────────────────────
const shimmerStyle = document.createElement('style');
shimmerStyle.textContent = `
@keyframes shimmer {
    0% { background-position: -200% 0; }
    100% { background-position: 200% 0; }
}
.skeleton-pulse {
    animation: shimmer 1.5s ease-in-out infinite;
}
`;
document.head.appendChild(shimmerStyle);

// ─── Global Handlers ────────────────────────────────────────────
function redirectToLogin() {
    // Store current page URL so user comes back after login
    localStorage.setItem('fs_login_redirect', window.location.href);
    window.location.href = '/login';
}

async function addToCartHandler(productId) {
    try {
        const res = await FrontendAPI.addToCart(productId);
        if (res._status === 200 && res.success) {
            DOMUtils.toast(res.message || 'Added to cart!', 'success');
        } else {
            DOMUtils.toast(res.message || 'Failed to add item.', 'error');
        }
    } catch (error) {
        if (error.response && error.response.status === 401) {
            DOMUtils.toast('Please login first', 'error');
            localStorage.setItem('fs_login_redirect', window.location.href);
            window.location.href = '/login';
            return;
        }
    }
}

async function addToWishlistHandler(productId) {
    try {
        const res = await FrontendAPI.addToWishlist(productId);
        if (res._status === 200 && res.success) {
            DOMUtils.toast(res.message || 'Added to wishlist!', 'success');
        } else {
            DOMUtils.toast(res.message || 'Failed to add item.', 'error');
        }
    } catch (error) {
        if (error.response && error.response.status === 401) {
            DOMUtils.toast('Please login first', 'error');
            localStorage.setItem('fs_login_redirect', window.location.href);
            window.location.href = '/login';
            return;
        }
    }
}

async function removeWishlistHandler(wishlistId) {
    const res = await FrontendAPI.removeFromWishlist(wishlistId);
    if (res.success) {
        DOMUtils.toast('Removed from wishlist.');
        if (typeof loadWishlist === 'function') loadWishlist();
    }
}
