(function($){


    $('.nav-humberger').on('click', function(){
        $('body').toggleClass('nav_active');
    })

    window.onclick = function(e){
       
        if(e.target.className === 'menu_overlay'){
            $('body').removeClass('nav_active');
        }
    }

    $('.love_my_post').on('click', function(){
        $(this).addClass('adding');
        setInterval(() => {
            $(this).addClass('loved');
            $(this).removeClass('adding');
        }, 1500);
    })
    

    // var navHeader = $('header#header'); 
    // var firstHeaderOffest = navHeader.offset().top;
    // var headerHeight = navHeader.innerHeight();
    // var lastScroll = 0;
    // $(window).scroll(function(e){

    //     var windowScroll = $(window).scrollTop();
    //     if(windowScroll > headerHeight && windowScroll > lastScroll){
    //         if( !navHeader.hasClass('sticky')){
    //                 navHeader.addClass('sticky');
    //         }

    //         console.log('down');

    //         //update header offset top
    //         headerOffest = navHeader.offset().top;
           
            
    //     } else if(windowScroll <= lastScroll && windowScroll < headerOffest){
    //         if(navHeader.hasClass('sticky')){
    //             navHeader.removeClass('sticky');
    //         }
    //         console.log('up')
            
    //     }
    //     lastScroll = windowScroll;
        
    // })

    
   

})(jQuery)