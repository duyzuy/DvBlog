@extends('frontend.app')

@section('content')

    
    <div class="wrapper flex flex-wrap flex-row relative z-10">
        <div class="overlay z-0"></div>
        
        <section class="section-left w-full md:w-1/2 min-h-screen z-10 xl:p-20 xl:pr-0 xl:pt-0 lg:p-10 lg:pr-0 lg:pt-0 flex justify-between flex-col">
            @include('frontend.includes.header')
            <main id="main">
                <div class="home-left-content text-white p-4">
                    <p>Hi! i'm</p>
                    <h2 class="name">Duy</h2>
                    <p class="mb-4 text-justify">Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                        when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                    <p class="mb-4 text-justify">Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                    <p class="mb-4 js-text text-theme">KEEP CALM AND TRY HARD</p>
                    <p class="flex justify-end">
                            <button class="btn btn-link rounded p-2 px-8 rounded-lg">Read more</button>
                    </p>
                </div>
            </main>
            @include('frontend.includes.footer')
        </section>
        <section class="section-right w-full md:w-1/2 z-10 xl:pl-20 lg:pl-10">
            <div class="home-boxes flex flex-wrap h-full p-2">
                <div class="home-box-1 w-full sm:w-1/2 md:w-full lg:w-1/2 p-2 lg:mb-20">
                    <div class="home-box-wrap h-full rounded-lg flex items-end">
                        <div class="home-box-content px-6 py-6 md:pb-10 text-white">
                            <h3 class="md:text-4xl text-3xl">Wordpress</h3>
                            <ul>
                                <li>
                                    <a href="#" class="text-white">Theme development</a>
                                </li>
                                <li>
                                    <a href="#" class="text-white">Plugin development</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="home-box-2 w-full sm:w-1/2 md:w-full lg:w-1/2 p-2 lg:-mb-10">
                    <div class="home-box-wrap h-full rounded-lg flex items-end">
                        <div class="home-box-content px-6 py-6 md:pb-10 text-white">
                            <h3 class="lg:text-4xl text-3xl">Git</h3>
                            <ul>
                                <li><a href="" class="text-white">How to using git</a></li>
                                <li><a href="" class="text-white">Trick</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="home-box-3 w-full sm:w-1/2 md:w-full lg:w-1/2 p-2 lg:-mt-20">
                    <div class="home-box-wrap h-full rounded-lg flex items-end">
                        <div class="home-box-content px-6 py-6 md:pb-10 text-white">
                            <h3 class="lg:text-4xl text-3xl">Laravel</h3>
                            <ul>
                                <li><a href="" class="text-white">Tutorial</a></li>
                                <li><a href="" class="text-white">Laravel project</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="home-box-4 w-full sm:w-1/2 md:w-full lg:w-1/2 p-2 lg:mt-10">
                    <div class="home-box-wrap h-full rounded-lg flex items-end">
                        <div class="home-box-content px-6 py-6 md:pb-10 text-white">
                            <h3 class="lg:text-4xl text-3xl">UX/UI</h3>
                            <ul>
                                <li><a href="" class="text-white">My project</a></li>
                                <li><a href="" class="text-white"></a>Tools</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection