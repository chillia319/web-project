/**
 * Show/Hide movie details on the Classic Cinema site.
 *
 * Created by: Steven Mills, 09/04/2014
 * Last Modified by: Steven Mills 08/08/2016
 */

/**
 * Module pattern for Show/Hide functions
 */
var ShowHide = (function () {
    "use strict";

    var pub;

    // Public interface
    pub = {};

    function showHideDetails() {

        $(this).siblings("p").toggle();
        $(this).siblings("img").toggle();
    }


    pub.setup = function () {

        var title = $(".film");
            $(title.find("h3")).click(showHideDetails);
            $(title.find("h3")).css('cursor', 'pointer');

    };

    return pub;
}());

// The usual onload event handling to call ShowHide.setup
$(document).ready(ShowHide.setup);