/* 
 * created 13-07-2017
 * @author Hardeep
 */
jQuery.fn.extend({
    tfTabs : function (config)
    {
        return this.each(function()
        {   
            var _this = $(this);
            
            function activate_tab(current, next)
            {
                _this.find(".tab-content").children().hide();
                
                if (current > -1)
                {
                    var current_tab = _this.find(".tab-opener:eq(" + current + ")").attr("href");
                    current_tab = _this.find(".tab-content").find(current_tab);
                    var dir = (current < next) ? "left" : "right";

                    current_tab.hide();
                    
                    current_tab.removeClass("tab-active");
                }
                
                var next_tab = _this.find(".tab-opener:eq(" + next + ")").attr("href");
                
                next_tab = _this.find(".tab-content").find(next_tab);
                var dir = (current < next) ? "right" : "left";
                
                next_tab.show();
                
                _this.find(".tab-opener").removeClass("tab-active");
                _this.find(".tab-opener:eq(" + next + ")").addClass("tab-active");
            }
            
            _this.find(".tab-header > .tab-opener").click(function()
            {
                var current = _this.find(".tab-header > .tab-opener.tab-active");
                if (current.length > 0)
                {
                    current = current.index();
                }
                else
                {
                    current = -1;
                }
                
                var next = $(this).index();
                
                activate_tab(current, next);
            });
            
            _this.bind("nextTab", function()
            {
                var current = _this.find(".tab-header > .tab-opener.tab-active");
                if (current.length > 0)
                {
                    current = current.index();
                }
                else
                {
                    current = -1;
                }
                
                var next = current + 1;
                var tabs_count = _this.find(".tab-header > .tab-opener");
                
                if (next < tabs_count)
                {
                    activate_tab(current, next);
                }
            });
            
            _this.bind("prevTab", function()
            {
                var current = _this.find(".tab-header > .tab-opener.tab-active");
                if (current.length > 0)
                {
                    current = current.index();
                }
                else
                {
                    current = -1;
                }
                
                var next = current - 1;
                
                if (next >= 0)
                {
                    activate_tab(current, next);
                }
            });
            
            activate_tab(-1, 0);
        });
    }
});