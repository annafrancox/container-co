var logo = $('#img-logo');
var close = $('#img-logo-close');
var link_logo = $('#link-logo');
function ajustLogo(){

    if(logo.is('.display-none')){
        close.addClass('display-none');
        logo.removeClass('display-none');
        link_logo.addClass('link-logo');

    }else{
        close.removeClass('display-none');
        logo.addClass('display-none');
        link_logo.removeClass('link-logo');
    }
}
$('.main-sidebar').hover(function(){
    var collapse = $('body').hasClass('sidebar-collapse');
    let focus = $('aside').hasClass('sidebar-focused');
    if(collapse && !focus){
        ajustLogo();
    }
        if(collapse && focus){
        close.removeClass('display-none');
        logo.addClass('display-none');
        link_logo.removeClass('link-logo');
    }
});
function responsiveLogo(){
    if( $(window).width() > 992){
        ajustLogo();
    }
}
