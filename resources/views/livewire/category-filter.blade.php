<div>

    <div class="bg-white rounded-lg shadow-lg mb-6">
        <div class="px-6 py-2 flex justify-between items-center">
            <h2 class="font-semibold uppercase text-gray-700">{{ $category->name }}</h2>
            <div class="grid grid-cols-2 border border-gray-200 divide-x divide-gray-200 text-gray-500">
                <i wire:click="$set('view', 'grid')" class="fas fa-border-all p-3 cursor-pointer {{$view == 'grid' ? 'text-blue-500' : ''}}"></i>
                <i wire:click="$set('view', 'list')" class="fas fa-th-list p-3 cursor-pointer {{$view == 'list' ? 'text-blue-500' : ''}}"></i>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
        <aside>
            
            <h3 class="font-semibold text-center mb-2">Subcategorías</h3>
            <ul class="divide-y divide-gray-200">
                @foreach ($category->subcategories as $subcategory)
                    <li class="py-2">
                        <a wire:click="$set('subcategoria', '{{ $subcategory->name }}')"
                            class="cursor-pointer hover:text-blue-500 capitalize {{$subcategoria==$subcategory->name ? 'text-blue-500 font-semibold' : ''}}">
                            {{ $subcategory->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
            
            <h3 class="font-semibold text-center mb-2">Marcas</h3>
            <ul class="divide-y divide-gray-200">
                @foreach ($category->brands as $brand)
                    <li class="py-2">
                        <a wire:click="$set('marca', '{{ $brand->name }}')" 
                            class="cursor-pointer hover:text-blue-500 capitalize {{$marca==$brand->name ? 'text-blue-500 font-semibold' : ''}}">
                            {{ $brand->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
            <x-jet-button class="mt-4" wire:click="limpiar">
                Borrar filtros
            </x-jet-button>
        </aside>
        <div class="md:col-span-2 lg:col-span-4">
            @if ($view == 'grid')
            <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                @foreach ($products as $product)
                    <li class="bg-white rounded-lg shadow">
                        <article>
                            <figure>
                                <img class="h-48 w-full object-cover object-center"
                                    src="{{ Storage::url($product->images->first()->url) }}" alt="">
                            </figure>
                            <div class="py-4 px-6">
                                <h1 class="text-lg font-semibold">
                                    <a href="">
                                        {{ Str::limit($product->name, 20) }}
                                    </a>
                                </h1>
                                <p class="font-bold text-gray-700">$ {{ $product->price }}</p>
                            </div>
                        </article>
                    </li>
                @endforeach
            </ul>
            @else
            <ul class="">
                @foreach ($products as $product)
                    <li class="bg-white rounded-lg shadow mb-4">
                        <article class="flex">
                            <figure>
                                <img class="h-48 w-56 object-cover object-center"
                                    src="{{ Storage::url($product->images->first()->url) }}" alt="">
                            </figure>
                            <div class="flex-1 py-4 px-6 flex flex-col">
                                <div class="flex justify-between">
                                    <div>
                                        <h3 class="text-lg font-semibold">
                                            <a href="">
                                                {{$product->name}}
                                            </a>
                                        </h3>
                                        <p class="font-bold text-gray-700">$ {{ $product->price }}</p>
                                    </div>
                                    <div class="flex items-center">
                                        <ul class="flex text-sm ">
                                            <li><i class="fas fa-star text-yellow-400 mr-1"></i></li>
                                            <li><i class="fas fa-star text-yellow-400 mr-1"></i></li>
                                            <li><i class="fas fa-star text-yellow-400 mr-1"></i></li>
                                            <li><i class="fas fa-star text-yellow-400 mr-1"></i></li>
                                            <li><i class="fas fa-star text-yellow-400 mr-1"></i></li>
                                        </ul>
                                        <span class="text-gray-700 text-sm">(24)</span>
                                    </div>
                                </div>
                                <div class=" mt-auto">
                                    <x-jet-danger-button>Más Información</x-jet-danger-button>
                                </div>
                            </div>
                        </article>
                    </li>
                @endforeach
            </ul>
            @endif

            <div class="pagination mt-4">
                {{ $products->links() }}
            </div>
        </div>
    </div>

</div>
