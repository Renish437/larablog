@props(['title'])
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Clarity - {{ $title ?? 'Blog' }}</title>
  {{-- <link rel="icon" href="front/images/favicon.ico"> --}}
    {{-- <link rel="icon"   href="{{ asset('front/favico.ico') }}"> --}}
    <link rel="shortcut icon" href="{{ asset(Storage::url($setting->site_favicon)) }}">
  <link href="{{ asset('front/style.css') }}" rel="stylesheet">

</head>

  <body
    x-data="{ page: 'home', 'loaded': true, 'modalNewsletter': false, 'modalSearch': false, 'stickyMenu': false, 'navigationOpen': false, 'scrollTop': false }"
  >
    <!-- ===== Preloader Start ===== -->
    <div
  x-show="loaded"
  x-init="window.addEventListener('DOMContentLoaded', () => {setTimeout(() => loaded = false, 200)})"
  class="fixed left-0 top-0 z-999999 flex h-screen w-screen items-center justify-center bg-white"
>
  <div
    class="h-16 w-16 animate-spin rounded-full border-4 border-solid border-primary border-t-transparent"
  ></div>
</div>

    <!-- ===== Preloader End ===== -->

    <!-- ===== Header Start ===== -->
    <x-header/>

    <!-- ===== Header End ===== -->

    <main class=" dark:bg-gray-700 dark:text-white">
      {{ $slot }}
    </main>
    <!-- ===== Footer Start ===== -->
    <!-- ====== Footer Section Start -->
   <x-footer/>
<!-- ====== Footer Section End -->

    <!-- ===== Footer End ===== -->

    <!-- Modals start -->
    <div
  x-show="modalNewsletter"
  :class="modalNewsletter && 'z-99999'"
  class="fixed top-0 left-0 flex h-full min-h-screen w-full items-center justify-center bg-[#000]/25 backdrop-blur-xs px-4 py-5"
>
  <div
    x-show="modalNewsletter"
    x-transition
    @click.outside="modalNewsletter = false"
    class="w-full max-w-[600px] rounded-2xl shadow-box-2 bg-white p-4 sm:p-7.5 xl:p-12.5 relative transform transition-all scale-100"
  >
    <button
      @click="modalNewsletter = false"
      class="absolute top-6 right-6 flex items-center justify-center w-9 h-9 rounded-full ease-in duration-150 hover:text-dark hover:bg-gray-2"
    >
      <svg
        class="fill-current"
        width="20"
        height="20"
        viewBox="0 0 20 20"
        fill="none"
        xmlns="http://www.w3.org/2000/svg"
      >
        <path
          d="M1.22505 1.22474C1.46912 0.980668 1.86486 0.980668 2.10893 1.22474L10.0003 9.1161L17.8917 1.22474C18.1358 0.980668 18.5315 0.980668 18.7756 1.22474C19.0197 1.46882 19.0197 1.86455 18.7756 2.10863L10.8842 10L18.7756 17.8914C19.0197 18.1355 19.0197 18.5312 18.7756 18.7753C18.5315 19.0194 18.1358 19.0194 17.8917 18.7753L10.0003 10.8839L2.10893 18.7753C1.86486 19.0194 1.46912 19.0194 1.22505 18.7753C0.980973 18.5312 0.980973 18.1355 1.22505 17.8914L9.11641 10L1.22505 2.10863C0.980973 1.86455 0.980973 1.46882 1.22505 1.22474Z"
          fill=""
        />
      </svg>
    </button>
    <h3 class="font-semibold text-dark text-heading-5 mb-1.5">Newsletter</h3>
    <p>Subscribe to my newsletter to get updated posts</p>

    <div class="mt-7.5">
      <form>
        <div class="mb-5.5">
          <label for="email" class="block font-medium text-dark mb-2.5"
            >Email</label
          >
          <input
            type="email"
            placeholder="Enter your email"
            class="rounded-md border border-gray-4 bg-white placeholder:text-dark-3 w-full py-3.5 px-5 outline-hidden ease-in duration-300 focus:shadow-input focus:ring-2 focus:ring-dark-4/20 focus:border-transparent"
          />
        </div>

        <button
          type="submit"
          class="w-full rounded-md text-white font-medium flex justify-center py-3.5 px-5 bg-primary hover:opacity-90 lg:transition-all lg:ease-linear lg:duration-300"
        >
          Subscribe
        </button>

        <p class="text-center mt-4.5">Don't worry, I don't spam</p>
      </form>
    </div>
  </div>
</div>

    <div
  x-show="modalSearch"
  :class="modalSearch && 'z-99999'"
  class="fixed inset-0 flex items-center justify-center px-4 py-5"
>
  <div
    class="fixed inset-0 bg-[#000]/25 backdrop-blur-xs transition-opacity"
  ></div>
  <div
    x-show="modalSearch"
    x-transition
    @click.outside="modalSearch = false"
    class="w-full max-w-[700px] rounded-lg overflow-hidden shadow-box-2 bg-white relative ease-in duration-200"
  >
    <div class="">
      <form>
        <div class="relative">
          <button
            class="flex items-center justify-center absolute left-0 top-0 pl-7 pr-3 py-6.5"
          >
            <svg
              width="20"
              height="20"
              viewBox="0 0 20 20"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M19.1875 17.4063L14.0313 13.2188C16.1563 10.3125 15.9375 6.15625 13.2813 3.53125C11.875 2.125 10 1.34375 8 1.34375C6 1.34375 4.125 2.125 2.71875 3.53125C-0.1875 6.4375 -0.1875 11.1875 2.71875 14.0938C4.125 15.5 6 16.2813 8 16.2813C9.90625 16.2813 11.6875 15.5625 13.0938 14.2813L18.3125 18.5C18.4375 18.5938 18.5938 18.6563 18.75 18.6563C18.9688 18.6563 19.1563 18.5625 19.2813 18.4063C19.5313 18.0938 19.5 17.6563 19.1875 17.4063ZM8 14.875C6.375 14.875 4.875 14.25 3.71875 13.0938C1.34375 10.7188 1.34375 6.875 3.71875 4.53125C4.875 3.375 6.375 2.75 8 2.75C9.625 2.75 11.125 3.375 12.2813 4.53125C14.6563 6.90625 14.6563 10.75 12.2813 13.0938C11.1563 14.25 9.625 14.875 8 14.875Z"
                fill="#15171A"
              />
            </svg>
          </button>

          <input
            type="search"
            name="search"
            id="search"
            placeholder="Search posts, tags and authors"
            autocomplete="off"
            class="w-full rounded-t-lg bg-white text-body pl-15 pr-3 py-6 outline-hidden ease-in duration-300 placeholder:text-dark-3"
          />

          <button
          type="button"
            @click="modalSearch = false"
            aria-label="button for modal close"
            class="absolute top-4.5 right-7 flex items-center justify-center w-9 h-9 rounded-full ease-in duration-150 hover:text-dark hover:bg-gray-2"
          >
            <svg
              class="fill-current"
              width="14"
              height="14"
              viewBox="0 0 14 14"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <g clip-path="url(#clip0_724_5430)">
                <path
                  d="M7.7001 6.99998L13.0376 1.66248C13.2345 1.4656 13.2345 1.15935 13.0376 0.962476C12.8407 0.765601 12.5345 0.765601 12.3376 0.962476L7.0001 6.29998L1.6626 0.962476C1.46572 0.765601 1.15947 0.765601 0.962598 0.962476C0.765723 1.15935 0.765723 1.4656 0.962598 1.66248L6.3001 6.99998L0.962598 12.3375C0.765723 12.5344 0.765723 12.8406 0.962598 13.0375C1.0501 13.125 1.18135 13.1906 1.3126 13.1906C1.44385 13.1906 1.5751 13.1469 1.6626 13.0375L7.0001 7.69998L12.3376 13.0375C12.4251 13.125 12.5563 13.1906 12.6876 13.1906C12.8188 13.1906 12.9501 13.1469 13.0376 13.0375C13.2345 12.8406 13.2345 12.5344 13.0376 12.3375L7.7001 6.99998Z"
                  fill=""
                />
              </g>
              <defs>
                <clipPath id="clip0_724_5430">
                  <rect width="14" height="14" fill="white" />
                </clipPath>
              </defs>
            </svg>
          </button>
        </div>
      </form>

      <div class="border-y border-gray-3 py-3 lg:py-4.5 px-4 lg:px-7">
        <h5 class="font-medium text-dark">Posts</h5>
      </div>

      <div class="py-3.5">
        <div
          class="cursor-pointer ease-in duration-300 hover:bg-gray py-3.5 px-4 lg:px-7"
        >
          <h6 class="font-medium text-dark mb-1.5">
            Writing and managing content in Clarity, an advanced guide
          </h6>
          <p class="text-custom-sm">
            Lorem ipsum dolor sit amet, consectetur adipiscing...
          </p>
        </div>

        <div
          class="cursor-pointer ease-in duration-300 hover:bg-gray py-3.5 px-4 lg:px-7"
        >
          <h6 class="font-medium text-dark mb-1.5">
            Writing and managing content in Clarity, an advanced guide
          </h6>
          <p class="text-custom-sm">
            Lorem ipsum dolor sit amet, consectetur adipiscing...
          </p>
        </div>

        <div
          class="cursor-pointer ease-in duration-300 hover:bg-gray py-3.5 px-4 lg:px-7"
        >
          <h6 class="font-medium text-dark mb-1.5">
            Writing and managing content in Clarity, an advanced guide
          </h6>
          <p class="text-custom-sm">
            Lorem ipsum dolor sit amet, consectetur adipiscing...
          </p>
        </div>

        <div
          class="cursor-pointer ease-in duration-300 hover:bg-gray py-3.5 px-4 lg:px-7"
        >
          <h6 class="font-medium text-dark mb-1.5">
            Writing and managing content in Clarity, an advanced guide
          </h6>
          <p class="text-custom-sm">
            Lorem ipsum dolor sit amet, consectetur adipiscing...
          </p>
        </div>
      </div>
    </div>
  </div>
</div>

    <!-- Modals end -->

    <!-- ====== Back To Top Start ===== -->
    <button
  class="hidden items-center justify-center w-10 h-10 rounded-[4px] shadow-solid-5 bg-dark hover:opacity-95 fixed bottom-8 right-8 z-999"
  @click="window.scrollTo({top: 0, behavior: 'smooth'})"
  @scroll.window="scrollTop = (window.pageYOffset > 50) ? true : false"
  :class="{ 'flex!' : scrollTop }"
>
  <svg
    class="fill-white w-5 h-5"
    xmlns="http://www.w3.org/2000/svg"
    viewBox="0 0 512 512"
  >
    <path
      d="M233.4 105.4c12.5-12.5 32.8-12.5 45.3 0l192 192c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L256 173.3 86.6 342.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l192-192z"
    />
  </svg>
</button>

    <!-- ====== Back To Top End ===== -->
  <script defer src="{{ asset('front/bundle.js') }}"></script><script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'94a0cdf2f866ca11',t:'MTc0ODk3MDYzMi4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script></body>
</html>
