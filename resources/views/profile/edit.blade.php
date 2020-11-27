<x-app>
    <form method="POST" action="{{ route('profile.update', auth()->id()) }}" class="w-2/3 mt-6">
        @csrf
        @method('PATCH')

        <div class="mb-4">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                   for="name"
            >
                Name
            </label>

            <input class="border border-gray-400 p-2 w-full"
                   type="text"
                   name="name"
                   id="name"
                   value="{{ $user->name }}"
                   required
            >

            @error('name')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                   for="email"
               >
                Email
            </label>

            <input class="border border-gray-400 p-2 w-full"
                   type="email"
                   name="email"
                   id="email"
                   value="{{ $user->email }}"
                   required
            >

            @error('email')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                   for="password"
            >
                Password
            </label>

            <input class="border border-gray-400 p-2 w-full"
                   type="password"
                   name="password"
                   id="password"
                   required
            >

            @error('password')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                   for="password_confirmation"
            >
                Password Confirmation
            </label>

            <input class="border border-gray-400 p-2 w-full"
                   type="password"
                   name="password_confirmation"
                   id="password_confirmation"
                   required
            >

            @error('password_confirmation')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                   for="address"
            >
                Address
            </label>

            <input class="border border-gray-400 p-2 w-full"
                   type="text"
                   name="address"
                   id="address"
                   value="{{ $user->address }}"
                   required
            >

            @error('address')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                   for="address"
            >
                Address
            </label>

            <input class="border border-gray-400 p-2 w-full"
                   type="text"
                   name="address"
                   id="address"
                   value="{{ $user->address }}"
                   required
            >

            @error('address')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                   for="tel"
            >
                Tel
            </label>

            <input class="border border-gray-400 p-2 w-full"
                   type="text"
                   name="tel"
                   placeholder="03-123456" pattern="[0-9]{2}-[0-9]{6}"
                   id="tel"
                   value="{{ $user->tel }}"
                   required
            >

            @error('tel')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>


        <div>
            <button type="submit"
                    class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 mr-4"
            >
                Submit
            </button>

            <a href="{{ route('profile') }}" class="hover:underline">Cancel</a>
        </div>
    </form>
</x-app>
