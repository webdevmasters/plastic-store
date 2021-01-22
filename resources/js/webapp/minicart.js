function deleteFromMiniCart(id, page) {
    $.ajax({
        url: "/cart/delete_mini_cart_item/" + id,
        type: "GET",
        success: function (response) {
            if (page === 1) window.location.reload();
            else {
                $(".minicart-section").replaceWith(response['mini_cart']);
                $("#cart-icon").on("click", function (event) {
                    event.stopPropagation();
                    $("#cart-floating-box").slideToggle();
                    $("#accountList").slideUp("slow");
                    $("#languageList").slideUp("slow");
                });

                $("body:not(#cart-icon)").on("click", function () {
                    $("#cart-floating-box").slideUp("slow");
                });
            }

        }
    });
}
