<x-app-layout title="{{ $post->title }}">
    <section class=" md:px-52 py-32 px-10">
        <div>
            <div>
                <h1 class="text-2xl font-bold md:text-4xl">{{ $post->title }}</h1>
                <div class="flex items-center text-gray-600">
                    <span
                        class="inline-flex items-center justify-center w-6 h-6 me-2 text-sm font-semibold text-gray-800 bg-gray-100 rounded-full dark:bg-gray-700 dark:text-gray-300">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                        </svg>
                        <span class="sr-only">Icon description</span>
                    </span>
                    <small>{{ $post->users->name }} - {{ $post->created_at->diffForHumans() }}</small>
                </div>
                <div class="text-gray-700 mt-5">
                    {{ $post->description }}
                </div>
                {{-- body --}}
                <div class="mt-5 space-y-5 text-gray-800">
                    <div class="  me-5">
                        <img class="h-96 border" src="{{ asset('storage/' . $post->body_image) }}" alt="">
                    </div>
                    <div class="body">
                        {!! $post->body !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-app-layout>
