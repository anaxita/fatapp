$(document).ready(function(){

$( function() {
$('form').submit(function() {
return false;
});
});

    /**
     * load all product when page is load
     */

    $.ajax({
        url: "/modules/product/show.php",
        method: "POST",
        cache: true,
        data: {},
        dataType: "JSON",
        beforeSend: () => {
            $( "#div-product-list").append('<div class="cssload-loader"><div class="cssload-inner cssload-one"></div><div class="cssload-inner cssload-two"></div><div class="cssload-inner cssload-three"></div></div>');

        },
        success: (data) => {
            $( ".cssload-loader").detach();
            const div = $( "#product-list" );
            for (newdata in data) {
                div.append(                    
                    `<li class='list-group-item' id='msg-id${data[newdata]['id']}'><div class='row'><div class='col'>${data[newdata]['product']}</div><div class='col'><strong>${data[newdata]['callories']}</strong> ккал</div><div class='col'><button type='button' class='btn btn-warning btn-sm'>Удалить</button></div></div></li>`
                );
            }
        }
      });

/**
 * load count callories by day when page is load 
 * 
 *
 */
function calloriesByDay() {
    $.ajax({
        url: "/modules/product/dayCallories.php",
        method: "GET",
        cache: false,
        data: {},
        dataType: "JSON",
        
        success: (data) => {
            console.log(data['sum'])
            const div = $( "#day-callories" );
            if (!data['sum']) {
                div.removeClass('alert-primary');
                div.removeClass('alert-danger');
                div.addClass('alert-warning');
                div.html(`<h6>${data['username']}, срочно скушай что-нибудь :(</h6>`)
            }  else if (data['sum'] < 1000) {
                div.removeClass('alert-danger');
                div.addClass('alert-primary');
                div.html(`<h6> Всего каллорий за день: ${data['sum']} Ккал</h6>`)
            } else {               
                div.removeClass('alert-primary');
                div.addClass('alert-danger');
                div.html(`<h4>${data['username']}, ну ты пипец нажрала, конечно! <strong>${data['sum']} ккал</strong> за этоn маленький день!</h4>`)
            }
     
        }
      });
}    
calloriesByDay();

/**
 * add new product
 * 
 * 
 */

    $( "#sendProduct" ).click( (e) =>{
        const product = $( "#product" ).val();
        const countproduct = $( "#countproduct" ).val();
        const callories = $( "#callories" ).val();
        const alertdiv = $( "p#validation" );
        if (product.length < 3) {
            alertdiv.html("Продукт должен быть не менее 3 букв").prop("hidden", false);
            return false;
        } if (countproduct ==  0 || null) {
            alertdiv.html("Вес должен быть больше нуля").prop("hidden", false);
            return false;
        } if (callories == 0 || null) {
            alertdiv.html("Калорийность должна быть больше нуля").prop("hidden", false);
            return false;
        } else {
        $.ajax({
            url: "/modules/product/addProduct.php",
            method: "POST",
            data: {product, countproduct, callories},
            dataType: "JSON",
            beforeSend: () => {
                alertdiv.prop("hidden", true);
                $( "#product" ).val('');
                $( "#countproduct" ).val('');
                $( "#callories" ).val(''); 
            },
            success: (data) => {
                const div = $( "#product-list" );
                div.append(                    
                    `<li class='list-group-item' id='msg-id${data['id']}'><div class='row'><div class='col'>${product}</div><div class='col'><strong>${data['callories']}</strong> ккал</div><div class='col'><button type='button' class='btn btn-warning btn-sm'>Удалить</button></div></div></li>`
                );
                calloriesByDay();         
            }
            })
        }
    });

/**
 * delete product by id 
 * 
 * 
 */

    $( "#product-list" ).on('click', 'button', function() {
        toDelete = $(this).closest( "li" );
        const id = toDelete.attr('id');
        $.ajax({
            url: "/modules/product/deleteProduct.php",
            method: "POST",
            cache: false,
            data: {id},
            dataType: "text",
            beforeSend: () => {
                toDelete.detach();
            },
            success: (data) => {
                calloriesByDay();
            }
            })
    });
})