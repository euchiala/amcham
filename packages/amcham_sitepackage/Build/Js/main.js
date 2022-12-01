$(function () {
    filterPartners();
    toggleMenu();
    quoteSlider();
    formsStyle();
    stickyMenu();
    Accrodion();
    hides() ; 
});

function toggleMenu() {
    $('.icon-menu').on('click', function (e) {
        $('body').toggleClass('no-scroll');
        $(this).toggleClass('open');
        $(".navbar-menu").toggleClass('open');
    });
}

// sticky menu 
function stickyMenu() {
    let navbar = $("header");
    let navPos = 0;
    window.addEventListener("scroll", e => {
        let scrollPos = window.scrollY;
        if (scrollPos > navPos) {
            navbar.addClass('sticky');
        } else {
            navbar.removeClass('sticky');
        }
    });
}

function Accrodion() {
    $(".accordion-element").each(function() {
        $(this).find(".bodytext-accordion").hide();
        $(this).find(".accordion-header").click(function(){
            $(this).toggleClass("active");
            $(this).next()
                .slideToggle()
                .parent()
                .siblings()
                .children(".bodytext-accordion:visible")
                .slideUp();
            $(this).next()
                .parent()
                .siblings()
                .children(".accordion-header")
                .removeClass('active')
        });
    });
}
function hides() {
    
    cat = $('#cats').val();
    if (cat!=2){
        $('.lm').hide();
    }
    else {
        $('.lm').show();
    }

}
/* Slider Quote Config */
function quoteSlider() {
    $('.quote-slider').slick({
        infinite: true,
        dots: true,
        arrows: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        centerMode: false,
        autoplay: true,
        autoplaySpeed: 5000,
        responsive: [{
                breakpoint: 1439,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 5000,
                }
            },
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 960,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots: true,
                    centerPadding: '0',
                    arrows: false,
                }
            }
        ]
    });
}
function filterPartners() {
    $(document).on('click', '.btn-border', function (e) {
       $('.btn-border').removeClass("active");
       $(this).addClass("active") ;  
       
        url = $('#uri_hidden').val();
        cat = $(this).attr('id') ; 
        console.log(cat+"categorie") ; 
        if (cat!=2){
            $('.lm').hide();
        }
        else {
            $('.lm').show();
        }
       
        val =$(this).attr('name') ;      
            
     
        var allData = {
            'tx_ttaddress_listview[category]': cat , 
            'tx_ttaddress_listview[settings]': $('#address_settings').val()
        };
        $.ajax({
            type: 'POST',
            url: url,
            data: allData,
            success: function (data) {
                
             
             $(".tx-ttaddress").find('.part_list').empty();
            $(".tx-ttaddress .part_list").append($(data).find('.part_list').html());
                   
        },
       
            error: function (jqXHR, textStatus, errorThrow) {
                console.log(errorThrow);
            }
        });

        // $(".tx_comp .projects").stop().animate({
        //     'opacity': 0.2
        // }, 150);

  
    });
    $(document).on('click', '.lm', function (e) {

        url = $('#uri_hidden').val();
        var allData = {
            'tx_ttaddress_listview[load]' : true , 
            'tx_ttaddress_listview[category]': 2 ,
            'tx_ttaddress_listview[settings]': $('#address_settings').val()
        };

        // $(".tx_comp .projects").stop().animate({
        //     'opacity': 0.2
        // }, 150);

        $.ajax({
            type: 'POST',
            url: url,
            data: allData,
            success: function (data) {
                $('.btn.lm').hide();
                $(".tx-ttaddress .part_list").append($(data).find('.part_list').html());
                },
            
            error: function (jqXHR, textStatus, errorThrow) {
                console.log(errorThrow);
            }
        });
    });
}
