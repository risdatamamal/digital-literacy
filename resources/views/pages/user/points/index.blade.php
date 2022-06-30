<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List Points') }}
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
            <div class="mb-10 font-bold">
                    Total Points : {{ $total_points }}
            </div>
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <table width="100%" id="crudTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Amount</th>
                                <th>Resource Type</th>
                                <th>Source</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($points as $point)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $point->amount }}</td>
                                    <td>{{ $point->resource_type }}</td>
                                    @if ($point->resource_type == "BOOK")
                                        <td>{{ $point->book->title }}</td>    
                                    @elseif($point->resource_type == "ARTICLE")
                                        <td>{{ $point->article->title }}</td>    
                                    @else
                                        <td>{{ $point->quote->title }}</td>        
                                    @endif
                                    <td>{{ $point->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
