<x-app>
    <div id="wrapper">
        <div class="container flex">
            <div class="flex flex-col mt-6 mr-4">
                @if(empty(session('cart')))
                    <h1>no carts yet.</h1>
                @else
                    @foreach(session('cart') as $cart)

                        <div class="flex border border-gray-500 mb-4">
                            <a href="{{ route('product.show', $cart['id']) }}"><img src="{{ $cart['image'] }}" alt="" width="120"></a>

                            <div class="bg-blue-500 p-2">
                                <h1 class="font-light border-b border-gray-500 mb-2 pb-2">Name</h1>
                                <h6 class="text-white font-light text-sm leading-tight w-24">{{ $cart['name'] }}</h6>
                            </div>

                            <div class="bg-yellow-500 p-2">
                                <h1 class="border-b border-gray-500 mb-2 pb-2">Description</h1>
                                <h6 class="text-white font-light text-sm leading-tight w-64">{{ $cart['description'] }}</h6>
                            </div>

                            <div class="bg-blue-500 p-2">
                                <h1 class=" border-b border-gray-500 mb-2 pb-2">Price</h1>
                                <h6 class="text-white font-light text-sm w-16">{{ $cart['price'] }}</h6>
                            </div>

                            <div class="bg-yellow-500 p-2">
                                <h1 class=" border-b border-gray-500 mb-2 pb-2">Quantity</h1>

                                <form action="{{ route('add.to.cart', $cart['id']) }}" method="post">
                                    @csrf

                                    <input id="quantity" type="number" min="1" max="{{ $cart['stock'] }}" name="quantity" value="{{ $cart['quantity'] }}"
                                           class="text-center w-24"
                                           onclick="save()"
                                    />
                                    <div class="save"></div>
                                </form>
                            </div>

                            <div class="bg-blue-500 p-2">
                                <h1 class="font-light border-b border-gray-500 mb-2 pb-2">Stock</h1>
                                <h6 class="text-white font-light text-sm leading-tight w-24">{{ $cart['stock'] }}</h6>
                            </div>

                            <form action="{{ route('cart.destroy', $cart['id']) }}" method="post">
                                @csrf
                                @method('DELETE')

                                <x-delete_button />
                            </form>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="flex flex-col mt-6 mb-4 border border-gray-500 p-2">
                <div>
                    <h1 class="bg-yellow-500">Total Quantity</h1>
                    <p class="text-center p-2 bg-blue-500 text-white">{{ session('total_quantity') }}</p>
                </div>
                <div>
                    <h1 class="bg-yellow-500">Total Price</h1>
                    <p class="text-center p-2 bg-blue-500 text-white">{{ session('total_price') }}</p>
                </div>

                <form action="/purchase/{{ json_encode($items) }}" method="post">
                    @csrf
                    @method('PATCH')

                    <button type="submit" class="p-2 bg-red-600 text-white mt-6">Purchase</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function save()
        {
            var x = document.getElementsByClassName('save');
            for (var i = 0; i<= x.length; i++) {
                x[i].innerHTML = '<button type="submit">Save</button>';
            }
        }
    </script>
</x-app>

