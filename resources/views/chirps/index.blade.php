<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form action="{{ route('chirps.store') }}" method="POST">
            @csrf
            <label for="message">
                <textarea name="message" id="message" cols="30" rows="5"
                          placeholder="{{ __('What\'s on your mind?') }}"
                          class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">{{ old('message') }}</textarea>
            </label>
            <x-input-error for="message" class="mt-2"></x-input-error>
            <x-button class="mt-4">{{ __('Chirp') }}</x-button>
        </form>
    </div>
</x-app-layout>
