/**
 * Shopping cart functions for the category pages
 *
 * Created by: Steven Mills, 09/04/2014
 * Last Modified by: Steven Mills 08/08/2016
 */

/* global Cookie */

var Cart = (function () {
    "use strict";

    var pub;
    pub = {};

    function addToCart() {
        var itemList, newItem;
        itemList = Cookie.get("cart");
        if (itemList) {
            itemList = JSON.parse(itemList);
        } else {
            itemList = [];
        }
        newItem = {};

        newItem.title = $(this).parent().parent().find("h3").html();
        newItem.price = $(this).parent().find(".price").html();

        itemList.push(newItem);



        Cookie.set("cart", JSON.stringify(itemList),1);
    }

    pub.setup = function () {
        $(".buy").click(addToCart);
    };

    return pub;
}());

$(document).ready(Cart.setup);
