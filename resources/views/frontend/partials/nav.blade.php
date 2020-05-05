<nav class="flex items-center justify-between flex-wrap m-auto py-2 px-6">
    <div class="flex items-center flex-shrink-0 text-white mr-6">
        <a href="{{ route('frontend.home') }}" title="Dvblog">
            <svg id="logo" class="fill-current h-12 w-12 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 51.23">
                <defs>
                    <style>.cls-1{fill:transparent;}.cls-2{fill:none;stroke:#fff;stroke-width:2px;}</style>
                </defs>
                <path class="cls-1" d="M17.85,16h7.47a11.2,11.2,0,0,1,5.22,1,6,6,0,0,1,2.82,3.3,17.8,17.8,0,0,1,.87,6.18,17.91,17.91,0,0,1-.87,6.21A5.83,5.83,0,0,1,30.57,36a11.28,11.28,0,0,1-5.25,1H17.85Zm7.47,19.26a8,8,0,0,0,4-.84,5,5,0,0,0,2.13-2.76,16.22,16.22,0,0,0,.66-5.13,15.56,15.56,0,0,0-.69-5.13,5,5,0,0,0-2.13-2.79,7.68,7.68,0,0,0-3.93-.87H20V35.26Z" transform="translate(0 -0.38)"/>
                <path class="cls-2" d="M47,27V14.82a3,3,0,0,0-1.61-2.66l-20-10.43a3,3,0,0,0-2.78,0l-20,10.43A3,3,0,0,0,1,14.82V37.18a3,3,0,0,0,1.61,2.66l20,10.43a3,3,0,0,0,2.78,0l20-10.43A3,3,0,0,0,47,37.18Z" transform="translate(0 -0.38)"/>
            </svg>
        </a>
    </div>
    <div class="block lg:hidden icon-menu-humberger">
        <div class="nav-humberger">
            <span class="line-1"></span>
            <span class="line-2"></span>
            <span class="line-3"></span>
        </div>
    </div>
    <div class="w-full hidden flex-grow lg:flex lg:items-center lg:w-auto justify-end">
        <ul class="text-base">
            <li class="block mt-4 lg:inline-block lg:mt-0 text-white hover:text-theme mr-4">
                <a href="#responsive-header">
                    About me
                </a>
            </li>
        <li class="block mt-4 lg:inline-block lg:mt-0 text-white hover:text-theme mr-4">
            <a href="#responsive-header">
            Portfolio
            </a></li>
            <li class="block mt-4 lg:inline-block lg:mt-0 text-white hover:text-theme mr-4">
                <a href="{{ route('frontend.blog') }}">
                Blog
                </a></li>
            <li class="block mt-4 lg:inline-block lg:mt-0 text-white hover:text-theme mr-4"> 
                <a href="#responsive-header">
                Contact
                </a>
            </li>
        </ul>
    </div>
</nav> 