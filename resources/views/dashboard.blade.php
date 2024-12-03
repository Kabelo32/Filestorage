<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Dashboard Header -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
            <div class="p-6 bg-gray-200 text-gray-900 flex justify-center items-center">
              <h1 class="text-2xl font-semibold">File Management Dashboard</h1>
            </div>
        </div>


            <!-- Main Content Area -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                
                <!-- File Categories / Management Section -->
                <div class="col-span-1 md:col-span-4 bg-white shadow-sm sm:rounded-lg p-6">
                    <h2 class="text-lg font-semibold mb-6 flex justify-center items-center">File Categories</h2>
                    <!-- Cards for categories -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                        <!-- HR Card -->
                        <a href="{{ route('HumanResource.dashboard') }}" class="bg-blue-600 text-white p-6 rounded-lg shadow-lg text-center hover:bg-blue-700 transition duration-300">
                            <h3 class="text-2xl font-semibold">Human Resource</h3>
                            <p class="text-sm mt-2">Manage HR related documents.</p>
                        </a>
                        
                        <!-- Finance Card -->
                        <a href="" class="bg-green-600 text-white p-6 rounded-lg shadow-lg text-center hover:bg-green-700 transition duration-300">
                            <h3 class="text-2xl font-semibold">Finance</h3>
                            <p class="text-sm mt-2">Manage financial documents.</p>
                        </a>
                        
                        <!-- Procurement Card -->
                        <a href="" class="bg-yellow-600 text-white p-6 rounded-lg shadow-lg text-center hover:bg-yellow-700 transition duration-300">
                            <h3 class="text-2xl font-semibold">Procurement</h3>
                            <p class="text-sm mt-2">Manage procurement related documents.</p>
                        </a>

                        <!-- Asset Card -->
                        <a href="{{ route('Asset.dashboard') }}" class="bg-red-600 text-white p-6 rounded-lg shadow-lg text-center hover:bg-red-700 transition duration-300">
                            <h3 class="text-2xl font-semibold">Asset</h3>
                            <p class="text-sm mt-2">Manage asset documents.</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
