$(document).ready(() => {
    /**
     * xóa khỏi giỏ hàng
     */
    //function hiện thông báo
    function alertToast(type,message) {
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        toastr[type](message)
    }
    const url = "http://localhost/"
    $(document).on('click', '.pro-remove', function(e) {
            e.preventDefault();
            let this_product = $(this).parents('tr');
            let id_product_type = $(this).parents('tr').find('.cart-plus-minus').attr('data-prod');

            $.ajax({
                url: url+"project1/cart/remove",
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
            url: url+"project1/cart/modify",
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
            url: url+"project1/cart/modify",
            type: "POST",
            dataType: "html",
            data: {
                id_product_type: id_product_type,
                method: 'inc'
            }
        }).done(function(ketqua) {
            result = JSON.parse(ketqua);
            // console.log(result);
            this_product.find('.cart-plus-minus-box').val(result.quantity);
            this_product.parent().find(".pro-subtotal span").html(result.total);
            total = result.total_amount;
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
           if(this_product.find(".product-size input:checked").length ==0) {
                
                alertToast("error","bạn phải chọn size");
           }
            else{
            let data_attr = this_product.find(".product-size input:checked").val();
            let data_id_prod_type = this_product.find(".product-size input:checked").attr('data-prod');
            $.ajax({
                url: url+"project1/cart/addToCart",
                type: "POST",
                dataType: "html",
                data: {
                    data_attr: data_attr,
                    data_id_prod_type: data_id_prod_type
                }
            }).done(function(ketqua) {
                let result = JSON.parse(ketqua);
                if(result.alert == 'error') {
                    
                    alertToast("error","Sản phẩm đã hết hàng");
                    
                }else
                    $(".cart-item_count").html(ketqua);
            })}
        } else {
            let data_id_prod_type = this_product.find(".non-size").attr("data-prod");
            $.ajax({
                url: url+"project1/cart/addToCart",
                type: "POST",
                dataType: "html",
                data: {
                    data_attr: '',
                    data_id_prod_type: data_id_prod_type
                }
            }).done(function(ketqua) {
                
                let result = JSON.parse(ketqua);
                if(result.alert == 'error') {
                    alertToast("error","bạn phải chọn size");
                    
                }else
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