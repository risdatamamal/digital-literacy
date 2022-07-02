<x-guest-layout>
    @section('content')
        <section class="flex items-center hero">
            <div
                class="w-full absolute z-20 inset-0 md:relative md:w-1/2 text-center flex flex-col justify-center hero-caption">
                <h1 class="text-3xl md:text-5xl leading-tight font-semibold">
                    Digital <br class="" />Literacy
                </h1>
                <h2 class="px-8 text-base md:px-0 md:text-lg my-6 tracking-wide">
                    Kami menyediakan berbagai buku yang
                    <br class="hidden lg:block" />membuat kalian nyaman untuk dibaca
                </h2>
                <div>
                    <a href="#browse-the-book"
                        class="bg-pink-400 text-black hover:bg-black hover:text-pink-400 rounded-full px-8 py-3 mt-4 inline-block flex-none transition duration-200">Explore
                        Now</a>
                </div>
            </div>
            <div class="w-full inset-0 md:relative md:w-1/2">
                <div class="relative hero-image">
                    <div class="overlay inset-0 bg-black opacity-35 z-10"></div>
                    <div class="overlay right-0 bottom-0 md:inset-0">
                        <button class="video hero-cta focus:outline-none z-30 modal-trigger"
                            data-content='<div class="w-screen pb-56 md:w-88 md:pb-56 relative z-50">
              <div class="absolute w-full h-full">
                <iframe
                  width="100%"
                  height="100%"
                  src="https://www.youtube.com/embed/3h0_v1cdUIA"
                  frameborder="0"
                  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                  allowfullscreen
                ></iframe>
              </div>
            </div>'></button>
                    </div>
                    <img src="/frontend/images/content/image-section-1.png" alt="hero 1"
                        class="absolute inset-0 md:relative w-full h-full object-cover object-center" />
                </div>
            </div>
        </section>
        <section class="flex bg-gray-100 py-16 px-4" id="browse-the-book">
            <div class="container mx-auto">
                <div class="flex flex-start mb-4">
                    <h3 class="text-2xl capitalize font-semibold">
                        Find your book <br class="" />Categories
                    </h3>
                </div>
                <div class="grid grid-rows-2 grid-cols-9 gap-4">
                    <div class="relative col-span-9 row-span-1 md:col-span-4 card" style="height: 180px">
                        <div class="card-shadow rounded-xl">
                            <img src="/frontend/images/content/image-catalog-1.jpg" alt=""
                                class="w-full h-full object-cover object-center overlay overflow-hidden rounded-xl" />
                        </div>
                        <div class="overlay left-0 top-0 bottom-0 flex justify-center flex-col pl-48 md:pl-72">
                            <h5 class="text-lg font-semibold">Romance</h5>
                            <span class="">18.309 items</span>
                        </div>
                        <a href="details.html" class="stretched-link">
                            <!-- fake children -->
                        </a>
                    </div>
                    <div class="relative col-span-9 row-span-1 md:col-span-2 md:row-span-2 card">
                        <div class="card-shadow rounded-xl">
                            <img src="/frontend/images/content/image-catalog-3.jpg" alt=""
                                class="w-full h-full object-cover object-center overlay overflow-hidden rounded-xl" />
                        </div>
                        <div
                            class="overlay right-0 left-0 top-0 bottom-0 md:bottom-auto flex justify-center md:items-center flex-col pl-48 md:pl-0 pt-0 md:pt-12">
                            <h5 class="text-lg font-semibold">Horor</h5>
                            <span class="">77.392 items</span>
                        </div>
                        <a href="details.html" class="stretched-link">
                            <!-- fake children -->
                        </a>
                    </div>
                    <div class="relative col-span-9 row-span-1 md:col-span-3 md:row-span-2 card">
                        <div class="card-shadow rounded-xl">
                            <img src="/frontend/images/content/image-catalog-4.png" alt=""
                                class="w-full h-full object-cover object-center overlay overflow-hidden rounded-xl" />
                        </div>
                        <div
                            class="overlay right-0 left-0 top-0 bottom-0 md:bottom-auto flex justify-center md:items-center flex-col pl-48 md:pl-0 pt-0 md:pt-12">
                            <h5 class="text-lg font-semibold">Life Motivation</h5>
                            <span class="">22.094 items</span>
                        </div>
                        <a href="details.html" class="stretched-link">
                            <!-- fake children -->
                        </a>
                    </div>
                    <div class="relative col-span-9 row-span-1 md:col-span-4 card">
                        <div class="card-shadow rounded-xl">
                            <img src="/frontend/images/content/image-catalog-2.png" alt=""
                                class="w-full h-full object-cover object-center overlay overflow-hidden rounded-xl" />
                        </div>
                        <div class="overlay left-0 top-0 bottom-0 flex justify-center flex-col pl-48 md:pl-72">
                            <h5 class="text-lg font-semibold">Kids</h5>
                            <span class="">837 items</span>
                        </div>
                        <a href="details.html" class="stretched-link">
                            <!-- fake children -->
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!-- END: BROWSE THE ROOM -->
    @endsection
</x-guest-layout>
