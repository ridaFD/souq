<x-master>
    <div class="flex justify-center">
        <div class="container w-1/3">
            <form action="{{ route('register') }}" method="POST">
                @csrf

                <h1 class="text-2xl text-center">Create New User</h1>

                <div class="flex flex-col mb-2">
                    <label for="name" class="text-md-left mb-1">Name</label>
                    <input type="text" name="name" id="name" placeholder="Enter Name"
                           class="border border-gray-500 p-1 focus:outline-none font-light">
                </div>

                <div class="flex flex-col mb-2">
                    <label for="email" class="text-md-left mb-1">Email</label>
                    <input type="email" name="email" id="email" placeholder="Enter email"
                           class="border border-gray-500 p-1 focus:outline-none font-light">
                </div>

                <div class="flex flex-col mb-2">
                    <label for="password" class="text-md-left mb-1">Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter password"
                           class="border border-gray-500 p-1 focus:outline-none font-light">
                </div>

                <div class="flex flex-col mb-2">
                    <label for="password-confirm" class="text-md-left mb-1">Confirm Password</label>
                    <input id="password-confirm" type="password" placeholder="Confirm the Password" value=""
                           class="border border-gray-500 p-1 focus:outline-none font-light"
                           name="password_confirmation" required autocomplete="new-password">
                </div>

                @auth()
                    <div class="flex flex-col mb-2">
                        <label for="role" class="text-md-left mb-1">Role</label>
                        <select name="role_id" id="role"
                                class="border border-gray-500 p-1 focus:outline-none font-light">
                            <option value="3">Customer</option>
                            <option value="2">Owner</option>
                            <option value="1">Admin</option>
                        </select>
                    </div>

                    <div class="flex flex-col mb-2">
                        <label for="address" class="text-md-left mb-1">Address</label>
                        <input type="address" name="address" id="address" placeholder="Enter address" value=""
                               class="border border-gray-500 p-1 focus:outline-none font-light">
                    </div>

                    <div class="flex flex-col mb-2">
                        <label for="tel" class="text-md-left mb-1">Phone Number</label>
                        <input type="tel" name="tel" id="tel" placeholder="03-123456" pattern="[0-9]{2}-[0-9]{6}" value=""
                               class="border border-gray-500 p-1 focus:outline-none font-light">
                    </div>

                    <div class="flex flex-col mb-2">
                        <label for="avatar" class="text-md-left mb-1">Image Profile</label>
                        <input type="text" name="avatar" id="avatar" value=""
                               class="border border-gray-500 p-1 focus:outline-none font-light">
                    </div>
                @endauth

                @if(empty(auth()->user()))
                    <input type="hidden" name="tel" value="">
                    <input type="hidden" name="address" value="">
                    <input type="hidden" name="role_id" value="3">
                    <input type="hidden" name="avatar" value="">
                @endif

                <button type="submit" class="p-1 bg-yellow-500 hover:bg-yellow-600 text-white mr-2">Submit</button>
                <a href="/" class="p-1 bg-blue-500 hover:bg-blue-600 text-white">Cancel</a>
            </form>
        </div>
    </div>
</x-master>
