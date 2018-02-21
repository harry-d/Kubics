$( document ).ready(function() {
    console.log("ready!");
    var introHeight = $(".intro").height();
    var introWidth = $(".intro").width();
    var logoHeight = 0;
    var logoWidth = 0;
    var mapHeight = 0;
    var mapWidth = 0;

    $("body").css("overflow-x", "hidden");

    new WOW().init();
    $("#continue-i").hide();
    $("#continue-txt").hide();
    $("#signup-form").hide();
    $( "#continue-btn" ).hover(
        function() {
            $("#continue-i").fadeIn(400);
            $("#continue-txt").fadeIn(400);
        }, function() {
            $("#continue-txt").fadeOut(700);
        }
    );



    if (navigator.userAgent.match(/(iPhone|iPod|iPad|BlackBerry|IEMobile)/)) {
        $("#navbar").show();
        scrollPos = $("body").scrollTop();
        $("#intro-logo").css("opacity","1");
        $("#intro-logo").css("top",(introHeight)/2);
        $("#intro-logo").css("left",(introWidth)/2);
        $("#intro-logo").css("transform","translate(-50%,-50%)");

        $(window).resize(function(){
            introHeight = $(".intro").height();
            introWidth = $(".intro").width();
            $("#intro-logo").css("top",(introHeight)/2);
            $("#intro-logo").css("left",(introWidth)/2);
        });
    } else {

        setTimeout(function(){
            scrollPos = $("body").scrollTop();
            if(scrollPos > 10){
                $("#navbar").fadeIn(800);
            }
            logoHeight = $("#intro-logo").height();
            logoWidth = $("#intro-logo").width();
            $("#intro-logo").css("top",(introHeight-logoHeight)/2);
            $("#intro-logo").css("left",(introWidth-logoWidth)/2);
            $("#intro-logo").addClass("animated fadeInUp");
            setTimeout(function(){
                mapHeight = $("#map").height();
                mapWidth = $("#map").width();
                $("#map").css("top",(introHeight-mapHeight)/2);
                $("#map").css("left",(introWidth-mapWidth)/2);
                $("#map").css("top",(introHeight-mapHeight)/2 - scrollPos*2/3);
                $("#header-bg").css("top",-scrollPos/3);
                $("#map").addClass("animated fadeIn");
                setTimeout(function(){
                    $("#navbar").fadeIn(800);
                    $("#continue-i").fadeIn(2000);
                    $("#continue-i").addClass("animated");
                }, 800);
            }, 1000);
        },1000);
        $(window).scroll(function(){
            scrollPos = $("body").scrollTop();
            $("#map").css("top",(introHeight-mapHeight)/2 - scrollPos*2/3);
            $("#header-bg").css("top",-scrollPos/3);
        });
        $(window).resize(function(){
            introHeight = $(".intro").height();
            introWidth = $(".intro").width();
            logoHeight = $("#intro-logo").height();
            logoWidth = $("#intro-logo").width();
            $("#intro-logo").css("top",(introHeight-logoHeight)/2);
            $("#intro-logo").css("left",(introWidth-logoWidth)/2);
            scrollPos = $("body").scrollTop();
            mapHeight = $("#map").height();
            mapWidth = $("#map").width();
            $("#map").css("top",(introHeight-mapHeight)/2);
            $("#map").css("left",(introWidth-mapWidth)/2);
            $("#map").css("top",(introHeight-mapHeight)/2 - scrollPos*2/3);
            $("#header-bg").css("top",-scrollPos/3);
        });
    }

});
