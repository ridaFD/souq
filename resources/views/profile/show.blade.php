<x-app>
    <div id="wrapper" class="container mt-6">
        <header class="mx-auto w-2/3">
            <div class="relative">
                <img src="{{ asset('images/default-profile-banner.jpg') }}" alt="">
                <img src="{{ asset('images/default-avatar.jpeg') }}" alt="" width="150"
                     class="rounded-full absolute bottom-0 transform -translate-x-1/2 translate-y-1/2"
                     style="left: 50%">
            </div>
        </header>

        <form action="/profile/edit/{{ $user[0]->id }}" method="post" class="w-2/3 mx-auto flex justify-end my-6">
            @csrf

            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Edit Profile
            </button>
        </form>

        <div class="bg-yellow-500 rounded w-2/3 mx-auto">
            <ul class="p-4 flex justify-between">
                <li>
                    <div class="text-lg text-blue-500 border-b border-gray-200">Name</div>
                    <div class="text-white font-light">{{ $user[0]->name }}</div>
                </li>
                <li>
                    <div class="text-lg text-blue-500 border-b border-gray-200">Email</div>
                    <div class="text-white font-light">{{ $user[0]->email }}</div>
                </li>
                <li>
                    <div class="text-lg text-blue-500 border-b border-gray-200">Address</div>
                    <div class="text-white font-light">{{ $user[0]->address }}</div>
                </li>
                <li>
                    <div class="text-lg text-blue-500 border-b border-gray-200">Telephone</div>
                    <div class="text-white font-light">{{ $user[0]->tel }}</div>
                </li>
                <li>
                    <div class="text-lg text-blue-500 border-b border-gray-200">Role</div>
                    <div class="text-white font-light">{{ $user[0]->role }}</div>
                </li>
            </ul>
        </div>
    </div>
</x-app>
