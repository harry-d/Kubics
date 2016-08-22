$("#option-box-1").hover(function(){
    console.log('hello');
        $("#box-icon-1").animate({color:'#FF4500'},400);
        }, function(){
        $("#box-icon-1").animate({color:'#999'},400);
});
$("#option-box-2").hover(function(){
    console.log('hello');
        $("#box-icon-2").animate({color:'#FF4500'},400);
        $("#box-icon-25").animate({color:'#FF4500'},400);
        }, function(){
        $("#box-icon-2").animate({color:'#999'},400);
        $("#box-icon-25").animate({color:'#999'},400);
});
$("#option-box-3").hover(function(){
    console.log('hello');
        $("#box-icon-3").animate({color:'#FF4500'},400);
        }, function(){
        $("#box-icon-3").animate({color:'#999'},200);
});
