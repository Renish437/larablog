<x-front-layout title="Author">
   
      <!-- ===== Author Section Start ===== -->
      <section class="pt-31.5 pb-17.5">
        <div class="max-w-[1170px] mx-auto px-4 sm:px-8 xl:px-0">
          <div class="max-w-[140px] mx-auto w-full h-35 rounded-full flex items-center justify-center border border-gray-3">
            <div class="max-w-[100px] w-full h-25 rounded-full overflow-hidden">
              <img src="{{ asset('front/images/user-01.png') }}" alt="user">
            </div>
          </div>

          <div class="max-w-[770px] mx-auto w-full text-center mb-15 mt-5">
            <h1 class="font-bold text-heading-6 lg:text-heading-4 text-dark mb-4">
              Adrio Devid
            </h1>
            <p>
              Mario, a co-founder of Acme and the content management system
              Sanity, is an accomplished Staff Engineer with a specialization in
              Frontend at Vercel. Before his current position, he served as a
              Senior Engineer at Apple.
            </p>
          </div>

          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-y-11 gap-x-7.5">
            <!-- blog item -->
            <div class="group">
              <div class="mb-6 overflow-hidden rounded-[10px] transition-all group-hover:scale-105">
                <a href="{{route('blog')}}">
                  <img src="{{ asset('front/images/blog-01.png') }}" alt="image" class="w-full">
                </a>
              </div>

              <h4>
                <a href="{{route('blog')}}" class="block text-dark font-bold text-xl mb-3.5">
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
                <a href="#" class="inline-flex text-blue bg-blue/[0.08] font-medium text-sm py-1 px-3 rounded-full">Technology</a>
              </div>
            </div>

            <!-- blog item -->
            <div class="group">
              <div class="mb-6 overflow-hidden rounded-[10px] transition-all group-hover:scale-105">
                <a href="{{route('blog')}}">
                  <img src="{{ asset('front/images/blog-10.png') }}" alt="image" class="w-full">
                </a>
              </div>

              <h4>
                <a href="{{route('blog')}}" class="block text-dark font-bold text-xl mb-3.5">
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
                <a href="#" class="inline-flex text-cyan-dark bg-cyan/[0.08] font-medium text-sm py-1 px-3 rounded-full">Culture</a>
              </div>
            </div>

            <!-- blog item -->
            <div class="group">
              <div class="mb-6 overflow-hidden rounded-[10px] transition-all group-hover:scale-105">
                <a href="{{route('blog')}}">
                  <img src="{{ asset('front/images/blog-07.png') }}" alt="image" class="w-full">
                </a>
              </div>

              <h4>
                <a href="{{route('blog')}}" class="block text-dark font-bold text-xl mb-3.5">
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
                <a href="#" class="inline-flex text-green-dark bg-green/[0.08] font-medium text-sm py-1 px-3 rounded-full">Travel</a>
              </div>
            </div>

            <!-- blog item -->
            <div class="group">
              <div class="mb-6 overflow-hidden rounded-[10px] transition-all group-hover:scale-105">
                <a href="{{route('blog')}}">
                  <img src="{{ asset('front/images/blog-11.png') }}" alt="image" class="w-full">
                </a>
              </div>

              <h4>
                <a href="{{route('blog')}}" class="block text-dark font-bold text-xl mb-3.5">
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
                <a href="#" class="inline-flex text-cyan-dark bg-cyan/[0.08] font-medium text-sm py-1 px-3 rounded-full">Culture</a>
              </div>
            </div>

            <!-- blog item -->
            <div class="group">
              <div class="mb-6 overflow-hidden rounded-[10px] transition-all group-hover:scale-105">
                <a href="{{route('blog')}}">
                  <img src="{{ asset('front/images/blog-02.png') }}" alt="image" class="w-full">
                </a>
              </div>

              <h4>
                <a href="{{route('blog')}}" class="block text-dark font-bold text-xl mb-3.5">
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
                <a href="#" class="inline-flex text-blue bg-blue/[0.08] font-medium text-sm py-1 px-3 rounded-full">Technology</a>
              </div>
            </div>

            <!-- blog item -->
            <div class="group">
              <div class="mb-6 overflow-hidden rounded-[10px] transition-all group-hover:scale-105">
                <a href="{{route('blog')}}">
                  <img src="{{ asset('front/images/blog-06.png') }}" alt="image" class="w-full">
                </a>
              </div>

              <h4>
                <a href="{{route('blog')}}" class="block text-dark font-bold text-xl mb-3.5">
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
                <a href="#" class="inline-flex text-green-dark bg-green/[0.08] font-medium text-sm py-1 px-3 rounded-full">Travel</a>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- ===== Author Section End ===== -->

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
   
</x-front-layout>