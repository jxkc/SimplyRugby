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
                    <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Player Profiles</h1>
                    <div class="ml-4">
                        <x-link-thing :url="route('players.playerprofile.index')">{{ __('Manage Player Profiles') }}</x-primary-button>
                    </div>
                </div>
            </div>

            <div class="mx-auto max-w-4xl space-y-6 sm:px-6 lg:px-8">
                <div class="bg-white p-4 shadow dark:bg-gray-800 sm:rounded-lg sm:p-8 flex items-center justify-between">
                    <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Junior Players</h1>
                    <div class="ml-4">
                        <x-link-thing :url="route('junior-members.manager')">{{ __('Manage Junior Players') }}</x-primary-button>
                    </div>
                </div>
                
            </div>

            <div class="mx-auto max-w-4xl space-y-6 sm:px-6 lg:px-8">
                <div class="bg-white p-4 shadow dark:bg-gray-800 sm:rounded-lg sm:p-8 flex items-center justify-between">
                    <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Senior Players</h1>
                    <div class="ml-4">
                        <x-link-thing :url="route('senior-members.manager')">{{ __('Manage Senior Players') }}</x-primary-button>
                    </div>
                </div>
            </div>


            
        </div>

        
        </div>



    </x-slot>
</x-app-layout>
