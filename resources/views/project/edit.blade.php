<x-app-layout title="Edit Project">
    <x-container>
        <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-2xl font-semibold mb-6 text-gray-800">Edit Project</h2>

            <form action="{{ route('project.update', $project->slug) }}" method="POST" enctype="multipart/form-data" onsubmit="return confirmUpdate()">
                @csrf
                @method('PUT')
                
                <div class="mb-4">
                    <label for="title" class="block text-gray-700 font-medium">Title</label>
                    <input type="text" id="title" name="title" value="{{ old('title', $project->title) }}" 
                           class="w-full mt-2 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" 
                           required>
                </div>
                
                <div class="mb-4">
                    <label for="description" class="block text-gray-700 font-medium">Description</label>
                    <textarea id="description" name="description" rows="4"
                              class="w-full mt-2 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                              required>{{ old('description', $project->description) }}</textarea>
                </div>
                
                <div class="mb-4">
                    <label for="image" class="block text-gray-700 font-medium">Image</label>
                    <input type="file" id="image" name="image"
                           class="w-full mt-2 p-3 border border-gray-300 rounded-lg focus:outline-none">
                    @if ($project->image)
                        <div class="mt-3">
                            <img src="{{ Storage::url($project->image) }}" alt="Project Image" class="w-32 h-32 object-cover rounded-md shadow-sm">
                        </div>
                    @endif
                </div>
                
                <div class="mb-4">
                    <label for="link" class="block text-gray-700 font-medium">Link</label>
                    <input type="url" id="link" name="link" value="{{ old('link', $project->link) }}" 
                           class="w-full mt-2 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" 
                           required>
                </div>
                
                <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition duration-200">
                    Update Project
                </button>
            </form>
        </div>
    </x-container>
</x-app-layout>

<script>
    function confirmUpdate() {
        return confirm("Are you sure you want to update this project?");
    }
</script>
