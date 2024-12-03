<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Dashboard Header -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 bg-gray-200 text-gray-900 flex justify-center items-center">
                    <h1 class="text-2xl font-semibold text-center">Assets  Documents</h1>
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    <a href="{{ route('Asset.laptop') }}"class="bg-blue-600 text-white p-6 rounded-lg shadow-lg text-center hover:bg-blue-700 transition duration-300">
        <h3 class="text-xl font-semibold">Laptop Acceptance Forms</h3>
        <p class="text-sm mt-2">View and manage Laptop acceptance documents.</p>
        <div class="mt-4 text-lg font-semibold">{{ $laptopCount }} Documents</div>
    </a>



    <!-- Cellphone Documents -->
        <a href="{{ route ('Asset.cellPhone') }}" class="bg-green-600 text-white p-6 rounded-lg shadow-lg text-center hover:bg-green-700 transition duration-300">
         <h3 class="text-xl font-semibold">Cellphone Acceptance Documents</h3>
            <p class="text-sm mt-2">View and manage Cellphone documents.</p>
        <div class="mt-4 text-lg font-semibold">{{ $cellPhoneCount }} Documents</div> <!-- Example count, replace with dynamic data -->
        </a>

</div>
            </div>
        </div>
    </div>
</x-app-layout>
    