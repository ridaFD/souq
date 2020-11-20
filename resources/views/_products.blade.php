<div class="flex justify-between flex-wrap mt-6">
    @foreach($products as $product)
        <div id="wrapper" class="w-64 mx-2 border border-gray-500 mb-4">
            <a href="">
                <img src="{{ $product->image }}" alt="" width="720">
            </a>
            <div class="p-2 bg-yellow-500">
                <h1 class="font-medium">{{ $product->name }}</h1>
                <h3 id="description" class="font-light">{{ $product->description }}</h3>
                <h3>{{ $product->price }} $</h3>
            </div>

            <div class="flex justify-between">
                <form action="/product/edit/{{ $product->id }}" method="post">
                    @csrf

                    <button type="submit" class="p-2 bg-blue-600 hover:bg-blue-500 text-white border border-blue-600">Edit</button>
                </form>
                <button class="p-2 bg-red-600 hover:bg-red-500 text-white border border-red-600">Delete</button>
                <button class="p-2 bg-purple-600 hover:bg-purple-500 text-white border border-purple-600">Add To Cart</button>
            </div>
        </div>
    @endforeach
</div>
