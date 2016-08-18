

$( document ).ready(function() {
    console.log("ready!");
    $("body").css("overflow-x", "hidden");
    new WOW().init();

    $("#continue-i").hide();
    $("#continue-txt").hide();
    $( "#continue-btn" ).hover(
        function() {
            $("#continue-i").fadeIn(400);
            $("#continue-txt").fadeIn(400);
        }, function() {
            $("#continue-txt").fadeOut(700);
        }
    );

    var headerVid = document.getElementById("header-video");
    headerVid.ontimeupdate = function() {
        if (headerVid.currentTime > 1.6){
            $("#intro-head").addClass("animated fadeInDown");
            window.setTimeout(function(){
                $("#intro-p").addClass("animated fadeInDown");
            }, 1200);

        }
        if (headerVid.currentTime > 3.8){
            $("#continue-i").fadeIn(2000);
            $("#continue-i").addClass("animated");
            window.setTimeout(function(){
                headerVid.pause();
            }, 1500);
        }
    };

});
