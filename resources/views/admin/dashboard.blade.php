<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in as an Admin! 
                </div>
            </div>
            <div>
                <a href="{{ route('admin.firstAid.index') }}">All First Aid Information </a>

            </div>

            <div>
                                <a href="{{ route('admin.firstAid.create') }}">
                    Add First Aid Information
                </a>
            </div>

            <div>
                                <a href="{{ route('admin.ambulance.index') }}">
                    Medical Institutions    
                </a>
            </div>

            <div>
                                <a href="{{ route('admin.ambulance.create') }}">
                    Add Emergency Medical Institution
                </a>
            </div>

        </div>
    </div>
</x-app-layout>
