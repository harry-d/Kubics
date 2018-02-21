$( document ).ready(function() {

    currPic = 0;
    unclicked = true;
    $("#central-img").hide();
    $("#ontario-img").hide();
    $("#east-img").hide();
    $("#west-img").hide();
    $("#east-form").hide();
    $("#west-form").hide();
    $("#ontario-form").hide();

    $("#west-img").fadeIn();
    mapRestore();

    var h = $(window).height();
    $(".myiframe").height(h-280);

    $(window).resize(function(){
        var h = $(window).height();
        $(".myiframe").height(h-280);
    });


    $("#east").mouseenter(function(){
        mapHover("east");
        currPic = 3;
    }).mouseleave(mapRestore);
    $("#ontario").mouseenter(function(){
        mapHover("ontario");
        currPic = 2;
    }).mouseleave(mapRestore);
    $("#central").mouseenter(function(){
        mapHover("central");
        currPic = 1;
    }).mouseleave(mapRestore);
    $("#west").mouseenter(function(){
        mapHover("west");
        currPic = 0;
    }).mouseleave(mapRestore);

    $("#east").click(function(){
        $("#myModal").modal();
        $("#modaltxt").text("Registration for this region is now closed. Please email us at confederationcup2017@gmail.com for further information.");
    });
    $("#central").click(function(){
        $("#myModal").modal();
        $("#modaltxt").text("Registration for this region is now closed. Please email us at confederationcup2017@gmail.com for further information.");
    });
    $("#ontario").click(function(){
        unclicked = false;
        $("#register-map").fadeOut(1000);
        $("#h2-fadeout").fadeOut(1000);
        setTimeout(function(){
            $("#ontario-img").css("-webkit-filter","blur(5px)");
            $("#ontario-img").css("filter","blur(5px)");
            $("#ontario-form").fadeIn(1000);
        },1000);
    });
    $("#west").click(function(){
        unclicked = false;
        $("#register-map").fadeOut(1000);
        $("#h2-fadeout").fadeOut(1000);
        setTimeout(function(){
            $("#west-img").css("-webkit-filter","blur(5px)");
            $("#west-img").css("filter","blur(5px)");
            $("#west-form").fadeIn(1000);
        },1000);
    });


});
function mapHover(x){
    clearInterval(slideshow);
    $("#"+x+"-img").fadeIn();
    if (x=="west"){
        $("#central-img").fadeOut();
        $("#ontario-img").fadeOut();
        $("#east-img").fadeOut();
    }
    else if (x=="central"){
        $("#west-img").fadeOut();
        $("#ontario-img").fadeOut();
        $("#east-img").fadeOut();
    }
    else if (x=="ontario"){
        $("#west-img").fadeOut();
        $("#central-img").fadeOut();
        $("#east-img").fadeOut();
    }
    else{
        $("#west-img").fadeOut();
        $("#central-img").fadeOut();
        $("#ontario-img").fadeOut();
    }

    if (x=="east"||x=="central"){
        $("#"+x).css("fill","#d52a30");
        $("#"+x).css("fill-opacity","0.8");
    }
    else{
        $("#"+x).css("fill","#d52a30");
        $("#"+x).css("fill-opacity","0.8");
    }
}
function mapRestore(){
    if (unclicked){
        $("#east").css("fill","#fff");
        $("#east").css("fill-opacity","0.7");
        $("#ontario").css("fill","#fff");
        $("#ontario").css("fill-opacity","0.7");
        $("#central").css("fill","#fff");
        $("#central").css("fill-opacity","0.7");
        $("#west").css("fill","#fff");
        $("#west").css("fill-opacity","0.7");
        slideshow = setInterval(startSlideshow, 7000);
    }
}
function startSlideshow(){
    if (currPic==0){
        $("#central-img").fadeIn(1000);
        $("#west-img").fadeOut(1000);
    }
    else if (currPic==1){
        $("#ontario-img").fadeIn(1000);
        $("#central-img").fadeOut(1000);
    }
    else if (currPic==2){
        $("#east-img").fadeIn(1000);
        $("#ontario-img").fadeOut(1000);
    }
    else {
        $("#west-img").fadeIn(1000);
        $("#east-img").fadeOut(1000);
        currPic=-1;
    }
    currPic++;

}
