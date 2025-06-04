<x-front-layout title="Category">
    <div>
      <!-- ===== Category Section Start ===== -->
      <section class="pt-34 pb-17.5">
        <div class="max-w-[1170px] mx-auto px-4 sm:px-8 xl:px-0">
          <div class="text-center mb-15">
            <h1 class="font-bold text-heading-6 sm:text-heading-4 lg:text-heading-3 text-dark mb-3.5">
              Technology
            </h1>
            <p>3 Posts</p>
          </div>

          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-y-11 gap-x-7.5">
            <!-- blog item -->
            <div class="group">
              <div class="mb-6 overflow-hidden rounded-[10px] transition-all group-hover:scale-105">
                <a href="blog-single.html">
                  <img src="{{ asset('front/images/blog-01.png') }}" alt="image" class="w-full">
                </a>
              </div>

              <h4>
                <a href="blog-single.html" class="block text-dark font-bold text-xl mb-3.5">
                  <span class="bg-linear-to-r from-primary/50 to-primary/40 bg-[length:0px_10px] bg-left-bottom bg-no-repeat transition-[background-size] duration-500 hover:bg-[length:100%_3px] group-hover:bg-[length:100%_10px]">
                    Stylish Kitchen And Dining Room With Functional Ideas
                  </span>
                </a>
              </h4>
              <p>
                Lorem Ipsum is simply dummy text of the print and typesetting
                industry...
              </p>

              <div class="flex flex-wrap gap-3 items-center justify-between mt-4.5">
                <div class="flex items-center gap-2.5">
                  <a href="{{route('author')}}" class="flex items-center gap-3">
                    <div class="flex w-6 h-6 rounded-full overflow-hidden">
                      <img src="{{ asset('front/images/user-01.png') }}" alt="user">
                    </div>
                    <p class="text-sm">Adrio Devid</p>
                  </a>

                  <span class="flex w-[3px] h-[3px] rounded-full bg-dark-2"></span>

                  <p class="text-sm">Sep 10, 2025</p>
                </div>
                <a href="{{route('category')}}" class="inline-flex text-blue bg-blue/[0.08] font-medium text-sm py-1 px-3 rounded-full">Technology</a>
              </div>
            </div>

            <!-- blog item -->
            <div class="group">
              <div class="mb-6 overflow-hidden rounded-[10px] transition-all group-hover:scale-105">
                <a href="blog-single.html">
                  <img src="{{ asset('front/images/blog-02.png') }}" alt="image" class="w-full">
                </a>
              </div>

              <h4>
                <a href="blog-single.html" class="block text-dark font-bold text-xl mb-3.5">
                  <span class="bg-linear-to-r from-primary/50 to-primary/40 bg-[length:0px_10px] bg-left-bottom bg-no-repeat transition-[background-size] duration-500 hover:bg-[length:100%_3px] group-hover:bg-[length:100%_10px]">
                    Stylish Kitchen And Dining Room With Functional Ideas
                  </span>
                </a>
              </h4>
              <p>
                Lorem Ipsum is simply dummy text of the print and typesetting
                industry...
              </p>

              <div class="flex flex-wrap gap-3 items-center justify-between mt-4.5">
                <div class="flex items-center gap-2.5">
                  <a href="{{route('author')}}" class="flex items-center gap-3">
                    <div class="flex w-6 h-6 rounded-full overflow-hidden">
                      <img src="{{ asset('front/images/user-01.png') }}" alt="user">
                    </div>
                    <p class="text-sm">Adrio Devid</p>
                  </a>

                  <span class="flex w-[3px] h-[3px] rounded-full bg-dark-2"></span>

                  <p class="text-sm">Sep 10, 2025</p>
                </div>
                <a href="{{route('category')}}" class="inline-flex text-blue bg-blue/[0.08] font-medium text-sm py-1 px-3 rounded-full">Technology</a>
              </div>
            </div>

            <!-- blog item -->
            <div class="group">
              <div class="mb-6 overflow-hidden rounded-[10px] transition-all group-hover:scale-105">
                <a href="blog-single.html">
                  <img src="{{ asset('front/images/blog-03.png') }}" alt="image" class="w-full">
                </a>
              </div>

              <h4>
                <a href="blog-single.html" class="block text-dark font-bold text-xl mb-3.5">
                  <span class="bg-linear-to-r from-primary/50 to-primary/40 bg-[length:0px_10px] bg-left-bottom bg-no-repeat transition-[background-size] duration-500 hover:bg-[length:100%_3px] group-hover:bg-[length:100%_10px]">
                    Stylish Kitchen And Dining Room With Functional Ideas
                  </span>
                </a>
              </h4>
              <p>
                Lorem Ipsum is simply dummy text of the print and typesetting
                industry...
              </p>

              <div class="flex flex-wrap gap-3 items-center justify-between mt-4.5">
                <div class="flex items-center gap-2.5">
                  <a href="{{route('author')}}" class="flex items-center gap-3">
                    <div class="flex w-6 h-6 rounded-full overflow-hidden">
                      <img src="{{ asset('front/images/user-01.png') }}" alt="user">
                    </div>
                    <p class="text-sm">Adrio Devid</p>
                  </a>

                  <span class="flex w-[3px] h-[3px] rounded-full bg-dark-2"></span>

                  <p class="text-sm">Sep 10, 2025</p>
                </div>
                <a href="{{route('category')}}" class="inline-flex text-blue bg-blue/[0.08] font-medium text-sm py-1 px-3 rounded-full">Technology</a>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- ===== Category Section End ===== -->

      <!-- ====== Newsletter Section Start -->
      <section class="py-12.5 bg-gray relative overflow-hidden z-10">
  <div class="absolute left-0 top-0 w-full h-full -z-1">
    <img src="{{ asset('front/images/bg-dots.svg') }}" alt="dot">
  </div>
  <div class="max-w-[1170px] mx-auto px-4 sm:px-8 xl:px-0">
    <div class="bg-white shadow-1 rounded-[10px] py-9 px-4 sm:px-8 xl:px-10">
      <div class="flex flex-wrap items-center justify-between gap-10">
        <div class="max-w-[455px] w-full">
          <h3 class="font-semibold text-heading-6 text-dark mb-3">
            Subscribe to Newsletter
          </h3>
          <p>
            Provide your email to get email notification when we launch new
            products or publish new articles
          </p>
        </div>
        <div class="max-w-[494px] w-full">
          <form>
            <div class="flex items-center gap-5">
              <div class="max-w-[350px] w-full">
                <input id="email" type="email" name="email" placeholder="Enter your Email" class="rounded-md border border-gray-3 bg-white placeholder:text-dark-5 w-full py-3.5 px-5 outline-hidden focus:shadow-input focus:ring-2 focus:ring-dark-4/20 focus:border-transparent">
              </div>
              <button class="font-medium rounded-md text-white bg-dark flex py-3.5 px-5.5 hover:opacity-90 transition-all ease-linear duration-300">
                Subscribe
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

      <!-- ====== Newsletter Section End -->
    </div>
</x-front-layout>