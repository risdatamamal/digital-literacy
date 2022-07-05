<x-guest-layout>
    @section('content')
    <div class="container mx-auto mb-4">
        <div class="flex justify-center text-center mb-4">
            <h3 class="text-2xl capitalize font-semibold">
                Quotes Collection
            </h3>
        </div>
    </div>
    <div class="py-12 mx-3">
        <div class="flex flex-col mx-3">
            @foreach ($quotes as $quote)
            <div class="shadow-md mb-4 mx-3">
                <a href="{{ route('user.quotes.show', $quote->id) }}">
                    <div class="px-4 py-5 bg-white flex flex-row justify-between">
                        <div class="flex-col">
                            <p class="font-bold text-xl mr-4 block">{{ $quote->title }}</p>
                            <div class="flex flex-col font-light text-gray-600">
                                <div class="mr-4 block">
                                    {{ $quote->rating ?? '-'}}
                                </div>
                                <div class="mr-4 font-thin text-gray-400 text-sm">
                                    {{ date("d/m/Y", strtotime($quote->created_at)) }}
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            @endforeach
        </div>
    </div>
    @endsection

</x-guest-layout>
