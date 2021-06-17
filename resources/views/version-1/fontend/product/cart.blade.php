@extends('version-1.fontend.master')
@section('content')
 @php
     // dd(session());
     // exit();
 @endphp
    <div class="site__body">
        <div class="block-header block-header--has-breadcrumb block-header--has-title">
            <div class="container">
                <div class="block-header__body">
                    <nav class="breadcrumb block-header__breadcrumb" aria-label="breadcrumb">
                        <ol class="breadcrumb__list">
                            <li class="breadcrumb__spaceship-safe-area" role="presentation"></li>

                            <li class="breadcrumb__item breadcrumb__item--parent breadcrumb__item--first">
                                <a href="{{ url('/') }}" class="breadcrumb__item-link">Home</a>
                            </li>

                            <li class="breadcrumb__item breadcrumb__item--parent"><a href="#" class="breadcrumb__item-link">Cart Products</a>
                            </li>

                            <li class="breadcrumb__item breadcrumb__item--current breadcrumb__item--last" aria-current="page"><span class="breadcrumb__item-link">Shopping Cart</span></li>

                            <li class="breadcrumb__title-safe-area" role="presentation"></li>
                        </ol>
                    </nav>

                    <h1 class="block-header__title">Shopping Cart</h1>
                </div>
            </div>
        </div>

        <div class="block">
            <div class="container">
                <div class="cart">
                    <div class="cart__table cart-table">
                        <table class="cart-table__table">
                            <thead class="cart-table__head">
                            <tr class="cart-table__row">
                                <th class="cart-table__column cart-table__column--image">Image</th>

                                <th class="cart-table__column cart-table__column--product">Product</th>

                                <th class="cart-table__column cart-table__column--price">Price</th>

                                <th class="cart-table__column cart-table__column--quantity">Quantity</th>

                                <th class="cart-table__column cart-table__column--total">Total</th>

                                <th class="cart-table__column cart-table__column--remove"></th>
                            </tr>
                            </thead>
                            <tbody class="cart-table__body">
                            @php($total = 0)
                            @php($sum = 0)
                            @php($tax = 0)
                            @foreach($cartProducts as $cartProduct)

                            {{-- @dd(App\Model\Product::find($cartProduct->id)->product_type) --}}

                            @if (App\Model\Product::find($cartProduct->id)->product_type == "Software")
                                <?php
                                Session::put('product_type', "Software")
                                ?>
                            @endif

                            @if (App\Model\Product::find($cartProduct->id)->product_type == "Free Shipping")
                                <?php
                                Session::put('product_type', "Free Shipping")
                                ?>
                            @endif

                            <tr class="cart-table__row">
                                <td class="cart-table__column cart-table__column--image">
                                    <a href="#">
                                        <img src="{{ asset('/product/'.$cartProduct->options->image) }}" style="width: 50px; height: 50px;">
                                    </a>
                                </td>

                                <td class="cart-table__column cart-table__column--product">
                                    <a href="#" class="cart-table__product-name" style="text-transform: capitalize">{{ $cartProduct->name }}</a>
                                </td>
                                <td class="cart-table__column cart-table__column--price" data-title="Price">${{ $price = $cartProduct->price }}</td>
                                <?php
                                Session::put('price', $price)
                                ?>
                                <input type="hidden" name="weigth" value="{{ $weight = $cartProduct->weight }}">
                                <?php
                                Session::put('weight', $weight)
                                ?>
                                <td class="cart-table__column cart-table__column--quantity" data-title="Quantity" width="25%">
                                    <form action="{{ url('/update-cart') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="rowId" id="rowId" value="{{ $cartProduct->rowId }}">
                                        <input type="hidden" id="proId" value="{{ $productId = $cartProduct->id }}">
                                        <input type="hidden" id="proId" name="sku" value="{{ $sku = $cartProduct->sku }}">
                                        <?php
                                        Session::put('productId', $productId)
                                        ?>
                                        <?php
                                        Session::put('sku', $sku)
                                        ?>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input id="updateproductQty" style="height: 30px; margin-bottom: 10px; width: 70px; text-align: center" name="qty" type="number" value="{{ $qty = $cartProduct->qty}}"  class="form-control">
                                                <?php
                                                Session::put('qty', $qty)
                                                ?>
                                            </div>
                                            <div class="col-md-6">
                                                <button type="submit" class="btn btn-sm btn-primary cart_update" name="btn" value="">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </td>

                                <td class="cart-table__column cart-table__column--total" data-title="Total">${{ $total = $cartProduct->price*$cartProduct->qty }}</td>
                                <input type="hidden" name="tax" value="{{ $totalTax = $cartProduct->tax*$cartProduct->qty }}">
                                <td class="cart-table__column cart-table__column--remove">
                                    <a href="{{ url('/cart/product/delete/'.$cartProduct->rowId) }}" class="btn btn-danger">
                                        Remove
                                    </a>
                                </td>
                            </tr>
                            <?php $sum = $sum+$total; ?>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="cart__totals">
                        <div class="card">
                            <div class="card-body card-body--padding--2">
                                <h3 class="card-title">
                                    Cart Totals <span class="badge badge-success">{{ $productCount = Cart::count() }}</span>
                                </h3>
                                <table class="cart__totals-table">
                                    <thead>
                                    <tr>
                                        <th>Subtotal</th>
                                        <td>${{ $totalAmount = number_format($sum, 2) }}</td>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <?php
                                            if (!empty($totalAmount)) {
                                                Session::put('totalAmount', $totalAmount);
                                            }
                                        ?>
                                    </tr>
                                    </tfoot>
                                </table>


                                @if(Session::get('id'))
                                <a class="btn btn-primary btn-xl btn-block" href="{{ url('/shipping') }}">Proceed to checkout</a>
                                @else
                                <a class="btn btn-primary btn-xl btn-block" href="{{ url('/checkout') }}">Proceed to checkout</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
