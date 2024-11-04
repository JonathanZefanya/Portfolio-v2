<x-app-layout title="Edit Project">
    <x-container>
        <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md dark:bg-gray-800">
            <h2 class="text-2xl font-semibold mb-6 text-gray-800 dark:text-white">Edit Project</h2>

            <form action="{{ route('project.update', $project->slug) }}" method="POST" enctype="multipart/form-data" onsubmit="return confirmUpdate()">
                @csrf
                @method('PUT')
                
                <!-- Title Field -->
                <div class="mb-6">
                    <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Title</label>
                    <input type="text" id="title" name="title" value="{{ old('title', $project->title) }}" required
                           class="w-full mt-2 p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                </div>
                
                <!-- Description Field -->
                <div class="mb-6">
                    <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
                    <textarea id="description" name="description" rows="4" required
                              class="w-full mt-2 p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white">{{ old('description', $project->description) }}</textarea>
                </div>
                
                <!-- Image Upload Field -->
                <div class="mb-6">
                    <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Image</label>
                    <input type="file" id="image" name="image"
                           class="w-full mt-2 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 focus:outline-none">
                    @if ($project->image)
                        <div class="mt-3">
                            <img src="{{ Storage::url($project->image) }}" alt="Project Image" class="w-32 h-32 object-cover rounded-md shadow-sm">
                        </div>
                    @endif
                </div>
                
                <!-- Link Field -->
                <div class="mb-6">
                    <label for="link" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Link</label>
                    <input type="url" id="link" name="link" value="{{ old('link', $project->link) }}" required
                           class="w-full mt-2 p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                </div>
                
                <!-- Submit Button -->
                <div class="flex justify-end">
                    <button type="submit"
                            class="w-full sm:w-auto px-5 py-2.5 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 transition duration-150 ease-in-out dark:bg-blue-500 dark:hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-800">
                        Update Project
                    </button>
                </div>
            </form>
        </div>
    </x-container>
</x-app-layout>

<script>
    function confirmUpdate() {
        return confirm("Are you sure you want to update this project?");
    }
</script>
