<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dreams') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!--(route)dreams.store(metodo controller)-->
                    <form method="POST" action="{{route('dreams.store')}}">
                        @csrf
                        <textarea name="title"
                                  class="bg-transparent border-2 border-gray-300 text-gray-700 w-full h-22 p-4 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 mb-4"
                                  placeholder="{{ __('Title') }}"
                        >{{ old('title') }}</textarea>

                        <textarea name="description"
                                  class="bg-transparent border-2 border-gray-300 text-gray-700 w-full h-40 p-4 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 mb-4"
                                  placeholder="{{ __('Description') }}"
                        >{{old('description')}}</textarea>

                        <x-input-error :messages="$errors->get('title')"
                                       class="mt-4"/>
                        <x-input-error :messages="$errors->get('description')"
                                       class="mt-4"/>

                        <x-primary-button class="mt-2">
                            {{__('Dream')}}
                        </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
