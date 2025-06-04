    <header
  class="fixed left-0 top-0 w-full z-9999 bg-white dark:bg-gray-800 dark:text-white py-7 lg:py-1 transition-all ease-in-out duration-300"
  :class="{ 'shadow-sm py-4! lg:py-1!' : stickyMenu }"
  @scroll.window="stickyMenu = (window.scrollY > 0) ? true : false"
>
  <div
    class="max-w-[1170px] mx-auto px-4 sm:px-8 xl:px-0 lg:flex items-center justify-between relative"
  >
    <div class="w-full lg:w-3/12 flex items-center justify-between">
      <a href="{{ route('home') }}">
        <img width="150px" src="{{ asset(Storage::url($setting->site_logo)) }}" alt="Logo" />
        {{-- <svg width="190.05" height="45.15457824922106" viewBox="0 0 369.66666666666663 89.06480320669988" class="looka-1j8o68f"><defs id="SvgjsDefs1011"></defs><g id="SvgjsG1012" featurekey="HdFLvg-0" transform="matrix(0.09457875043153763,0,0,0.09457875043153763,-5.627435558644759,-2.752243612967319)" fill="#3f72af"><g xmlns="http://www.w3.org/2000/svg"><path d="M146.6,312.2l273.4-157.9h0c7.6,3.1,15.8,4.8,24.4,4.8c35.8,0,65-29.2,65-65c0-35.8-29.2-65-65-65   c-35.8,0-64.8,29-65,64.7v0L97,256.9c-23.1,13.4-37.5,38.3-37.5,65.1v347.2c0,26.7,14.4,51.7,37.6,65.1l318,183.6   c4.4,2.5,9.4,3.9,14.4,3.9c5,0,10-1.3,14.4-3.9c9-5.2,14.4-14.6,14.4-25v-9.3c0-15.2-8.2-29.3-21.3-36.9L146.6,679   c-8.9-5.2-14.5-14.8-14.5-25.1V337.3C132.1,327,137.7,317.3,146.6,312.2z M405.4,78.9L405.4,78.9c6.1-15.7,21.3-26.7,39.1-26.7   c2.2,0,4.3,0.2,6.4,0.5h0c2.6,0.4,5.1,1,7.4,1.9c16.4,5.7,28.1,21.3,28.1,39.6c0,20.1-14.2,37-33.1,41c-2.8,0.6-5.8,0.9-8.8,0.9   c-23.2,0-42-18.8-42-42C402.5,88.7,403.6,83.6,405.4,78.9z"></path><path d="M903.6,276.8L585.4,93.1c-4.5-2.6-9.5-3.9-14.6-3.9c-5.1,0-10.1,1.4-14.6,3.9c-9.1,5.3-14.6,14.7-14.6,25.3   v12.9c0,12.6,6.8,24.3,17.7,30.6L854,332c8.6,4.9,13.9,14.1,13.9,24v318c0,9.9-5.3,19.1-13.9,24l-266.4,150   c-8.9-4.6-19-7.2-29.6-7.2c-35.8,0-65,29.2-65,65c0,35.8,29.2,65,65,65c32.5,0,59.5-23.9,64.3-55.1l281.4-162.5   c22.8-13.2,36.9-37.6,36.9-63.9V340.7C940.5,314.4,926.4,289.9,903.6,276.8z M587,936.1c-4.9,4.7-10.8,8.2-17.5,10.1   c-3.7,1.1-7.6,1.6-11.6,1.6c-0.4,0-0.9,0-1.3,0c-22.6-0.7-40.7-19.2-40.7-41.9c0-23.2,18.8-42,42-42c2.2,0,4.4,0.2,6.5,0.5   c20.1,3.1,35.5,20.5,35.5,41.5C599.9,917.8,595,928.5,587,936.1z"></path><path d="M689.4,551L196.9,681.6c-8.6,2.3-16.8-13.8-12-23.6l11.3-23.3c9-18.6,22.7-31,38.9-35.3l488.9-129.6   c8.6-2.3,16.8,13.8,12,23.6l-13.2,27.4C715,536.7,703.3,547.4,689.4,551z"></path><path d="M693,669.3l-304.9,80.8c-5.3,1.4-12.1-15-10-24.2l5.1-21.6c4-17.3,11.7-28.1,21.8-30.7l302.7-80.2   c5.3-1.4,12.1,15,10,24.2l-5.9,25.4C708.2,657.8,701.6,667,693,669.3z"></path><path d="M614.1,358.5l-304.9,80.8c-5.3,1.4-12.1-15-10-24.2l5.1-21.6c4-17.3,11.7-28.1,21.8-30.7l302.7-80.2   c5.3-1.4,12.1,15,10,24.2l-5.9,25.4C629.2,347,622.7,356.2,614.1,358.5z"></path><path d="M778,418.1L285.6,548.6c-8.6,2.3-16.8-13.8-12-23.6l11.3-23.3c9-18.6,22.7-31,38.9-35.3l488.9-129.6   c8.6-2.3,16.8,13.8,12,23.6l-13.2,27.4C803.7,403.8,792,414.4,778,418.1z"></path></g></g><g id="SvgjsG1013" featurekey="VomJeJ-0" transform="matrix(3.6539692878723145,0,0,3.6539692878723145,97.51904904229733,-9.292958870612583)" fill="#112d4e"><path d="M6.58 17.3 l3.46 0 q0 0.8 -0.1 1.37 t-0.64 0.98 t-1.42 0.41 l-4.52 0 q-0.86 0 -1.36 -0.5 t-0.5 -1.36 l0 -11.86 l0.14 -0.14 l1.18 0 q1.88 0 1.88 2.04 l0 9.14 q0.88 -0.08 1.88 -0.08 z M15.239999999999998 12.32 l0 7.68 q-0.34 0.06 -0.74 0.09 t-0.82 0.03 t-0.83 -0.03 t-0.75 -0.09 l0 -6.62 q0 -1.16 -0.94 -1.16 l-0.3 0 q-0.12 -0.38 -0.12 -1.06 q0 -0.66 0.12 -1.12 q0.52 -0.04 0.96 -0.07 t0.8 -0.03 l0.44 0 q1.02 0 1.6 0.64 t0.58 1.74 z M11.74 6 q0.58 -0.32 1.5 -0.32 q0.94 0 1.46 0.32 q0.24 0.54 0.24 1.16 t-0.24 1.16 q-0.58 0.3 -1.52 0.3 t-1.44 -0.3 q-0.24 -0.54 -0.24 -1.16 t0.24 -1.16 z M21.259999999999998 17.62 l1.74 -7.58 q0.56 -0.12 1.26 -0.12 q0.86 0 1.5 0.24 l0.1 0.14 q-2.04 7.44 -2.78 9.7 q-1.02 0.12 -2.15 0.12 t-1.61 -0.31 t-0.74 -1.19 l-2.4 -8.36 q0.98 -0.42 1.74 -0.42 t1.18 0.33 t0.62 1.13 l0.9 3.74 q0.1 0.38 0.44 2.42 q0.02 0.16 0.2 0.16 z M34.599999999999994 16.02 l-5.22 0 q0.04 0.9 0.46 1.4 t1.38 0.5 q0.48 0 1.11 -0.14 t1.45 -0.46 q0.66 0.68 0.82 1.84 q-1.6 1.14 -3.92 1.14 q-1.26 0 -2.11 -0.4 t-1.38 -1.12 t-0.75 -1.7 t-0.22 -2.14 q0 -1.12 0.27 -2.07 t0.82 -1.65 t1.4 -1.1 t1.99 -0.4 q0.96 0 1.73 0.32 t1.31 0.88 t0.83 1.34 t0.29 1.7 q0 1.22 -0.26 2.06 z M29.359999999999992 13.86 l2.64 0 l0 -0.22 q0 -0.74 -0.33 -1.22 t-0.99 -0.48 q-0.64 0 -0.95 0.45 t-0.37 1.47 z M37.21999999999999 6.300000000000001 q1.62 -0.04 2.77 -0.06 t1.85 -0.02 q2.18 0 3.43 0.91 t1.25 2.73 q0 0.88 -0.5 1.64 t-1.28 1.1 q0.5 0.16 0.95 0.51 t0.77 0.82 t0.51 1.02 t0.19 1.13 q0 2.06 -1.31 3.05 t-3.71 0.99 q-0.74 0 -1.96 -0.02 t-2.96 -0.06 l-0.14 -0.14 l0 -13.46 z M41.89999999999999 13.98 l-1.66 0 l0 3.9 q0.52 -0.02 1.17 0 t1.21 -0.1 t0.94 -0.58 t0.38 -1.28 q0 -0.78 -0.49 -1.36 t-1.55 -0.58 z M40.239999999999995 8.48 l0 3.22 l1.42 0 q0.96 0 1.35 -0.47 t0.39 -1.15 t-0.4 -1.13 t-1.34 -0.45 l-0.81 0 t-0.61 -0.02 z M52.96 17.72 l0.54 0 q0.24 0.66 0.24 1.32 t-0.06 0.86 q-1.2 0.2 -2.14 0.2 q-1.36 0 -1.93 -0.67 t-0.57 -2.11 l0 -11.9 l0.12 -0.14 l1.22 0 q0.94 0 1.32 0.42 t0.38 1.46 l0 9.62 q0 0.94 0.88 0.94 z M62.31999999999999 10.9 q1.44 1.44 1.44 4.12 q0 1.2 -0.31 2.18 t-0.9 1.67 t-1.45 1.06 t-1.98 0.37 t-1.97 -0.38 t-1.44 -1.07 t-0.89 -1.67 t-0.3 -2.16 q0 -1.2 0.3 -2.17 t0.88 -1.67 t1.44 -1.08 t1.98 -0.38 q1.98 0 3.2 1.18 z M59.13999999999999 12.059999999999999 q-0.44 0 -0.71 0.21 t-0.43 0.57 t-0.22 0.83 t-0.06 1.01 q0 0.84 0.05 1.45 t0.2 1.02 t0.42 0.61 t0.71 0.2 q0.88 0 1.16 -0.77 t0.28 -2.19 q0 -1.44 -0.28 -2.19 t-1.12 -0.75 z M71.64 10.66 q0.68 -0.76 1.88 -0.8 q0.32 0.24 0.61 0.72 t0.35 0.88 q-0.56 0.38 -0.56 1.44 l0 5.28 q0 1.84 -0.29 3.05 t-0.88 1.92 t-1.49 0.99 t-2.12 0.28 q-2.06 0 -3.76 -0.66 q0 -0.56 0.22 -1.22 t0.54 -1.04 q1.34 0.6 2.72 0.6 q2.02 0 2.02 -2.02 l0 -0.66 q-1.08 0.78 -2.28 0.78 q-1.78 0 -2.69 -1.41 t-0.91 -3.83 q0 -1.22 0.31 -2.19 t0.85 -1.65 t1.25 -1.04 t1.51 -0.36 q1.62 0 2.72 0.94 z M70.88 17 l0 -4.28 q-0.7 -0.68 -1.32 -0.68 q-1.36 0 -1.36 3 q0 2.64 1.18 2.64 q0.82 0 1.5 -0.68 z"></path></g></svg> --}}
      </a>

      <!-- Hamburger Toggle BTN -->
      <button
        id="menuToggler"
        aria-label="button for menu toggle"
        class="lg:hidden block"
        @click="navigationOpen = !navigationOpen"
      >
        <span class="block relative cursor-pointer w-5.5 h-5.5">
          <span class="du-block absolute right-0 w-full h-full">
            <span
              class="block relative top-0 left-0 bg-dark rounded-xs w-0 h-0.5 my-1 ease-in-out duration-200 delay-0"
              :class="{ 'w-full! delay-300': !navigationOpen }"
            ></span>
            <span
              class="block relative top-0 left-0 bg-dark rounded-xs w-0 h-0.5 my-1 ease-in-out duration-200 delay-150"
              :class="{ 'w-full! delay-400': !navigationOpen }"
            ></span>
            <span
              class="block relative top-0 left-0 bg-dark rounded-xs w-0 h-0.5 my-1 ease-in-out duration-200 delay-200"
              :class="{ 'w-full! delay-500': !navigationOpen }"
            ></span>
          </span>
          <span class="du-block absolute right-0 w-full h-full rotate-45">
            <span
              class="block bg-dark rounded-xs ease-in-out duration-200 delay-300 absolute left-2.5 top-0 w-0.5 h-full"
              :class="{ 'h-0! delay-0': !navigationOpen }"
            ></span>
            <span
              class="block bg-dark rounded-xs ease-in-out duration-200 delay-400 absolute left-0 top-2.5 w-full h-0.5"
              :class="{ 'h-0! dealy-200': !navigationOpen }"
            ></span>
          </span>
        </span>
      </button>
      <!-- Hamburger Toggle BTN -->
    </div>

    <div
      class="w-full lg:w-9/12 h-0 lg:h-auto invisible lg:visible lg:flex items-center justify-between"
      :class="{ 'visible! bg-white shadow-lgrelative h-auto! max-h-[400px] overflow-y-scroll rounded-md mt-4 p-7.5': navigationOpen }"
    >
      <!-- Main Nav Start -->
      <nav>
        <ul class="flex lg:items-center flex-col lg:flex-row gap-5 lg:gap-10">
          <li
            class="group relative lg:py-6.5"
            :class="{ 'lg:py-4!' : stickyMenu }"
            x-data="{ dropdown: false }"
          >
            <a
              href="index.html#"
              class="hover:text-dark flex items-center justify-between gap-3"
              @click.prevent="dropdown = !dropdown"
              
            >
              Home

              <svg
                class="fill-current w-3 h-3 cursor-pointer"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 512 512"
              >
                <path
                  d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"
                />
              </svg>
            </a>

            <!-- Dropdown Start -->
            <ul class="dropdown dark:bg-gray-800 mt-2" :class="{ 'flex': dropdown }">
              <li>
                <a
                  href="{{ route('home') }}"
                  class="flex rounded-md text-sm hover:text-primary hover:bg-gray dark:bg-gray-800 py-2 px-4 {{ Route::is('home') ? 'text-primary bg-gray' : '' }}"
                 
                  >Business Blog</a
                >
              </li>
              <li>
                <a
                  href="{{ route('my-home') }}"
                  class="flex rounded-md text-sm hover:text-primary hover:bg-gray dark:bg-gray-800 py-2 px-4 {{ Route::is('my-home') ? 'text-primary bg-gray' : '' }} "
                
                  >Personal Blog</a
                >
              </li>
            </ul>
          </li>
          <li
            class="group relative lg:py-6.5"
            :class="{ 'lg:py-4!' : stickyMenu }"
            x-data="{ dropdown: false }"
          >
            <a
              href="index.html#"
              class="hover:text-dark dark:bg-gray-800 flex items-center justify-between gap-3"
              @click.prevent="dropdown = !dropdown"
              :class="{ 'text-dark!': page === 'category' || page === 'about' || page === 'author' || page === 'search' || page === 'privacy-policy' || page === 'style-guide' || page === 'signin' || page === 'signup' || page === '404' }"
            >
              Pages

              <svg
                class="fill-current w-3 h-3 cursor-pointer"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 512 512"
              >
                <path
                  d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"
                />
              </svg>
            </a>

            <!-- Dropdown Start -->
            <ul class="dropdown mt-2 dark:bg-gray-800" :class="{ 'flex': dropdown }">
              <li>
                <a
                  href="{{ route('category') }}"
                  class="flex rounded-md text-sm dark:bg-gray-800 hover:text-primary hover:bg-gray py-2 px-4"
                  :class="{ 'text-primary bg-gray': page === 'category' }"
                  >Category Page</a
                >
              </li>
              <li>
                <a
                  href="{{ route('about') }}"
                  class="flex rounded-md text-sm hover:text-primary dark:bg-gray-800 hover:bg-gray py-2 px-4 {{ Route::is('about') ? 'text-primary bg-gray' : '' }}"
                 
                  >About Us</a
                >
              </li>
              <li>
                <a
                  href="{{ route('author') }}"
                  class="flex rounded-md text-sm hover:text-primary dark:bg-gray-800 hover:bg-gray py-2 px-4 {{ Route::is('author') ? 'text-primary bg-gray' : '' }}"
                 
                  >Author Page</a
                >
              </li>
              <li>
                <a
                  href="{{ route('search') }}"
                  class="flex rounded-md text-sm hover:text-primary dark:bg-gray-800 hover:bg-gray py-2 px-4 {{ Route::is('search') ? 'text-primary bg-gray' : '' }}"
               
                  >Search Page</a
                >
              </li>
              <li>
                <a
                  href="signin.html"
                  class="flex rounded-md text-sm hover:text-primary dark:bg-gray-800 hover:bg-gray py-2 px-4"
                  :class="{ 'text-primary bg-gray': page === 'signin' }"
                  >Sign In</a
                >
              </li>
              <li>
                <a
                  href="signup.html"
                  class="flex rounded-md text-sm hover:text-primary dark:bg-gray-800 hover:bg-gray py-2 px-4"
                  :class="{ 'text-primary bg-gray': page === 'signup' }"
                  >Sign Up</a
                >
              </li>
              <li>
                <a
                  href="style-guide.html"
                  class="flex rounded-md text-sm hover:text-primary dark:bg-gray-800 hover:bg-gray py-2 px-4"
                  :class="{ 'text-primary bg-gray': page === 'style-guide' }"
                  >Style Guide Page</a
                >
              </li>
              <li>
                <a
                  href="privacy-policy.html"
                  class="flex rounded-md text-sm hover:text-primary dark:bg-gray-800 hover:bg-gray py-2 px-4"
                  :class="{ 'text-primary bg-gray': page === 'privacy-policy' }"
                  >Privacy & Policy Page</a
                >
              </li>
              <li>
                <a
                  href="404.html"
                  class="flex rounded-md text-sm hover:text-primary dark:bg-gray-800 hover:bg-gray py-2 px-4"
                  :class="{ 'text-primary bg-gray': page === '404' }"
                  >Error Page</a
                >
              </li>
            </ul>
            <!-- Dropdown End -->
          </li>
          <li
            class="group relative lg:py-6.5"
            :class="{ 'lg:py-4!' : stickyMenu }"
            x-data="{ dropdown: false }"
          >
            <a
              href="index.html#"
              class="hover:text-dark flex items-center dark:bg-gray-800 justify-between gap-3"
              @click.prevent="dropdown = !dropdown"
              :class="{ 'text-dark!': page === 'blog-single' || page === 'blog-single-2' || page === 'blog-single-3' || page === 'archive' }"
            >
              Blogs

              <svg
                class="fill-current w-3 h-3 cursor-pointer"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 512 512"
              >
                <path
                  d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"
                />
              </svg>
            </a>

            <!-- Dropdown Start -->
            <ul class="dropdown mt-2 dark:bg-gray-800" :class="{ 'flex': dropdown }">
             
            
              <li>
                <a
                  href="{{ route('blog') }}"
                  class="flex rounded-md text-sm hover:text-primary dark:bg-gray-800 hover:bg-gray py-2 px-4 {{ Route::is('blog') ? 'text-primary bg-gray' : '' }}"
                 
                  >Blog Details Three</a
                >
              </li>
              <li>
                <a
                  href="{{ route('blogs') }}"
                  class="flex rounded-md text-sm hover:text-primary dark:bg-gray-800 hover:bg-gray py-2 px-4 {{ Route::is('blogs') ? 'text-primary bg-gray' : '' }}"
                  
                  >Blog Archive Page</a
                >
              </li>
            </ul>
          </li>
          <li class="nav__menu lg:py-6.5" :class="{ 'lg:py-4!' : stickyMenu }">
            <a href="{{ route('contact') }}" class="hover:text-dark">Contact</a>
          </li>
        </ul>
      </nav>
      <!-- Main Nav End -->

      <!--=== Nav Right Start ===-->
      <div class="flex flex-wrap items-center gap-8.5 mt-7 lg:mt-0">
        <!-- Social Links start -->
        <div class="flex items-center gap-1.5">
          <a
            id="facebookBtn"
            aria-label="facebook social link"
            href="index.html#"
            class="flex items-center justify-center w-7.5 h-7.5 rounded-full hover:bg-gray-2 lg:transition-all lg:duration-200 hover:text-dark"
          >
            <svg
              class="fill-current"
              width="19"
              height="18"
              viewBox="0 0 19 18"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M10.4 8.58585V6.07664C10.4 5.10529 11.2059 4.31785 12.2 4.31785H14V1.67966L11.5565 1.50912C9.47255 1.36368 7.7 2.97636 7.7 5.01777V8.58585H5V11.224H7.7V16.5H10.4V11.224H13.1L14 8.58585H10.4Z"
                fill=""
              />
            </svg>
          </a>
          <a
            id="twitterBtn"
            aria-label="twitter social link"
            href="index.html#"
            class="flex items-center justify-center w-7.5 h-7.5 rounded-full hover:bg-gray-2 lg:transition-all lg:duration-200 hover:text-dark"
          >
            <svg
              class="fill-current"
              width="19"
              height="18"
              viewBox="0 0 19 18"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <g clip-path="url(#clip0_739_364)">
                <path
                  d="M16.2781 4.30313L17.3469 2.95313C17.6562 2.5875 17.7406 2.30625 17.7688 2.16562C16.925 2.67188 16.1375 2.84063 15.6312 2.84063H15.4344L15.3219 2.72813C14.6469 2.1375 13.8031 1.82812 12.9031 1.82812C10.9344 1.82812 9.3875 3.45938 9.3875 5.34375C9.3875 5.45625 9.3875 5.625 9.41563 5.7375L9.5 6.3L8.90938 6.27188C5.30937 6.15938 2.35625 3.06563 1.87813 2.53125C1.09063 3.9375 1.54063 5.2875 2.01875 6.13125L2.975 7.70625L1.45625 6.8625C1.48438 8.04375 1.93437 8.97188 2.80625 9.64688L3.56562 10.2094L2.80625 10.5188C3.28437 11.9531 4.35313 12.5438 5.14062 12.7688L6.18125 13.05L5.19688 13.725C3.62188 14.85 1.65312 14.7656 0.78125 14.6813C2.55313 15.9188 4.6625 16.2 6.125 16.2C7.22188 16.2 8.0375 16.0875 8.23438 16.0031C16.1094 14.1469 16.475 7.11563 16.475 5.70938V5.5125L16.6438 5.4C17.6 4.5 17.9937 4.02188 18.2188 3.74063C18.1344 3.76875 18.0219 3.825 17.9094 3.85313L16.2781 4.30313Z"
                  fill=""
                />
              </g>
              <defs>
                <clipPath id="clip0_739_364">
                  <rect
                    width="18"
                    height="18"
                    fill="white"
                    transform="translate(0.5)"
                  />
                </clipPath>
              </defs>
            </svg>
          </a>
          <a
            id="linkedinBtn"
            aria-label="linkedin social link"
            href="index.html#"
            class="flex items-center justify-center w-7.5 h-7.5 rounded-full hover:bg-gray-2 lg:transition-all lg:duration-200 hover:text-dark"
          >
            <svg
              class="fill-current"
              width="19"
              height="18"
              viewBox="0 0 19 18"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M5.50004 3.50068C5.49976 4.11141 5.12924 4.661 4.56318 4.89028C3.99713 5.11957 3.34858 4.98277 2.92335 4.54439C2.49812 4.10601 2.38114 3.45359 2.62755 2.89478C2.87397 2.33597 3.43458 1.98236 4.04504 2.00068C4.85584 2.02502 5.5004 2.68951 5.50004 3.50068ZM5.54504 6.11068H2.54504V15.5007H5.54504V6.11068ZM10.2851 6.11068H7.30004V15.5007H10.2551V10.5732C10.2551 7.82816 13.8326 7.57316 13.8326 10.5732V15.5007H16.7951V9.55316C16.7951 4.92568 11.5001 5.09818 10.2551 7.37066L10.2851 6.11068Z"
                fill=""
              />
            </svg>
          </a>
          <a
            id="pinterestBtn"
            aria-label="pinterest social link"
            href="index.html#"
            class="flex items-center justify-center w-7.5 h-7.5 rounded-full hover:bg-gray-2 lg:transition-all lg:duration-200 hover:text-dark"
          >
            <svg
              class="fill-current"
              width="19"
              height="18"
              viewBox="0 0 19 18"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M1.00623 9.02818C1.06248 11.6438 2.27186 14.2594 4.32497 15.8344C4.97185 16.3126 5.67497 16.5938 6.40622 16.9032C6.09685 14.9063 6.85622 12.9094 7.2781 10.9407C7.33435 10.7438 7.36247 10.5188 7.36247 10.2938C7.36247 9.98443 7.24997 9.67505 7.1656 9.36568C7.08122 8.85943 7.13747 8.32505 7.36247 7.84693C7.67185 7.20005 8.4031 6.6938 9.04997 6.94693C9.6406 7.17193 9.8656 7.95943 9.7531 8.57818C9.6406 9.22505 9.3031 9.78755 9.13435 10.4063C8.93747 11.0251 8.9656 11.7844 9.4156 12.2063C9.83747 12.6001 10.5125 12.6282 11.0468 12.4032C11.8343 12.0657 12.3406 11.2782 12.65 10.4907C13.2125 9.02818 13.1 7.17193 11.9468 6.10318C11.4687 5.62505 10.7937 5.31568 10.0625 5.20318C8.82497 5.0063 7.47497 5.37193 6.6031 6.27193C5.73122 7.17193 5.33747 8.55005 5.7031 9.7313C5.8156 10.1251 6.0406 10.5188 6.12497 10.9126C6.20935 11.3063 6.18122 11.8126 5.89997 12.0938C5.87185 12.1219 5.84372 12.1501 5.78747 12.1782C5.73122 12.2063 5.64685 12.1501 5.5906 12.1219C5.05622 11.7844 4.63435 11.2501 4.38122 10.6876C3.59372 8.97193 3.98747 6.83443 5.22497 5.42818C6.46247 4.02193 8.45935 3.34693 10.3156 3.60005C12.0593 3.82505 13.775 4.86568 14.5062 6.4688C14.9562 7.42505 15.0406 8.52193 14.8718 9.56255C14.7031 10.6313 14.2812 11.6438 13.5781 12.4594C12.875 13.2751 11.8625 13.8376 10.7937 13.8938C9.92185 13.9501 8.99372 13.6407 8.54372 12.9094C8.26247 14.4282 7.7281 15.9188 6.9406 17.2407C6.91247 17.2969 8.7406 17.6907 8.90935 17.6907C10.9906 17.8594 13.2125 17.0438 14.8437 15.7501C19.3437 12.1782 18.8656 5.3438 14.4218 1.96881C12.1156 0.196933 9.38747 -0.140567 6.68747 0.815684C5.87185 1.09693 5.11247 1.57506 4.40935 2.08131C3.28436 2.92505 2.38436 4.02193 1.79373 5.28755C1.20311 6.44068 0.978106 7.73443 1.00623 9.02818Z"
                fill=""
              />
            </svg>
          </a>
        </div>
        <!-- Social Links end -->

        <!-- Button Links start -->
        <div class="flex items-center gap-4.5">
          <button
            id="searchModalButton"
            aria-label="button for modal open"
            @click="modalSearch = true"
            class="flex items-center justify-center w-11 h-11 rounded-full bg-gray lg:transition-all lg:ease-linear lg:duration-200 hover:bg-gray-2 hover:text-dark"
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
                d="M19.1875 17.4063L14.0313 13.2188C16.1563 10.3125 15.9375 6.15625 13.2812 3.53125C11.875 2.125 10 1.34375 8 1.34375C6 1.34375 4.125 2.125 2.71875 3.53125C-0.1875 6.4375 -0.1875 11.1875 2.71875 14.0938C4.125 15.5 6 16.2813 8 16.2813C9.90625 16.2813 11.6875 15.5625 13.0938 14.2813L18.3125 18.5C18.4375 18.5938 18.5938 18.6563 18.75 18.6563C18.9688 18.6563 19.1562 18.5625 19.2812 18.4063C19.5312 18.0938 19.5 17.6563 19.1875 17.4063ZM8 14.875C6.375 14.875 4.875 14.25 3.71875 13.0938C1.34375 10.7188 1.34375 6.875 3.71875 4.53125C4.875 3.375 6.375 2.75 8 2.75C9.625 2.75 11.125 3.375 12.2812 4.53125C14.6562 6.90625 14.6562 10.75 12.2812 13.0938C11.1562 14.25 9.625 14.875 8 14.875Z"
                fill=""
              />
            </svg>
          </button>

          <button
            @click="modalNewsletter = true"
            class="rounded-md text-white font-medium flex py-2.5 px-5.5 bg-dark hover:opacity-90 lg:transition-all lg:ease-linear lg:duration-200"
          >
            Subscribe
          </button>
        </div>
        <!-- Button Links end -->
      </div>
      <!--=== Nav Right End ===-->
    </div>
  </div>
</header>