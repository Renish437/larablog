<x-front-layout title="Serached">
 
      <!-- ===== Search Section Start ===== -->
      <section class="pb-17.5">
        <div class="bg-gray pt-34 pb-12.5 mb-12.5">
          <div class="max-w-[580px] mx-auto px-4 sm:px-8 xl:px-0 w-full text-center">
            <h1 class="font-bold text-heading-6 sm:text-heading-4 lg:text-heading-3 text-dark mb-3.5">
              Search results for "tech"
            </h1>
            <p>4 Posts Found</p>

            <div class="mt-7.5">
              <form>
                <div class="relative">
                  <button class="absolute top-0 left-0 flex items-center justify-center py-5 pr-3 pl-7">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M19.1875 17.4063L14.0313 13.2188C16.1563 10.3125 15.9375 6.15625 13.2813 3.53125C11.875 2.125 10 1.34375 8 1.34375C6 1.34375 4.125 2.125 2.71875 3.53125C-0.1875 6.4375 -0.1875 11.1875 2.71875 14.0938C4.125 15.5 6 16.2813 8 16.2813C9.90625 16.2813 11.6875 15.5625 13.0938 14.2813L18.3125 18.5C18.4375 18.5938 18.5938 18.6563 18.75 18.6563C18.9688 18.6563 19.1563 18.5625 19.2813 18.4063C19.5313 18.0938 19.5 17.6563 19.1875 17.4063ZM8 14.875C6.375 14.875 4.875 14.25 3.71875 13.0938C1.34375 10.7188 1.34375 6.875 3.71875 4.53125C4.875 3.375 6.375 2.75 8 2.75C9.625 2.75 11.125 3.375 12.2813 4.53125C14.6563 6.90625 14.6563 10.75 12.2813 13.0938C11.1563 14.25 9.625 14.875 8 14.875Z" fill="#15171A"></path>
                    </svg>
                  </button>
                  <input type="search" name="search" id="search" placeholder="Search posts, tags and authors" class="w-full rounded-lg border border-gray-3 bg-white pl-15 pr-3 py-4.5 outline-hidden ease-in duration-200 placeholder:text-dark-3 focus:shadow-input focus:ring-2 focus:ring-dark-4/20 focus:border-transparent">
                </div>
              </form>
            </div>
          </div>
        </div>

        <div class="max-w-[1170px] mx-auto px-4 sm:px-8 xl:px-0">
          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-y-11 gap-x-7.5">
            <!-- blog item -->
            @forelse($posts as $post)
            <!-- blog item -->
            <div class="group">
              <div class="mb-6 overflow-hidden rounded-[10px] transition-all group-hover:scale-105">
                <a href="{{route('blog', $post->slug)}}">
                  <img src="{{ $post->thumbnail_url }}" alt="image" class="w-full">
                </a>
              </div>

              <h4>
                <a href="{{route('blog')}}" class="block text-dark font-bold text-xl mb-3.5">
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
                  <a href="{{route('author',$post->user->id)}}" class="flex items-center gap-3">
                    <div class="flex w-6 h-6 overflow-hidden rounded-full">
                      <img src="{{ asset('front/images/user-01.png') }}" alt="user">
                    </div>
                    <p class="text-sm">{{ $post->user->name }}</p>
                  </a>

                  <span class="flex w-[3px] h-[3px] rounded-full bg-dark-2"></span>

                  <p class="text-sm">{{ $post->created_at->diffForHumans() }}</p>
                </div>
                <a href="#" class="inline-flex text-blue bg-blue/[0.08] font-medium text-sm py-1 px-3 rounded-full">{{ $post->category->name }}</a>
              </div>
            </div>
            @empty
            <p class="text-center text-lg">No post found</p>
            @endforelse
          </div>
        </div>
      </section>
     
</x-front-layout>