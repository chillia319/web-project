/**
 * Created by jizhang on 8/15/16.
 */

var Reviews = (function() {
    "use strict";
    var pub = {};


    /**
     * parse the data in the XML data and generate HTML to go inside target
     */
    function parseReviews(data, target) {
        $(target).empty();

        //$(target).append('<dl>');
        var html = '<dl>';
        $(data).find("review").each(function() {

            var rating = $(this).find("rating").first().text();
            var user = $(this).find("user").first().text();
            //var String = $(target).append('<dt>' + user + '</dt><dd>' + rating + '</dd>'); //variable do not need " "
            html += '<dt>' + user + '</dt><dd>' + rating + '</dd>';//using string in order to put </dl> outside
        });
        html += '</dl>';
        $(target).append(html);

        if($(data).find("review").length===0){
            $(target).append('<p>There is no review about this film</p>');
        }
        $(target).toggle();
    }

    /**
     * when click the button get the target and src
     */
    function showReviews() {

        var target = $(this).parent().find(".review")[0];
        var imageJPG = $(this).siblings("img").attr("src");

        var imageN = imageJPG.replace("images/","reviews/");  // no / before because it will go back to root
        var imageName = imageN.replace(".jpg", ".xml");

        $.ajax({
            type: "GET",
            url:  imageName,
            cache: false,
            success: function(data) {
                parseReviews(data, target);
            },
            error: function(data) {
                parseReviews(data, target);

            }
        });
    }

    pub.setup = function() {     
        $(".film").append('<input type="button" id="buttonShowFields" class="showReviews" value="Show Reviews"><div class="review"></div>');
        $(".showReviews").click(showReviews);
        $(".review").css({display:"none"});
    };
    return pub;
}());

$(document).ready(Reviews.setup);
