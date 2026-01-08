<header class="bg-white border-b px-6 py-4 flex justify-between items-center">
    <h1 class="font-semibold text-lg">
        @yield('page-title', 'Dashboard')
    </h1>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="text-red-600 text-sm">
            Logout
        </button>
    </form>
</header>
