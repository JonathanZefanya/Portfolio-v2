<x-app-layout title="Edit Category">
    <div class=" py-48">
        <div class=" max-w-lg  mx-auto">
            <form action="{{ route('category.update', $category[0]->slug) }}" method="post">
                @csrf
                @method('put')
                <label for="category_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category
                    name</label>
                <input type="text" id="category_name" name="category_name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{ $category[0]->name }}" />
                @error('category_name')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror

                <div class="mt-5">
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>
