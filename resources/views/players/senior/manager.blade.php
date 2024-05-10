<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Managing Senior Players') }}
        </h2>
    </x-slot>

    <x-slot name="slot">
        <div class="py-12 space-y-6">

            <div class="mx-auto max-w-4xl space-y-6 sm:px-6 lg:px-8">
                <div class="bg-white p-4 shadow dark:bg-gray-800 sm:rounded-lg sm:p-8 flex items-center justify-between">
                    <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Senior Players</h1>
                </div>
            </div>

            <div class="mx-auto max-w-4xl space-y-6 sm:px-6 lg:px-8">
                <div class="bg-white p-4 shadow dark:bg-gray-800 sm:rounded-lg sm:p-8">
                    <div class="mx-auto max-w-xl">
                        {{-- Senior Player Table --}}
                        <form method="POST" action="{{ route('senior-members.manager.submit') }}"
                            class="flex flex-col content-center space-y-6" enctype="multipart/form-data">
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
                                <x-input-label for="kinid" :value="__('Next of Kin ID')" />
                                <x-text-input name="kinid" id="kinid" class="mt-1 block w-full"
                                    placeholder="Next of Kin ID" />
                                <x-input-error :messages="$errors->get('kinid')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="position" :value="__('Position')" />
                                <x-text-input name="position" id="position" class="mt-1 block w-full"
                                    placeholder="Position" />
                                <x-input-error :messages="$errors->get('position')" class="mt-2" />
                            </div>

                            <div>
                                <x-primary-button>{{ __('Add Senior Member') }}</x-primary-button>
                            </div>
                        </form>


                    </div>
                </div>
            </div>

            <div class="mx-auto max-w-4xl space-y-6 sm:px-6 lg:px-8">
                <div class="bg-white p-4 shadow dark:bg-gray-800 sm:rounded-lg sm:p-8">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __('List of Senior Members') }}
                    </h2>
                    @if ($seniorMembers->isEmpty())
                        <p class="text-gray-600 dark:text-gray-400">This list is empty</p>
                    @else
                        @foreach ($seniorMembers as $member)
                            @php
                                $matchedDoctor = $doctors->firstWhere('doctorid', $member->doctorid);
                                $matchedKin = $kins->firstWhere('kin_id', $member->kin_id);
                            @endphp
                            <div class="border-t border-gray-200 dark:border-gray-600 py-4">
                                <p class="text-gray-600 dark:text-gray-400 text-lg font-semibold">{{ $member->membership->fname }}
                                    {{ $member->membership->lname }}</p>
                                <p class="text-gray-600 dark:text-gray-400">{{ $member->membership->sru_number }}</p>
                                @if ($matchedDoctor)
                                    <p class="text-gray-600 dark:text-gray-400">Doctor:
                                        {{ $matchedDoctor->doctor_name }}</p>
                                @else
                                    <p class="text-gray-600 dark:text-gray-400">No doctor assigned</p>
                                @endif
                                @if ($matchedKin)
                                    <p class="text-gray-600 dark:text-gray-400">Next of Kin: {{ $matchedKin->kin_name }}
                                    </p>
                                @else
                                    <p class="text-gray-600 dark:text-gray-400">No next of kin assigned</p>
                                @endif
                                <p class="text-gray-600 dark:text-gray-400">Position: {{ $member->position }}</p>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        </div>



    </x-slot>
</x-app-layout>
