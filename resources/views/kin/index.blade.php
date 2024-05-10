<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Next of Kin') }}
        </h2>
    </x-slot>

    <x-slot name="slot">
        <div class="py-12 space-y-6">
            <div class="mx-auto max-w-4xl space-y-6 sm:px-6 lg:px-8">
                <div class="bg-white p-4 shadow dark:bg-gray-800 sm:rounded-lg sm:p-8">
                    <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Add Next of Kin</h1>
                    <form method="POST" action="{{ route('kin.store') }}" class="mt-4 space-y-6">
                        @csrf
                        <div>
                            <x-input-label for="kin_name" :value="__('Name')" />
                            <x-text-input name="kin_name" id="kin_name" class="mt-1 block w-full" placeholder="Name" />
                            <x-input-error :messages="$errors->get('kin_name')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="kin_address" :value="__('Address')" />
                            <x-text-input name="kin_address" id="kin_address" class="mt-1 block w-full" placeholder="Address" />
                            <x-input-error :messages="$errors->get('kin_address')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="kin_phone" :value="__('Phone')" />
                            <x-text-input name="kin_phone" id="kin_phone" class="mt-1 block w-full" placeholder="Phone" />
                            <x-input-error :messages="$errors->get('kin_phone')" class="mt-2" />
                        </div>
                        <div>
                            <x-primary-button>{{ __('Add Next of Kin') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="mx-auto max-w-4xl space-y-6 sm:px-6 lg:px-8">
                <div class="bg-white p-4 shadow dark:bg-gray-800 sm:rounded-lg sm:p-8">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __('List of Next of Kin') }}
                    </h2>
                    @foreach ($kin as $nextOfKin)
                        <div class="border-b border-gray-300 dark:border-gray-600 mb-4 p-4">
                            <p class="text-lg font-semibold text-gray-800 dark:text-gray-200">{{ $nextOfKin->kin_name }}</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">{{ $nextOfKin->kin_address }}</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">{{ $nextOfKin->kin_phone }}</p>
                        </div>
                    @endforeach
                    @if ($kin->isEmpty())
                        <p class="text-gray-600 dark:text-gray-400">{{ __('No Next of Kin found.') }}</p>
                    @endif
                </div>
            </div>
            
        </div>
    </x-slot>
</x-app-layout>
