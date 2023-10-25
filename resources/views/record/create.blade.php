<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Medical Record') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="post" action="{{ route('medical-records.store') }}" class="mt-6 space-y-6"
                        enctype="multipart/form-data" class="mt-6 space-y-6">
                        @csrf

                        <div>
                            <x-input-label for="name" value="Name" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                :value="$product->name ?? old('name')" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <div>
                            <x-input-label for="diagnosis" value="diagnosis" />
                            <x-textarea-input id="diagnosis" name="diagnosis" class="mt-1 block w-full" required
                                autofocus>{{ $product->diagnosis ?? old('diagnosis') }}</x-textarea-input>
                            <x-input-error class="mt-2" :messages="$errors->get('diagnosis')" />
                        </div>

                        <div>
                            <x-input-label for="temperature" value="Temperature" />
                            <x-textarea-input id="temperature" name="temperature" class="mt-1 block w-full"
                                autofocus>{{ $product->temperature ?? old('temperature') }}</x-textarea-input>
                            <x-input-error class="mt-2" :messages="$errors->get('temperature')" />
                        </div>


                        <div>
                            <x-input-label for="patient" value="Patient" />
                            <select id="patient"
                                name="condition_id" class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                @foreach ($conditions as $patient)
                                    <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <x-input-label for="doctor" value="doctor" />
                            <select id="doctor"
                                name="type_id" class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                @foreach ($types as $doctor)
                                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                @endforeach
                            </select>
                        </div>

                       


                        <div>
                            <x-input-label for="image" value="Image" />
                            <label class="block mt-2">
                                <span class="sr-only">Choose image</span>
                                <input type="file" id="image" name="image"
                                    class="block w-full text-sm text-slate-500
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-full file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-violet-50 file:text-violet-700
                                    hover:file:bg-violet-100
                                " />
                            </label>
                            <x-input-error class="mt-2" :messages="$errors->get('image')" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
