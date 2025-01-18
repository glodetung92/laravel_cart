<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Show Cart</title>
</head>
<body>
    <div class="cart_wrapper">
        @include('products.components.cart_component');
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    function cartUpdate(event) {
        event.preventDefault();
        let urlUpdateCart = $('.update_cart_url').data('url');
        let id = $(this).data('id');
        let qty = $(this).parents('tr').find('input').val();
        $.ajax({
            type: "GET",
            url: urlUpdateCart,
            data: { id: id, quantity: qty},
            success: function(data) {
                if(data.status == 200) {
                    // $('.cart_wrapper').html(data.cart_component);
                    document.querySelector('.cart_wrapper').innerHTML = data.cart_component;
                }
            },
            error: function() {

            }
        });
    }

    function cartDelete(event) {
        event.preventDefault();
        let urlDelCart = $('.cart_delete').data('url');
        let id = $(this).data('id');
        $.ajax({
            type: 'GET',
            url: urlDelCart,
            data: {id: id},
            success: function(data) {
                if (data.code === 200) {
                    document.querySelector('.cart_wrapper').innerHTML = data.cart_component;
                }
            },
            error: function() {

            }
        })
    }
    $(function () {
        $(document).on('click', '.cart_update', cartUpdate);
        $(document).on('click', '.cart_delete', cartDelete);
    });
</script>
</body>
</html>