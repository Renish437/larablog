<section class="pt-20 lg:pt-25 pb-15">
    <div class="max-w-[1170px] mx-auto px-4 sm:px-8 xl:px-0">
        <!-- Section title -->
        <div class="mb-12.5 text-center">
            <h2 class="text-dark mb-3.5 text-2xl font-bold sm:text-4xl xl:text-heading-3">
                Browse by Category
            </h2>
            <p>Select a category to see more related content</p>
        </div>

        <div x-data="{ selectedCategory: '{{ $selectedCategory }}', activeClass: 'bg-dark border-dark text-white', inactiveClass: 'bg-gray border-gray-3 text-dark' }">
            <!-- Blog Categories Tab Start -->
            <div class="flex flex-wrap justify-center gap-4 items-center mb-15">
                <button @click="selectedCategory = 'All'"
                    class="rounded-full border py-2.5 px-4.5 font-medium hover:bg-dark hover:border-dark hover:text-white ease-in duration-200"
                    :class="selectedCategory === 'All' ? activeClass : inactiveClass">
                    All ({{ $allPosts->count() }})
                </button>
                @foreach ($pcategories as $pcategory)
                    <button @click="selectedCategory = '{{ $pcategory->id }}'"
                        class="rounded-full border py-2.5 px-4.5 font-medium hover:bg-dark hover:border-dark hover:text-white ease-in duration-200"
                        :class="selectedCategory === '{{ $pcategory->id }}' ? activeClass : inactiveClass">
                        {{ $pcategory->name }} ({{ $postsByCategory[$pcategory->id]->count() }})
                    </button>
                @endforeach
            </div>
            <!-- Blog Categories Tab End -->

            <!-- Blog Categories Content Start -->
            <div>
                <!-- All content start -->
                <div x-show="selectedCategory === 'All'">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-y-11 gap-x-7.5">
                        @foreach ($allPosts->take(8) as $post)
                            <div class="group">
                                <div class="mb-6 overflow-hidden rounded-[10px] transition-all group-hover:scale-102">
                                    <a href="{{ route('blog',$post->slug) }}">
                                        <img src="{{ $post->thumbnail_url  }}"
                                            alt="{{ $post->title }}" class="w-full h-48 object-cover object-center" />
                                    </a>
                                </div>

                                <h3>
                                    <a href="{{ route('blog',$post->slug) }}" class="block text-dark font-bold text-xl mb-3.5">
                                        <span class="bg-linear-to-r from-primary/50 to-primary/40 bg-[length:0px_10px] bg-left-bottom bg-no-repeat transition-[background-size] duration-500 hover:bg-[length:100%_3px] group-hover:bg-[length:100%_10px]">
                                            {{ $post->title }}
                                        </span>
                                    </a>
                                </h3>
                                <p class="text-body text-base leading-6">
                                    {!! Str::limit(strip_tags($post->content), 50) !!}
                                </p>

                                <div class="flex flex-wrap gap-3 items-center justify-between mt-4.5">
                                    <div class="flex items-center gap-2.5">
                                        <a href="{{ route('author',$post->user->id) }}" class="flex items-center gap-3">
                                            <div class="flex w-6 h-6 rounded-full overflow-hidden">
                                                <img src="{{ $post->user->picture }}" alt="{{ $post->user->name }}" />
                                            </div>
                                            <p class="text-sm">{{ $post->user->name }}</p>
                                        </a>
                                        <span class="flex w-[3px] h-[3px] rounded-full bg-dark-2"></span>
                                        <p class="text-sm">{{ $post->created_at->diffForHumans() }}</p>
                                    </div>
                                    <a href="{{ route('category.show', $post->category->slug) }}"
                                        class="inline-flex text-blue bg-blue/[0.08] font-medium text-sm py-1 px-3 rounded-full">
                                        {{ $post->category->name ?? 'Uncategorized' }}
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- All content end -->

                <!-- Parent Category content start -->
                @foreach ($pcategories as $pcategory)
                    <div x-show="selectedCategory === '{{ $pcategory->id }}'">
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-y-11 gap-x-7.5">
                            @foreach ($postsByCategory[$pcategory->id]->take(8) as $post)
                                <div class="group">
                                    <div class="mb-6 overflow-hidden rounded-[10px] transition-all group-hover:scale-102">
                                        <a href="{{ route('blog',$post->slug) }}">
                                            <img  src="{{ $post->thumbnail_url  }}"
                                                alt="{{ $post->title }}" class="w-full h-48 object-cover object-center" />
                                        </a>
                                    </div>

                                    <h3>
                                        <a href="{{ route('blog',$post->slug) }}" class="block text-dark font-bold text-xl mb-3.5">
                                            <span class="bg-linear-to-r from-primary/50 to-primary/40 bg-[length:0px_10px] bg-left-bottom bg-no-repeat transition-[background-size] duration-500 hover:bg-[length:100%_3px] group-hover:bg-[length:100%_10px]">
                                                {{ $post->title }}
                                            </span>
                                        </a>
                                    </h3>
                                    <p class="text-body text-base leading-6">
                                        {!! Str::limit($post->content, 50) !!}
                                    </p>

                                    <div class="flex flex-wrap gap-3 items-center justify-between mt-4.5">
                                        <div class="flex items-center gap-2.5">
                                            <a href="{{ route('author',$post->user->id) }}" class="flex items-center gap-3">
                                                <div class="flex w-6 h-6 rounded-full overflow-hidden">
                                                    <img src="{{ $post->user->picture }}" alt="{{ $post->user->name }}" />
                                                </div>
                                                <p class="text-sm">{{ $post->user->name }}</p>
                                            </a>
                                            <span class="flex w-[3px] h-[3px] rounded-full bg-dark-2"></span>
                                            <p class="text-sm">{{ $post->created_at->diffForHumans() }}</p>
                                        </div>
                                        <a href="{{ route('category.show', $post->category->slug) }}"
                                            class="inline-flex text-blue bg-blue/[0.08] font-medium text-sm py-1 px-3 rounded-full">
                                            {{ $post->category->name ?? 'Uncategorized' }}
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
                <!-- Parent Category content end -->
            </div>
            <!-- Blog Categories Content End -->

            <!-- Blog Show More BTN -->
            <button
                class="flex justify-center font-medium text-dark border border-dark rounded-md py-3 px-7.5 hover:bg-dark hover:text-white ease-in duration-200 mx-auto mt-12.5 lg:mt-17.5">
                Browse all Posts
            </button>
        </div>
    </div>
</section>