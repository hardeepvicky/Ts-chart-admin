/**
 * @author     Hardeep
 */
$(document).ready(function()
{
    $("form").find("div.error-message").parents(".form-group").addClass("has-error"); 
   
    $("input[type='checkbox'].chk-select-all").chkSelectAll();

    $(".css-toggler").cssToggler();
    
    $(".ajax-loader").ajaxLoader();

    $(".date-picker").datepickerExtend();
    
    $(".date-month-picker").datepickerExtend({
        format: "M-yyyy",
        viewMode: "months", 
        minViewMode: "months"
    });
    
    $(".date-time-picker").datetimepickerExtend();
    
    $('.time-picker').timepicker({
        defaultTime : ""
    });
    
    $(".more-text").moreText();
});