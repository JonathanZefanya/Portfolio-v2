<x-app-layout title="Edit Post">
    <x-container>
        <div class="my-8 max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md dark:bg-gray-800">
            <h1 class="text-3xl font-semibold text-gray-800 dark:text-white mb-6">Edit Post</h1>

            <form action="{{ route('post.update', $post->slug) }}" method="POST" enctype="multipart/form-data" onsubmit="return confirmUpdate()">
                @csrf
                @method('PUT')
                <div class="space-y-6">

                    <!-- Title Field -->
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Title</label>
                        <input type="text" id="title" name="title" value="{{ old('title', $post->title) }}" required
                               class="mt-2 w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                               placeholder="Enter post title" />
                        @error('title')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Description Field -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
                        <textarea id="description" name="description" rows="4" required
                                  class="mt-2 w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                  placeholder="Describe your post...">{{ old('description', $post->description) }}</textarea>
                        @error('description')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Content Field -->
                    <div>
                        <label for="content" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Content</label>
                        <textarea id="content" name="content" rows="4" required
                                  class="mt-2 w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                  placeholder="Edit your content...">{{ old('content', $post->body) }}</textarea>
                        @error('content')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Image Upload Field -->
                    <div>
                        <label for="body_image" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Upload Image</label>
                        <input type="file" id="body_image" name="body_image"
                               class="mt-2 w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 focus:outline-none">
                        @if ($post->body_image)
                            <div class="mt-3">
                                <img src="{{ Storage::url($post->body_image) }}" alt="Post Image" class="w-32 h-32 object-cover rounded-md shadow-sm">
                            </div>
                        @endif
                        @error('body_image')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end">
                        <button type="submit"
                                class="w-full sm:w-auto px-5 py-2.5 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 transition duration-150 ease-in-out dark:bg-blue-500 dark:hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-800">
                            Update Post
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </x-container>

    <script>
        ClassicEditor
        .create(document.querySelector('#content'), {
            mediaEmbed: {
                previewsInData: true // Enables the display of embedded content previews
            }
        })
            .catch(error => {
                console.error(error);
            });
        
        function confirmUpdate() {
            return confirm("Are you sure you want to update this post?");
        }
    </script>
</x-app-layout>
