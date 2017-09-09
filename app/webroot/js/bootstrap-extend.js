 /* 
 * @author     Hardeep
 */
jQuery.fn.extend({
    datepickerExtend : function(default_opt)
    {
        if (jQuery.type(default_opt) == "undefined")
        {
            default_opt = {
                format : "dd-M-yyyy",
                autoclose: true,
            };
        }
        
        if (jQuery.type(default_opt.format) == "undefined")
        {
            default_opt.format = "dd-M-yyyy";
        }
        
        if (jQuery.type(default_opt.autoclose) == "undefined")
        {
            default_opt.autoclose = true;
        }
        
        return this.each(function()
        {
            if ($(this).is("disabled"))
            {
                return;
            }
            
            if($(this).hasClass("datepickerExtend-applied"))
            {
                return;
            }
            
            $(this).addClass("datepickerExtend-applied");
            
            var _this = $(this);
            var start = _this.data("date-start");

            var opt = default_opt;
            
            if ($.isNumeric(start))
            {
                opt.startDate = start + "d";
            } 
            else if (start)
            {
                $(start).on("changeDate", function ()
                {
                    var newDate = $(this).datepicker('getDate');
                    if (newDate) { // Not null
                        newDate.setDate(newDate.getDate());
                    }                        
                    _this.datepicker("setStartDate", newDate);
                });

                if ($(start).val() != "")
                {
                    opt.startDate = $(start).val();
                }
            }

            var end = _this.data("date-end");
            
            if ($.isNumeric(end))
            {
                opt.endDate = end + "d";
            }
            else if (end)
            {
                $(end).on("changeDate", function ()
                {
                    var newDate = $(this).datepicker('getDate');
                    if (newDate) { // Not null
                        newDate.setDate(newDate.getDate());
                    }                        
                    _this.datepicker("setEndDate", newDate);
                });

                if ($(end).val() != "")
                {
                    opt.endDate = $(end).val();
                }
            }
            
            var multiple = _this.attr("multiple");
            if (jQuery.type(multiple) != "undefined" && multiple)
            {
                opt.multidate = true;
            }
            
            opt.beforeShowDay = function(date)
            {
                var except_dates = $(this).attr("data-date-except-dates");
                if (jQuery.type(except_dates) == "array")
                {
                    for(var i in except_dates)
                    {
                        var c_date = $("").date.get(except_dates[i]);

                        if ($("").date.diff(date, c_date, "days") == 0)
                        {
                            return false;
                        }
                    }

                    return true;
                }
            };
            
            //applying datepicker
            _this.datepicker(opt);

            //if val is filled then trigger change event to apply start date
            if (start && !$.isNumeric(start))
            {
                if ($(start).val())
                {
                    //$(start).trigger("changeDate", {"trigger": 1});
                }
            }

            //if val is filled then trigger change event to apply end date
            if (end && !$.isNumeric(end))
            {
                if ($(end).val())
                {
                   //$(end).trigger("changeDate", {"trigger": 1});
                }
            }
        });
    },
    datetimepickerExtend : function (format)
    {
        if (jQuery.type(format) == "undefined")
        {
            format = "dd-M-yyyy HH:ii P";
        }
        
        return this.each(function()
        {
            if ($(this).is("disabled"))
            {
                return;
            }
            
            if($(this).hasClass("datetimepickerExtend-applied"))
            {
                return;
            }
            
            $(this).addClass("datetimepickerExtend-applied");
            
            var opt = {
                format : format,
                autoclose: true,
                todayBtn : true,
                showMeridian : true,
            };
            
            var _this = $(this);
            var start = _this.data("date-start");
            
            if ($.isNumeric(start))
            {
                opt.startDate = new Date( (new Date).getTime() + start * 60000);
            }
            else if (start)
            {
                $(start).on("changeDate", function (selected)
                {
                    var newDate = selected.date;
                    var diff = newDate.getTimezoneOffset();
                    newDate = new Date(newDate.getTime() + (diff * 60000));
                    _this.datetimepicker('setStartDate', newDate);
                });

                if ($(start).val() != "")
                {
                    opt.minDate = $(start).val();
                }
            }

            var end = _this.data("date-end");
            
            if ($.isNumeric(end))
            {
                opt.endDate = new Date( (new Date).getTime() + end * 60000);
            }
            else if (end)
            {
                $(end).on("changeDate", function (selected)
                {
                    var newDate = selected.date;
                    var diff = newDate.getTimezoneOffset();
                    newDate = new Date(newDate.getTime() + (diff * 60000));

                    _this.datetimepicker('setEndDate', newDate);
                });

                if ($(end).val() != "")
                {
                    opt.maxDate = $(end).val();
                }
            }
            
            var multiple = _this.attr("multiple");
            if (jQuery.type(multiple) != "undefined" && multiple)
            {
                opt.multidate = true;
            }
            
            console.log(opt);
            //applying datepicker
            _this.datetimepicker(opt);
        });
    },
    dateCalender : function(default_opt)
    {
        if (jQuery.type(default_opt) == "undefined")
        {
            default_opt = {
                format : "dd-M-yyyy",
                clearBtn : true
            };
        }
        
        if (jQuery.type(default_opt.format) == "undefined")
        {
            default_opt.format = "dd-M-yyyy";
        }
        
        if (jQuery.type(default_opt.clearBtn) == "undefined")
        {
            default_opt.clearBtn = true;
        }
        
        return this.each(function()
        {
            if($(this).hasClass("dateCalender-applied"))
            {
                return;
            }
            
            $(this).addClass("dateCalender-applied");
            
            var _this = $(this);
            var start = _this.data("date-start");
            
            var opt = default_opt;
            
            if ($.isNumeric(start))
            {
                opt.startDate = start + "d";
            } 
            else if (start)
            {
                $(start).on("changeDate", function ()
                {
                    var newDate = $(this).datepicker('getDate');
                    if (newDate) { // Not null
                        newDate.setDate(newDate.getDate());
                    }                        
                    _this.datepicker("setStartDate", newDate);
                });

                if ($(start).val() != "")
                {
                    opt.startDate = $(start).val();
                }
            }

            var end = _this.data("date-end");
            
            if ($.isNumeric(end))
            {
                opt.endDate = end + "d";
            }
            else if (end)
            {
                $(end).on("changeDate", function ()
                {
                    var newDate = $(this).datepicker('getDate');
                    if (newDate) { // Not null
                        newDate.setDate(newDate.getDate());
                    }                        
                    _this.datepicker("setEndDate", newDate);
                });

                if ($(end).val() != "")
                {
                    opt.endDate = $(end).val();
                }
            }
            
            var multiple = _this.attr("multiple");
            if (jQuery.type(multiple) != "undefined" && multiple)
            {
                opt.multidate = true;
            }

            var except_dates = $(this).data("date-except-dates");
            
            opt.beforeShowDay = function(date)
            {
                if (jQuery.type(except_dates) == "array")
                {
                    for(var i in except_dates)
                    {
                        var c_date = $("").date.get(except_dates[i]);
                        
                        if ($("").date.diff(date, c_date, "days") == 0)
                        {
                            return false;
                        }
                    }
                }
                
                return true;
            };
            
            //applying datepicker
            _this.datepicker(opt);
            
            var target = $(this).data("date-target");
            if (target && $(target).length > 0)
            {
                _this.on("changeDate", function ()
                {
                    if ($(target).length == 0)
                    {
                        return;
                    }
                    
                    $(target).val($(this).datepicker('getFormattedDate'));
                });
                
                
                _this.data({date: $(target).val()});
                _this.datepicker('update');
            }
        });
    },
});