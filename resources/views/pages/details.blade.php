<x-guest-layout>
    @section('content')
        <section class="bg-gray-100 py-8 px-4">
            <div class="container mx-auto">
                <ul class="breadcrumb">
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li>
                        <a href="#">{{ $book->title }}</a>
                    </li>
                    <li>
                        <a href="#" aria-label="current-page">Details</a>
                    </li>
                </ul>
            </div>
        </section>
        <!-- END: BREADCRUMB -->

        <!-- START: DETAILS -->
        <section class="container mx-auto">
            <div class="flex flex-wrap my-4 md:my-12">
                <div class="flex-1">
                    <div class="slider">
                        <div class="preview">
                            <div class="item rounded-lg h-full overflow-hidden">
                                <img src="{{ $book->cover ? Storage::url($book->cover) : url('img/no-cover.png') }}"
                                    alt="front" class="object-cover w-100 h-100 rounded-lg" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex-1 px-4 md:p-6">
                    <h2 class="text-5xl font-semibold">{{ $book->title }}</h2>

                    <hr class="my-4" />
                    <p class="text-xl">{{ $book->category->name }}</p>

                    <hr class="my-3" />
                    <form action="{{ route('add-book', $book->id) }}">
                        <button
                            class="transition-all duration-200 bg-pink-400 text-black focus:bg-black focus:text-pink-400 rounded-full px-8 py-3 mt-4 inline-flex">
                            Add to Library
                        </button>
                    </form>

                    <h6 class="text-xl font-semibold mb-4">Point: {{ $book->point }}</h6>
                    {{-- <div class="text-xl leading-7 mb-6">
                    {!! $product->description !!}
                </div> --}}
                </div>
            </div>
        </section>
        <!-- END: DETAILS -->

        {{-- <!-- START: COMPLETE YOUR ROOM -->
    <section class="bg-gray-100 px-4 py-16">
        <div class="container mx-auto">
            <div class="flex flex-start mb-4">
                <h3 class="text-2xl capitalize font-semibold">
                    Complete your room <br class="" />with what we designed
                </h3>
            </div>
            <div class="flex overflow-x-auto mb-4 -mx-3">
                @foreach ($recommendations as $recommendation)
                    <div class="px-3 flex-none" style="width: 320px">
                        <div class="rounded-xl p-4 pb-8 relative bg-white">
                            <div class="rounded-xl overflow-hidden card-shadow w-full h-36">
                                <img src="{{ $recommendation->galleries()->exists() ? Storage::url($recommendation->galleries->first()->url) : 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mN88B8AAsUB4ZtvXtIAAAAASUVORK5CYII=' }}"
                                    alt="" class="w-full h-full object-cover object-center" />
                            </div>
                            <h5 class="text-lg font-semibold mt-4">{{ $recommendation->name }}</h5>
                            <span class="">IDR {{ number_format($recommendation->price) }}</span>
                            <a href="{{ route('details', $recommendation->slug) }}" class="stretched-link">
                                <!-- fake children -->
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- END: COMPLETE YOUR ROOM --> --}}
    @endsection
</x-guest-layout>
