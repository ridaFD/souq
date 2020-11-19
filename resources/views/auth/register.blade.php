<x-master>
    <div class="flex justify-center mt-2">
        <div class="container w-1/3">
            <form action="{{ route('register') }}" method="POST">
                @csrf

                <h1 class="text-2xl text-center">Create New User</h1>

                <div class="flex flex-col mb-2">
                    <label for="name" class="text-md-left mb-1">Name</label>
                    <input type="text" name="name" id="name" placeholder="Enter Name"
                           class="border border-gray-500 p-1 focus:outline-none font-light @error('name') is-invalid @enderror">

                    @error('name')
                    <span class="text-red-500" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="flex flex-col mb-2">
                    <label for="email" class="text-md-left mb-1">Email</label>
                    <input type="email" name="email" id="email" placeholder="Enter email"
                           class="border border-gray-500 p-1 focus:outline-none font-light">

                    @error('email')
                    <span class="text-red-500" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="flex flex-col mb-2">
                    <label for="password" class="text-md-left mb-1">Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter password"
                           class="border border-gray-500 p-1 focus:outline-none font-light">

                    @error('password')
                    <span class="text-red-500" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="flex flex-col mb-2">
                    <label for="password-confirm" class="text-md-left mb-1">Confirm Password</label>
                    <input id="password-confirm" type="password" placeholder="Confirm the Password" value=""
                           class="border border-gray-500 p-1 focus:outline-none font-light"
                           name="password_confirmation" required autocomplete="new-password">

                    @error('password-confirm')
                    <span class="text-red-500" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="flex">
                    <button type="submit" class="p-1 bg-yellow-500 hover:bg-yellow-600 text-white mr-2">Submit</button>
                    <a href="/" class="p-1 bg-blue-500 hover:bg-blue-600 text-white">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</x-master>
