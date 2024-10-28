<x-app-layout title="Create Post">
    <x-container>

        <div class="my-5">
            <h1 class="text-2xl text-gray-700 font-semibold">Form Create Posts</h1>
        </div>

        <form method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
            @csrf
            <div class=" max-w-md md:max-w-xl">
                <div class="mb-5">
                    <label for="title"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                    <input type="text" id="title" name="title"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Post Title" value="{{ old('title') }}" />
                    @error('title')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-5">

                    <label for="description"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                    <textarea id="description" name="description" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Write your thoughts here...">{{ old('description') }}</textarea>
                    @error('description')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror

                </div>
                <div class="mb-5">

                    <label for="content"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Content</label>
                    <textarea id="content" name="content" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Write your thoughts here...">{{ old('content') }}</textarea>
                    @error('content')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror

                </div>
                <div class="mb-5">

                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="body_image">Upload
                        image</label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        id="body_image" name="body_image" type="file">
                    @error('body_image')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="categories"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categories</label>
                    <div class="flex max-w-lg flex-wrap gap-y-1">
                        <form class="max-w-sm mx-auto">

                            <select id="categories" name="categories"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected disabled>Choose a category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('categories')
                                <small class="text-red-500">{{ $message }}</small>
                            @enderror
                        </form>

                    </div>

                </div>

                <button type="submit"
                    class="mt-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create</button>
            </div>
        </form>

    </x-container>

    <script>
        ClassicEditor
            .create(document.querySelector('#content'))
            .catch(error => {
                console.error(error);
            });
    </script>
</x-app-layout>
