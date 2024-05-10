<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Players') }}
        </h2>
    </x-slot>

    <x-slot name="slot">
        <div class="py-12 space-y-6">
            <div class="mx-auto max-w-4xl space-y-6 sm:px-6 lg:px-8">
                <div class="bg-white p-4 shadow dark:bg-gray-800 sm:rounded-lg sm:p-8 flex items-center justify-between">
                    <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Doctors</h1>
                    <div class="ml-4">
                        <x-link-thing :url="route('doctors.index')">{{ __('Manage Contact') }}</x-primary-button>
                    </div>
                </div>
            </div>

            <div class="mx-auto max-w-4xl space-y-6 sm:px-6 lg:px-8">
                <div class="bg-white p-4 shadow dark:bg-gray-800 sm:rounded-lg sm:p-8 flex items-center justify-between">
                    <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Guardian</h1>
                    <div class="ml-4">
                        <x-link-thing :url="route('guardian.index')">{{ __('Manage Contact') }}</x-primary-button>
                    </div>
                </div>

            </div>

            <div class="mx-auto max-w-4xl space-y-6 sm:px-6 lg:px-8">
                <div
                    class="bg-white p-4 shadow dark:bg-gray-800 sm:rounded-lg sm:p-8 flex items-center justify-between">
                    <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Next of Kin</h1>
                    <div class="ml-4">
                        <x-link-thing :url="route('kin.index')">{{ __('Manage Contact') }}</x-primary-button>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </x-slot>
</x-app-layout>
