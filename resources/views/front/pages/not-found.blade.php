<x-front-layout title="404">
 
      <!-- ===== 404 Start ===== -->
      <section class="pt-39 lg:pt-44 pb-20 lg:pb-25">
        <div class="mx-auto w-full max-w-[598px] text-center px-4 sm:px-8 lg:px-0">
          <img src="{{ asset('front/images/404.svg') }}" alt="404" class="w-1/2 sm:w-full mx-auto mb-12.5">
          <h1 class="mb-5 text-heading-6 sm:text-heading-4 lg:text-heading-3 font-bold text-dark">
            Oops! Page Not Found.
          </h1>
          <p class="mb-7.5">
            The page you are looking for is not available or has been moved. Try
            a different page or go to homepage with the button below.
          </p>
          <a href="{{ route('home') }}" class="inline-flex rounded-md py-3.5 px-6 text-white font-medium bg-dark ease-in duration-300 hover:opacity-95">
            Go To Home
          </a>
        </div>
      </section>
      <!-- ===== 404 End ===== -->
   
</x-front-layout>