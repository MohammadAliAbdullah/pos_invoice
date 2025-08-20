$(document).ready(function () {

    function updateItemTotal(row) {
        const quantity = parseFloat(row.find('.quantity').val()) || 0;
        const price = parseFloat(row.find('.price').val()) || 0;
        const discount = parseFloat(row.find('.discount').val()) || 0;
        return Math.max((quantity * price) - discount, 0);
    }

    function updateTotalAmount() {
        let total = 0;
        $('#items .item-row').each(function () {
            total += updateItemTotal($(this));
        });
        $('#total_amount').val(total.toFixed(2));
    }

    $(document).on('change', '.product-select', function () {
        const currentSelect = $(this);
        const currentValue = currentSelect.val();

        // Check if this product is already selected in another row
        let isDuplicate = false;

        $('.product-select').not(currentSelect).each(function () {
            if ($(this).val() === currentValue && currentValue !== '') {
                isDuplicate = true;
                return false; // break loop
            }
        });

        if (isDuplicate) {
            alert('This product has already been selected. Please choose a different product.');
            currentSelect.val(''); // Reset the selection
            currentSelect.closest('.item-row').find('.price').val(''); // Reset price
            updateTotalAmount();
            return;
        }

        // Set price if no duplicate
        const row = currentSelect.closest('.item-row');
        const price = currentSelect.find('option:selected').attr('price') || 0;
        row.find('.price').val(price);
        updateTotalAmount();
    });

    $(document).on('input', '.quantity, .discount', updateTotalAmount);

    let itemIndex = 1;
    $('#addItem').click(function () {
        const newRow = $('.item-row').first().clone();
        newRow.attr('data-index', itemIndex);

        newRow.find('select, input').each(function () {
            const name = $(this).attr('name');
            if (name) {
                const newName = name.replace(/\[\d+\]/, `[${itemIndex}]`);
                $(this).attr('name', newName);
            }

            if ($(this).hasClass('price')) {
                $(this).val('').prop('readonly', true);
            } else if ($(this).hasClass('quantity')) {
                $(this).val(1);
            } else if ($(this).hasClass('discount')) {
                $(this).val(0);
            } else {
                $(this).val('');
            }
        });

        $('#items').append(newRow);
        itemIndex++;
    });

    $(document).on('click', '.remove-item', function () {
        if ($('.item-row').length > 1) {
            $(this).closest('.item-row').remove();
            updateTotalAmount();
        }
    });

    updateTotalAmount();
});
