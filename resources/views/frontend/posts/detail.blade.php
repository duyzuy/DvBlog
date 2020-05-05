@extends('frontend.app')

@section('content')

<main id="main" class="flex flex-grow pt-16">
<div class="container m-auto">
    <div class="flex flex-row flex-wrap w-full">
        <div class="w-full lg:w-2/3 p-4 flex items-center">
            <div class="post-main">
                <div class="post-content">
                    <article class="w-full mb-10">
                        <div class="flex items-center justify-between">
                            @php 
                                $i = 0;
                            @endphp
                        <p class="text-xs uppercase">Posted in 
                            @foreach($post->categories as $cat)

                                @if($i > 0)
                                    <a href=""><span class="text-theme">{{ ', ' . $cat->cat_name }}</span></a>
                                @else
                                    <a href=""><span class="text-theme">{{ $cat->cat_name }}</span></a>

                                @endif
                             
                                @php
                                    $i++;
                                @endphp
                            @endforeach
                            
                        </p>
                            <div class="flex items-center post-love"><span class="number-love text-sm text-gray-500 leading-none">34</span><button class="heart love_my_post">
                                <span class="icon icon-heart"><span class="path1"></span><span class="path2"></span></span>
                                <span class="icon icon-heart-1"></span>
                            </button>
                            </div>
                        </div>
                    
                            <h1 class="md:text-4xl text-2xl py-4 leading-tight font-bold hover:text-theme">
                                {{ $post->post_title }}</h1>
                            <div class="image-article rounded overflow-hidden shadow-lg">
                                @php 
                                    $url = @json_decode($post->image->url, true);
                                @endphp
                                <img class="w-full" src="{{ $url['original'] }}" alt="{{ $post->post_title }}">
                            </div>
                            <div class="py-4">
                               {!! $post->post_content !!}
                            </div>
                     
                            <div class="py-4">
                                @foreach($post->tags as $tag)
                                        <span class="inline-block mr-2"><a href="" class="text-theme">{{'#' . $tag->tag_name }}</a></span>
                                @endforeach

                              </div>
                            <div class="footer-article flex flex-row justify-center w-full rounded text-sm flex-wrap px-4 py-2">
                                <div class="post-date w-full md:w-1/2 text-center md:text-left">
                                    <p>Posted on <span class="text-theme">{{ date("jS F, Y", strtotime($post->created_at)) }}</span></p>
                                </div>
                                <div class="post-share w-full md:w-1/2">
                                    <ul class="socials-share flex justify-center md:justify-end opacity-50 hover:opacity-100">
                                        <li class="mr-3 hover:text-theme"><a href=""><i class="icon icon-twitter-share"></i>Twitter</a></li>
                                        <li class="mr-3 hover:text-theme"><a href=""><i class="icon icon-facebook-share"></i>Facebook</a></li>
                                        <li class="hover:text-theme"><a href=""><i class="icon icon-pinterest-share"></i>Pinterest</a></li>
                                    </ul>
                                </div>
                            </div>
                    </article>
                    
                </div>
                
            </div>
        </div>
        <div class="w-full lg:w-1/3 p-4 lg:pl-20 hidden lg:block">
          @include('frontend.includes/blog_sidebar')
        </div>
    </div>
    <div class="post-related w-full p-4">
        <h3 class="text-theme lg:text-3xl text-2xl font-bold mb-8">Posts Related</h3>
        <div class="flex flex-wrap -mx-3">
            @foreach($postRelated as $related)

            @php
                $url = @json_decode($related->image->url, true)
            @endphp
                <div class="w-full sm:w-1/2 lg:w-1/4 p-3 mb-6">
                    <a href="{{ route('frontend.postdetail', $related->post_slug) }}">
                        <div class="relative related-image rounded-lg shadow-lg overflow-hidden mb-3">
                            <img class="absolute w-full" src="{{ $url['thumbnail'] }}" alt="{{ $related->post_title }}">
                        </div>
                        <h2 class="font-bold text-sm hover:text-theme">{{ $related->post_title }}</h2>
                        @foreach ($related->categories as $cat)
                            
                        @endforeach
                    </a>
                </div>
            @endforeach
            
            
           
        </div>
    </div>
</div>
</main>


@endsection