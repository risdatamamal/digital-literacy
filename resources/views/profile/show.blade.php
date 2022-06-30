<x-app-layout>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Profile') }}
                    </h2>
                </div>

                <div class="bg-opacity-25 grid">
                    <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
                        <div class="flex items-center">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <div class="shrink-0 mr-3">
                                    <img class="h-20 w-20 rounded-full object-cover"
                                        src="{{ Auth::user()->profile_photo_url }}"
                                        alt="{{ Auth::user()->name }}" />
                                </div>
                            @endif

                            <div>
                                <div class="font-medium text-xl text-gray-800">Name: {{ Auth::user()->name }}</div>
                                <div class="font-medium text-xl text-gray-800">Email: {{ Auth::user()->email }}</div>
                                <div class="font-medium text-xl text-gray-800">Total Points: {{ Auth::user()->point }}</div>
                            </div>
                            <div class="ml-4">
                                <x-jet-nav-link href="{{ route('profile.edit') }}">
                                    {{ __('Setting') }}
                                </x-jet-nav-link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
