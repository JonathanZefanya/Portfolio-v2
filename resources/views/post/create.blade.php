<x-app-layout title="Create Post">
    <x-container>
        <div class="my-8 max-w-2xl mx-auto p-8 rounded-lg shadow-lg bg-gradient-to-br from-blue-50 to-white dark:from-gray-800 dark:to-gray-900">
            <h1 class="text-3xl font-semibold text-gray-800 dark:text-white mb-6">Form Create Posts</h1>

            <form method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data" class="space-y-8 bg-white p-6 rounded-lg shadow-md dark:bg-gray-800">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Title</label>
                        <input type="text" id="title" name="title"
                            class="mt-2 w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white transition duration-150 ease-in-out"
                            placeholder="Post Title" value="{{ old('title') }}" />
                        @error('title')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
                        <textarea id="description" name="description" rows="4"
                            class="mt-2 w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white transition duration-150 ease-in-out"
                            placeholder="Write your thoughts here...">{{ old('description') }}</textarea>
                        @error('description')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="content" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Content</label>
                        <textarea id="content" name="content" rows="4"
                            class="mt-2 w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white transition duration-150 ease-in-out"
                            placeholder="Write your thoughts here...">{{ old('content') }}</textarea>
                        @error('content')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="body_image" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Upload Image</label>
                        <input id="body_image" name="body_image" type="file"
                            class="mt-2 w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 focus:outline-none transition duration-150 ease-in-out" />
                        @error('body_image')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="categories" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Categories</label>
                        <select id="categories" name="categories"
                            class="mt-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white transition duration-150 ease-in-out">
                            <option selected disabled>Choose a category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('categories')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <button type="submit"
                    class="w-full sm:w-auto px-5 py-2.5 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 transition duration-150 ease-in-out dark:bg-blue-500 dark:hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-800">
                    Create
                </button>
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
    </script>
</x-app-layout>
