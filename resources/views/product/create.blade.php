<x-app>
    <div class="">
        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <h1 class="text-2xl text-center py-4 mb-4 border-b border-gray-500">Create New Product</h1>

            <div>
                <div class="flex flex-col mb-2">
                    <label for="name" class="text-md-left mb-1">Name</label>
                    <input type="text" name="name" id="name" placeholder="Enter Name" value="{{ old('name') }}"
                           class="border border-gray-500 p-1 focus:outline-none font-light @error('name') is-invalid @enderror">

                    @error('name')
                    <span class="text-red-500" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="flex flex-col mb-2">
                    <label for="category_id" class="text-md-left mb-1">Category</label>
                    <select name="category_id" id="category_id"
                            class="border border-gray-500 p-1 focus:outline-none font-light @error('category') is-invalid @enderror">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>

                    @error('category')
                        <span class="text-red-500" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="flex flex-col mb-2">
                    <label for="image" class="text-md-left mb-1">Image</label>
                    <input type="file" name="image" id="image" placeholder="" value="{{ old('image') }}"
                           class="border border-gray-500 p-1 focus:outline-none font-light">

                    @error('image')
                    <span class="text-red-500" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="flex flex-col mb-2">
                    <label for="description" class="text-md-left mb-1">Description</label>
                    <textarea name="description" id="description" cols="30" rows="5"
                              class="border border-gray-500 p-1 focus:outline-none font-light">{{ old('description') }}</textarea>

                    @error('description')
                    <span class="text-red-500" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="flex flex-col mb-2">
                    <label for="price" class="text-md-left mb-1">Price</label>
                    <input type="number" step=".01" name="price" id="price" placeholder="" value="{{ old('price') }}"
                           class="border border-gray-500 p-1 focus:outline-none font-light">

                    @error('price')
                    <span class="text-red-500" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

            </div>

            <div class="flex">
                <button type="submit" class="p-1 bg-yellow-500 hover:bg-yellow-600 text-white mr-2">Submit
                </button>
                <a href="/" class="p-1 bg-blue-500 hover:bg-blue-600 text-white">Cancel</a>
            </div>
        </form>
    </div>
</x-app>
