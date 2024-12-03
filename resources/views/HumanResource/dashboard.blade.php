<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Dashboard Header -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 bg-gray-200 text-gray-900 flex justify-center items-center">
                    <h1 class="text-2xl font-semibold text-center">Human Resource Documents</h1>
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    <a href="{{ route('HumanResource.conditionAppraisal') }}" class="bg-blue-600 text-white p-6 rounded-lg shadow-lg text-center hover:bg-blue-700 transition duration-300">
        <h3 class="text-xl font-semibold">Condition of Service</h3>
        <p class="text-sm mt-2">View and manage condition of service documents.</p>
        <div class="mt-4 text-lg font-semibold">{{ $conditionOfServiceCount }} Documents</div>
    </a>



                <!-- Job Profile Documents -->
                <a href="{{ route('HumanResource.jobProfile') }}" class="bg-green-600 text-white p-6 rounded-lg shadow-lg text-center hover:bg-green-700 transition duration-300">
                    <h3 class="text-xl font-semibold">Job Profile</h3>
                    <p class="text-sm mt-2">View and manage job profile documents.</p>
                    <div class="mt-4 text-lg font-semibold">{{ $jobProfileCount }} Documents</div> <!-- Example count, replace with dynamic data -->
                </a>

                <!-- Leave Forms -->
                <a href="{{ route('HumanResource.leaveForm') }}" class="bg-yellow-600 text-white p-6 rounded-lg shadow-lg text-center hover:bg-yellow-700 transition duration-300">
                    <h3 class="text-xl font-semibold">Leave Forms</h3>
                    <p class="text-sm mt-2">View and manage leave forms.</p>
                    <div class="mt-4 text-lg font-semibold">{{ $leaveFormCount }} Documents</div> <!-- Example count, replace with dynamic data -->
                </a>

                <!-- Overtime Forms-->
                <a href="{{ route('HumanResource.overTime') }}" class="bg-red-600 text-white p-6 rounded-lg shadow-lg text-center hover:bg-red-700 transition duration-300">
                    <h3 class="text-xl font-semibold">Overtime Forms</h3>
                    <p class="text-sm mt-2">View and manage overtime forms.</p>
                    <div class="mt-4 text-lg font-semibold">{{ $overTimeCount }} Documents</div> <!-- Example count, replace with dynamic data -->
                </a>

                <!-- Advanced Request Forms-->
                <a href="{{ route('HumanResource.advancedRequest') }}" class="bg-purple-600 text-white p-6 rounded-lg shadow-lg text-center hover:bg-purple-700 transition duration-300">
                    <h3 class="text-xl font-semibold">Advanced Request Forms</h3>
                    <p class="text-sm mt-2">View and manage advanced request forms.</p>
                    <div class="mt-4 text-lg font-semibold">{{ $advancedRequestCount }} Documents</div> <!-- Example count, replace with dynamic data -->
                </a>

                <!-- Perfomance Appraisal-->
                <a href="{{ route('HumanResource.perfomanceAppraisal') }}" class="bg-orange-600 text-white p-6 rounded-lg shadow-lg text-center hover:bg-orange-700 transition duration-300">
                    <h3 class="text-xl font-semibold">Perfomance Appraisal Documents</h3>
                    <p class="text-sm mt-2">View and manage Perfomance Appraisal Documents.</p>
                    <div class="mt-4 text-lg font-semibold">{{ $perfomanceAppraisalCount }} Documents</div> <!-- Example count, replace with dynamic data -->
                </a>
</div>
            </div>
        </div>
    </div>
</x-app-layout>
    