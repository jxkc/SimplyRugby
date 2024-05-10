<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Managing Training Sessions') }}
        </h2>
    </x-slot>

    <x-slot name="slot">
        <div class="py-12 space-y-6">

            <div class="mx-auto max-w-4xl space-y-6 sm:px-6 lg:px-8">
                <div class="bg-white p-4 shadow dark:bg-gray-800 sm:rounded-lg sm:p-8 flex items-center justify-between">
                    <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Training Sessions</h1>
                </div>
            </div>

            <div class="mx-auto max-w-4xl space-y-6 sm:px-6 lg:px-8">
                <div class="bg-white p-4 shadow dark:bg-gray-800 sm:rounded-lg sm:p-8">
                    <div class="mx-auto max-w-xl">
                        <form method="POST" action="{{ route('trainingsessions.store') }}" class="flex flex-col content-center space-y-6 mx-4" enctype="multipart/form-data">
                            @csrf

                            <div>
                                <x-input-label for="location" :value="__('Location')" />
                                <x-text-input name="location" id="location" class="mt-1 block w-full" placeholder="Location" />
                                <x-input-error :messages="$errors->get('location')" class="mt-2" />
                            </div>                            
                        
                            <div>
                                <x-input-label for="dos" :value="__('Date of Session')" />
                                <input type="date" name="dos" id="dos" class="appearance-none rounded-none relative block w-full py-2 pl-3 pr-10 leading-tight focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-900 dark:text-gray-300" />
                                <x-input-error :messages="$errors->get('dos')" class="mt-2" />
                            </div>
                            
                            <div class="mt-4">
                                <x-input-label for="time" :value="__('Time of Session')" />
                                <input type="time" name="time" id="time" class="appearance-none rounded-none relative block w-full py-2 pl-3 pr-10 leading-tight focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-900 dark:text-gray-300" />
                                <x-input-error :messages="$errors->get('time')" class="mt-2" />
                            </div>
                            
                            <div>
                                <x-input-label for="session_note" :value="__('Session Note')" />
                                <textarea name="session_note" id="session_note" rows="4" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 dark:focus:border-indigo-600 dark:focus:ring-indigo-600"></textarea>
                                <x-input-error :messages="$errors->get('session_note')" class="mt-2" />
                            </div>
                            
                            <div class="mt-4">
                                <x-input-label for="product_desc" :value="__('Product Description')" />
                                <textarea name="product_desc" id="product_desc" rows="4" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 dark:focus:border-indigo-600 dark:focus:ring-indigo-600"></textarea>
                                <x-input-error :messages="$errors->get('product_desc')" class="mt-2" />
                            </div>
                            
                            <div>
                                <x-primary-button>{{ __('Add Training Session') }}</x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <div class="mx-auto max-w-4xl space-y-6 sm:px-6 lg:px-8">
                <div class="bg-white p-4 shadow dark:bg-gray-800 sm:rounded-lg sm:p-8">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __('List of Training Sessions') }}
                    </h2>
                    @foreach ($trainingsessions as $session)
                        <div class="border-b border-gray-300 dark:border-gray-600 mb-4 p-4">
                            <p class="text-lg font-semibold text-gray-800 dark:text-gray-200">Date: {{ $session->dos }}</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Location: {{ $session->location }}</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Time: {{ $session->time }}</p>
                            @if ($session->session_note)
                                <p class="text-sm text-gray-600 dark:text-gray-400">Session Note: {{ $session->session_note }}</p>
                            @endif
                            @if ($session->medical_report)
                                <p class="text-sm text-gray-600 dark:text-gray-400">Medical Report: {{ $session->medical_report }}</p>
                            @endif
                        </div>
                    @endforeach
                    @if ($trainingsessions->isEmpty())
                        <p class="text-gray-600 dark:text-gray-400">{{ __('No training sessions found.') }}</p>
                    @endif
                </div>
            </div>
            
        </div>
        </div>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    </x-slot>
</x-app-layout>
