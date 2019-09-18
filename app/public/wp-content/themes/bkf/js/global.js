jQuery(function ($) {
    $(document).ready(function () {
        var width = $(window).width();
        if (width >= 768) {
            var heights = $(".same-height-column").map(function () {
                return $(this).height();
            }).get(),
                maxHeight = Math.max.apply(null, heights);
            $(".same-height-column").height(maxHeight);
        }
    });
    $(".tab").click(function () {
        $(".tab").removeClass("active");
        $(this).addClass("active");
        var id = $(this).attr("id").substring(4);
        $(".tab-content").removeClass("active");
        $("#content-" + id).addClass("active");
    });
});

function filterBy($key, $value) {
    //get query string
    var query_string = window.location.pathname.split("/");
    var slug = query_string[1];
    var url = "";

    var args = [
        slug,
        $key,
        $value
    ];
    console.log(args);

    //build URL
    for (var i = 0; i < args.length; i++) {
        if (args[i] != null) {
            url += args[i] + '/';
        }
    }

    //for debugging
    console.log("URL: " + url);

    //go to new url
    window.location.pathname = url;
}

// GET HIDDEN ELEMENT HEIGHT
jQuery(function ($) {
    $.fn.findAutoHeight = function () {
        var oldHeight = this.css("height");
        this.css("height", "auto");
        var myHeight = this.height();
        this.css("height", oldHeight);
        console.log("old height = " + this.css("height"));
        return myHeight;
    };
});