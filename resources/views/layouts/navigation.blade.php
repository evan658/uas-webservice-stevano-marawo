<nav class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('lagu.index') }}">
                        <strong>UAS WEB</strong>
                    </a>
                </div>
            </div>

            <div class="flex items-center">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="text-sm text-gray-700 hover:text-red-600">
                        Logout
                    </button>
                </form>
            </div>

        </div>
    </div>
</nav>
