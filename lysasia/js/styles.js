jQuery(document).ready(function($){

// MgicLine Navigation
$(function() {
    var $el, leftPos, newWidth;
    
    /* Add Magic Line markup via JavaScript, because it ain't gonna work without */
    $("#line").append("<li id='magic-line'></li>");
    
    /* Cache it */
    var $magicLine = $("#magic-line");
    
    if($('#line li').hasClass('current-page-ancestor')) {
        $magicLine
            .width($(".current-page-ancestor").width())
            .css("left", $(".current-page-ancestor a").position().left)
            .data("origLeft", $magicLine.position().left)
            .data("origWidth", $magicLine.width());
            
        $("#line li").find("a").hover(function() {
            $el = $(this);
            leftPos = $el.position().left;
            newWidth = $el.parent().width();
            
            $magicLine.stop().animate({
                left: leftPos,
                width: newWidth
            });
        }, function() {
            $magicLine.stop().animate({
                left: $magicLine.data("origLeft"),
                width: $magicLine.data("origWidth")
            });    
        }); 
    } else if($('#line li').hasClass('current-menu-item')) {
        $magicLine
            .width($(".current-menu-item").width())
            .css("left", $(".current-menu-item a").position().left)
            .data("origLeft", $magicLine.position().left)
            .data("origWidth", $magicLine.width());
            
        $("#line li").find("a").hover(function() {
            $el = $(this);
            leftPos = $el.position().left;
            newWidth = $el.parent().width();
            
            $magicLine.stop().animate({
                left: leftPos,
                width: newWidth
            });
        }, function() {
            $magicLine.stop().animate({
                left: $magicLine.data("origLeft"),
                width: $magicLine.data("origWidth")
            });    
        }); 
    } else {
        $magicLine
            .width($(".menu-item-98").width())
            .css("left", $(".menu-item-98 a").position().left)
            .data("origLeft", $magicLine.position().left)
            .data("origWidth", $magicLine.width());
            
        $("#line li").find("a").hover(function() {
            $el = $(this);
            leftPos = $el.position().left;
            newWidth = $el.parent().width();
            
            $magicLine.stop().animate({
                left: leftPos,
                width: newWidth
            });
        }, function() {
            $magicLine.stop().animate({
                left: $magicLine.data("origLeft"),
                width: $magicLine.data("origWidth")
            });    
        }); 
    }


});


// Initialize Swiper (Gallery)
var swiper = new Swiper('.swiper-container', {
    pagination: '.swiper-pagination',
    paginationClickable: true,
    nextButton: '.swiper-button-next',
    prevButton: '.swiper-button-prev',
    spaceBetween: 30,
    //effect: 'fade',
    autoplay: 5000,
    loop: true,
    speed: 800,
});

});