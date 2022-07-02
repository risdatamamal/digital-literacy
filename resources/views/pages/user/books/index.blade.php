<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Library') }}
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
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <table id="crudTable">
                        <tbody>
                            @foreach ($books as $book)
                                <tr>
                                    <td><img src="{{ Storage::url($book->cover) }}" alt="{{ $book->cover }}"
                                            style="max-height: 180px;" /></td>
                                    <td>
                                    <td>{{ $book->title }}</td>
                                    <td>{{ $book->category->name }}</td>
                                    <td>
                                        <div class="d-flex justify-content-evenly">
                                            <a class="inline-block border border-gray-500 bg-gray-500 text-white rounded-md px-2 py-1 m-2 transition duration-500 ease select-none hover:bg-gray-600 focus:outline-none focus:shadow-outline" 
                                                href="{{ route('user.books.edit', $book->id) }}">
                                                Edit
                                            </a>
                                            <form class="inline-block" action="{{ route('user.books.destroy', $book->id) }}" method="POST">
                                                <button class="border border-red-500 bg-red-500 text-white rounded-md px-2 py-1 m-2 transition duration-500 ease select-none hover:bg-red-600 focus:outline-none focus:shadow-outline" 
                                                        onclick="return confirm('Anda yakin ingin menghapus data?')">
                                                    Hapus
                                                </button>
                                                {!! method_field('delete') . csrf_field() !!}
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
