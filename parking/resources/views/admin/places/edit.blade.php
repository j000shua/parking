
<x-app-layout>

    <div class='py-12 max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6'>
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg max-w-xl">
            <form method="post" action="{{ route('places.update', $place) }}" class="mt-6 space-y-6">
                    @csrf
                    @method('put')

                    <div>
                        <x-input-label for="number" :value="__('Number')" />
                        <x-text-input id="number" name="number" type="text" class="mt-1 block w-full" :value="old('number', $place->number)" required autofocus autocomplete="number" />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>


                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Save') }}</x-primary-button>

                        @if (session('status') === 'place-updated')
                            <p
                                x-data="{ show: true }"
                                x-show="show"
                                x-transition
                                x-init="setTimeout(() => show = false, 2000)"
                                class="text-sm text-gray-600 dark:text-gray-400"
                            >{{ __('Saved.') }}</p>
                        @endif
                    </div>
            </form>

            <br>

            <form action="{{route('places.destroy', $place)}}" method='post'>
                @csrf
                @method('delete')
                <button class="text-sm font-medium text-red-600 hover:underline dark:text-red-500">
                    Supprimer
                </button>
            </form>

        </div>
    </div>    
</x-app-layout>
