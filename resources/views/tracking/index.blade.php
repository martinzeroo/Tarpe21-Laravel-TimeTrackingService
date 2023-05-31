<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('tracking.store') }}">
            @csrf
            <input type="text" name="name" value="{{ old('name') }}" placeholder="{{ __('Name the tracking') }}"/>
            <textarea
                name="description"
                placeholder="{{ __('Add a description for the tracking') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('message') }}</textarea>
            <textarea
                name="description"
                placeholder="{{ __('Add a description for the tracking') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('message') }}</textarea>
            <textarea
                name="description"
                placeholder="{{ __('Add a description for the tracking') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('message') }}</textarea>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
            <x-primary-button class="mt-4">{{ __('Add Tracking') }}</x-primary-button>
        </form>
    </div>
</x-app-layout>
