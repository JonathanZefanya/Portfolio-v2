<x-app-layout title="Blog">

    <div style="background-image: url('assets/img/blog.jpg')"
        class="w-full h-screen bg-cover bg-bottom bg-fixed border-b-2 border-b-blue-500">
        <div class="relative top-[44%] px-4 space-y-1  md:text-center md:text-gray-700">
            <h1 class="text-5xl font-bold md:text-6xl">Blog</h1>
            <p class="text-xl md:text-2xl ">where all thoughts are written down</p>
        </div>
    </div>


    <x-container>
        <div class="space-y-5">
            <div>
                <h1 class="text-3xl font-semibold">Posts</h1>
                <p class="text-lg font-light">Search by category</p>
            </div>
            {{-- categories --}}
            <div class=" flex flex-wrap gap-3">
                @foreach ($categories as $category)
                    <a href="{{ route('category.show', $category->slug) }}"
                        class="bg-blue-100 hover:bg-blue-200 text-blue-800 text-sm font-medium  px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400 inline-flex items-center justify-center">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>

        </div>
        <div class="grid md:grid-cols-3 gap-5 mt-14">
            @foreach ($posts as $post)
                <div
                    class=" max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

                    <div>
                        <span
                            class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $post->categories->name }}</span>
                    </div>
                    <a href="{{ route('post.show', $post->slug) }}">
                        <h5
                            class="hover:text-blue-600 duration-100 mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $post->title }}</h5>
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
        </div>
    </x-container>
</x-app-layout>
