$(document).ready(function() {
    var init_price = parseFloat($("#quantity-price").val());
    var total_price = parseFloat($("#quantity-price").val());
    $('<div class="quantity-nav"><div class="quantity-button quantity-up">+</div><div class="quantity-button quantity-down">-</div></div>').insertAfter('.quantity input');
    $('.quantity').each(function() {
        var spinner = $(this),
        input = spinner.find('input[type="number"]'),
        btnUp = spinner.find('.quantity-up'),
        btnDown = spinner.find('.quantity-down'),
        min = input.attr('min'),
        max = input.attr('max');
       

    btnUp.click(function() {
        var oldValue = parseFloat(input.val());
        if (oldValue >= max) {
            var newVal = oldValue;
        } else {
            var newVal = oldValue + 1;
            total_price = init_price + total_price;
            $("#quantity-price").val(total_price);
        }
        spinner.find("input").val(newVal);
        spinner.find("input").trigger("change");
    });

    btnDown.click(function() {
            var oldValue = parseFloat(input.val());
        if (oldValue <= min) {
            var newVal = oldValue;
        } else {
            var newVal = oldValue - 1;
            total_price = total_price - init_price;
            $("#quantity-price").val(total_price);
        }

        spinner.find("input").val(newVal);
        spinner.find("input").trigger("change");
    });
    
    
    });
    
});