<form method="GET" action="" class="mb-3 search-bar-form">
    @foreach(request()->except('search') as $key => $value)
        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
    @endforeach
    <div class="input-group" style="max-width: 450px;">
        <input type="text" name="search" class="form-control px-3 py-2 search-bar-input" placeholder="{{ $placeholder }}" value="{{ request('search') }}" style="border-radius: 8px 0 0 8px; border: 1px solid #cbd5e1; outline: none; box-shadow: none; font-size: 0.9rem;">
        <div class="input-group-append">
            <button class="btn btn-primary px-3" type="submit" style="border-radius: 0 8px 8px 0; background: linear-gradient(135deg, #f97316 0%, #dc2626 100%) !important; border: none !important;">
                <i class="fas fa-search"></i>
            </button>
            @if(request('search'))
                <a href="{{ request()->url() }}" class="btn btn-secondary ml-2 px-3 d-flex align-items-center justify-content-center" style="border-radius: 8px; font-size: 0.85rem;">
                    Clear
                </a>
            @endif
        </div>
    </div>
</form>

<style>
.search-bar-input:focus {
    border-color: #f97316 !important;
    box-shadow: 0 0 0 3px rgba(249, 115, 22, 0.25) !important;
}
</style>
