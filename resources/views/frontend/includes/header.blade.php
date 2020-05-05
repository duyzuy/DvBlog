
@if(Route::currentRouteName() !== 'frontend.home')

<header id="header" class="p-4 w-full sticky">
    <div class="wrap-header rounded-lg container m-auto">
        @include('frontend.partials.nav')
    </div>  
</header>
@else

<header id="header" class="p-4 mb-16">
    <div class="wrap-header rounded-lg">
        @include('frontend.partials.nav')
    </div>  
</header>

@endif