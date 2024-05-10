<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Members') }}
        </h2>
    </x-slot>

    <x-slot name="slot">
        <div class="py-12 space-y-6">
            <div class="mx-auto max-w-4xl space-y-6 sm:px-6 lg:px-8">
                <div class="bg-white p-4 shadow dark:bg-gray-800 sm:rounded-lg sm:p-8 flex items-center justify-between">
                    <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Coaches</h1>
                    <div class="ml-4">
                        <x-link-thing :url="route('coaches.index')">{{ __('Manage Coaches') }}</x-primary-button>
                    </div>
                </div>
            </div>

            <div class="mx-auto max-w-4xl space-y-6 sm:px-6 lg:px-8">

            </div>

            <div class="mx-auto max-w-4xl space-y-6 sm:px-6 lg:px-8">
                <div class="bg-white p-4 shadow dark:bg-gray-800 sm:rounded-lg sm:p-8">
                    <div class="mx-auto max-w-xl">

                        <form method="POST" action="{{ route('members.store') }}"
                            class="flex flex-col content-center space-y-6 mx-4" enctype="multipart/form-data">
                            @csrf
                            <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Members
                            </h1>

                            <div>
                                <x-input-label for="fname" :value="__('First Name')" />
                                <x-text-input name="fname" id="fname" class="mt-1 block w-full"
                                    placeholder="First Name" />
                                <x-input-error :messages="$errors->get('fname')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="lname" :value="__('Last Name')" />
                                <x-text-input name="lname" id="lname" class="mt-1 block w-full"
                                    placeholder="Last Name" />
                                <x-input-error :messages="$errors->get('lname')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="dob" :value="__('Date of Birth')" />
                                <input type="date" name="dob" id="dob"
                                    class="appearance-none rounded-none relative block w-full py-2 pl-3 pr-10 leading-tight focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-900 dark:text-gray-300" />
                                <x-input-error :messages="$errors->get('dob')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="address" :value="__('Address')" />
                                <x-text-input name="address" id="address" class="mt-1 block w-full"
                                    placeholder="Address" />
                                <x-input-error :messages="$errors->get('address')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="postcode" :value="__('Postcode')" />
                                <x-text-input name="postcode" id="postcode" class="mt-1 block w-full"
                                    placeholder="Postcode" />
                                <x-input-error :messages="$errors->get('postcode')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input name="email" id="email" class="mt-1 block w-full"
                                    placeholder="Email" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="phone" :value="__('Phone')" />
                                <x-text-input name="phone" id="phone" class="mt-1 block w-full"
                                    placeholder="Phone" />
                                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                            </div>

                            <div>
                                <x-primary-button>{{ __('Add Member') }}</x-primary-button>
                            </div>
                        </form>
                    </div>

                </div>
                @foreach ($members as $member)
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg rounded-lg mb-6">
                        <div class="p-6">
                            <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-2">{{ $member->fname }}
                                {{ $member->lname }}</h2>
                            <p class="text-sm text-gray-700 dark:text-gray-300 mb-4">
                                <strong>SRU Number:</strong> {{ $member->sru_number }}<br>
                                <strong>Date of Birth:</strong> {{ $member->dob }}<br>
                                <strong>Address:</strong> {{ $member->address }}, {{ $member->postcode }}<br>
                                <strong>Email:</strong> {{ $member->email }}<br>
                                <strong>Phone:</strong> {{ $member->phone }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        </div>
    </x-slot>
</x-app-layout>
