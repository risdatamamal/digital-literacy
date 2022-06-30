<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List Books') }}
        </h2>
    </x-slot>

    <x-slot name="script">
        <script>
            // AJAX DataTable
            var datatable = $('#crudTable').DataTable({
                "scrollX": true
            });
        </script>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-10 flex flex-row justify-between">
                <a href="{{ route('user.books.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow-lg">
                    + Write a Book
                </a>
                <form class=" items-center flex flex-row justify-between" action="{{ route('user.writing.books') }}" method="GET">
                    <label class="mr-2  uppercase tracking-wide text-gray-700 text-xs font-bold" for="grid-last-name">
                        Search:
                    </label>
                    <input value="{{ $key}}" name="key" class="appearance-none block w-full bg-white text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Title">
                </form>
            </div>
            
            <div class="grid md:grid-cols-4 grid-cols-2 gap-4">
                @foreach ($books as $book)

                    <div class="shadow overflow-hidden sm:rounded-md mb-4 max-w-7xl">
                        <a href="{{ route('user.books.show', $book->id) }}">
                            <div class="px-4 py-5 bg-white sm:p-6 flex flex-row justify-between">
                                <div class="flex-col">
                                    <img src="{{ $book->cover ??  'https://perpustakaan.bsn.go.id/images/no-cover.png'}}" class="w-[244px] h-[244px]" height="300" width="300">
                                    <p class="font-bold text-xl mr-4 block">{{ $book->title }}</p>
                                    <div class="flex flex-row">
                                        <div class="mr-4 block felx-row flex">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5  " viewBox="0 0 20 20" fill="#f59e0b">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                            {{ $book->rating }}
                                        </div>
                                        <div class="mr-4 block font-light">
                                            {{ $book->category->name }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
