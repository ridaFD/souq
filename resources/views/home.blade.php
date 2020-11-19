<x-app>
    <div class="container">
        <div class="">
            <ul>
                @foreach($products as $product)
                    <li>{{ $product->name }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</x-app>
