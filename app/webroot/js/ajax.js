//Ajax start
$(document).ajaxStart(function(){
    Loader.show();
});

//Ajax complete
$(document).ajaxComplete(function(){
    Loader.hide();
});

$(document).ajaxError(function( event, jqxhr, settings, thrownError ) 
{
    Loader.hide();
    
    $(".page-content").html(jqxhr.responseText);
    
    return;
});