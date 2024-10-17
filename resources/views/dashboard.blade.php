<x-layout>
    <h2 class="text-white font-serif text-mega text-center mt-12">
        My Reservoir
    </h2>

    <div class="mt-12"></div>

    <div class="flex justify-between mx-40 items-center">
        <form action="" class="text-white">
            <x-search-bar />
        </form>
        <div class="flex items-center pb-2 space-x-4">
            <button class="mt-2 inline-flex items-center px-4 py-2 {{ request()->input('view') == 'watchlist' || !request()->input('view') ? 'bg-blue' : 'bg-white bg-opacity-75'}} rounded-md font-semibold text-sm text-midnight uppercase tracking-widest hover:bg-blue focus:outline focus:outline-2 transition ease-in-out duration-150"><a href="/dashboard?view=watchlist">Watchlist</a></button>
            <button class="mt-2 inline-flex items-center px-4 py-2 {{ request()->input('view') == 'history' ? 'bg-blue' : 'bg-white bg-opacity-75'}} rounded-md font-semibold text-sm text-midnight uppercase tracking-widest hover:bg-blue focus:outline focus:outline-2 transition ease-in-out duration-150"><a href="/dashboard?view=history">History</a></button>
        </div>
    </div>

    <hr class='border-white border-opacity-25 mx-40 my-3'>

    <div class="grid grid-cols-6 mx-40">
        <div class="col-span-5 grid grid-cols-6 text-white">
            <p>date added</p>
            <p class="col-span-2">content</p>
            <p>released</p>
            <p>runtime</p>
        </div>
    </div>

    <hr class='border-white border-opacity-25 mx-40 my-3'>

    @if ($list == null)
        <div class="py-32 text-center text-white text-opacity-50 text-body">
            so empty...
        </div>
    @else
        @foreach ($list as $content)
            <x-content-row :content='$content'/>
        @endforeach
    @endif

    <div class="mb-24"></div>

</x-layout>
