<x-app-layout title="Create Post">
    <x-container>
        <div class="my-8 max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md dark:bg-gray-800">
            <h1 class="text-3xl font-semibold text-gray-800 dark:text-white mb-6">Create a New Post</h1>

            <form method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="space-y-6">

                    <!-- Title Field -->
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Title</label>
                        <input type="text" id="title" name="title" required
                               class="mt-2 w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                               placeholder="Enter post title" value="{{ old('title') }}" />
                        @error('title')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Description Field -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
                        <textarea id="description" name="description" rows="4" required
                                  class="mt-2 w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                  placeholder="Describe your post...">{{ old('description') }}</textarea>
                        @error('description')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Content Field -->
                    <div>
                        <label for="content" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Content</label>
                        <textarea id="content" name="content" rows="4" required
                                  class="mt-2 w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                  placeholder="Write your content here...">{{ old('content') }}</textarea>
                        @error('content')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Image Upload Field -->
                    <div>
                        <label for="body_image" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Upload Image</label>
                        <input type="file" id="body_image" name="body_image"
                               class="mt-2 w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 focus:outline-none">
                        @error('body_image')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Categories Field -->
                    <div>
                        <label for="categories" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Categories</label>
                        <select id="categories" name="categories" required
                                class="mt-2 w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                            <option selected disabled>Choose a category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('categories')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end">
                        <button type="submit"
                                class="w-full sm:w-auto px-5 py-2.5 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 transition duration-150 ease-in-out dark:bg-blue-500 dark:hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-800">
                            Create Post
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </x-container>

    <script>
        ClassicEditor.create(document.querySelector('#content'))
            .catch(error => {
                console.error(error);
            });
    </script>
</x-app-layout>
