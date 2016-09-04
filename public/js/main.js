(function($){
    $(document).on('click', '.add-discount', function(){
        var $this = $(this);
        var index = $('.discount-item').length ? $('.discount-item').last().data('index') + 1 : 0;
        var discountHtml = '<div class="discount-item" data-index="' + index + '">';
            discountHtml += '<span>Amount: </span><input type="number" name="discounts[' + index + '][amount]" value="1">';
            discountHtml += '<span>Quantity: </span><input type="number" name="discounts[' + index + '][quantity]" value="1">';
            discountHtml += '</div>';

        $this.before(discountHtml);
    });
})(jQuery);

