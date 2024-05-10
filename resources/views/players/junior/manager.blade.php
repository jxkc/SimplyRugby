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
                    <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Junior Players</h1>
                </div>

            </div>

            <div class="mx-auto max-w-4xl space-y-6 sm:px-6 lg:px-8">
                <div class="bg-white p-4 shadow dark:bg-gray-800 sm:rounded-lg sm:p-8">
                    <div class="mx-auto max-w-xl">
                        {{-- Junior Player Table --}}
                        <form method="POST" action="{{ route('junior-members.store') }}"
                            class="flex flex-col content-center space-y-6 mx-4" enctype="multipart/form-data">
                            @csrf

                            <div>
                                <x-input-label for="sru_number" :value="__('SRU Number')" />
                                <x-text-input name="sru_number" id="sru_number" class="mt-1 block w-full"
                                    placeholder="SRU Number" />
                                <x-input-error :messages="$errors->get('sru_number')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="doctorid" :value="__('Doctor ID')" />
                                <x-text-input name="doctorid" id="doctorid" class="mt-1 block w-full"
                                    placeholder="Doctor ID" />
                                <x-input-error :messages="$errors->get('doctorid')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="guardianid_1" :value="__('Guardian ID 1')" />
                                <x-text-input name="guardianid_1" id="guardianid_1" class="mt-1 block w-full"
                                    placeholder="Guardian ID 1" />
                                <x-input-error :messages="$errors->get('guardianid_1')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="guardianid_2" :value="__('Guardian ID 2')" />
                                <x-text-input name="guardianid_2" id="guardianid_2" class="mt-1 block w-full"
                                    placeholder="Guardian ID 2" />
                                <x-input-error :messages="$errors->get('guardianid_2')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="position" :value="__('Position')" />
                                <x-text-input name="position" id="position" class="mt-1 block w-full"
                                    placeholder="Position" />
                                <x-input-error :messages="$errors->get('position')" class="mt-2" />
                            </div>

                            <div>
                                <x-primary-button>{{ __('Add Player') }}</x-primary-button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <div class="mx-auto max-w-4xl space-y-6 sm:px-6 lg:px-8">
            <div class="bg-white p-4 shadow dark:bg-gray-800 sm:rounded-lg sm:p-8">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('List of Junior Members') }}
                </h2>
                @if ($juniorMembers->isEmpty())
                    <p class="text-gray-600 dark:text-gray-400">This list is empty</p>
                @else
                    @foreach ($juniorMembers as $member)
                        @php
                            $matchedDoctor = $doctors->firstWhere('doctorid', $member->doctorid);
                            $matchedGuardian1 = $guardians->firstWhere('guardianid', $member->guardianid_1);
                            $matchedGuardian2 = $guardians->firstWhere('guardianid', $member->guardianid_2);
                        @endphp
                        <div class="border-t border-gray-200 dark:border-gray-600 py-4">
                            <p class="text-lg font-semibold text-gray-600 dark:text-gray-400">{{ $member->membership->fname }}
                                {{ $member->membership->lname }}</p>
                            <p class="text-gray-600 dark:text-gray-400">{{ $member->membership->sru_number }}</p>
                            @if ($matchedDoctor)
                                <p class="text-gray-600 dark:text-gray-400">Doctor: {{ $matchedDoctor->doctor_name }}
                                </p>
                            @else
                                <p class="text-gray-600 dark:text-gray-400">No doctor assigned</p>
                            @endif
                            @if ($matchedGuardian1)
                                <p class="text-gray-600 dark:text-gray-400">Guardian 1:
                                    {{ $matchedGuardian1->guardian_name }}</p>
                            @else
                                <p class="text-gray-600 dark:text-gray-400">No guardian assigned</p>
                            @endif
                            @if ($matchedGuardian2)
                                <p class="text-gray-600 dark:text-gray-400">Guardian 2:
                                    {{ $matchedGuardian2->guardian_name }}</p>
                            @endif
                            <p class="text-gray-600 dark:text-gray-400">Position: {{ $member->position }}</p>
                        </div>
                    @endforeach
                @endif

            </div>
        </div>

        </div>
    </x-slot>
</x-app-layout>
