

function changeQty(new_count, price, id, qty, summ, countAll) {
    var count = +new_count.target.value;
    if(isNaN(parseFloat(count)) && !isFinite(count) || count<1){

        count = 1;
        $('#quantity'+id).val(count);
    }


    var sum = summ - qty*price + count*price;
    var cnt = countAll - qty + count;

    console.log(price);
    $('#sum'+id).text('$'+count* price );

    $.ajax({
        url:  '/cart/update-car',
        data: {id: id, qty: count},
        type: 'GET',
        success : function (res) {
            if(!res) alert(`Error`);
            console.log(`res=`,res);
            // updateCart();

            $('#summary_count').text(cnt);
            $('#summary_money').text('$'+sum);
            $('#cartCount').text(cnt);

        },
        error: function () {
            alert(`Error Ajax!`);
        }
    });

}

function deleteProduct(price, id, qty, summ, countAll) {
    var count = +new_count.target.value;
    if(count<1){
        count = 1;
        $('#quantity'+id).val(count);
    }


    var sum = summ - qty*price + count*price;
    var cnt = countAll - qty + count;

    console.log(price);
    $('#sum'+id).text('$'+count* price );

    $.ajax({
        url:  '/cart/update-car',
        data: {id: id, qty: count},
        type: 'GET',
        success : function (res) {
            if(!res) alert(`Error`);
            console.log(`res=`,res);
            // updateCart();

            $('#summary_count').text(cnt);
            $('#summary_money').text('$'+sum);

        },
        error: function () {
            alert(`Error Ajax!`);
        }
    });

}

////////////////////////////////////////





function changeQtyItem(new_count, price, id, qty, summ, countAll) {
    var count = +new_count.target.value;
    if(isNaN(parseFloat(count)) && !isFinite(count) || count<1){

        count = 1;
        $('#quantityItem'+id).val(count);
    }


    var sum = summ - qty*price + count*price;
    var cnt = countAll - qty + count;

    console.log(price);
    $('#sumItem'+id).text('$'+count* price );

    $.ajax({
        url:  '/cart/update-item',
        data: {id: id, qty: count},
        type: 'GET',
        success : function (res) {
            if(!res) alert(`Error`);
            console.log(`res=`,res);
            // updateCart();

            $('#summary_count').text(cnt);
            $('#summary_money').text('$'+sum);
            $('#cartCount').text(cnt);

        },
        error: function () {
            alert(`Error Ajax!`);
        }
    });

}

function deleteProductItem(price, id, qty, summ, countAll) {
    var count = +new_count.target.value;
    if(count<1){
        count = 1;
        $('#quantityItem'+id).val(count);
    }


    var sum = summ - qty*price + count*price;
    var cnt = countAll - qty + count;

    console.log(price);
    $('#sumItem'+id).text('$'+count* price );

    $.ajax({
        url:  '/cart/update-item',
        data: {id: id, qty: count},
        type: 'GET',
        success : function (res) {
            if(!res) alert(`Error`);
            console.log(`res=`,res);
            // updateCart();

            $('#summary_count').text(cnt);
            $('#summary_money').text('$'+sum);

        },
        error: function () {
            alert(`Error Ajax!`);
        }
    });

}