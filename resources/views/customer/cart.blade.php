@extends('layouts.customer')
@section('content')
<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Fresh and Organic</p>
                    <h1>Cart</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<!-- cart -->
<div class="cart-section mt-80 mb-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="cart-table-wrap">
                    <table class="cart-table">
                        <thead class="cart-table-head">
                            <tr class="table-head-row">
                                <th class="product-remove"></th>
                                <th class="product-image">Product Image</th>
                                <th class="product-name">Unit Code</th>
                                <th class="product-quantity">Paket</th>
                                <th class="product-total">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $total = 0 @endphp
                            @foreach($cart as $cart)
                            <tr class="table-body-row">
                                <td class="product-remove"><a href="#"><i class="far fa-window-close"></i></a></td>
                                <td class="product-image"><img src="{{asset('storage/'.$cart->sepeda->foto_unit) }}"
                                        alt=""></td>
                                <td class="product-name">{{$cart->sepeda->unit_code}}</td>
                                <td class="product-quantity">{{$cart->paket->nama_paket}}</td>
                                <td class="product-total">{{$cart->paket->harga}}</td>
                                <div style="display: none">{{$total += $cart->paket->harga}}</div>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="total-section">
                    <table class="total-table">
                        <thead class="total-table-head">
                            <tr class="table-total-row">
                                <th>Total</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <div style="display: none">

                            </div>
                            <tr class="total-data">
                                <td><strong>total: </strong></td>
                                <td>{{$total}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="cart-buttons">
                        <form action="{{route('penyewaan.store')}}">
                            <button href="" class="boxed-btn black">Check Out</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end cart -->
@endsection