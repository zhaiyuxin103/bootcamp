<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form action="{{ route('chirps.update', $chirp) }}" method="POST">
            @csrf
            @method('patch')
            <label for="message">
                <textarea name="message" id="message" cols="30" rows="5"
                          class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">{{ old('message', $chirp->message) }}
                </textarea>
            </label>
            <x-input-error for="message" class="mt-2"></x-input-error>
            <div class="mt-4 space-x-2">
                <x-button>{{ __('Save') }}</x-button>
                <a href="{{ route('chirps.index') }}">{{ __('Cancel') }}</a>
            </div>
        </form>
    </div>
</x-app-layout>
