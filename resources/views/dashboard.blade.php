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
                    You're logged in as a Regular User! 
                </div>
                <div>
                    <pre>
                    <?php 
                        print_r(session()->all());
                    ?>

                    @if(session()->get('med_info') == 1)
                    <a href="{{ route('medical-info.edit', Auth::id()) }}">Edit Medical Information</a>
                </div>
                    @else
                <div>
                    <a href="{{ route('medical-info.create') }}">Add Medical Information</a>
                </div>
                    @endif

            </div>
        </div>
    </div>
</x-app-layout>
