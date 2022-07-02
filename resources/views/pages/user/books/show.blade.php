<x-app-layout>

    <x-slot name="script">
        <script src="//cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
        <script>
            CKEDITOR.replace('editor');
        </script>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                @if ($errors->any())
                    <div class="mb-5" role="alert">
                        <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                            There's something wrong!
                        </div>
                        <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                            <p>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            </p>
                        </div>
                    </div>
                @endif
                <div class="shadow overflow-hidden sm:rounded-md mb-4 max-w-7xl">
                    <div class="px-4 py-5 bg-white sm:p-6 flex flex-row justify-start">
                        <img src="{{ $book->cover ? url('/storage\/' . $book->cover) : url('img/no-cover.png') }}"
                            class="w-[244px] h-[244px] mr-4" height="300" width="300">
                        <div class="flex-col">
                            <div class="mb-2">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-light ">
                                    Title
                                </label>
                                <p class="font-bold text-xl mr-4 block">{{ $book->title }} </p>
                            </div>
                            <div class="mb-2">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-light "
                                    for="grid-last-name">
                                    Rating
                                </label>
                                <div class="mr-4 felx-row flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5  " viewBox="0 0 20 20"
                                        fill="#f59e0b">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    {{ $book->rating }}
                                </div>
                            </div>
                            <div class="mb-2">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-light "
                                    for="grid-last-name">
                                    Category
                                </label>
                                <div class="mr-4 block font-light">
                                    {{ $book->category->name }}
                                </div>
                            </div>
                            <div class="mb-2">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-light "
                                    for="grid-last-name">
                                    Writer
                                </label>
                                <div class="mr-4 block font-light">
                                    {{ $book->user->name }}
                                </div>
                            </div>
                            <div class="mb-2">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-light "
                                    for="grid-last-name">
                                    Created
                                </label>
                                <div class="mr-4 block font-light">
                                    {{ date('d/m/Y', strtotime($book->created_at)) }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="grid-last-name">
                            Content
                        </label>
                        <div class="px-4 py-5 bg-white sm:p-6 flex flex-row justify-start">
                            {!! $book->content !!}
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3 text-right">
                        <button onclick="showRating()"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Rate Book
                        </button>
                        <button onclick="showComment()"
                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            Post Comment
                        </button>
                    </div>
                </div>
                <form class="hidden" id="rating" action="{{ route('user.books.rating.set', $book->id) }}"
                    method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="user_id" value="{{ $book->user->id }}">
                    <input type="hidden" name="book_id" value="{{ $book->id }}">
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-last-name">
                                Give a Rating
                            </label>
                            <input value="" name="value"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="grid-last-name" type="number">
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3 text-right">
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Submit
                            </button>
                        </div>
                    </div>
                </form>
                <form class="hidden" id="comment" action="{{ route('user.books.comment.store', $book->id) }}"
                    method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="user_id" value="{{ $book->user->id }}">
                    <input type="hidden" name="book_id" value="{{ $book->id }}">
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-last-name">
                                Comments
                            </label>
                            <textarea type="text"
                                class="appearance-none block w-full bg-white text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                name="message"></textarea>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3 text-right">
                            <button type="submit"
                                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                Post Comment
                            </button>
                        </div>
                    </div>
                </form>
                @foreach ($comments as $comment)
                    <div class="shadow overflow-hidden sm:rounded-md mb-4 max-w-7xl">
                        <div class="px-4 py-4 bg-white  flex flex-row justify-between">
                            <div class="flex-row flex w-full">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <div class="shrink-0 mr-3">
                                        <img class="h-12 w-12 rounded-full object-cover"
                                            src="{{ $comment->user->profile_photo_url }}"
                                            alt="{{ $comment->user->name }}" />
                                    </div>
                                @endif
                                <div class="flex flex-col w-full">
                                    <div class="flex flex-row justify-between w-full">
                                        <div class="font-bold text-sm text-gray-800">
                                            {{ $comment->user->name }}
                                        </div>
                                        <div class="font-light text-sm text-gray-800">
                                            {{ date('d/m/Y', strtotime($comment->created_at)) }}
                                        </div>
                                    </div>
                                    <div class="flex flex-row justify-between w-full">
                                        <div class="font-medium text-base text-gray-800">{{ $comment->message }}
                                        </div>
                                        <form action="{{ route('user.books.comment.report', $book->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="user_id" value="{{ $book->user->id }}">
                                            <input type="hidden" name="comment_id" value="{{ $comment->id }}">

                                            <button class="rounded-full border-2 border-red-300 p-1 mt-1"
                                                onclick="return confirm('Anda yakin report komentar?')">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-3 w-3 stroke-current text-red-600" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    function showRating() {
        $('#rating').toggleClass('hidden');
    }

    function showComment() {
        $('#comment').toggleClass('hidden');
    }
</script>
