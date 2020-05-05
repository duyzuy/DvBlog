@extends('frontend.app')

@section('content')

<main id="main" class="flex flex-grow pt-16">
    <div class="container m-auto">
        <div class="flex flex-row flex-wrap">
            <div class="w-full lg:w-2/3 p-4 flex items-center">
                <div class="page-main">
                    <div class="page-header mb-10">
                        <h1 class="text-linear text-5xl md:text-6xl font-bold">Blog</h1>
                    </div>
                    <div class="page-content">
                        @foreach($posts as $post)

                        <article class="w-full mb-20">
                            <p class="text-xs uppercase">Posted in 
                                @php 
                                        $i = 0;
                                @endphp
                                @foreach($post->categories as $cat)
                                    
                                    @if($i > 0)
                                    
                                        <span class="text-theme"> {{', ' .$cat->cat_name  }} </span>
                                    </a>
                                    @else
                                    <a href="">
                                        <span class="text-theme"> {{ $cat->cat_name }} </span>
                                    </a>
                                    @endif

                                    @php
                                        $i++;
                                    @endphp
                                @endforeach

                            </p>
                            <a href="{{ route('frontend.postdetail', $post->post_slug) }}">
                                <h3 class="md:text-4xl text-2xl py-4 leading-tight font-bold hover:text-theme">{!! $post->post_title !!}</h3>
                                <div class="image-article rounded overflow-hidden shadow-lg">
                                  @php 
                                    $url = @json_decode($post->image->url, true); 
                                  @endphp
                                    <img class="w-full" src="{{ $url['original'] }}" alt="{{ $post->post_title }}">
                                </div>
                                <div class="py-4">
                                    <p class="text-gray-300 leading-relaxed">
                                      {!! $post->post_excerpt  !!} 
                                    </p>
                                </div>
                            </a>
                                <div class="py-4">
                                    @foreach($post->tags as $tag)
                                        <span class="inline-block mr-2"><a href="" class="text-theme">{{ '#' . $tag->tag_name }}</a></span>
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

                        @endforeach
                     
                        
                    </div>
                    
                    <div class="page-pagination">
                        {{  $posts->links()  }}
                    </div>
                </div>
            </div>
            <div class="w-full lg:w-1/3 p-4 lg:pl-20 hidden lg:block">
               @include('frontend.includes/blog_sidebar')
            </div>
        </div>
    </div>
</main>

@endsection