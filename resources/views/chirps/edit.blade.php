<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Chirps') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{Route('chirps.update',$chirp)}}">
                        @csrf @method('PUT')
                        <textarea name="message"
                                  class="bg-transparent border-2 border-gray-300 text-gray-700 w-full h-40 p-4 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 mb-4"
                                  placeholder="{{ __('What\'s on your mind?') }}"
                        >{{old('message',$chirp->message)}}</textarea>
                        <x-input-error :messages="$errors->get('message')"
                                       class="mt-4"/>
                        <x-primary-button class="mt-2">
                            {{__('Chirp')}}
                        </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
