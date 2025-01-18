<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="products mt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('showCart') }}" class="btn btn-primary mb-3">Show Cart To Checkout</a>
                </div>
            </div>

            <div class="row">
            @foreach ($products as $p)

                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="{{ $p->image_path }}" alt="Card image cap">
                          <div class="card-body">
                            <h5 class="card-title">{{ $p->name }}</h5>
                            <p class="card-text">{{ number_format($p->price) }} VND</p>
                            <p class="card-text">{{ $p->description }}</p>
                            <a href="#"
                                data-url={{ route('addToCart', ['id' => $p->id]) }}
                                class="btn btn-primary add_to_cart">
                                Add to card
                            </a>
                          </div>
                    </div>
                </div>

            @endforeach
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        function addToCart(event) {
            event.preventDefault();
            let urlCart = $(this).data('url');
            $.ajax({
                type: 'GET',
                url: urlCart,
                dataType: 'json',
                success: function (data) {
                    if (data.code === 200)
                    {
                        alert('Them san pham vao gio hang thanh cong!');
                    }
                },
                error: function () {
                }

            })
        }

        $(function () {
            $('.add_to_cart').on('click', addToCart);
        })
    </script>
</body>
</html>