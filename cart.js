    // add product in cart

    $(document).on('click', '.btn-add-cart', function(e) {
        e.preventDefault();
        var parent = $(this).parents('.products-s');
        alert(parent);
        var id_product = parent.find('.products-id').val();
        var id_category = parent.find('.products-category-id').val();
        var quantity = parent.find('.product-quantity-value').val();
        if (quantity == null) {
            quantity = 1;
        }
        // console.log(id_category);
        // return
        var color = parent.find('.attributes-color-input');
        for (var i = 0; i < color.length; i++) {
            if (color[i].checked == true) {
                // console.log(checkbox[i].value);
                var attributes_color = color[i].value;
            }
        }
        var size = parent.find('.attributes-size-input');
        for (var i = 0; i < size.length; i++) {
            if (size[i].checked == true) {
                // console.log(checkbox[i].value);
                var attributes_size = size[i].value;
            }
        }

        // check category - if =5 => bag no size
        if (id_category != 5) {
            if (attributes_color == null || attributes_size == null) {
                alert('vui lĂ²ng chá»n size vĂ  color Ä‘áº§y Ä‘á»§');
                return
            }
        } else {
            if (attributes_color == null) {
                alert('vui lĂ²ng chá»n color Ä‘áº§y Ä‘á»§');
                return
            }
        }

        if (attributes_size == null) {
            attributes_size = 0;
        }

        // ajax to insertCart
        $.ajax({
            url: "cart/insertCart",
            method: "POST",
            data: {
                insertCart: 'true',
                id_product: id_product,
                id_color: attributes_color,
                id_size: attributes_size,
                id_category: id_category,
                quantity: quantity
            },
            success: function(data) {
                if (data == 'sign') {
                    window.location = "sign";
                } else {
                    alert(data);
                    get_data();
                }
            }
        });
    });