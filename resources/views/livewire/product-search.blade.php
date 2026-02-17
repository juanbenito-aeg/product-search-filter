<div>
    <button type="button" wire:click="redirectt">Redirect</button>

    <div class="mb-6 space-y-4">
        {{-- Search Input --}}
        <input type="text" wire:model.live="search" placeholder="Search products..." class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">

        {{-- Sort Dropdown --}}
        <select wire:model.live="sortBy" class="w-full px-4 py-2 border rounded-lg">
            <option value="latest">Latest</option>
            <option value="price-low">Price: Low to High</option>
            <option value="price-high">Price: High to Low</option>
        </select>
    </div>

    {{-- Loading State --}}
    <div wire:loading class="text-center py-8">
        <div class="inline-block animate-spin">
            <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
            </svg>
        </div>
    </div>

    {{-- Products Grid --}}
    <div wire:loading.remove class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($products as $product)
            <div x-data="{ isFavorite: false, isComparing: false }" class="bg-white rounded-lg shadow hover:shadow-lg transition">
                <div class="relative">
                    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-48 object-cover rounded-t-lg">
                    
                    {{-- Favorite Button --}}
                    <button type="button" class="absolute top-2 right-2 p-2 bg-white rounded-full shadow hover:shadow-lg transition" :class="isFavorite ? 'text-red-500' : 'text-gray-400'" @click="isFavorite = !isFavorite">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"></path>
                        </svg>
                    </button>

                    <div class="p-4">
                        <h3 class="font-semibold text-lg">{{ $product->name }}</h3>
                        <p class="text-gray-600 text-sm mb-2">{{ $product->description }}</p>
                        <p class="text-blue-600 font-bold text-lg">${{ $product->price }}</p>
                    
                        {{-- Compare Checkbox --}}
                        <div class="mt-4">
                            <label class="flex items-center space-x-2 cursor-pointer">
                                <input type="checkbox" x-model="isComparing" class="w-4 h-4 rounded">
                                <span class="text-sm text-gray-600">Compare</span>
                            </label>
                        </div>

                        <div x-show="isFavorite" class="mt-2 text-red-500 text-sm font-medium">
                            Added to favorites
                        </div>
                        <div x-show="isComparing" class="mt-2 text-red-500 text-sm font-medium">
                            Added to comparison
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-12 text-gray-500">
                No products found. Try adjusting your filters.
            </div>
        @endforelse
    </div>

    {{-- Pagination --}}
    <div class="mt-8">
        {{ $products->links() }}
    </div>
</div>
