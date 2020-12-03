<x-app>
    <div id="wrapper">
        <div class="container">
            <div class="flex">
                <img src="{{ $product->image }}" alt="" width="360">
                <div class="">
                    <h1 class="text-3xl border-b border-gray-500 mb-4">{{ $product->name }}</h1>
                    <h3 class="text-xl border-b border-gray-500 mb-4">{{ $product->description }}</h3>
                    <h3 class="text-lg border-b border-gray-500 mb-4">{{ $product->price }}</h3>

                    @can('customer')
                        @if($product->stock >= 1)
                            <form action="{{ route('add.to.cart', $product->id) }}" method="post">
                                @csrf

                                <div class="flex flex-col">
                                    <label for="quantity">Quantity</label>
                                    <input type="number" value="1" min="1" max="{{ $product->stock }}" name="quantity" id="quantity" class="w-32 border border-gray-500 focus:outline-none p-1">
                                </div>
                                <button type="submit" class="border border-gray-500 p-2 bg-yellow-500 mt-6">Add To Cart</button>
                            </form>
                        @endif
                    @endcan
                </div>
            </div>
        </div>
    </div>
</x-app>
