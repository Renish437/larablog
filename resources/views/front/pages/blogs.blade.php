<x-front-layout title="Blogs">
   
      <!-- ===== Blog Archive Section Start ===== -->
      <section class="pt-34 pb-17.5">
        <div class="max-w-[1170px] mx-auto px-4 sm:px-8 xl:px-0">
          <div class="max-w-[770px] mx-auto w-full text-center mb-12.5">
            <h1 class="font-bold text-heading-6 sm:text-heading-4 lg:text-heading-3 text-dark mb-4">
             Latest Posts &amp; Blogs 
            </h1>
            <p>See all posts we have ever written.</p>
          </div>

          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-y-11 gap-x-7.5">
            <!-- blog item -->
            @forelse($posts as $post)
            <div class="group mb-3">
              <div class="mb-6 overflow-hidden rounded-[10px] transition-all group-hover:scale-105">
                <img src="{{ $post->image }}" alt="image" class="w-full">
              </div>

              <h4>
                <a href="{{route('blog',$post->slug)}}" class="block text-dark font-bold text-xl mb-3.5">
                  <span class="bg-linear-to-r from-primary/50 to-primary/40 bg-[length:0px_10px] bg-left-bottom bg-no-repeat transition-[background-size] duration-500 hover:bg-[length:100%_3px] group-hover:bg-[length:100%_10px]">
                    {{ $post->title }}
                  </span>
                </a>
              </h4>
              <p>
                {!! Str::limit($post->content, 50) !!}
              </p>

              <div class="flex flex-wrap gap-3 items-center justify-between mt-4.5">
                <div class="flex items-center gap-2.5">
                  <div class="flex items-center gap-3">
                    <div class="flex w-6 h-6 rounded-full overflow-hidden">
                      <img src="{{ asset('front/images/user-01.png') }}" alt="user">
                    </div>
                    <p class="text-sm">By {{ $post->user->name }}</p>
                  </div>

                  <span class="flex w-[3px] h-[3px] rounded-full bg-dark-2"></span>

                  <p class="text-sm">{{ $post->created_at->diffForHumans() }}</p>
                </div>
                <span class="inline-flex text-blue bg-blue/[0.08] font-medium text-sm py-1 px-3 rounded-full">{{ $post->category->name }}</span>
              </div>
            </div>
            @empty
            <p>No posts found.</p>
            @endforelse

          

      

          

         
           

           
          </div>

          <div class="flex justify-center">
            <div class="inline-flex items-center justify-center rounded-md border-[0.8px] border-gray-3 shadow-1 mt-17.5">
              <button class="rounded-l-md text-[#5A6A85] py-1 lsm:py-2.5 px-3 lsm:px-4.5 not-last:border-r-[0.8px] border-gray-3 ease-in duration-300 hover:text-dark hover:bg-gray">
                Previous
              </button>
              <button class="text-[#5A6A85] py-1 lsm:py-2.5 px-3 lsm:px-4.5 not-last:border-r-[0.8px] border-gray-3 ease-in duration-300 hover:text-dark hover:bg-gray">
                1
              </button>
              <button class="text-[#5A6A85] py-1 lsm:py-2.5 px-3 lsm:px-4.5 not-last:border-r-[0.8px] border-gray-3 ease-in duration-300 hover:text-dark hover:bg-gray">
                2
              </button>
              <button class="text-[#5A6A85] py-1 lsm:py-2.5 px-3 lsm:px-4.5 not-last:border-r-[0.8px] border-gray-3 ease-in duration-300 hover:text-dark hover:bg-gray">
                3
              </button>
              <button class="text-[#5A6A85] py-1 lsm:py-2.5 px-3 lsm:px-4.5 not-last:border-r-[0.8px] border-gray-3 ease-in duration-300 hover:text-dark hover:bg-gray">
                4
              </button>
              <button class="rounded-r-md text-[#5A6A85] py-1 lsm:py-2.5 px-3 lsm:px-4.5 not-last:border-r-[0.8px] border-gray-3 ease-in duration-300 hover:text-dark hover:bg-gray">
                Next
              </button>
            </div>
          </div>
        </div>
      </section>
      <!-- ===== Blog Archive Section End ===== -->
 
</x-front-layout>