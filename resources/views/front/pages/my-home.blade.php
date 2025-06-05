<x-front-layout title="My Home">
  

   
      

     

        <div>
            <!-- ===== Hero Section Start ===== -->
            <section>
                <div class="mx-auto max-w-[1170px] px-4 sm:px-8 xl:px-0 pb-12.5 pt-34">
                    <div class="rounded-[20px] relative overflow-hidden z-10">
                        <!-- Hero BG Shapes Start -->
                        <div>
                            <div class="absolute bottom-0 left-0 rounded-[20px] w-full h-full bg-gray"></div>
                            <div class="absolute bottom-0 left-0 rounded-[20px] w-full h-full">
                                <img class="absolute bottom-0" src="front/images/hero-bg-02.svg" alt="hero" />
                            </div>
                        </div>
                        <!-- Hero BG Shapes End -->

                        <!-- Hero Content Start -->
                        <div class="max-w-[880px] mx-auto px-4 sm:px-8 lg:px-0 py-7.5 sm:py-10 lg:py-15 relative z-1">
                            <div class="flex flex-col sm:flex-row items-center gap-7.5 lg:gap-15">
                                <div
                                    class="max-w-[277px] w-full h-[277px] rounded-full flex items-center justify-center border border-gray-3">
                                    <div
                                        class="max-w-[165px] w-full h-[165px] shadow-img rounded-full overflow-hidden">
                                        <img src="{{ auth()->user()->picture }}" alt="user" />
                                    </div>
                                </div>

                                <div class="max-w-[593px] w-full">
                                    <h1
                                        class="text-2xl sm:text-4xl lg:text-heading-3 xl:text-heading-2 text-dark mb-3.5">
                                        Hey! I’m <span class="font-bold"> {{ auth()->user()->name }} Renish</span>
                                    </h1>
                                    <p>
                                      {{ auth()->user()->bio }}
                                    </p>

                                    <!-- Social Links start -->
                                    <div class="flex items-center gap-5 mt-7">
                                        <a href="{{ auth()->user()->twitter }}" target="_blank"
                                            class="flex lg:transition-all lg:ease-linear lg:duration-300 hover:text-dark">
                                            <svg class="fill-current" width="20" height="20"
                                                viewBox="0 0 20 20" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M11 9.53985V6.75185C11 5.67256 11.8954 4.79763 13 4.79763H15V1.86631L12.285 1.67682C9.9695 1.51522 8 3.30709 8 5.57532V9.53985H5V12.4712H8V18.3334H11V12.4712H14L15 9.53985H11Z"
                                                    fill="" />
                                            </svg>
                                        </a>
                                        <a href="{{ auth()->user()->facebook }}" target="_blank"
                                            class="flex lg:transition-all lg:ease-linear lg:duration-300 hover:text-dark">
                                            <svg class="fill-current" width="20" height="20"
                                                viewBox="0 0 20 20" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M17.5312 4.78125L18.7188 3.28125C19.0625 2.875 19.1563 2.5625 19.1875 2.40625C18.25 2.96875 17.375 3.15625 16.8125 3.15625H16.5937L16.4688 3.03125C15.7188 2.375 14.7812 2.03125 13.7812 2.03125C11.5937 2.03125 9.875 3.84375 9.875 5.9375C9.875 6.0625 9.875 6.25 9.90625 6.375L10 7L9.34375 6.96875C5.34375 6.84375 2.0625 3.40625 1.53125 2.8125C0.65625 4.375 1.15625 5.875 1.6875 6.8125L2.75 8.5625L1.0625 7.625C1.09375 8.9375 1.59375 9.96875 2.5625 10.7187L3.40625 11.3437L2.5625 11.6875C3.09375 13.2813 4.28125 13.9375 5.15625 14.1875L6.3125 14.5L5.21875 15.25C3.46875 16.5 1.28125 16.4063 0.3125 16.3125C2.28125 17.6875 4.625 18 6.25 18C7.46875 18 8.375 17.875 8.59375 17.7813C17.3438 15.7188 17.75 7.90625 17.75 6.34375V6.125L17.9375 6C19 5 19.4375 4.46875 19.6875 4.15625C19.5937 4.1875 19.4688 4.25 19.3438 4.28125L17.5312 4.78125Z"
                                                    fill="" />
                                            </svg>
                                        </a>
                                        <a href="{{ auth()->user()->linkedin }}" target="_blank"
                                            class="flex lg:transition-all lg:ease-linear lg:duration-300 hover:text-dark">
                                            <svg class="fill-current" width="20" height="20"
                                                viewBox="0 0 20 20" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M5.78357 4.16663C5.78326 4.84522 5.37157 5.45587 4.74262 5.71063C4.11367 5.9654 3.39306 5.8134 2.92059 5.32631C2.44811 4.83922 2.31813 4.11431 2.59192 3.49341C2.86572 2.87251 3.48862 2.4796 4.1669 2.49996C5.06779 2.527 5.78398 3.26533 5.78357 4.16663ZM5.83357 7.06663H2.50024V17.4999H5.83357V7.06663ZM11.1003 7.06663H7.78357V17.4999H11.0669V12.0249C11.0669 8.97494 15.0419 8.6916 15.0419 12.0249V17.4999H18.3336V10.8916C18.3336 5.74996 12.4503 5.94163 11.0669 8.4666L11.1003 7.06663Z"
                                                    fill="" />
                                            </svg>
                                        </a>
                                     
                                        <a href="{{ auth()->user()->instagram }}" target="_blank"
                                            class="flex lg:transition-all lg:ease-linear lg:duration-300 hover:text-dark">
                                            <svg class="fill-current" width="20" height="20"
                                                viewBox="0 0 20 20" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9.99967 6.45831C8.04367 6.45831 6.45801 8.04397 6.45801 9.99998C6.45801 11.956 8.04367 13.5416 9.99967 13.5416C11.9557 13.5416 13.5413 11.956 13.5413 9.99998C13.5413 8.04397 11.9557 6.45831 9.99967 6.45831Z"
                                                    fill="" />
                                                <path
                                                    d="M1.66699 5.83335C1.66699 3.53217 3.53248 1.66669 5.83366 1.66669H14.167C16.4682 1.66669 18.3337 3.53217 18.3337 5.83335V14.1667C18.3337 16.4679 16.4682 18.3334 14.167 18.3334H5.83366C3.53248 18.3334 1.66699 16.4679 1.66699 14.1667V5.83335ZM5.20866 10C5.20866 12.6464 7.35396 14.7917 10.0003 14.7917C12.6467 14.7917 14.792 12.6464 14.792 10C14.792 7.35365 12.6467 5.20835 10.0003 5.20835C7.35396 5.20835 5.20866 7.35365 5.20866 10ZM15.0003 5.83335C15.4606 5.83335 15.8337 5.46025 15.8337 5.00002C15.8337 4.53979 15.4606 4.16669 15.0003 4.16669C14.5401 4.16669 14.167 4.53979 14.167 5.00002C14.167 5.46025 14.5401 5.83335 15.0003 5.83335Z"
                                                    fill="" />
                                            </svg>
                                        </a>
                                        <a href="{{ auth()->user()->youtube }}" target="_blank"
                                            class="flex lg:transition-all lg:ease-linear lg:duration-300 hover:text-dark">
                                            <svg class="fill-current" width="20" height="20"
                                                viewBox="0 0 20 20" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M19.2812 5.34369C19.0625 4.49994 18.4062 3.84369 17.5625 3.62494C16.0625 3.21869 10 3.21869 10 3.21869C10 3.21869 3.9375 3.21869 2.4375 3.62494C1.59375 3.84369 0.9375 4.49994 0.71875 5.34369C0.3125 6.87494 0.3125 9.99994 0.3125 9.99994C0.3125 9.99994 0.3125 13.1562 0.71875 14.6562C0.9375 15.4999 1.59375 16.1562 2.4375 16.3749C3.9375 16.7812 10 16.7812 10 16.7812C10 16.7812 16.0625 16.7812 17.5625 16.3749C18.4062 16.1562 19.0625 15.4999 19.2812 14.6562C19.6875 13.1562 19.6875 9.99994 19.6875 9.99994C19.6875 9.99994 19.6875 6.87494 19.2812 5.34369ZM8.0625 12.9062V7.09369L13.0938 9.99994L8.0625 12.9062Z"
                                                    fill="" />
                                            </svg>
                                        </a>
                                      
                                    </div>
                                    <!-- Social Links end -->
                                </div>
                            </div>
                        </div>
                        <!-- Hero Content End -->
                    </div>
                </div>
            </section>
            <!-- ===== Hero Section End ===== -->

            <!-- ====== Blog Section Start -->
            <section class="pb-20">
                <div class="max-w-[1170px] mx-auto px-4 sm:px-8 xl:px-0">
                    <div class="flex flex-col gap-y-9 lg:gap-y-11 ">
                        <!-- blog item -->
                       @forelse($posts as $post)
                         <div class="flex items-center flex-col lg:flex-row gap-10 mb-4 lg:gap-15">
                            <div
                                class="max-w-[570px] w-full overflow-hidden transition-all hover:scale-105 rounded-[10px]">
                                <a href="{{route('blog',$post->slug)}}">
                                    <img src="{{ $post->image }}" alt="image" />
                                </a>
                            </div>

                            <div class="max-w-[540px] w-full">
                                <a href="{{ route('category.show', $post->category->slug) }}"
                                    class="inline-flex text-blue bg-blue/[0.08] font-medium text-custom-sm py-1 px-3 rounded-full">{{ $post->category->name }}</a>

                                <h4 class="mt-3.5 mb-4">
                                    <a href="{{route('blog',$post->slug)}}"
                                        class="group text-dark font-bold text-xl sm:text-2xl xl:text-custom-4xl">
                                        <span
                                            class="bg-linear-to-r from-primary/40 to-primary/30 bg-[length:0px_10px] bg-left-bottom bg-no-repeat transition-[background-size] duration-500 hover:bg-[length:100%_3px] group-hover:bg-[length:100%_10px]">
                                            {{ $post->title }}
                                        </span>
                                    </a>
                                </h4>
                                <p>
                                    {!! Str::limit($post->content, 100) !!}
                                </p>

                                <div class="flex items-center gap-2.5 mt-4.5">
                                    <p>By {{ $post->user->name }}</p>

                                    <span class="flex w-[3px] h-[3px] rounded-full bg-dark-2"></span>

                                    <p>{{ $post->getReadingTime($post->content) }} min read</p>
                                </div>
                            </div>
                        </div>
                       @empty
                        <p>No Post</p>
                       @endforelse

               

                  
                    </div>
                    <!-- Blog Show More BTN -->
                    <button
                        class="flex justify-center font-medium text-dark border border-dark rounded-md py-3 px-7.5 hover:bg-dark hover:text-white ease-in duration-200 mx-auto mt-10 lg:mt-15">
                        Show more...
                    </button>
                </div>
            </section>
            <!-- ====== Blog Section End -->
        </div>
  

      

  
 

    

</x-front-layout>
