

$( document ).ready(function() {
    console.log("ready!");
    $("body").css("overflow-x", "hidden");
    new WOW().init();


    $("#option-box-1").click(function(){
        $("#option-box-2").removeClass("active");
        $("#option-box-3").removeClass("active");

        $("#option-box-1").addClass("active");

        $("#size-sel").fadeOut(300);
        $("#checkout-sel").fadeOut(300);

        $("#colour-sel").fadeIn(300);
    });

    $("#option-box-2").click(function(){
        $("#option-box-1").removeClass("active");
        $("#option-box-3").removeClass("active");

        $("#colour-sel").fadeOut(300);
        $("#checkout-sel").fadeOut(300);

        $("#size-sel").fadeIn(300);
    });

    $("#option-box-3").click(function(){
        $("#option-box-1").removeClass("active");
        $("#option-box-3").removeClass("active");

        $("#colour-sel").fadeOut(300);
        $("#size-sel").fadeOut(300);

        $("#checkout-sel").fadeIn(300);
    });


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
