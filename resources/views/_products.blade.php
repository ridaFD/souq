<div class="flex justify-between flex-wrap mt-6">
    @foreach($products as $product)
        <div id="wrapper" class="w-64 mx-2 border border-gray-500 mb-4">
            <a href="{{ route('product.show', $product->id) }}">
                <img src="{{ $product->image }}" alt="" width="720">
            </a>
            <div class="p-2 bg-yellow-500">
                <h1 class="font-medium">{{ $product->name }}</h1>
                <h3 id="description" class="font-light">{{ $product->description }}</h3>
                <h3>{{ $product->price }} $</h3>
            </div>

            <div class="flex justify-between">
                <form action="{{ route('product.edit', $product->id) }}" method="post">
                    @csrf

                    <button type="submit" class="p-2 bg-blue-600 hover:bg-blue-500 text-white border border-blue-600">Edit</button>
                </form>
                <form action="{{ route('product.destroy', $product->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                <x-delete_button />
                </form>
                <form action="{{ route('add.to.cart', $product->id) }}" method="post">
                    @csrf
                    <input type="hidden" name="quantity" value="1">
                    <button type="submit" class="p-2 bg-purple-600 hover:bg-purple-500 text-white border border-purple-600">Add To Cart</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
