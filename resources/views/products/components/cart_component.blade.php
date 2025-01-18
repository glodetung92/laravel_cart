<div class="cart">
    <div class="container">
        <div class="row">
            <table class="table update_cart_url" data-url={{ route('updateCart') }}>
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Sub total</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $total = 0;
                    @endphp


                    @foreach($carts as $id=>$cartItem)
                        @php
                            $total += $cartItem['price'] * $cartItem['quantity'];
                        @endphp
                        <tr>
                            <th scope="row">{{ $id }}</th>
                            <td>
                                <img src="{{ $cartItem['image'] }}" alt="" width="100" height="100">
                            </td>
                            <td>{{ $cartItem['name'] }}</td>
                            <td>{{ number_format($cartItem['price']) }} VNĐ</td>
                            <td>
                                <input type="number" name="" value="{{ $cartItem['quantity'] }}" min="1">
                            </td>
                            <td>{{ number_format($cartItem['price'] * $cartItem['quantity']) }} VNĐ</td>
                            <td>
                                <a href="" data-id="{{ $id }}" class="btn btn-primary cart_update">Update</a>
                                <a href="" data-id="{{ $id }}" data-url={{ route('deleteCart') }} class="btn btn-danger cart_delete">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="col-md-12">
                <h3>Total: {{ number_format($total) }} VNĐ</h3>
            </div>
        </div>
    </div>
</div>