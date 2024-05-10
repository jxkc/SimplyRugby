<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Coaches') }}
        </h2>
    </x-slot>

    <x-slot name="slot">
        <div class="py-12">
            <div class="mx-auto max-w-4xl sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 shadow overflow-hidden sm:rounded-lg">
                    <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-6">Coaches</h1>
                        <form method="POST" action="{{ route('coaches.store') }}" class="space-y-6">
                            @csrf

                            <div>
                                <x-input-label for="coach_name" :value="__('Coach Name')" />
                                <x-text-input name="coach_name" id="coach_name" class="mt-1 block w-full" placeholder="Coach Name" />
                                <x-input-error :messages="$errors->get('coach_name')" class="mt-2" />
                            </div>

                            <div>
                                <x-primary-button>{{ __('Add Coach') }}</x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>
