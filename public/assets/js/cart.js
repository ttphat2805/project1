$(document).ready(() => {
    /**
     * xóa khỏi giỏ hàng
     */
    $(document).on('click', '.pro-remove', function(e) {
            e.preventDefault();
            let this_product = $(this).parents('tr');
            let id_product_type = $(this).parents('tr').find('.cart-plus-minus').attr('data-prod');

            $.ajax({
                url: "http://localhost/project1/cart/remove",
                type: "POST",
                dataType: "html",
                data: {
                    id_product_type: id_product_type
                }
            }).done(function(ketqua) {
                this_product.remove();
                let result = JSON.parse(ketqua);
                console.log(result);
                let total_cart = parseFloat($(".total-amount").text()) - parseFloat(result.total);
                $(".total-amount").html(total_cart);
                $(".cart-item_count").html(result.cart_num);
            })
        })
        /*
            xử lý sự kiện thêm sửa xóa giỏ hàng
        */
    $(document).on('click', '.dec', function() {
        let this_product = $(this).parents(".pro-quantity");
        let id_product_type = this_product.find(".cart-plus-minus").attr("data-prod");

        $.ajax({
            url: "http://localhost/project1/cart/modify",
            type: "POST",
            dataType: "html",
            data: {
                id_product_type: id_product_type,
                method: 'dec'
            }
        }).done(function(ketqua) {
            result = JSON.parse(ketqua);
            console.log(result.total)
                // $(".cart-plus-minus-box").val(result.quantity);
            this_product.parent().find(".pro-subtotal span").html(result.total);
            console.log(parseFloat($(".total-amount").text()));
            total = $(".total-amount").text() - (result.price);
            $(".total-amount").html(total);
            $(".cart-item_count").html(result.cart_num);
        })
    })

    $(document).on('click', '.inc', function() {
        let this_product = $(this).parents(".pro-quantity");
        let id_product_type = this_product.find(".cart-plus-minus").attr("data-prod");

        $.ajax({
            url: "http://localhost/project1/cart/modify",
            type: "POST",
            dataType: "html",
            data: {
                id_product_type: id_product_type,
                method: 'inc'
            }
        }).done(function(ketqua) {
            result = JSON.parse(ketqua);
            console.log(result);
            // $(".cart-plus-minus-box").val(result.quantity);
            this_product.parent().find(".pro-subtotal span").html(result.total);
            total = parseFloat($(".total-amount").text()) + parseFloat(result.price);
            $(".total-amount").html(total);
            $(".cart-item_count").html(result.cart_num);
        })
    })

    /*
        xử lý sự kiện thêm sản phẩm vào giỏ hàng
    */
    $(document).on('click', '.add_to_cart', function() {
        let this_product = $(this).parents(".single-product").children(".product-content")

        if (this_product.find(".product-size input").length > 0) {
            let data_attr = this_product.find(".product-size input:checked").val();
            let data_id_prod_type = this_product.find(".product-size input:checked").attr('data-prod');
            $.ajax({
                url: "http://localhost/project1/cart/addToCart",
                type: "POST",
                dataType: "html",
                data: {
                    data_attr: data_attr,
                    data_id_prod_type: data_id_prod_type
                }
            }).done(function(ketqua) {
                // console.log(ketqua);
                $(".cart-item_count").html(ketqua);
            })
        } else {
            let data_id_prod_type = this_product.find(".non-size").attr("data-prod");
            $.ajax({
                url: "http://localhost/project1/cart/addToCart",
                type: "POST",
                dataType: "html",
                data: {
                    data_attr: '',
                    data_id_prod_type: data_id_prod_type
                }
            }).done(function(ketqua) {
                // console.log('a')
                // console.log(JSON.parse(ketqua))

                $(".cart-item_count").html(ketqua);
            })
        }
    })
    $(document).on('change', '.cart-plus-minus-box', function() {
        let value = $(this).val();
        let max_value = $(this).attr('data-max');
        if (value > max_value) {
            $(this).val(max_value);
        }
    })
})