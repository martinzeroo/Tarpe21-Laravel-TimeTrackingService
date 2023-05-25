<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('Tracking.store') }}">
            @csrf
            <input type="text"
             name="person"
              value="{{old('person')}}"
               placeholder="{{__('Name the person')}}"
               class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
            <input type="text"
                name="project"
                value="{{old('project')}}"
                placeholder="{{__('Name the project')}}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
            <input type="number"
                min="0"
                name="duration_TimeSpent"
                value="{{old('duration_TimeSpent')}}"
                placeholder="{{__('Time Spent')}}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
            <textarea
                name="description"
                placeholder="{{ __('Add a  descsription') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('description') }}</textarea>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
            <x-primary-button class="mt-4">{{ __('Add tracker') }}</x-primary-button>
        </form>
    </div>
</x-app-layout>
