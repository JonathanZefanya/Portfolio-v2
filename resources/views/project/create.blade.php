<x-app-layout title="Create Project">
    <x-container>

        <div class="my-8 max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md dark:bg-gray-800">
            <h1 class="text-3xl font-semibold text-gray-800 dark:text-white mb-6">Create a New Project</h1>

            <form method="POST" action="{{ route('project.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="space-y-6">
                    
                    <!-- Title Field -->
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Title</label>
                        <input type="text" id="title" name="title"
                               class="mt-2 w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                               placeholder="Enter project title" value="{{ old('title') }}" />
                        @error('title')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>
                    
                    <!-- Description Field -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
                        <textarea id="description" name="description" rows="4"
                                  class="mt-2 w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                  placeholder="Describe your project...">{{ old('description') }}</textarea>
                        @error('description')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>
                    
                    <!-- Image Upload Field -->
                    <div>
                        <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Upload Image</label>
                        <input type="file" id="image" name="image"
                               class="mt-2 w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 focus:outline-none"
                        />
                        @error('image')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Categories Field -->
                    <div>
                        <label for="categories" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Categories</label>
                        <div class="flex flex-wrap gap-3 mt-2">
                            @foreach ($categories as $category)
                                <div class="flex items-center">
                                    <input id="{{ $category->name }}" type="checkbox" value="{{ $category->id }}" name="project_categories[]"
                                           class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="{{ $category->name }}" class="ml-2 text-sm font-medium text-gray-700 dark:text-gray-300">{{ $category->name }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Link Field -->
                    <div>
                        <label for="link" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Link</label>
                        <input type="url" id="link" name="link"
                               class="mt-2 w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                               placeholder="Project link" value="{{ old('link') }}" />
                        @error('link')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end">
                        <button type="submit"
                                class="w-full sm:w-auto px-5 py-2.5 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 transition duration-150 ease-in-out dark:bg-blue-500 dark:hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-800">
                            Create Project
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </x-container>
</x-app-layout>
