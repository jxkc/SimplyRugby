<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Managing Fixtures') }}
        </h2>
    </x-slot>

    <x-slot name="slot">
        <div class="py-12 space-y-6">

            <div class="mx-auto max-w-4xl space-y-6 sm:px-6 lg:px-8">
                <div class="bg-white p-4 shadow dark:bg-gray-800 sm:rounded-lg sm:p-8 flex items-center justify-between">
                    <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Fixtures</h1>
                </div>
            </div>

            <div class="mx-auto max-w-4xl space-y-6 sm:px-6 lg:px-8">
                <div class="bg-white p-4 shadow dark:bg-gray-800 sm:rounded-lg sm:p-8">
                    <div class="mx-auto max-w-xl">
                        <form method="POST" action="{{ route('fixtures.store') }}"
                            class="flex flex-col content-center space-y-6 mx-4" enctype="multipart/form-data">
                            @csrf

                            <div>
                                <x-input-label for="opposition_name" :value="__('Opposition Name')" />
                                <x-text-input name="opposition_name" id="opposition_name" class="mt-1 block w-full"
                                    placeholder="Opposition Name" />
                                <x-input-error :messages="$errors->get('opposition_name')" class="mt-2" />
                            </div>

                            <div>
                                <!-- Dark theme date label -->
                                <x-input-label for="dom" :value="__('Date of Match')" class="dark:text-gray-300" />
                                <input type="date" name="dom" id="dom" class="appearance-none rounded-none relative block w-full py-2 pl-3 pr-10 leading-tight focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-900 dark:text-gray-300" />
                                <x-input-error :messages="$errors->get('dom')" class="mt-2" />
                            </div>
                            

                            <div>
                                <x-input-label for="location" :value="__('Location')" />
                                <x-text-input name="location" id="location" class="mt-1 block w-full"
                                    placeholder="Location" />
                                <x-input-error :messages="$errors->get('location')" class="mt-2" />
                            </div>

                            <div class="mt-4">
                                <!-- Dark theme time label -->
                                <x-input-label for="kick_off" :value="__('Kick Off Time')" class="dark:text-gray-300" />
                                <input type="time" name="kick_off" id="kick_off" class="appearance-none rounded-none relative block w-full py-2 pl-3 pr-10 leading-tight focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-900 dark:text-gray-300" />
                                <x-input-error :messages="$errors->get('kick_off')" class="mt-2" />
                            </div>                            

                            <div>
                                <x-input-label for="result" :value="__('Result')" />
                                <select name="result" id="result"
                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 dark:focus:ring-indigo-600 dark:focus:border-indigo-600">
                                    <option value="Win">Win</option>
                                    <option value="Draw">Draw</option>
                                    <option value="Loss">Loss</option>
                                </select>
                                <x-input-error :messages="$errors->get('result')" class="mt-2" />
                            </div>
                            

                            <div>
                                <x-input-label for="score" :value="__('Score')" />
                                <x-text-input name="score" id="score" class="mt-1 block w-full"
                                    placeholder="Score" />
                                <x-input-error :messages="$errors->get('score')" class="mt-2" />
                            </div>

                            <div>
                                <x-primary-button>{{ __('Add Fixture') }}</x-primary-button>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>

        <div class="mx-auto max-w-4xl space-y-6 sm:px-6 lg:px-8">
            @foreach ($fixtures as $fixture)
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg rounded-lg flex flex-row">
                    <div class="w-1/3">
                    </div>
                    <div class="w-2/3 p-6">
                        <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-2">
                            {{ $fixture->opposition_name }}</h2>
                        <p class="text-sm text-gray-700 dark:text-gray-300 mb-4">
                            Date: {{ $fixture->dom }}
                            <br>
                            Location: {{ $fixture->location }}
                            <br>
                            Kick Off Time: {{ $fixture->kick_off }}
                        </p>
                        <p class="text-base text-gray-900 dark:text-gray-100 font-bold">
                            Result: {{ $fixture->result }}
                            <br>
                            Score: {{ $fixture->score }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
        </div>
    </x-slot>
</x-app-layout>
