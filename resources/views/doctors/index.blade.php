<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add Doctor') }}
        </h2>
    </x-slot>

    <x-slot name="slot">
        <div class="py-12 space-y-6">
            <div class="mx-auto max-w-4xl space-y-6 sm:px-6 lg:px-8">
                <div class="bg-white p-4 shadow dark:bg-gray-800 sm:rounded-lg sm:p-8">
                    <div class="mx-auto max-w-xl">
                        <form method="POST" action="{{ route('doctors.store') }}" class="flex flex-col content-center space-y-6 mx-4">
                            @csrf

                            <div>
                                <x-input-label for="doctor_name" :value="__('Doctor Name')" />
                                <x-text-input name="doctor_name" id="doctor_name" class="mt-1 block w-full" placeholder="Doctor Name" />
                                <x-input-error :messages="$errors->get('doctor_name')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="doctor_address" :value="__('Doctor Address')" />
                                <x-text-input name="doctor_address" id="doctor_address" class="mt-1 block w-full" placeholder="Doctor Address" />
                                <x-input-error :messages="$errors->get('doctor_address')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="doctor_phone" :value="__('Doctor Phone')" />
                                <x-text-input name="doctor_phone" id="doctor_phone" class="mt-1 block w-full" placeholder="Doctor Phone" />
                                <x-input-error :messages="$errors->get('doctor_phone')" class="mt-2" />
                            </div>

                            <div>
                                <x-primary-button>{{ __('Add Doctor') }}</x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="mx-auto max-w-4xl space-y-6 sm:px-6 lg:px-8">
                <div class="bg-white p-4 shadow dark:bg-gray-800 sm:rounded-lg sm:p-8">
                    <h2 class="border-b border-gray-300 dark:border-gray-600 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __('List of Doctors') }}
                    </h2>
                    @foreach ($doctors as $doctor)
                        <div class="border-b border-gray-300 dark:border-gray-600 rmb-4 p-4">
                            <p class="text-lg font-semibold text-gray-800 dark:text-gray-200">{{ $doctor->doctor_name }}</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">{{ $doctor->doctor_address }}</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">{{ $doctor->doctor_phone }}</p>
                        </div>
                    @endforeach
                    @if ($doctors->isEmpty())
                        <p class="text-gray-600 dark:text-gray-400">{{ __('No doctors found.') }}</p>
                    @endif
                </div>
            </div>
            

        </div>
    </x-slot>
</x-app-layout>
