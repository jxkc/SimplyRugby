<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add Guardian') }}
        </h2>
    </x-slot>

    <x-slot name="slot">
        <div class="py-12 space-y-6">
            <div class="mx-auto max-w-4xl space-y-6 sm:px-6 lg:px-8">
                <div class="bg-white p-4 shadow dark:bg-gray-800 sm:rounded-lg sm:p-8">
                    <div class="mx-auto max-w-xl">
                        <form method="POST" action="{{ route('guardian.store') }}" class="flex flex-col content-center space-y-6 mx-4" enctype="multipart/form-data">
                            @csrf

                            <div>
                                <x-input-label for="guardian_name" :value="__('Guardian Name')" />
                                <x-text-input name="guardian_name" id="guardian_name" class="mt-1 block w-full" placeholder="Guardian Name" />
                                <x-input-error :messages="$errors->get('guardian_name')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="guardian_address" :value="__('Guardian Address')" />
                                <x-text-input name="guardian_address" id="guardian_address" class="mt-1 block w-full" placeholder="Guardian Address" />
                                <x-input-error :messages="$errors->get('guardian_address')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="guardian_postcode" :value="__('Guardian Postcode')" />
                                <x-text-input name="guardian_postcode" id="guardian_postcode" class="mt-1 block w-full" placeholder="Guardian Postcode" />
                                <x-input-error :messages="$errors->get('guardian_postcode')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="guardian_phone" :value="__('Guardian Phone')" />
                                <x-text-input name="guardian_phone" id="guardian_phone" class="mt-1 block w-full" placeholder="Guardian Phone" />
                                <x-input-error :messages="$errors->get('guardian_phone')" class="mt-2" />
                            </div>

                            <div>
                                <x-primary-button>{{ __('Add Guardian') }}</x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="mx-auto max-w-4xl space-y-6 sm:px-6 lg:px-8">
                <div class="bg-white p-4 shadow dark:bg-gray-800 sm:rounded-lg sm:p-8">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __('List of Guardians') }}
                    </h2>
                    @foreach ($guardians as $guardian)
                        <div class="border-b border-gray-300 dark:border-gray-600 mb-4 p-4">
                            <p class="text-lg font-semibold text-gray-800 dark:text-gray-200">{{ $guardian->guardian_name }}</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">{{ $guardian->guardian_address }}</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">{{ $guardian->guardian_postcode }}</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">{{ $guardian->guardian_phone }}</p>
                            @if ($guardian->guardian_signature)
                                <img src="{{ asset('storage/' . $guardian->guardian_signature) }}" alt="Guardian Signature"
                                    class="mt-2">
                            @else
                                <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">{{ __('No signature available') }}</p>
                            @endif
                        </div>
                    @endforeach
                    @if ($guardians->isEmpty())
                        <p class="text-gray-600 dark:text-gray-400">{{ __('No guardians found.') }}</p>
                    @endif
                </div>
            </div>
            
        </div>
    </x-slot>
</x-app-layout>
