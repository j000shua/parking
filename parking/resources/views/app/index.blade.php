<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Parking') }}
        </h2>
    </x-slot>

    @if(Auth::user()->is_valid)
        
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        
                        <form method="post" action="{{ route('app.store') }}" class="mt-6 space-y-6">
                            @csrf

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Demander une place') }}</x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @else
        <p>Veuillez attendre qu'un administrateur valide votre inscription.</p>
    @endif
</x-app-layout>

