<nav class="navbar fixed top-0 w-full bg-white dark:bg-gray-900 shadow-md z-50 border-b border-gray-200 dark:border-gray-700">
    <div class="container mx-auto flex flex-wrap items-center justify-between p-4">
        <a href="{{ route('home') }}" class="text-xl font-bold text-blue-600 dark:text-blue-400">Portfolio</a>
        <button data-collapse-toggle="navbar-dropdown" type="button"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
            aria-controls="navbar-dropdown" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
            <ul class="flex flex-col md:flex-row items-center space-y-2 md:space-y-0 md:space-x-8 font-medium">
                <li>
                    <a href="{{ route('home') }}"
                        class="nav-link">Home</a>
                </li>
                <li>
                    <a href="{{ route('home') }}#project" class="nav-link">Project</a>
                </li>
                <li>
                    <a href="{{ route('blog') }}" class="nav-link">Blog</a>
                </li>
                @auth
                <li class="relative">
                    <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
                        class="nav-link flex items-center">Settings
                        <svg class="w-2.5 h-2.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdownNavbar" class="dropdown-menu hidden absolute top-full mt-2 right-0 min-w-[150px] rounded-lg shadow-lg bg-white dark:bg-gray-800">
                        <ul class="py-2 text-sm text-gray-700 dark:text-white">
                            <li>
                                <a href="{{ route('project.index') }}" class="dropdown-item" style="color:white;">Project</a>
                            </li>
                            <li>
                                <a href="{{ route('post.index') }}" class="dropdown-item" style="color:white;">Post</a>
                            </li>
                            <li>
                                <a href="{{ route('category.index') }}" class="dropdown-item" style="color:white;">Categories</a>
                            </li>
                        </ul>
                        <div class="py-1">
                            <a href="{{ route('logout') }}" class="dropdown-item text-red-500 dark:text-red-400">Sign out</a>
                        </div>
                    </div>

                </li>

                @endauth
            </ul>
        </div>
    </div>
</nav>
