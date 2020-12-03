<x-app>
    <div class="w-full">
        <form action="{{ route('user.store') }}" method="POST">
            @csrf

            <h1 class="text-2xl text-center py-4 mb-4 border-b border-gray-500">Create New User</h1>
            <div class="flex justify-center">
                <div class="w-1/3 mr-4">
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
                </div>

                <div class="w-1/3 ml-4">
                    <div class="flex flex-col mb-2">
                        <label for="role" class="text-md-left mb-1">Role</label>
                        <select name="role" id="role"
                                class="border border-gray-500 p-1 focus:outline-none font-light"style="padding-bottom: 8px" >
                            <option value="owner" selected>Owner</option>
                            <option value="admin">Admin</option>
                        </select>

                        @error('role')
                        <span class="text-red-500" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="flex flex-col mb-2">
                        <label for="address" class="text-md-left mb-1">Address</label>
                        <input type="address" name="address" id="address" placeholder="Enter address" value=""
                               class="border border-gray-500 p-1 focus:outline-none font-light">

                        @error('address')
                        <span class="text-red-500" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="flex flex-col mb-2">
                        <label for="tel" class="text-md-left mb-1">Phone Number</label>
                        <input type="tel" name="tel" id="tel" placeholder="03-123456" pattern="[0-9]{2}-[0-9]{6}"
                               value=""
                               class="border border-gray-500 p-1 focus:outline-none font-light">

                        @error('tel')
                        <span class="text-red-500" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="flex flex-col mb-2">
                        <label for="avatar" class="text-md-left mb-1">Image Profile</label>
                        <input type="text" name="avatar" id="avatar"
                               class="border border-gray-500 p-1 focus:outline-none font-light">
                    </div>

                    <div class="flex">
                        <button type="submit" class="p-1 bg-yellow-500 hover:bg-yellow-600 text-white mr-2">Submit and send email</button>
                        <a href="/" class="p-1 bg-blue-500 hover:bg-blue-600 text-white">Cancel</a>
                    </div>
                </div>
            </div>
        </form>
{{--        <form action="/user/send-mail" method="post">--}}
{{--            @csrf--}}

{{--            <div class="flex">--}}
{{--                <button type="submit" class="p-1 bg-yellow-500 hover:bg-yellow-600 text-white mr-2">send email</button>--}}
{{--            </div>--}}
{{--        </form>--}}
    </div>
</x-app>
