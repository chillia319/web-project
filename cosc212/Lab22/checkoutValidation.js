/**
 * Validation functions for the Classic Cinema site.
 *
 * Created by: Steven Mills, 09/04/2014
 * Last Modified by: Steven Mills 08/08/2016
 */

/**
 * Module pattern for Validation functions
 */
var CheckoutValidation = (function () {
    "use strict";

    var pub;

    // Public interface
    pub = {};

    function checkNotEmpty(textValue) {
        return textValue.trim().length > 0;
    }

    function checkDigits(textValue) {
        var pattern = /^[0-9]+$/;
        return pattern.test(textValue);
    }

    function checkLength(textValue, minLength, maxLength) {
        var length = textValue.length;
        if (maxLength === undefined) {
            maxLength = minLength;
        }
        return (length >= minLength && length <= maxLength);
    }

    function checkEmailAddress(textValue) {
        var pattern = /^[a-zA-Z0-9_\-]+(\.[a-zA-Z0-9_\-]+)*@[a-zA-Z0-9_\-]+(\.[a-zA-Z0-9_\-]+)*$/;
        return pattern.test(textValue);
    }

    function checkKeyIsDigit(event) {
        // Cross-browser key recognition - see http://stackoverflow.com/questions/1444477/keycode-and-charcode
        var characterPressed, charStr;
        characterPressed = event.keyCode || event.which || event.charCode;
        charStr = "0";
        if (characterPressed < charStr.charCodeAt(0)) {
            return false;
        }
        charStr = "9";
        return characterPressed <= charStr.charCodeAt(0);
    }

    function startsWith(textValue, startValue) {
        return textValue.substring(0, startValue.length) === startValue;
    }

    function checkDeliveryName(deliveryName, messages) {
        if (!checkNotEmpty(deliveryName)) {
            messages.push("You must enter a name to deliver to");
        }
    }

    function checkDeliveryEmail(deliveryEmail, messages) {
        if (!checkNotEmpty(deliveryEmail)) {
            messages.push("You must enter an email address");
        } else if (!checkEmailAddress(deliveryEmail)) {
            messages.push("That doesn't look like a valid email address");
        }
    }

    function checkDeliveryAddress(deliveryAddress, messages) {
        if (!checkNotEmpty(deliveryAddress)) {
            messages.push("You must enter an address to deliver to");
        }
    }

    function checkDeliveryCity(deliveryCity, messages) {
        if (!checkNotEmpty(deliveryCity)) {
            messages.push("You must enter a city to deliver to");
        }
    }

    function checkDeliveryPostcode(deliveryPostcode, messages) {
        if (!checkNotEmpty(deliveryPostcode)) {
            messages.push("You must enter a postcode");
        } else if (!checkDigits(deliveryPostcode) || !checkLength(deliveryPostcode, 4)) {
            messages.push("Postcodes must be exactly 4 digits long");
        }
    }

    function checkCreditCardNumber(cardType, cardNumber, messages) {
        if (!checkNotEmpty(cardNumber)) {
            messages.push("You must enter a credit card number");
        } else if (!checkDigits(cardNumber)) {
            // Just numbers
            messages.push("The credit card number should only contain the digits 0-9");
        } else if (cardType === "amex" && (!checkLength(cardNumber, 15) || !startsWith(cardNumber, "3"))) {
            // American Express: 15 digits, starts with a 3
            messages.push("American Express card numbers must be 15 digits long and start with a '3'");
        } else if (cardType === "mcard" && (!checkLength(cardNumber, 16) || !startsWith(cardNumber, "5"))) {
            // MasterCard: 16 digits, starting with a 5
            messages.push("MasterCard numbers must be 16 digits long and start with a '5'");
        } else if (cardType === "visa" && (!checkLength(cardNumber, 16) || !startsWith(cardNumber, "4"))) {
            // Visa: 16 digits, starts with a 4
            messages.push("Visa card numbers must be 16 digits long and start with a '4'");
        }
    }

    function checkCreditCardDate(cardMonth, cardYear, messages) {
        var today;
        today = new Date();
        cardMonth = parseInt(cardMonth, 10);
        cardYear = parseInt(cardYear, 10);
        if (!cardYear) {
            messages.push("Invalid year in card expiry date");
        } else if (!cardMonth || cardMonth < 1 || cardMonth > 12) {
            messages.push("Invalid month in card expiry date");
        } else if (cardYear < today.getFullYear()) {
            // Year is in the past, not valid regardless of month
            messages.push("The card expiry date must be in the future");
        } else if (cardYear === today.getFullYear()) {
            if (cardMonth <= today.getMonth() + 1) {
                messages.push("The card expiry date must be in the future");
            }
        } // else year is in the future, so valid regardless of month
    }

    function checkCreditCardValidation(cardType, cardValidation, messages) {
        if (!checkNotEmpty(cardValidation)) {
            messages.push("You must enter a CVC value");
        } else if (!checkDigits(cardValidation)) {
            messages.push("The CVC should only contain the digits 0-9");
        } else if (cardType === "amex" && !checkLength(cardValidation, 4)) {
            messages.push("American Express CVC values must be 4 digits long");
        } else if (cardType === "mcard" && !checkLength(cardValidation, 3)) {
            messages.push("MasterCard CVC values must be 3 digits long");
        } else if (cardType === "visa" && !checkLength(cardValidation, 3)) {
            messages.push("Visa CVC values must be 3 digits long");
        }
    }

    function validateCheckout() {
        var messages, deliveryName, deliveryEmail, deliveryAddress1, deliveryCity, deliveryPostcode, cardType, cardNumber, cardMonth, cardYear, cardValidation, errorHTML;

        messages = [];

        deliveryName = $("#deliveryName").val();
        checkDeliveryName(deliveryName, messages);

        deliveryEmail = $("#deliveryEmail").val();
        checkDeliveryEmail(deliveryEmail, messages);

        deliveryAddress1 = $("#deliveryAddress1").val();
        checkDeliveryAddress(deliveryAddress1, messages);

        deliveryCity = $("#deliveryCity").val();
        checkDeliveryCity(deliveryCity, messages);

        deliveryPostcode = $("#deliveryPostcode").val();
        checkDeliveryPostcode(deliveryPostcode, messages);

        cardType = $("#cardType").val();
        cardNumber = $("#cardNumber").val();
        checkCreditCardNumber(cardType, cardNumber, messages);

        cardMonth = $("#cardMonth").val();
        cardYear = $("#cardYear").val();
        checkCreditCardDate(cardMonth, cardYear, messages);

        cardValidation = $("#cardValidation").val();
        checkCreditCardValidation(cardType, cardValidation, messages);

        if (messages.length === 0) {
            Cookie.clear("cart");
            $("#main").html("<p>Thank you for your order</p>");

        } else {
            errorHTML = "<p><strong>There were errors processing your form</strong></p>";
            errorHTML += "<ul>";
            messages.forEach(function (msg) {
                errorHTML += "<li>" + msg;
            });
            errorHTML += "</ul>";
            $("#errors").html(errorHTML);
        }

        return false;
    }

    pub.setup = function () {
        //$("#checkoutForm").submit(validateCheckout);
       // $("#cardNumber").keypress(checkKeyIsDigit);
        //$("#deliveryPostcode").keypress(checkKeyIsDigit);
        //$("#cardValidation").keypress(checkKeyIsDigit);
    };

    return pub;
}());

$(document).ready(CheckoutValidation.setup);