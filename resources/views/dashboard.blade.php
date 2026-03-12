<x-app-layout>
    <div class="flex items-center justify-center min-h-[70vh]">
        <div class="flex flex-col items-center space-y-6">

            <a href="#" class="flex items-center gap-3 px-6 py-4 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 w-64 justify-center">
                <!-- Teams Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          stroke-width="2"
                          d="M17 20h5V4H2v16h5M9 20h6M12 16v4"/>
                </svg>
                View Teams
            </a>

            <a href="#" class="flex items-center gap-3 px-6 py-4 bg-green-600 text-white rounded-lg shadow hover:bg-green-700 w-64 justify-center">
                <!-- Match Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                     fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          stroke-width="2"
                          d="M9 17v-2a4 4 0 014-4h4M9 7h6m2 10h.01M17 7h.01"/>
                </svg>
                View Finished Matches
            </a>

            <a href="#" class="flex items-center gap-3 px-6 py-4 bg-purple-600 text-white rounded-lg shadow hover:bg-purple-700 w-64 justify-center">
                <!-- Create Match Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                     fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          stroke-width="2"
                          d="M12 4v16m8-8H4"/>
                </svg>
                Create Match
            </a>

            <a href="{{ route('heroes.index') }}"
                class="flex items-center gap-3 px-6 py-4 bg-indigo-600 text-white rounded-lg shadow hover:bg-indigo-700 w-64 justify-center">

                View Heroes

            </a>

            <a href="{{ route('heroes.test') }}"
            class="flex items-center gap-3 px-6 py-4 bg-yellow-600 text-white rounded-lg shadow hover:bg-yellow-700 w-64 justify-center">

                <!-- API Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2"
                        d="M8 9l3 3-3 3m5 0h3"/>
                </svg>

                Check Hero API
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                        class="flex items-center gap-3 px-6 py-4 bg-red-600 text-white rounded-lg shadow hover:bg-red-700 w-64 justify-center">
                    <!-- Logout Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              stroke-width="2"
                              d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1m0-10V4"/>
                    </svg>
                    Logout
                </button>
            </form>

        </div>
    </div>
</x-app-layout>