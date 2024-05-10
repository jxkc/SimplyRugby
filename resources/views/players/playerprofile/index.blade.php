<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Player Profiles') }}
        </h2>
    </x-slot>

    <x-slot name="slot">
        <div class="py-12 space-y-6">
            <div class="mx-auto max-w-4xl space-y-6 sm:px-6 lg:px-8">
                <div class="bg-white p-4 shadow dark:bg-gray-800 sm:rounded-lg sm:p-8 flex items-center justify-between">
                    <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Player Profiles</h1>
                </div>
            </div>

            <div class="mx-auto max-w-4xl space-y-6 sm:px-6 lg:px-8">
                <div class="bg-white p-4 shadow dark:bg-gray-800 sm:rounded-lg sm:p-8">
                    <div class="mx-auto max-w-xl">
                        <form id="parentForm" method="POST" action="{{ route('players.playerprofile.store') }}"
                            class="flex flex-col space-y-6">
                            @csrf

                            <div>
                                <x-input-label for="sru_number" :value="__('SRU Number')" />
                                <x-text-input name="sru_number" id="sru_number" class="mt-1 block w-full"
                                    placeholder="SRU Number" />
                                <x-input-error :messages="$errors->get('sru_number')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="squad" :value="__('Squad')" />
                                <x-text-input name="squad" id="squad" class="mt-1 block w-full"
                                    placeholder="Squad" />
                                <x-input-error :messages="$errors->get('squad')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="comment" :value="__('Comment')" />
                                <textarea name="comment" id="comment"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 dark:focus:border-indigo-600 dark:focus:ring-indigo-600"
                                    placeholder="Comment"></textarea>
                                <x-input-error :messages="$errors->get('comment')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="medical_note" :value="__('Medical Note')" />
                                <textarea name="medical_note" id="medical_note"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 dark:focus:border-indigo-600 dark:focus:ring-indigo-600"
                                    placeholder="Medical Note"></textarea>
                                <x-input-error :messages="$errors->get('medical_note')" class="mt-2" />
                            </div>

                            <x-input-label for="passing_standard" :value="__('Passing Standard')"
                                class="block font-medium text-sm text-gray-700" />
                            <select name="passing_standard"
                                class="ml-2 flex-grow px-2 py-1 border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                <option value="">Select skill level</option>
                                <option value="Beginner">Beginner</option>
                                <option value="Intermediate">Intermediate</option>
                                <option value="Advanced">Advanced</option>
                            </select>

                            <!-- Passing Spin -->
                            <x-input-label for="passing_spin" :value="__('Passing Spin')"
                                class="block font-medium text-sm text-gray-700" />
                            <select name="passing_spin"
                                class="ml-2 flex-grow px-2 py-1 border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                <option value="">Select skill level</option>
                                <option value="Beginner">Beginner</option>
                                <option value="Intermediate">Intermediate</option>
                                <option value="Advanced">Advanced</option>
                            </select>

                            <!-- Passing Pop -->
                            <x-input-label for="passing_pop" :value="__('Passing Pop')"
                                class="block font-medium text-sm text-gray-700" />
                            <select name="passing_pop"
                                class="ml-2 flex-grow px-2 py-1 border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                <option value="">Select skill level</option>
                                <option value="Beginner">Beginner</option>
                                <option value="Intermediate">Intermediate</option>
                                <option value="Advanced">Advanced</option>
                            </select>

                            <!-- Tackling Front Rear -->
                            <x-input-label for="tackling_front_rear" :value="__('Tackling Front Rear')"
                                class="block font-medium text-sm text-gray-700" />
                            <select name="tackling_front_rear"
                                class="ml-2 flex-grow px-2 py-1 border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                <option value="">Select skill level</option>
                                <option value="Beginner">Beginner</option>
                                <option value="Intermediate">Intermediate</option>
                                <option value="Advanced">Advanced</option>
                            </select>

                            <!-- Tackling Rear Side -->
                            <x-input-label for="tackling_rear_side" :value="__('Tackling Rear Side')"
                                class="block font-medium text-sm text-gray-700" />
                            <select name="tackling_rear_side"
                                class="ml-2 flex-grow px-2 py-1 border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                <option value="">Select skill level</option>
                                <option value="Beginner">Beginner</option>
                                <option value="Intermediate">Intermediate</option>
                                <option value="Advanced">Advanced</option>
                            </select>

                            <!-- Tackling Side -->
                            <x-input-label for="tackling_side" :value="__('Tackling Side')"
                                class="block font-medium text-sm text-gray-700" />
                            <select name="tackling_side"
                                class="ml-2 flex-grow px-2 py-1 border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                <option value="">Select skill level</option>
                                <option value="Beginner">Beginner</option>
                                <option value="Intermediate">Intermediate</option>
                                <option value="Advanced">Advanced</option>
                            </select>

                            <!-- Tackling Scrabble -->
                            <x-input-label for="tackling_scrabble" :value="__('Tackling Scrabble')"
                                class="block font-medium text-sm text-gray-700" />
                            <select name="tackling_scrabble"
                                class="ml-2 flex-grow px-2 py-1 border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                <option value="">Select skill level</option>
                                <option value="Beginner">Beginner</option>
                                <option value="Intermediate">Intermediate</option>
                                <option value="Advanced">Advanced</option>
                            </select>

                            <!-- Kicking Drop Punt -->
                            <x-input-label for="kicking_drop_punt" :value="__('Kicking Drop Punt')"
                                class="block font-medium text-sm text-gray-700" />
                            <select name="kicking_drop_punt"
                                class="ml-2 flex-grow px-2 py-1 border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                <option value="">Select skill level</option>
                                <option value="Beginner">Beginner</option>
                                <option value="Intermediate">Intermediate</option>
                                <option value="Advanced">Advanced</option>
                            </select>

                            <!-- Kicking Drop Grubber -->
                            <x-input-label for="kicking_drop_grubber" :value="__('Kicking Drop Grubber')"
                                class="block font-medium text-sm text-gray-700" />
                            <select name="kicking_drop_grubber"
                                class="ml-2 flex-grow px-2 py-1 border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                <option value="">Select skill level</option>
                                <option value="Beginner">Beginner</option>
                                <option value="Intermediate">Intermediate</option>
                                <option value="Advanced">Advanced</option>
                            </select>

                            <!-- Kicking Drop Goal -->
                            <x-input-label for="kicking_drop_goal" :value="__('Kicking Drop Goal')"
                                class="block font-medium text-sm text-gray-700" />
                            <select name="kicking_drop_goal"
                                class="ml-2 flex-grow px-2 py-1 border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                <option value="">Select skill level</option>
                                <option value="Beginner">Beginner</option>
                                <option value="Intermediate">Intermediate</option>
                                <option value="Advanced">Advanced</option>
                            </select>

                            <div>
                                <x-primary-button>{{ __('Add Player Profile') }}</x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="mx-auto max-w-4xl space-y-6 sm:px-6 lg:px-8">
                <div class="bg-white p-4 shadow dark:bg-gray-800 sm:rounded-lg sm:p-8">
                    <div class="mx-auto max-w-xl">
                        @foreach ($playerProfiles as $playerProfile)
    <div class="mb-8">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
            {{ $playerProfile->member->fname . ' ' . $playerProfile->member->lname }}</h2>
        <p class="text-gray-600 dark:text-gray-400">SRU: {{ $playerProfile->sru_number }}</p>
        <p class="text-gray-600 dark:text-gray-400">Squad: {{ $playerProfile->squad }}</p>
        <p class="text-gray-600 dark:text-gray-400">Comment: {{ $playerProfile->comment }}</p>
        <p class="text-gray-600 dark:text-gray-400">Medical Note: {{ $playerProfile->medical_note }}</p>
        
        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mt-4">Skills</h3>
        
        <ul class="ml-4">
            @foreach ($skills as $skill)
                @if ($playerProfile->skillid === $skill->skillid)
                    <li class="mb-4">
                        <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-200 border-b-2 border-gray-200 dark:border-gray-600 mb-2">Passing</h4>
                        <ul class="list-disc ml-4 text-gray-600 dark:text-gray-400">
                            <li><strong>Standard:</strong> {{ $skill->passing_standard }}</li>
                            <li><strong>Spin:</strong> {{ $skill->passing_spin }}</li>
                            <li><strong>Pop:</strong> {{ $skill->passing_pop }}</li>
                        </ul>

                        <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-200 border-b-2 border-gray-200 dark:border-gray-600 mt-4 mb-2">Tackling</h4>
                        <ul class="list-disc ml-4 text-gray-600 dark:text-gray-400">
                            <li><strong>Front Rear:</strong> {{ $skill->tackling_front_rear }}</li>
                            <li><strong>Rear Side:</strong> {{ $skill->tackling_rear_side }}</li>
                            <li><strong>Side:</strong> {{ $skill->tackling_side }}</li>
                            <li><strong>Scrabble:</strong> {{ $skill->tackling_scrabble }}</li>
                        </ul>

                        <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-200 border-b-2 border-gray-200 dark:border-gray-600 mt-4 mb-2">Kicking</h4>
                        <ul class="list-disc ml-4 text-gray-600 dark:text-gray-400">
                            <li><strong>Drop Punt:</strong> {{ $skill->kicking_drop_punt }}</li>
                            <li><strong>Drop Grubber:</strong> {{ $skill->kicking_drop_grubber }}</li>
                            <li><strong>Drop Goal:</strong> {{ $skill->kicking_drop_goal }}</li>
                        </ul>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
@endforeach

                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>
