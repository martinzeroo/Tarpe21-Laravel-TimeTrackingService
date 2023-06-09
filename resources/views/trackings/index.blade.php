<x-app-layout>
    @foreach ( $errors as $error)
        <x-input-error :messages="$error"/>
    @endforeach
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
            </label>
            <label>{{ __('description')}}
                <textarea
                name="description"
                placeholder="{{ __('Add a  description') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('description') }}</textarea>
            </label>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
            <x-input-error :messages="$errors->get('duration_Timespent')" class="mt-2" />
                <label>{{ __('project')}}
                    <select name="project_id" required>
                        <option value="0" disabled selected>{{ __('Select project') }}</option>
                        @foreach ($projects as $project)
                            <option value="{{$project->id}}" @selected(old('project_id')==$project->id) >{{ $project->project }}</option>
                        @endforeach
                    </select>
                </label>
                <x-input-error :messages="$errors->get('project_id')" class="mt-2" />

                    <label>{{ __('person')}}
                <select name="person_id" required>
                    <option value="0" disabled selected>{{ __('Select person') }}</option>
                    @foreach ($people as $person)
                        <option value="{{$person->id}}" >{{ $person->fullname }}</option>
                    @endforeach
                </select>
            </label>
            <x-input-error :messages="$errors->get('person_id')" class="mt-2" />

            <x-primary-button class="mt-4">{{ __('Add Tracking') }}</x-primary-button>



        </form>
        <div class="mt-6 shadow-sm rounded-lg divide-y bg-gray-200">
            @foreach ($trackings as $tracking)
            <div class="flex-1 bg-white mt-2">
                <div>
                    <div class="flex justify-between items-center">
                    <div class="ml-2 text-sm text-gray-600">
                        Username:<span class="text-lg text-gray-800"> {{ $tracking->project->person }}</span><br>
                        Project :<span class="text-lg text-gray-800"> {{ $tracking->project->project }}</span><br>
                        Identification :<span class="text-lg text-gray-800"> {{ $tracking->person->identification }}</span><br>
                        Description :<span class="text-lg text-gray-800"> {{ $tracking->description }}</span><br>
                        @if (isset($tracking->person))
                        @endif
                        @unless ($tracking->created_at->eq($tracking->updated_at))
                            <small class="text-sm text-gray-600"> &middot; {{ __('edited') }}</small>
                        @endunless
                    </div>
                    @if ($tracking->person)
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
                        Full name:<span class="text-lg text-gray-800"> {{ $tracking->person->fullname }}</span><br>
                        <small class="ml-2 text-sm text-gray-600">Tracking Time: {{ $tracking->duration_TimeSpent }} Hours.</small>
                    </div>
                    {{-- <p class="ml-2 my-4 text-gray-900">{{ $tracking->description }}</p> --}}
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
