<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Chirps') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{route('chirps.store')}}">
                        @csrf
                        <textarea name="message"
                                  class="bg-transparent border-2 border-gray-300 text-gray-700 w-full h-40 p-4 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 mb-4"
                                  placeholder="{{ __('What\'s on your mind?') }}"
                        >{{old('message')}}</textarea>
                        <x-input-error :messages="$errors->get('message')"
                                       class="mt-4"/>
                        <x-primary-button class="mt-2">
                            {{__('Chirp')}}
                        </x-primary-button>
                    </form>
                </div>
            </div>

            <div class="mt-6 bg-white dark:bg-gray-800 shadow-sm rounded-lg divide-y dark:divide-gray-900">
                <!--esto muestra cada dato-->
                @foreach($chirps as $chirp)
                    <div class="p-6 flex space-x-2">
                        <svg class="h-6 w-6 text-gray-600 dark:text-gray-400 -scale-x-100" fill="none"
                             stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                             xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z"></path>
                        </svg>
                        <div class="flex-1">
                            <div class="flex justify-between items-center">
                                <div>
                                    <span class="text-gray-800 dark:text-gray-200">
                                        <!--referencia 1 user-->
                                        {{$chirp->user->name}}

                                    </span>
                                    <small
                                        class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ $chirp->created_at->format('j M Y, g:i a') }}</small>
                                    @if($chirp->created_at !=$chirp->updated_at)
                                        <small
                                            class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{__('Edited')}}</small>
                                    @endif

                                </div>
                            </div>
                            <p class="mt-4 text-lg text-gray-900 dark:text-gray-100">{{ $chirp->message }}</p>
                        </div>
                        @can('update',$chirp)
                            <x-dropdown>
                                <x-slot name="trigger">
                                    <button>
                                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-300"
                                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             strokeWidth={1.5} stroke="currentColor" className="size-6">
                                            <path strokeLinecap="round" strokeLinejoin="round"
                                                  d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z"/>
                                        </svg>

                                    </button>
                                </x-slot>
                                <x-slot name="content">
                                    <x-dropdown-link :href="route('chirps.edit',$chirp)">
                                        {{__('Edit Chirp')}}
                                    </x-dropdown-link>

                                    <form method="POST" action="{{route('chirps.destroy',$chirp)}}">
                                        @csrf @method('DELETE')
                                        <x-dropdown-link :href="route('chirps.destroy',$chirp)" onclick="event.preventDefault(); this.closest('form').submit();">
                                            {{__('Delete Chirp')}}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        @endcan

                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>


