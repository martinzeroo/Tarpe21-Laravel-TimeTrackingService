<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('people.update', $chirp) }}">
            @csrf
            @method('patch')
            <input type="text"
            name="person"
             value="{{old('person', $Person -> person)}}"
              placeholder="{{__('Name the person')}}"
              class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
           <input type="text"
               name="project"
               value="{{old('project', $Person -> project)}}"
               placeholder="{{__('Name the project')}}"
               class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
            <div class="mt-4 space-x-2">
                <x-primary-button>{{ __('Save') }}</x-primary-button>
                <a href="{{ route('person.index') }}">{{ __('Cancel') }}</a>
            </div>
        </form>
    </div>
</x-app-layout>
