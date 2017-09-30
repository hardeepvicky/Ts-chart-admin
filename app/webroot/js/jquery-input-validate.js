 /* 
 * @author     Hardeep
 */
var intRegex = /\D/g;
var floatRegex = /[^-?\d.]/g;
var alphabetRegex = /[^A-Za-z\s]/g;

jQuery.fn.extend({
    validate : function(type, opt)
    {
        return this.each(function()
        {
            if (typeof opt != "undefined" && typeof opt.trigger != "undefined")
            {       
                return;
            }
            
            var v = $(this).val(); 
            if (!v)
            {
                v = "";
            }
            
            if (typeof v == "object")
            {
                v = v.join(",");
            }
            
            var msg = $(this).data(type + "-msg");
            var $span = $(this).parent().find("." + type + "-error-message");
            
            if ($span.length == 0)
            {
                $(this).parent().append('<span class="' + type + '-error-message error-message"></span>');
                $span = $(this).parent().find("." + type + "-error-message");
            }
                  
            var result = $(this).isValid(type);
            
            console.log(type + " " + result);
            switch(type)
            {
                case "not-empty":
                    if (!msg)
                    {
                        msg = "This field is required";
                    }
                break;
                
                case "int":
                    
                    if (!msg)
                    {
                        msg = "Number only";
                    }
                    
                    if (result === false)
                    {
                        $(this).val(v.replace(intRegex, ""));
                    }
                break;
                
                case "float":
                    
                    if (!msg)
                    {
                        msg = "Decimal only";
                    }
                    
                    if (result === false)
                    {
                        $(this).val(v.replace(floatRegex, ""));
                    }
                break;
                
                case "alphabet":
                    
                    if (!msg)
                    {
                        msg = "Alphabets only";
                    }
                    
                    if (result === false)
                    {
                        $(this).val(v.replace(alphabetRegex, ""));
                    }
                break;
                    
                case "less-than":
                case "less-than-equal":
                case "more-than":
                case "more-than-equal":
                       
                    var msg = $(this).data(type + "-msg");

                    if (result === false)
                    {
                        $(this).val(v.substr(0, v.length - 1));
                    }
                break;
            }
            
            if (result)
            {
                $span.html("").hide();
            }
            else
            {
                $span.html("&#9679 " + msg).show();
            }
            
        });
    },
    
    isValid : function(type)
    {
        if (typeof $(this).attr("disabled") != "undefined")
        {
            return true;
        }
            
        var v = $(this).val();
        
        if (!v)
        {
            v = "";
        }
        
        if (typeof v == "object" && v)
        {
            v = v.join(",");
        }
        
        switch(type)
        {
            case "not-empty":
                return v.trim().length > 0;
            break;

            case "int":
                return v.match(intRegex) ? false : true;
            break;

            case "float":
                return v.match(floatRegex) ? false : true;
            break;
            
            case "alphabet":
                return v.match(alphabetRegex) ? false : true;
            break;

            case "less-than":
            case "less-than-equal":
            case "more-than":
            case "more-than-equal":

                var obj = $(this).data(type + "-from");
                var msg = $(this).data(type + "-msg");

                var limit = 0;

                if ($.isNumeric(obj))
                {
                    limit = obj;
                }
                else
                {
                    limit = $(obj).val();                     
                }

                var result = true;

                var val = v.length > 0 ? parseFloat(v) : 0;
                switch(type)
                {
                    case "less-than":
                        result = val < limit;
                        break;

                    case "less-than-equal":
                        result = val <= limit;
                        break;

                    case "more-than":
                        result = val > limit;
                        break;
                        
                    case "more-than-equal":
                        result = val >= limit;
                        break;
                }

                return result;
            break;
        }
    }
});

var validate_class_rules = {
    "validate-not-empty" : "not-empty",
    "validate-int" : "int",
    "validate-float" : "float",
    "validate-alphabet" : "alphabet",
    "validate-less-than" : "less-than",
    "validate-less-than-equal" : "less-than-equal",
    "validate-more-than" : "more-than",
    "validate-more-than-equal" : "more-than-equal"
};

$(document).on("blur", "input.validate-not-empty", function (e, opt) {
    $(this).validate(validate_class_rules["validate-not-empty"], opt);
});

$(document).on("change", "select.validate-not-empty", function (e, opt) {
    $(this).validate(validate_class_rules["validate-not-empty"], opt);
});

$(document).on("keyup blur", ".validate-int", function (e, opt) {
    $(this).validate(validate_class_rules["validate-int"], opt);
});

$(document).on("keyup blur", ".validate-float", function (e, opt) {
    $(this).validate(validate_class_rules["validate-float"], opt);
});

$(document).on("keyup blur", ".validate-alphabet", function (e, opt) {
    $(this).validate(validate_class_rules["validate-alphabet"], opt);
});

$(document).on("keyup blur", ".validate-less-than-equal", function (e, opt) {
    $(this).validate(validate_class_rules["validate-less-than-equal"], opt);
});

$(document).on("keyup blur", ".validate-less-than", function (e, opt) {
    $(this).validate(validate_class_rules["validate-less-than"], opt);
});

$(document).on("keyup blur", ".validate-more-than-equal", function (e, opt) {
    $(this).validate(validate_class_rules["validate-more-than-equal"], opt);
});

$(document).on("keyup blur", ".validate-more-than", function (e, opt) {
    $(this).validate(validate_class_rules["validate-more-than"], opt);
});

$(document).on("submit", "form", function()
{
    var _form = $(this);
    
    var result = true;
    
    _form.find(".error-message").remove();
    
    for(var cls in validate_class_rules)
    {
        $(this).find("." + cls).each(function()
        {
            var valid = $(this).isValid(validate_class_rules[cls]);
            
            if (!valid)
            {
                result = false;
                
                $(this).validate(validate_class_rules[cls]);
                var error = _form.find(".error-message:first");
                
                if (error.length > 0)
                {
                    $('html,body').animate({
                        scrollTop: error.top
                    },'slow');
                }
            }
        });
        
        return result;
    }
});

$.validateForm = function(_form)
{
    _form.find(".error-message").remove();
    
    var result = true;
    
    for(var cls in validate_class_rules)
    {
        _form.find("." + cls).each(function()
        {
            var valid = $(this).isValid(validate_class_rules[cls]);

            if (!valid)
            {
                result = false;

                $(this).validate(validate_class_rules[cls]);
                var error = _form.find(".error-message:first");

                if (error.length > 0)
                {
                    $('html,body').animate({
                        scrollTop: error.top
                    },'slow');
                }
            }
        });
    }
    
    return result;
};