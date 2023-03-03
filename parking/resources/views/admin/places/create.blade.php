<x-app-layout>

<div class='py-12 max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6'>
    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg max-w-xl">
        <div class="">            
            <form method="post" action="{{ route('places.store') }}" class="mt-6 space-y-6">
                    @csrf

                    <div>
                        <x-input-label for="number" :value="__('Number')" />
                        <x-text-input id="number" name="number" type="text" class="mt-1 block w-full"/>
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>


                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Create') }}</x-primary-button>
                    </div>
            </form>
        </div>
    </div>
</div>

</x-app-layout>