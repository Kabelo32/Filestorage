<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Page Header -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 bg-gray-200 text-gray-900 flex justify-between items-center">
                    <h1 class="text-2xl font-semibold">Performance Appraisal Documents</h1>
                </div>
            </div>

            <!-- Success Message -->
            @if(session('success'))
                <div class="bg-green-100 text-green-800 p-4 mb-4 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <!-- File Upload Form -->
            <div class="bg-white shadow-sm sm:rounded-lg p-6 mb-6">
                <h2 class="text-lg font-semibold mb-4">Upload a New Document</h2>
                <form action="{{ route('HumanResource.perfomanceAppraisal.upload') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    <input type="file" name="file" class="border border-gray-300 p-2 rounded w-full">
                    @error('file')
                        <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                    @enderror
                    <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition duration-300">
                        Upload Document
                    </button>
                </form>
            </div>

            <!-- Display Uploaded Documents with Search and Sort -->
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <h2 class="text-lg font-semibold mb-4">Uploaded Documents</h2>

                <!-- Search and Sort Section -->
                <div class="flex justify-between items-center mb-4">
                    <!-- Search Bar -->
                    <form action="{{ route('HumanResource.perfomanceAppraisal') }}" method="GET" class="w-full md:w-1/3">
                        <input 
                            type="text" 
                            name="search" 
                            value="{{ request('search') }}" 
                            placeholder="Search documents..." 
                            class="border border-gray-300 p-2 rounded w-full">
                    </form>
                    
                    <!-- Sort Dropdown -->
<form action="{{ route('HumanResource.perfomanceAppraisal') }}" method="GET">
    <!-- Preserve the search query -->
    <input type="hidden" name="search" value="{{ request('search') }}">
    
    <select name="sort_by" class="border border-gray-300 p-2 rounded" onchange="this.form.submit()">
        <option value="" disabled {{ request('sort_by') ? '' : 'selected' }}>Select Sorting Option</option>
        <option value="file_name" {{ request('sort_by') == 'file_name' ? 'selected' : '' }}>Sort by Name</option>
        <option value="created_at" {{ request('sort_by') == 'created_at' ? 'selected' : '' }}>Sort by Date</option>
    </select>
</form>

                </div>

                @if($files->count() > 0)
                    <ul class="space-y-3">
                        @foreach($files as $file)
                            <li class="flex justify-between items-center border-b pb-2">
                                <div class="flex-1">
                                    <span class="text-gray-700">{{ $file->file_name }}</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <!-- View Button -->
                                    <a href="{{ asset('storage/' . $file->file_path) }}" class="text-blue-600 hover:underline" target="_blank">View</a>

                                    <!-- Delete Button -->
                                    <form action="{{ route('HumanResource.delete', ['type' => 'perfomanceAppraisal', 'id' => $file->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition duration-300">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </li>
                        @endforeach
                    </ul>

                    <!-- Pagination Links -->
                    <div class="mt-4">
                        {{ $files->links() }}
                    </div>
                @else
                    <p class="text-gray-700">No documents uploaded yet.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
