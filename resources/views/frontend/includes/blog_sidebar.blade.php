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
        <h4 class="text-linear font-bold lg:text-3xl text-2xl mb-8">Recent post</h4>
        
        <ul>
            @foreach($postsRecent as $post)
            @php
                $url = @json_decode($post->image->url, true);
            @endphp
            <li class="max-w-sm w-full lg:max-w-full lg:flex mb-6">
                <a href="" class="w-full block">
                    <img src="{{ $url['thumbnail'] }}" class="rounded shadow w-16 h-16 object-cover float-left mr-4" alt="{{ $post->post_title }}">
                    <div class="post_content">
                            <h2 class="text-white font-bold mb-2 leading-tight hover:text-theme text-gray-300">{{ $post->post_title }}</h2>
                            <p class="text-xs text-gray-500"><span class="icon icon-clock mr-2"></span>{{ date("jS F, Y", strtotime($post->created_at)) }}</p>
                    </div>
                </a>
            </li>
            @endforeach                
        </ul>
    </aside>
</div>