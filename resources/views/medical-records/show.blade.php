<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Medical Record Detail') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 ">
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900 ">
                            {{ 'Diagnosis' }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600 ">
                            {{ $medical_record->diagnosis }}
                        </p>
                    </div>

                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900 ">
                            {{ 'Temperature' }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600  ">
                            {{ $medical_record->temperature }}
                        </p>
                    </div>
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900 ">
                            {{ 'Image' }}
                        </h2>
                
                        <p class="mt-1 text-sm text-gray-600">
                            <img class="h-64 w-128" src="{{ asset('storage/' . $medical_record->image) }}" alt="{{ $medical_record->name }}" srcset="">
                        </p>
                    </div>
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900 ">
                            {{ 'Doctor' }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600 ">
                            {{ $medical_record->doctor->name }}
                        </p>
                    </div>
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900  ">
                            {{ 'Created At' }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600 ">
                            {{ $medical_record->created_at }}
                        </p>
                    </div>
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900  ">
                            {{ 'Updated At' }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600  ">
                            {{ $medical_record->updated_at }}
                        </p>
                    </div>
                    <a href="{{ route('medical-records.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">BACK</a>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
