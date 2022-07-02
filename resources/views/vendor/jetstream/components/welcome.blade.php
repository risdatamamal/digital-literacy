@extends('layouts.guest')
<!-- <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div>
        <x-jet-application-logo class="block h-12 w-auto" />
    </div>
</div> -->
@section('content')
    <!-- START: BROWSE THE ROOM -->
    <section class="flex bg-gray-100 py-16 px-4" id="browse-the-room">
      <div class="container mx-auto">
        <div class="flex flex-start mb-4">
          <h3 class="text-2xl capitalize font-semibold">
            Find your book <br class="" />Categories
          </h3>
        </div>
        <div class="grid grid-rows-2 grid-cols-9 gap-4">
          <div
            class="relative col-span-9 row-span-1 md:col-span-4 card"
            style="height: 180px"
          >
            <div class="card-shadow rounded-xl">
              <img
                src="/frontend/images/content/image-catalog-1.jpg"
                alt=""
                class="w-full h-full object-cover object-center overlay overflow-hidden rounded-xl"
              />
            </div>
            <div
              class="overlay left-0 top-0 bottom-0 flex justify-center flex-col pl-48 md:pl-72"
            >
              <h5 class="text-lg font-semibold">Romance</h5>
              <span class="">18.309 items</span>
            </div>
            <a href="details.html" class="stretched-link">
              <!-- fake children -->
            </a>
          </div>
          <div
            class="relative col-span-9 row-span-1 md:col-span-2 md:row-span-2 card"
          >
            <div class="card-shadow rounded-xl">
              <img
                src="/frontend/images/content/image-catalog-3.jpg"
                alt=""
                class="w-full h-full object-cover object-center overlay overflow-hidden rounded-xl"
              />
            </div>
            <div
              class="overlay right-0 left-0 top-0 bottom-0 md:bottom-auto flex justify-center md:items-center flex-col pl-48 md:pl-0 pt-0 md:pt-12"
            >
              <h5 class="text-lg font-semibold">Horor</h5>
              <span class="">77.392 items</span>
            </div>
            <a href="details.html" class="stretched-link">
              <!-- fake children -->
            </a>
          </div>
          <div
            class="relative col-span-9 row-span-1 md:col-span-3 md:row-span-2 card"
          >
            <div class="card-shadow rounded-xl">
              <img
                src="/frontend/images/content/image-catalog-4.png"
                alt=""
                class="w-full h-full object-cover object-center overlay overflow-hidden rounded-xl"
              />
            </div>
            <div
              class="overlay right-0 left-0 top-0 bottom-0 md:bottom-auto flex justify-center md:items-center flex-col pl-48 md:pl-0 pt-0 md:pt-12"
            >
              <h5 class="text-lg font-semibold">Life Motivation</h5>
              <span class="">22.094 items</span>
            </div>
            <a href="details.html" class="stretched-link">
              <!-- fake children -->
            </a>
          </div>
          <div class="relative col-span-9 row-span-1 md:col-span-4 card">
            <div class="card-shadow rounded-xl">
              <img
                src="/frontend/images/content/image-catalog-2.png"
                alt=""
                class="w-full h-full object-cover object-center overlay overflow-hidden rounded-xl"
              />
            </div>
            <div
              class="overlay left-0 top-0 bottom-0 flex justify-center flex-col pl-48 md:pl-72"
            >
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
<!-- <div class="bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
    <div class="p-6">
        <div class="mt-8 text-xl text-center font-bold">
            xxx
        </div>
        
        <div class="mt-6 text-lg text-gray-500 text-center">
            xxx
        </div>
    </div>

    <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
        <div class="mt-8 text-xl text-center font-bold">
            xxx
        </div>
        
        <div class="mt-6 text-lg text-gray-500 text-center">
            xxx
        </div>
    </div>
</div> -->
