<x-layout>
    <div class="flex justify-between mx-40 mt-20">
        <div class="flex">
            <img src="{{ $user->profile_picture != null ? asset('storage/' . $user->profile_picture) : asset('images/default.png') }}" class="rounded-full mr-12" width='175' height='175'>
            <div class="flex flex-col justify-between">
                <h1 class="text-blue text-mega font-serif">{{ $user->username }}</h1>
                <div class="flex flex-col space-y-2">
                    <p class="text-white font-sans text-body">{{ $user->bio }}</p>
                    <p class="text-white text-opacity-50 font-sans text-sm">Joined {{ Carbon\Carbon::parse($user->created_at)->toFormattedDateString() }}</p>
                </div>
            </div>
        </div>
        <div class="flex flex-col justify-around text-right">
            <a href="{{ route('user-profile', ['username' => $user->username]) }}" class="text-right hover:text-opacity-100 {{ request()->routeIs('user-profile') ? 'text-blue text-opacity-100' : 'text-white text-opacity-50' }}">Profile</a>
            <a href="{{ route('user-stacks', ['username' => $user->username]) }}" class="text-right hover:text-opacity-100 {{ request()->routeIs('user-stacks') ? 'text-blue text-opacity-100' : 'text-white text-opacity-50' }}">Stacks</a>
            <a href="{{ route('user-watchlist', ['username' => $user->username]) }}" class="text-right hover:text-opacity-100 {{ request()->routeIs('user-watchlist') ? 'text-blue text-opacity-100' : 'text-white text-opacity-50' }}">Watchlist</a>
            <a href="{{ route('user-currently-watching', ['username' => $user->username]) }}" class="text-right hover:text-opacity-100 {{ request()->routeIs('user-currently-watching') ? 'text-blue text-opacity-100' : 'text-white text-opacity-50' }}">Currently Watching</a>
            <a href="{{ route('user-history', ['username' => $user->username]) }}" class="text-right hover:text-opacity-100 {{ request()->routeIs('user-history') ? 'text-blue text-opacity-100' : 'text-white text-opacity-50' }}">History</a>
        </div>
    </div>

    <hr class='border-white border-opacity-25 mx-40 my-3 mt-6'>

    {{ $slot }}
</x-layout>