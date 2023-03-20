<x-app-layout>
    <x-slot name='header'>
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{__('ajouter/modifier/supprimer des places')}}
        </h2>
    </x-slot>
    <br>
    <!-- This is an example component -->
    <div class="max-w-2xl mx-auto">
        <div class="p-4 max-w-md bg-white rounded-lg border shadow-md sm:p-8 dark:bg-gray-800 dark:border-gray-700">
            <div class="flex justify-between items-center mb-4">
                <a href="{{route('places.create')}}" class="text-sm font-medium text-blue-600 hover:underline dark:text-white">
                    {{__('New place')}}
                </a>
            </div>
            <div class="flow-root">
                <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach($places as $place)
                    <li class="py-3 sm:py-4">
                        <div class="flex items-center space-x-4">
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                    {{$place->number}}
                                </p>
                            </div>
                            <a href="{{route('places.edit', $place)}}">
                                <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">{{__('edit')}}</div>
                            </a>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>