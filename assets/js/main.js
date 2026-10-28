$(document).ready(function(){

    document.addEventListener("touchstart",function(){},!0);
    $(".fixed-single-content .items").theiaStickySidebar({
        additionalMarginTop: 30
    });
    $(window).resize(function(){
       if ($(window).width() < 992) {
           $("single-project").removeClass("fixed-single-content");
       }
    });

	$(window).load(function(){
		$(".masonry").isotope({
	        itemSelector: ".section"
	    });
	});
	 $("#owl-example2").owlCarousel({
            items : 6,
            autoPlay : true,
            navigation : false,
            pagination : false,
            paginationNumbers: false,
            responsive: true,
            responsiveRefreshRate : 200,
            responsiveBaseWidth: window,
            baseClass : "owl-carousel",
            theme : "owl-theme",
            lazyLoad : false,
            lazyFollow : true,
            lazyEffect : "fade"
        });

        $(window).load(function(){
            var $menu = $('header ul'),
            $menuTrigger = $('.menu-item-has-children > a');
            $menuTrigger.on("click",function(e) {
                e.stopPropagation();
                e.preventDefault();
                var $this = $(this);
                $this.toggleClass("active").next('ul').slideToggle("fast");
            });
        });

        $("#menu").slicknav();
});
