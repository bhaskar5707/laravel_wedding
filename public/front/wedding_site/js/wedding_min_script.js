!function(a){"use strict";function c(b){var c=[];a("#"+b+" .form-control").each(function(){var b=a(this).attr("name"),d=a(this).val();return a(this).css({border:"1px solid #c4c4c4"}),a(this).prop("required")&&""==d?(a(this).css({border:"2px solid red"}),a(this).focus(),!1):void(""==!d&&c.push("&"+b+"="+d))});var d=c.join(" ");a.ajax({method:"POST",url:"https://formspree.io/verothemes@gmail.com",data:d,dataType:"json",success:function(){a("#"+b).html("<div id='form_send_message'>Thank you for your request, we will contact you as soon as possible.</div>",1500)}})}function e(b){var c=0;b.each(function(){a(this).css("height","auto");var b=a(this).height();b>c&&(c=b)}),b.height(c)}var b=a("header .wed_logo_animation").attr("data-rotate");""!=b&&a("header .wed_logo_animation").addClass("wed_logo_rotate_"+b),a("header .wed_logo_animation").lettering(),a("header .wed_logo_animation span").each(function(){var b=0,c=50,d=Math.floor(Math.random()*(c-b+1)+b);a(this).css("transition-delay","0."+d+"s")}),a(".wed_particles").length>0&&a(".wed_particles").particleground({dotColor:"#fff",lineColor:"#fff",particleRadius:"3",lineWidth:"0.5"}),a(".jqueryFireFly").length>0&&a(".jqueryFireFly").each(function(){var b=a(this).attr("data-total"),c=a(this).attr("data-minPixel"),d=a(this).attr("data-maxPixel");a.firefly({minPixel:c,maxPixel:d,color:"none",total:b,twinkle:.9,on:".wed_firefly"})}),a("#bgndVideo").length>0&&a("#bgndVideo").YTPlayer(),a(".wed_timer").appear(function(){var b=a(this);b.countTo({from:0,to:b.html(),speed:1300,refreshInterval:60})}),a(".date_picker").datepicker(),a(".wed_form").validate({submitHandler:function(b){var d=a(b).attr("id");return c(d),!1}}),a(".lightbox").magnificPopup({type:"image",gallery:{enabled:!0}}),a(".video").magnificPopup({type:"iframe",iframe:{markup:'<div class="mfp-iframe-scaler"><div class="mfp-close"></div><iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe></div>',patterns:{youtube:{index:"youtube.com/",id:"v=",src:"http://www.youtube.com/embed/%id%?autoplay=1"},vimeo:{index:"vimeo.com/",id:"/",src:"http://player.vimeo.com/video/%id%?autoplay=1"},gmaps:{index:"//maps.google.",src:"%id%&output=embed"}},srcAction:"iframe_src"}}),a(".wed_slider_carousel").owlCarousel({navigation:!0,responsive:!0,responsiveRefreshRate:200,responsiveBaseElement:window,slideSpeed:200,addClassActive:!0,paginationSpeed:200,rewindSpeed:200,items:1,autoPlay:!1,touchDrag:!1,singleItem:!0,transitionStyle:"fade",navigationText:['<i class="ti ti-angle-left"></i>','<i class="ti ti-angle-right"></i>']}),a(".wed_team_slider").owlCarousel({navigation:!0,responsive:!0,responsiveRefreshRate:600,responsiveBaseElement:window,slideSpeed:1500,addClassActive:!0,paginationSpeed:700,rewindSpeed:3e3,items:3,itemsTablet:[1e3,2],itemsMobile:[569,1],itemsDesktop:3,autoPlay:!0,touchDrag:!1,navigationText:['<i class="ti ti-angle-left"></i>','<i class="ti ti-angle-right"></i>']}),a(".wed_services_slider").owlCarousel({navigation:!0,responsive:!0,responsiveRefreshRate:400,responsiveBaseElement:window,slideSpeed:400,addClassActive:!0,paginationSpeed:900,rewindSpeed:400,transitionStyle:"goDown",items:1,autoPlay:!0,singleItem:!0,autoHeight:!0,touchDrag:!1,navigationText:['<i class="ti ti-angle-left"></i>','<i class="ti ti-angle-right"></i>']}),a(".wed_team_slider_single").owlCarousel({navigation:!0,responsive:!0,responsiveRefreshRate:200,responsiveBaseElement:window,slideSpeed:200,addClassActive:!0,paginationSpeed:200,rewindSpeed:200,items:1,autoPlay:!0,singleItem:!0,autoHeight:!0,touchDrag:!1,navigationText:['<i class="ti ti-angle-left"></i>','<i class="ti ti-angle-right"></i>']}),a(".wed_shop_item_slider").owlCarousel({navigation:!0,responsive:!0,responsiveRefreshRate:200,responsiveBaseElement:window,slideSpeed:200,addClassActive:!0,paginationSpeed:200,rewindSpeed:200,singleItem:!0,autoPlay:!1,touchDrag:!1,navigationText:['<i class="ti ti-angle-left"></i>','<i class="ti ti-angle-right"></i>']}),a(".wed_slide_gallery").owlCarousel({navigation:!0,responsive:!0,responsiveRefreshRate:600,responsiveBaseElement:window,slideSpeed:1500,addClassActive:!0,paginationSpeed:700,rewindSpeed:3e3,items:3,itemsTablet:[1e3,2],itemsMobile:[569,1],itemsDesktop:3,autoPlay:!0,touchDrag:!1,navigationText:['<i class="ti ti-angle-left"></i>','<i class="ti ti-angle-right"></i>']}),a(".tweets-feed").each(function(a){jQuery(this).attr("id","tweets-"+a)}).each(function(a){function c(b){for(var c=b.length,d=0,e=document.getElementById("tweets-"+a),f='<ul class="slides">';d<c;)f+="<li>"+b[d]+"</li>",d++;return f+="</ul>",e.innerHTML=f,f}var b={id:jQuery("#tweets-"+a).attr("data-widget-id"),domId:"",maxTweets:1,enableLinks:!0,showUser:!0,showTime:!0,dateFunction:"",showRetweet:!1,customCallback:c};twitterFetcher.fetch(b)}),a(".wed_image_bck").each(function(){var b=a(this).attr("data-image"),c=a(this).attr("data-gradient"),d=a(this).attr("data-color"),e=a(this).attr("data-blend"),f=a(this).attr("data-opacity"),g=a(this).attr("data-position"),h=a(this).attr("data-height");b&&a(this).css("background-image","url("+b+")"),c&&a(this).css("background-image",c),d&&a(this).css("background-color",d),e&&a(this).css("background-blend-mode",e),g&&a(this).css("background-position",g),f&&a(this).css("opacity",f),h&&a(this).css("height",h)}),a(".wed_over, .wed_head_bck").each(function(){var b=a(this).attr("data-color"),c=a(this).attr("data-image"),d=a(this).attr("data-opacity"),e=a(this).attr("data-blend");b&&a(this).css("background-color",b),c&&a(this).css("background-image","url("+c+")"),d&&a(this).css("opacity",d),e&&a(this).css("mix-blend-mode",e)}),a(".wed_map_over").on("click",function(b){a(this).parents(".wed_section_outter, .wed_inside_map").toggleClass("active_map")}),a(".wed_top_menu_mobile_link").on("click",function(b){a(this).next(".wed_top_menu_cont").fadeToggle(),a(this).parents(".wed_light_nav").toggleClass("active")}),a(".wed_header_search").on({mouseenter:function(){a(this).find(".wed_header_search_cont, .wed_header_basket_cont").stop().fadeToggle()},mouseleave:function(){a(this).find(".wed_header_search_cont, .wed_header_basket_cont").stop().fadeToggle()}}),a(".wed_music_content").on("click",function(b){b.preventDefault(),a(this).next(".wed_iframe").toggleClass("active")}),a(".wed_go, .wed_top_menu_cont a").on("click",function(b){var c=a(this);a("html, body").stop().animate({scrollTop:a(c.attr("href")).offset().top},2300),b.preventDefault()}),a("div[data-animation=animation_blocks]").each(function(){var b=0;a(this).find(".wed_icon_box, .skill-bar-content, .wed_anim_box, .wed_bd, .wed_story_txt, .wed_portfolio_item_cont").each(function(){a(this).css("transition-delay","0."+b+"s"),b++})}),a(".increase-qty").on("click",function(b){var c=a(this).parents(".add-to-cart").find(".qty").val(),d=1*c+1;a(this).parents(".add-to-cart").find(".qty").val(d),b.preventDefault()}),a(".decrease-qty").on("click",function(b){var c=a(this).parents(".add-to-cart").find(".qty").val(),d=1*c-1;d<1&&(d=1),a(this).parents(".add-to-cart").find(".qty").val(d),b.preventDefault()});var d=a("header").height()-1;a("#nav-sidebar, .wed_top_menu_cont").onePageNav({currentClass:"current",changeHash:!1,scrollSpeed:700,scrollOffset:d,scrollThreshold:.5,filter:"",easing:"swing"}),a('[data-toggle="tooltip"]').tooltip(),a('[data-toggle="popover"]').popover(),a(window).scroll(function(){a(window).scrollTop()>100?(a(".wed_logo").addClass("active"),a("body").addClass("wed_first_step")):(a("body").removeClass("wed_first_step"),a(".wed_logo").removeClass("active")),a(window).scrollTop()>500?a("body").addClass("wed_second_step"):a("body").removeClass("wed_second_step"),a(window).scrollTop()>800?a("body").addClass("wed_third_step"):a("body").removeClass("wed_third_step")}),a(".wed_fixed").css("background-attachment","fixed"),a(".wed_parent").on({mouseenter:function(){a(this).find("ul").stop().fadeIn(300)},mouseleave:function(){a(this).find("ul").stop().fadeOut(300)}}),a(".wed_mobile_menu_content .wed_parent").on("click",function(b){a(this).find("ul").slideToggle(300)}),a(".wed_mobile_menu").on("click",function(b){a(this).toggleClass("active"),a(".wed_mobile_menu_hor").toggleClass("active")}),a(".wed_header_search span").on("click",function(b){a(this).next(".wed_header_search_cont").fadeToggle()}),device.tablet()||device.mobile()||a(".wed_auto_height").each(function(){e(a(this).find('div[class^="col"]'))}),device.tablet()&&device.landscape()&&a(".wed_auto_height").each(function(){e(a(this).find('div[class^="col"]'))}),a(window).resize(function(){device.tablet()||device.mobile()||a(".wed_auto_height").each(function(){e(a(this).find('div[class^="col"]'))}),device.tablet()&&device.landscape()&&a(".wed_auto_height").each(function(){e(a(this).find('div[class^="col"]'))})}),a(window).load(function(){if(a("body").imagesLoaded(function(){a(".wed_page_loader div").fadeOut(),a(".wed_page_loader").delay(200).fadeOut("slow")}),!device.tablet()&&!device.mobile()){skrollr.init({forceHeight:!1});a(window).stellar({horizontalScrolling:!1,responsive:!0})}a(".wed_countdown").each(function(){var b=a(this).attr("data-year"),c=a(this).attr("data-month"),d=a(this).attr("data-day");a(this).countdown({until:new Date(b,c-1,d)})});var c=a(".grid").isotope({itemSelector:".grid-item",percentPosition:!0,masonry:{columnWidth:".grid-item"}});c.imagesLoaded().progress(function(){c.isotope("layout")}),a(window).resize(function(){c.isotope("layout")}),a(".masonry").masonry({itemSelector:".masonry-item"}),a(".filter-button-group").on("click","a",function(){a(this).parents(".filter-button-group").find("a").removeClass("active"),a(this).addClass("active");var b=a(this).attr("data-filter");c.isotope({filter:b})})})}(jQuery);