<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('trackings.store') }}">
            @csrf
            <label>{{ __('Time spent in hours')}}
            <input type="number"
                min="0"
                name="duration_TimeSpent"
                value="{{old('duration_TimeSpent')}}"
                placeholder="{{__('Time spent in hours')}}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
            <label>{{ __('Description')}}
                <textarea
                name="description"
                placeholder="{{ __('Add a  descsription') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('description') }}</textarea>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
            <x-input-error :messages="$errors->get('duration_Timespent')" class="mt-2" />
                <label>{{ __('project')}}
                    <select name="project_id" id="">
                        <option value="0" disabled selected>{{ __('Select project') }}</option>
                        @foreach ($projects as $project)
                        <option value="{{$project->id}}" @selected(old('project_id')==$project->id) >{{ $project->project }}</option>
                        @endforeach
                    </select>
                </label>
                <x-input-error :messages="$errors->get('project_id')" class="mt-2" />

                    <label>{{ __('person')}}
                <select name="person_id" id="">
                    <option value="0" disabled selected>{{ __('Select person') }}</option>
                    @foreach ($people as $person)
                    <option value="{{$person->id}}" @selected(old('person_id')==$person->id) >{{ $person->fullname }}</option>
                    @endforeach
                </select>
            </label>
            <x-input-error :messages="$errors->get('person_id')" class="mt-2" />

            <x-primary-button class="mt-4">{{ __('Add Tracking') }}</x-primary-button>



        </form>
        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            @foreach ($trackings as $tracking)
            <div class="flex-1">
                <div>
                    <div class="flex justify-between items-center">
                    <div class="ml-2 text-sm text-gray-600">
                         Tracking Time:<span class="text-lg text-gray-800"> {{ $tracking->duration_Timespent }}</span><br>
                        Project :<span class="text-lg text-gray-800"> {{ $tracking->project->project }}</span><br>
                        @if (isset($tracking->person))
                        Person:<span class="text-lg text-gray-800"> {{ $tracking->person->fullname }}</span>
                        @endif
                    </div>
                    @if ($tracking->project->is(auth()->user()))
                    <x-dropdown>
                        <x-slot name="trigger">
                            <button>
                                <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                </svg>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('trackings.edit', $tracking)">
                                {{ __('Edit') }}
                            </x-dropdown-link>
                        </x-slot>
                    </x-dropdown>
                    @endif
                    </div>
                    @if (isset($tracking->project))
                    <div class="ml-2 text-sm text-gray-600">
                        Service:<span class="text-lg text-gray-800"> {{ $project->person }}</span><br>
                        <small class="ml-2 text-sm text-gray-600">Duration: {{ $tracking->project->duration_Timespent }}minutes.</small>
                    </div>
                    <p class="ml-2 my-4 text-gray-900">{{ $tracking->description }}</p>
                    <p class="ml-2 my-4 text-gray-900">{{ $tracking->duration_Timespent }}</p>
                    <p class="ml-2 my-4 text-gray-900">{{ $tracking->project }}</p>
                    <p class="ml-2 my-4 text-gray-900">{{ $tracking->person }}</p>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
