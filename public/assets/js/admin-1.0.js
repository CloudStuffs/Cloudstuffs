(function (window, Model) {
    window.request = Model.initialize();
    window.opts = {};
}(window, window.Model));

$(function () {
    $('#side-menu').metisMenu();
});

$(function () {
    $('select[value]').each(function () {
        $(this).val(this.getAttribute("value"));
    });
});

//Loads the correct sidebar on window load,
//collapses the sidebar on window resize.
// Sets the min-height of #page-wrapper to window size
$(function () {
    $(window).bind("load resize", function () {
        topOffset = 50;
        width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
        if (width < 768) {
            $('div.navbar-collapse').addClass('collapse');
            topOffset = 100; // 2-row-menu
        } else {
            $('div.navbar-collapse').removeClass('collapse');
        }

        height = ((this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height) - 1;
        height = height - topOffset;
        if (height < 1)
            height = 1;
        if (height > topOffset) {
            $("#page-wrapper").css("min-height", (height) + "px");
        }
    });

    var url = window.location;
    var element = $('ul.nav a').filter(function () {
        return this.href == url || url.href.indexOf(this.href) == 0;
    }).addClass('active').parent().parent().addClass('in').parent();
    if (element.is('li')) {
        element.addClass('active');
    }
});

$(document).ready(function () {

    //initialize beautiful datetime picker
    $("input[type=date]").datepicker();
    $("input[type=date]").datepicker("option", "dateFormat", "yy-mm-dd");
    var dateFormat = $("input[type=date]").datepicker( "option", "dateFormat" );
    $("input[type=date]").datepicker( "option", "dateFormat", "yy-mm-dd" );

    // find all the selectors 
    var types = $('#addOptions select');
    types.on("change", function () { // bind the change function
        var value = $(this).val();

        // if text box is selected then show it and hide the file upload or vice-versa
        if (value === "text") {
            $("#type").find("input[type='text']").toggleClass("hide").attr("required", "");
            $("#type").find("input[type='file']").toggleClass("hide");
        } else if (value === "image") {
            $("#type").find("input[type='file']").toggleClass("hide");
            $("#type").find("input[type='text']").toggleClass("hide").removeAttr("required");
        }
    });

    $(".selectAll").click(function(e) {
        $(this).focus();
        document.execCommand('SelectAll');
    });

    $("#searchModel").change(function() {
        var self = $(this);
        $('#searchField').html('');
        request.read({
            action: "admin/fields/" + this.value,
            callback: function(data) {
                var d = $.parseJSON(data);
                $.each(d, function (field, property) {
                    $('#searchField').append('<option value="'+ field +'">'+ field +'</option>');
                })
            }
        });
    });

    $(document).on('change', '#searchField', function(event) {
        var fields = ["created", "modified"],
            date = $.inArray(this.value, fields);
        if (date !== -1) {
            $("input[name=value]").val('');
            $("input[name=value]").datepicker();
            $("input[name=value]").datepicker("option", "dateFormat", "yy-mm-dd");
        };
    });

});

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
    }
    return "";
}
