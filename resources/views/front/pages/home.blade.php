<x-front-layout title="Home">
    @section('meta_tags')
        {!! SEO::generate() !!}
    @endsection
    <div>
        <!-- ===== Hero Section Start ===== -->
        <section id="home" class="rounded-b-[50px] relative overflow-hidden z-10 pb-15 pt-34">
            <!-- Hero BG Shapes Start -->
            <div>
                <div class="absolute bottom-0 left-0 rounded-b-[50px] w-full h-full bg-gray"></div>
                <div class="hidden lg:block absolute bottom-0 left-0 rounded-b-[50px] w-full h-full">
                    <img src="front/images/hero-bg.svg" alt="hero" />
                </div>
            </div>
            <!-- Hero BG Shapes End -->

            <!-- Hero Content Start -->
            <div class="mx-auto max-w-[1170px] px-4 sm:px-8 xl:px-0 relative z-1">
                <div class="flex flex-wrap gap-x-7.5 gap-y-9">
                    <!-- Hero item -->
                    <div
                        class="max-w-[1170px] w-full flex flex-col lg:flex-row lg:items-center gap-7.5 lg:gap-11 bg-white shadow-1 rounded-xl p-4 lg:p-2.5">
                        <div class="lg:max-w-[536px] w-full">
                            <a href="{{ route('blog',$hero_item_one->slug) }}">
                                <img class="w-full" src="{{ $hero_item_one->image }}" alt="hero">
                            </a>
                        </div>

                        <div class="lg:max-w-[540px] w-full">
                            <a href="category.html"
                                class="inline-flex text-purple-dark bg-purple/[0.08] font-medium text-sm py-1 px-3 rounded-full mb-4">Lifestyle</a>
                            <h1 class="font-bold text-custom-4 xl:text-heading-4 text-dark mb-4">
                                <a href="{{ route('blog',$hero_item_one->slug) }}">
                                    {{ $hero_item_one->title }}
                                </a>
                            </h1>
                            <p class="max-w-[524px]">
                                {!! Str::limit($hero_item_one->content, 200) !!}
                            </p>
                            <div class="flex items-center gap-2.5 mt-5">
                                <a href="author.html" class="flex items-center gap-3">
                                    <div class="flex w-6 h-6 rounded-full overflow-hidden">
                                        <img src="images/user-01.png" alt="user">
                                    </div>
                                    <p class="text-sm">By {{ $hero_item_one->user->name }}</p>
                                </a>

                                <span class="flex w-[3px] h-[3px] rounded-full bg-dark-2"></span>

                                <p class="text-sm">{{ $hero_item_one->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Hero item -->

                    <div class="lg:max-w-[1170px] w-full flex flex-col gap-2 sm:flex-row">

                        @foreach ($hero_items as $hero_item)
                            <div class=" sm:items-center gap-6 bg-white shadow-1 rounded-xl p-2.5">
                                <div class="lg:max-w-[238px] h-[160px] w-full py-2">
                                    <a href="{{ route('blog',$hero_item->slug) }}">
                                        <img class="w-full" src="{{ $hero_item->image_thumb }}" alt="hero">
                                    </a>
                                </div>

                                <div class="lg:max-w-[272px] w-full">
                                    <a href="category.html"
                                        class="inline-flex text-blue bg-blue/[0.08] font-medium text-sm py-1 px-3 rounded-full mb-4">Technology</a>
                                    <h2 class="font-semibold text-custom-lg text-dark mb-3">
                                        <a href="{{ route('blog',$hero_item->slug) }}">
                                            {{ $hero_item->title }}
                                        </a>
                                    </h2>
                                    <div class="flex items-center gap-2.5">
                                        <p class="text-sm">
                                            <a href="author.html">By {{ $hero_item->user->name }}</a>
                                        </p>

                                        <span class="flex w-[3px] h-[3px] rounded-full bg-dark-2"></span>

                                        <p class="text-sm"> {{ $hero_item->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>



                </div>
            </div>
            <!-- Hero Content End -->
        </section>
        <!-- ===== Hero Section End ===== -->

        <!-- ====== Blog Category Section Start -->
        <livewire:blog-category-section />
        <!-- ====== Blog Category Section End -->

        <!-- ======  Authors Section Start -->
        <section class="pb-15">
            <div class="max-w-[1170px] mx-auto px-4 sm:px-8 xl:px-0">
                <div class="flex flex-wrap items-center justify-between gap-8 mb-6">
                    <h2 class="font-semibold text-heading-5 text-dark">Top Authors</h2>
                    <a href="index.html#" class="group text-dark leading-none">
                        <span
                            class="flex items-center gap-2 bg-linear-to-r from-dark to-dark bg-[length:0px_1px] bg-left-bottom bg-no-repeat transition-[background-size] duration-500 hover:bg-[length:100%_3px] group-hover:bg-[length:100%_1px]">
                            All Authors

                            <svg class="fill-current group-hover:rotate-45 transition-all" width="18"
                                height="18" viewBox="0 0 18 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_675_6418)">
                                    <path
                                        d="M13.7734 3.59902L5.48035 3.53935C5.12237 3.53935 4.84395 3.81778 4.84395 4.17575C4.84395 4.53372 5.12237 4.81215 5.48035 4.81215L12.2222 4.87181L3.77003 13.3239C3.53138 13.5626 3.53138 13.9603 3.77003 14.199C4.00868 14.4376 4.42632 14.4575 4.66496 14.2189L13.1569 5.72696L13.2165 12.5483C13.2165 12.9063 13.495 13.1847 13.8529 13.1847C14.012 13.1847 14.1711 13.1052 14.2905 12.9859C14.4098 12.8665 14.4893 12.7074 14.4694 12.5284L14.4098 4.23541C14.4098 3.87744 14.1314 3.59902 13.7734 3.59902Z"
                                        fill="" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_675_6418">
                                        <rect width="18" height="18" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </span>
                    </a>
                </div>

                <div class="pt-14 border-t border-gray-3">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-y-11 gap-x-7.5">
                        <!-- Author Item -->
                        <a href="{{ route('author') }}" class="group">
                            <div
                                class="border border-gray-3 rounded-[20px] bg-gray p-5 group-hover:bg-white group-hover:drop-shadow-1 group-hover:-translate-y-2 transition-all">
                                <div class="flex flex-wrap items-center gap-8">
                                    <div class="w-25 h-25 rounded-full overflow-hidden">
                                        <img src="front/images/user-01.png" alt="user" />
                                    </div>

                                    <div>
                                        <h3 class="font-semibold text-custom-xl text-dark mb-1">
                                            Adrio Devid
                                        </h3>
                                        <p>Director of Operations</p>
                                        <span class="flex items-center gap-2 text-custom-sm mt-2.5">
                                            <svg class="fill-current" width="16" height="16"
                                                viewBox="0 0 16 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M5.775 14.4501H2.575C2.325 14.4501 2.125 14.2501 2.125 14.0001V2.00009C2.125 1.75009 2.325 1.55009 2.575 1.55009H8.225V4.75009C8.225 5.05009 8.475 5.32509 8.8 5.32509H11.975V7.00009C11.975 7.30009 12.225 7.57509 12.55 7.57509C12.875 7.57509 13.125 7.32509 13.125 7.00009V4.90009C13.125 4.62509 13 4.35009 12.8 4.15009L9.3 0.750091C9.1 0.550091 8.825 0.450091 8.55 0.450091H2.55C1.7 0.425091 1 1.15009 1 2.00009V14.0001C1 14.8501 1.7 15.5751 2.575 15.5751H5.8C6.1 15.5751 6.375 15.3251 6.375 15.0001C6.375 14.6751 6.1 14.4501 5.775 14.4501ZM9.325 2.35009L11.2 4.20009H9.325V2.35009Z"
                                                    fill="" />
                                                <path
                                                    d="M14.7996 9.40015C14.5996 9.20015 14.3996 9.00015 14.1996 8.80015C14.0246 8.62515 13.8496 8.42515 13.6496 8.25015C13.5496 8.12515 13.3996 8.02515 13.2246 8.00015C13.0246 7.97515 12.8246 8.02515 12.6746 8.15015L8.32461 12.4751C8.19961 12.6001 8.12461 12.7251 8.07461 12.8751L7.44961 14.7751L7.34961 15.0751L7.52461 15.3001C7.59961 15.4001 7.74961 15.5501 8.02461 15.5501H8.12461L10.0996 14.9001C10.2496 14.8501 10.3996 14.7751 10.4996 14.6501L14.7996 10.3751C14.9246 10.2501 14.9996 10.0751 14.9996 9.87515C14.9996 9.70015 14.9246 9.52515 14.7996 9.40015ZM13.1246 9.30015C13.2246 9.40015 13.3246 9.50015 13.3996 9.60015C13.4996 9.70015 13.5996 9.80015 13.6996 9.90015L13.4246 10.1751L12.8496 9.60015L13.1246 9.30015ZM9.72461 13.8501L8.84961 14.1251L9.12461 13.2501L12.0246 10.3501L12.5996 10.9251L9.72461 13.8501Z"
                                                    fill="" />
                                            </svg>
                                            03 Published posts
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <!-- Author Item -->
                        <a href="{{ route('author') }}" class="group">
                            <div
                                class="border border-gray-3 rounded-[20px] bg-gray p-5 group-hover:bg-white group-hover:drop-shadow-1 group-hover:-translate-y-2 transition-all">
                                <div class="flex flex-wrap items-center gap-8">
                                    <div class="w-25 h-25 rounded-full overflow-hidden">
                                        <img src="front/images/user-02.png" alt="user" />
                                    </div>

                                    <div>
                                        <h3 class="font-semibold text-custom-xl text-dark mb-1">
                                            Rayna Kenter
                                        </h3>
                                        <p>Content writer</p>
                                        <span class="flex items-center gap-2 text-custom-sm mt-2.5">
                                            <svg class="fill-current" width="16" height="16"
                                                viewBox="0 0 16 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M5.775 14.4501H2.575C2.325 14.4501 2.125 14.2501 2.125 14.0001V2.00009C2.125 1.75009 2.325 1.55009 2.575 1.55009H8.225V4.75009C8.225 5.05009 8.475 5.32509 8.8 5.32509H11.975V7.00009C11.975 7.30009 12.225 7.57509 12.55 7.57509C12.875 7.57509 13.125 7.32509 13.125 7.00009V4.90009C13.125 4.62509 13 4.35009 12.8 4.15009L9.3 0.750091C9.1 0.550091 8.825 0.450091 8.55 0.450091H2.55C1.7 0.425091 1 1.15009 1 2.00009V14.0001C1 14.8501 1.7 15.5751 2.575 15.5751H5.8C6.1 15.5751 6.375 15.3251 6.375 15.0001C6.375 14.6751 6.1 14.4501 5.775 14.4501ZM9.325 2.35009L11.2 4.20009H9.325V2.35009Z"
                                                    fill="" />
                                                <path
                                                    d="M14.7996 9.40015C14.5996 9.20015 14.3996 9.00015 14.1996 8.80015C14.0246 8.62515 13.8496 8.42515 13.6496 8.25015C13.5496 8.12515 13.3996 8.02515 13.2246 8.00015C13.0246 7.97515 12.8246 8.02515 12.6746 8.15015L8.32461 12.4751C8.19961 12.6001 8.12461 12.7251 8.07461 12.8751L7.44961 14.7751L7.34961 15.0751L7.52461 15.3001C7.59961 15.4001 7.74961 15.5501 8.02461 15.5501H8.12461L10.0996 14.9001C10.2496 14.8501 10.3996 14.7751 10.4996 14.6501L14.7996 10.3751C14.9246 10.2501 14.9996 10.0751 14.9996 9.87515C14.9996 9.70015 14.9246 9.52515 14.7996 9.40015ZM13.1246 9.30015C13.2246 9.40015 13.3246 9.50015 13.3996 9.60015C13.4996 9.70015 13.5996 9.80015 13.6996 9.90015L13.4246 10.1751L12.8496 9.60015L13.1246 9.30015ZM9.72461 13.8501L8.84961 14.1251L9.12461 13.2501L12.0246 10.3501L12.5996 10.9251L9.72461 13.8501Z"
                                                    fill="" />
                                            </svg>
                                            05 Published posts
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <!-- Author Item -->
                        <a href="{{ route('author') }}" class="group">
                            <div
                                class="border border-gray-3 rounded-[20px] bg-gray p-5 group-hover:bg-white group-hover:drop-shadow-1 group-hover:-translate-y-2 transition-all">
                                <div class="flex flex-wrap items-center gap-8">
                                    <div class="w-25 h-25 rounded-full overflow-hidden">
                                        <img src="front/images/user-03.png" alt="user" />
                                    </div>

                                    <div>
                                        <h3 class="font-semibold text-custom-xl text-dark mb-1">
                                            Talan Philips
                                        </h3>
                                        <p>Director of Operations</p>
                                        <span class="flex items-center gap-2 text-custom-sm mt-2.5">
                                            <svg class="fill-current" width="16" height="16"
                                                viewBox="0 0 16 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M5.775 14.4501H2.575C2.325 14.4501 2.125 14.2501 2.125 14.0001V2.00009C2.125 1.75009 2.325 1.55009 2.575 1.55009H8.225V4.75009C8.225 5.05009 8.475 5.32509 8.8 5.32509H11.975V7.00009C11.975 7.30009 12.225 7.57509 12.55 7.57509C12.875 7.57509 13.125 7.32509 13.125 7.00009V4.90009C13.125 4.62509 13 4.35009 12.8 4.15009L9.3 0.750091C9.1 0.550091 8.825 0.450091 8.55 0.450091H2.55C1.7 0.425091 1 1.15009 1 2.00009V14.0001C1 14.8501 1.7 15.5751 2.575 15.5751H5.8C6.1 15.5751 6.375 15.3251 6.375 15.0001C6.375 14.6751 6.1 14.4501 5.775 14.4501ZM9.325 2.35009L11.2 4.20009H9.325V2.35009Z"
                                                    fill="" />
                                                <path
                                                    d="M14.7996 9.40015C14.5996 9.20015 14.3996 9.00015 14.1996 8.80015C14.0246 8.62515 13.8496 8.42515 13.6496 8.25015C13.5496 8.12515 13.3996 8.02515 13.2246 8.00015C13.0246 7.97515 12.8246 8.02515 12.6746 8.15015L8.32461 12.4751C8.19961 12.6001 8.12461 12.7251 8.07461 12.8751L7.44961 14.7751L7.34961 15.0751L7.52461 15.3001C7.59961 15.4001 7.74961 15.5501 8.02461 15.5501H8.12461L10.0996 14.9001C10.2496 14.8501 10.3996 14.7751 10.4996 14.6501L14.7996 10.3751C14.9246 10.2501 14.9996 10.0751 14.9996 9.87515C14.9996 9.70015 14.9246 9.52515 14.7996 9.40015ZM13.1246 9.30015C13.2246 9.40015 13.3246 9.50015 13.3996 9.60015C13.4996 9.70015 13.5996 9.80015 13.6996 9.90015L13.4246 10.1751L12.8496 9.60015L13.1246 9.30015ZM9.72461 13.8501L8.84961 14.1251L9.12461 13.2501L12.0246 10.3501L12.5996 10.9251L9.72461 13.8501Z"
                                                    fill="" />
                                            </svg>
                                            10 Published posts
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!-- ======  Authors Section End -->

        <!-- ====== Newsletter Section Start -->
        <section class="py-12.5 bg-gray relative overflow-hidden z-10">
            <div class="absolute left-0 top-0 w-full h-full -z-1">
                <img src="front/images/bg-dots.svg" alt="dot" />
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
                                        <input id="email" type="email" name="email"
                                            placeholder="Enter your Email"
                                            class="rounded-md border border-gray-3 bg-white placeholder:text-dark-5 w-full py-3.5 px-5 outline-hidden focus:shadow-input focus:ring-2 focus:ring-dark-4/20 focus:border-transparent" />
                                    </div>
                                    <button
                                        class="font-medium rounded-md text-white bg-dark flex py-3.5 px-5.5 hover:opacity-90 transition-all ease-linear duration-300">
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
