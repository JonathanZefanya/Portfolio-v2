<x-app-layout title="Blog">
    <x-container>
        <div class="space-y-5">
            <div>
                <h1 class="text-3xl font-semibold">Posts</h1>
                <p class="text-lg font-light">Search by category</p>
            </div>
            
            {{-- Categories --}}
            <div class="flex flex-wrap gap-3">
                <a href="{{ route('blog') }}" 
                    class="category-btn bg-gray-300 hover:bg-gray-400 text-gray-800 text-sm font-medium px-3 py-1 rounded 
                    {{ request('category') ? '' : 'bg-blue-500 text-white' }}">
                    All
                </a>
                @foreach ($categories as $category)
                    <a href="{{ route('blog', ['category' => $category->slug]) }}" 
                        class="category-btn bg-blue-100 hover:bg-blue-200 text-blue-800 text-sm font-medium px-3 py-1 rounded
                        {{ request('category') == $category->slug ? 'bg-blue-500 text-white' : '' }}">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>

            {{-- Posts --}}
            <div id="post-container" class="grid md:grid-cols-3 gap-5 mt-14 transition-opacity duration-500 opacity-100">
                @if ($posts->isEmpty())
                    <p class="text-center text-gray-500 col-span-3">Tidak ada blog yang tersedia dalam kategori ini.</p>
                @else
                    @foreach ($posts as $post)
                        <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <div>
                                <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                                    {{ $post->categories->name }}
                                </span>
                            </div>
                            <a href="{{ route('post.show', $post->slug) }}">
                                <img src="{{ asset('storage/' . $post->body_image) }}" alt="{{ $post->title }}"
                                    class="w-full h-48 object-cover rounded-lg" />
                                <h5 class="hover:text-blue-600 duration-100 mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                    {{ $post->title }}
                                </h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $post->description }}</p>
                            <a href="{{ route('post.show', $post->slug) }}"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Read more
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </x-container>

    {{-- Smooth Transition --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let categoryLinks = document.querySelectorAll('.category-btn');
            let postContainer = document.getElementById('post-container');

            categoryLinks.forEach(link => {
                link.addEventListener('click', function (event) {
                    event.preventDefault();
                    postContainer.style.opacity = '0';
                    
                    setTimeout(() => {
                        window.location.href = this.href;
                    }, 300);
                });
            });

            setTimeout(() => {
                postContainer.style.opacity = '1';
            }, 300);
        });
    </script>
</x-app-layout>
