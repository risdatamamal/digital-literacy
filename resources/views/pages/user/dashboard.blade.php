<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div>
                        <x-jet-application-logo class="block h-12 w-auto" />
                    </div>
                </div>

                <div class="bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
                    <div class="p-6">
                        <div class="mt-8 text-xl text-center font-bold">
                            BOOKS
                        </div>
                        
                        <div class="mt-6 text-lg text-gray-500 text-center">
                            {{ $books->count() }}
                        </div>
                    </div>

                    <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
                        <div class="mt-8 text-xl text-center font-bold">
                            ARTICLES
                        </div>
                        
                        <div class="mt-6 text-lg text-gray-500 text-center">
                            {{ $articles->count() }}
                        </div>
                    </div>

                    <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
                        <div class="mt-8 text-xl text-center font-bold">
                            QUOTES
                        </div>
                        
                        <div class="mt-6 text-lg text-gray-500 text-center">
                            {{ $quotes->count() }}
                        </div>
                    </div>

                    <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
                        <div class="mt-8 text-xl text-center font-bold">
                            POINT
                        </div>
                        
                        <div class="mt-6 text-lg text-gray-500 text-center">
                            {{ Auth::user()->point }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
