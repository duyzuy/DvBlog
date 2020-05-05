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
                                    <p class="text-xs uppercase">Posted in <a href=""><span class="text-theme">Wrodpress</span></a></p>
                                        <div class="flex items-center post-love"><span class="number-love text-sm text-gray-500 leading-none">34</span><button class="heart love_my_post">
                                            <span class="icon icon-heart"><span class="path1"></span><span class="path2"></span></span>
                                            <span class="icon icon-heart-1"></span>
                                        </button>
                                        </div>
                                    </div>
                                    <a href="#">
                                        <h1 class="md:text-4xl text-2xl py-4 leading-tight font-bold hover:text-theme">The first blog post with wordpress, how to be come developer</h1>
                                        <div class="image-article rounded overflow-hidden shadow-lg">
                                            <img class="w-full" src="assets/images/posts/post_1.png" alt="Sunset in the mountains">
                                        </div>
                                        <div class="py-4">
                                            <p class="text-gray-300 leading-relaxed">
                                              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.
                                            </p>
                                            <p class="text-gray-300 leading-relaxed">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.
                                              </p>
                                              <p class="text-gray-300 leading-relaxed">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.
                                              </p>
                                              <p class="text-gray-300 leading-relaxed">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.
                                              </p>
                                              <p class="text-gray-300 leading-relaxed">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.
                                              </p>
                                              <p class="text-gray-300 leading-relaxed">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.
                                              </p>
                                              <p class="text-gray-300 leading-relaxed">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.
                                              </p>
                                              <p class="text-gray-300 leading-relaxed">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.
                                              </p>
                                        </div>
                                    </a>
                                        <div class="py-4">
                                            <span class="inline-block mr-2"><a href="" class="text-theme">#Series wordpress theme development</a></span>
                                            <span class="inline-block mr-2"><a href="" class="text-theme">#wordpress</a></span>
                                            <span class="inline-block mr-2"><a href="" class="text-theme">#beginner</a></span>
                                          </div>
                                        <div class="footer-article flex flex-row justify-center w-full rounded text-sm flex-wrap px-4 py-2">
                                            <div class="post-date w-full md:w-1/2 text-center md:text-left">
                                                <p>Posted on <span class="text-theme">March 16, 2020</span></p>
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
                       <div class="wrap-sidebar">
                        <aside class="mb-12">
                            <form class="w-full search-form">
                                <div class="flex items-center rounded-lg input-search">
                                  <input class="appearance-none bg-transparent border-none w-full py-1 px-2 leading-tight focus:outline-none" type="text" placeholder="Search ..." aria-label="Search">
                                  <button class="flex-shrink-0 border-transparent text-2xl py-1 px-2 rounded" type="button">
                                    <span class="icon icon-search"><span class="path1"></span><span class="path2"></span></span>
                                  </button>
                                  
                                </div>
                              </form>
                           </aside>
                           <aside>
                               <h4 class="text-theme font-bold lg:text-3xl text-2xl mb-10">Recent post</h4>
                               <ul>
                                   <li class="max-w-sm w-full lg:max-w-full lg:flex mb-6">
                                       <a href="" class="w-full block">
                                           <img src="assets/images/posts/post_1.png" class="rounded shadow w-16 h-16 object-cover float-left mr-4" alt="">
                                           <div class="">
                                                <h2 class="text-white font-bold mb-2 leading-tight hover:text-theme">Can coffee make you a better developer?</h2>
                                                <p class="text-xs text-gray-500"><span class="icon icon-clock mr-2"></span>Match 16, 2020</p>
                                           </div>
                                       </a>
                                    </li>
                                    <li class="max-w-sm w-full lg:max-w-full lg:flex mb-6">
                                        <a href=""  class="w-full block">
                                            <img src="assets/images/posts/post_2.png" class="rounded shadow w-16 h-16 object-cover float-left mr-4" alt="">
                                            <div class="">
                                                 <h2 class="text-white font-bold mb-2 leading-tight hover:text-theme">Can coffee make you a better developer?</h2>
                                                 <p class="text-xs text-gray-500"><span class="icon icon-clock mr-2"></span>Match 16, 2020</p>
                                            </div>
                                        </a>
                                     </li>
                                     <li class="max-w-sm w-full lg:max-w-full lg:flex mb-6">
                                        <a href=""  class="w-full block">
                                            <img src="assets/images/posts/post_3.jpeg" class="rounded shadow w-16 h-16 object-cover float-left mr-4" alt="">
                                            <div class="">
                                                 <h2 class="text-white font-bold mb-2 leading-tight hover:text-theme">Can coffee make you a better developer?</h2>
                                                 <p class="text-xs text-gray-500"><span class="icon icon-clock mr-2"></span>Match 16, 2020</p>
                                            </div>
                                        </a>
                                     </li>
                                     <li class="max-w-sm w-full lg:max-w-full lg:flex mb-6">
                                        <a href=""  class="w-full block">
                                            <img src="assets/images/posts/post_4.jpg" class="rounded shadow w-16 h-16 object-cover float-left mr-4" alt="">
                                            <div class="">
                                                 <h2 class="text-white font-bold mb-2 leading-tight hover:text-theme">Can coffee make you a better developer?</h2>
                                                 <p class="text-xs text-gray-500"><span class="icon icon-clock mr-2"></span>Match 16, 2020</p>
                                            </div>
                                        </a>
                                     </li>
                               </ul>
                               
                           </aside>
                       </div>
                    </div>
                </div>
                <div class="post-related w-full p-4">
                    <h3 class="text-theme lg:text-3xl text-2xl font-bold mb-8">Posts Related</h3>
                    <div class="flex flex-wrap -mx-3">
                        <div class="w-full sm:w-1/2 lg:w-1/4 p-3 mb-6">
                            <a href="">
                                <div class="relative related-image rounded-lg shadow-lg overflow-hidden mb-3">
                                    <img class="absolute w-full" src="assets/images/posts/post_1.png" alt="Sunset in the mountains">
                                </div>
                                <h2 class="font-bold text-sm hover:text-theme">XP-Pen Artist 12 Pro Review and International Giveaway!</h2>
                            </a>
                        </div>
                        <div class="w-full sm:w-1/2 lg:w-1/4 p-3 mb-6">
                            <a href="">
                                <div class="relative related-image  rounded-lg shadow-lg overflow-hidden mb-3">
                                    <img class="absolute w-full" src="assets/images/posts/post_2.png" alt="Sunset in the mountains">
                                </div>
                                <h2 class="font-bold text-sm hover:text-theme">XP-Pen Artist 12 Pro Review and International Giveaway!</h2>
                            </a>
                        </div>
                        <div class="w-full sm:w-1/2 lg:w-1/4 p-3 mb-6">
                            <a href="">
                                <div class="relative related-image  rounded-lg shadow-lg overflow-hidden mb-3">
                                    <img class="absolute w-full" src="assets/images/posts/post_3.jpeg" alt="Sunset in the mountains">
                                </div>
                                <h2 class="font-bold text-sm hover:text-theme">XP-Pen Artist 12 Pro Review and International Giveaway!</h2>
                            </a>
                        </div>
                        <div class="w-full sm:w-1/2 lg:w-1/4 p-3 mb-6">
                            <a href="">
                                <div class="relative related-image  rounded-lg shadow-lg overflow-hidden mb-3">
                                    <img class="absolute w-full" src="assets/images/posts/post_4.jpg" alt="Sunset in the mountains">
                                </div>
                                <h2 class="font-bold text-sm hover:text-theme">XP-Pen Artist 12 Pro Review and International Giveaway!</h2>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
  

@endsection