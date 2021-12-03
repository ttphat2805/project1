$(document).ready(() => {
    $(".add_to_cart").click(function (){
        let this_product = $(this).parents(".single-product").children(".product-content")

        if(this_product.find(".product-size input").length >0){
            let data_attr = this_product.find(".product-size input:checked").val();
            let data_id_prod_type = this_product.find(".product-size input:checked").val();

            $.ajax({
                url: "https://nghi.test/project1/cart/addToCart",
                type: "POST",
                dataType: "html",
                data: {
                    data_attr: data_attr,
                    data_id_prod_type: data_id_prod_type
                }
            }).done(function (ketqua) {
                console.log(ketqua);
                //$(".cart-item_count").html(ketqua);
            })
        } else {
            let data_id_prod_type = this_product.find(".non-size").attr("data-prod");
            $.ajax({
                url: "https://nghi.test/project1/cart/addToCart",
                type: "POST",
                dataType: "html",
                data: {
                    data_attr: '',
                    data_id_prod_type: data_id_prod_type
                }
            }).done(function (ketqua) {
                console.log('a')
                console.log(JSON.parse(ketqua))

                //$(".cart-item_count").html(ketqua);
            })
        }
    })
})