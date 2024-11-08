<x-app-layout title="{{ $post->title }}">
    <style> 
        .bold-line { 
            border: 0; 
            height: 3px; 
            background: black; 
        } 
    </style>
    <section class="py-20 md:px-52 px-5">
        <div>
            <!-- Post Title and Meta Information -->
            <h1 class="text-3xl font-bold md:text-4xl">{{ $post->title }}</h1>
            <div class="flex items-center text-gray-600 mt-2">
                <span class="inline-flex items-center justify-center w-6 h-6 mr-2 text-sm font-semibold text-gray-800 bg-gray-100 rounded-full dark:bg-gray-700 dark:text-gray-300">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z"/>
                    </svg>
                </span>
                <small>{{ $post->users->name }} - {{ $post->created_at->diffForHumans() }}</small>
            </div>

            <!-- Post Description and Body -->
            <div class="text-gray-700 mt-5">{{ $post->description }}</div>
            <div class="mt-5 space-y-5 text-gray-800">
                <div class="mr-5">
                    <img class="w-full h-auto max-h-96 border rounded-md" src="{{ asset('storage/' . $post->body_image) }}" alt="">
                </div>
                <div class="body">
                    {!! $post->body !!}
                </div>
            </div>

            <!-- Share Section -->
            <hr class="bold-line"width="100%", color="black">
            <div class="mt-10">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Share This Post</h2>
                <div class="flex flex-wrap space-x-4 items-center">
                    <div class="space-y-4">
                        <a href="https://wa.me/?text={{ urlencode(request()->fullUrl()) }}" target="_blank" class="flex items-center text-green-600 hover:text-green-800">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232"/> <!-- WhatsApp icon path -->
                            </svg> 
                            WhatsApp
                        </a>

                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank" class="flex items-center text-blue-600 hover:text-blue-800">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 5.004 3.656 9.128 8.438 9.88v-6.988h-2.54v-2.892h2.54V9.691c0-2.509 1.492-3.891 3.776-3.891 1.094 0 2.237.194 2.237.194v2.461h-1.261c-1.243 0-1.63.772-1.63 1.563v1.88h2.773l-.443 2.892h-2.33v6.988C18.345 21.128 22 17.004 22 12z"/>
                            </svg> 
                            Facebook
                        </a>

                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($post->title) }}" target="_blank" class="flex items-center text-blue-400 hover:text-blue-600">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M22.162 5.656c-.808.36-1.676.602-2.586.71a4.482 4.482 0 0 0 1.976-2.475 8.972 8.972 0 0 1-2.857 1.09 4.473 4.473 0 0 0-7.623 3.067c0 .352.04.694.115 1.023A12.692 12.692 0 0 1 3.207 4.834a4.474 4.474 0 0 0 1.386 5.976 4.444 4.444 0 0 1-2.025-.56v.057a4.472 4.472 0 0 0 3.59 4.387 4.468 4.468 0 0 1-2.017.076 4.48 4.48 0 0 0 4.177 3.106A8.967 8.967 0 0 1 2 19.56a12.654 12.654 0 0 0 6.842 2.006c8.21 0 12.7-6.8 12.7-12.698 0-.193-.004-.385-.012-.575A9.055 9.055 0 0 0 22.162 5.656z"/>
                            </svg> 
                            Twitter
                        </a>

                        <a href="https://www.instagram.com/?url={{ urlencode(request()->fullUrl()) }}" target="_blank" class="flex items-center text-pink-500 hover:text-pink-700">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/> <!-- Instagram icon path -->
                            </svg> 
                            Instagram
                        </a>

                        <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(request()->fullUrl()) }}" target="_blank" class="flex items-center text-blue-700 hover:text-blue-900">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M19.75 3h-15.5C3.008 3 2 4.008 2 5.25v13.5C2 19.992 3.008 21 4.25 21h15.5c1.242 0 2.25-1.008 2.25-2.25V5.25C22 4.008 20.992 3 19.75 3zM8.338 17.7H5.653V10.4h2.685v7.3zm-1.34-8.44c-.83 0-1.505-.678-1.505-1.51s.675-1.5 1.505-1.5c.834 0 1.51.676 1.51 1.51s-.676 1.5-1.51 1.5zm10.49 8.44h-2.69v-3.7c0-.879-.708-1.6-1.59-1.6s-1.59.721-1.59 1.6v3.7H8.846V10.4h2.685v1.05c.442-.762 1.382-1.278 2.37-1.278 1.666 0 3.03 1.346 3.03 3.007v4.52z"/>
                            </svg> 
                            LinkedIn
                        </a>

                        <button onclick="copyToClipboard()" class="flex items-center text-gray-600 hover:text-gray-800">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8 5h10a3 3 0 0 1 3 3v11a3 3 0 0 1-3 3H8a3 3 0 0 1-3-3V8a3 3 0 0 1 3-3zm0-2A5 5 0 0 0 3 8v11a5 5 0 0 0 5 5h10a5 5 0 0 0 5-5V8a5 5 0 0 0-5-5H8zM16 1a1 1 0 1 1 0 2h-5a1 1 0 0 1 0-2h5z"/>
                            </svg> 
                            Copy Link
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- JavaScript for Copy Link -->
    <script>
        function copyToClipboard() {
            const url = "{{ request()->fullUrl() }}";
            navigator.clipboard.writeText(url)
                .then(() => {
                    alert("Link copied to clipboard!");
                })
                .catch(err => {
                    console.error("Could not copy text: ", err);
                });
        }
    </script>
</x-app-layout>
