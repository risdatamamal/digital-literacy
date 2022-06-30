<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List Quotes') }}
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
            <div class="mb-10">
                <a href="{{ route('user.quotes.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow-lg">
                    + Create Quote
                </a>
            </div>
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <table width="100%" id="crudTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Rating</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($quotes as $quote)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $quote->title }}</td>
                                    <td>{{ $quote->rating }}</td>
                                    <td>
                                        <div class="d-flex justify-content-evenly">
                                            <a class="inline-block border border-gray-500 bg-gray-500 text-white rounded-md px-2 py-1 m-2 transition duration-500 ease select-none hover:bg-gray-600 focus:outline-none focus:shadow-outline" 
                                                href="{{ route('user.quotes.edit', $quote->id) }}">
                                                Edit
                                            </a>
                                            <form class="inline-block" action="{{ route('user.quotes.destroy', $quote->id) }}" method="POST">
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
