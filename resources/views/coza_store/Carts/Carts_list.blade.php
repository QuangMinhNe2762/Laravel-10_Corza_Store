@extends('coza_store.Layouts.base')
@section('title', 'Cart')
@section('main')
    <div class="container">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-80 p-lr-0-lg">
            <a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
                Home
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <span class="stext-109 cl4">
                Shoping Cart
            </span>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                <form method="POST">
                    <div class="m-l-25 m-r--38 m-lr-0-xl">
                        <div class="wrap-table-shopping-cart">
                            <table class="table-shopping-cart">
                                <tbody>
                                    <tr class="table_head">
                                        <th class="column-1">Product</th>
                                        <th class="column-2"></th>
                                        <th class="column-3">Price</th>
                                        <th class="column-4">Quantity</th>
                                        <th class="column-5">Total</th>
                                    </tr>
                                    @include('coza_store.Carts.Cart_form')
                                </tbody>
                            </table>
                        </div>

                        <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm d-flex justify-content-center">
                            <input type="submit" value="Update Cart" formaction="/update-carts"
                                class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
                        </div>
                    </div>
                    @csrf
                </form>
            </div>
            <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                <form method="POST">
                    <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                        <h4 class="mtext-109 cl2 p-b-30">
                            Cart Totals
                        </h4>
                        <div class="">
                            <div class="size-208">
                                <span class="stext-110 cl2">
                                    Subtotal:
                                </span>
                                <span class="mtext-110 cl2">
                                    ${!! Helper::$getTotalPriceCart !!}
                                </span>
                            </div>
                        </div>
                        <div class="m-t-30">
                            <div style="text-align: center;">
                                <span class="stext-110 cl2">
                                    Thông tin khách hàng:
                                </span>
                            </div>
                        </div>

                        <div class="w-full-ssm justify-content-center">
                            <div class="p-t-15">
                                <div class="bor8 bg0 m-b-22">
                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="name"
                                        placeholder="Họ tên người nhận" required>
                                </div>
                                <div class="bor8 bg0 m-b-12">
                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="number" name="phone"
                                        placeholder="Số điện thoại" required>
                                </div>
                                <div class="bor8 bg0 m-b-22">
                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="email" name="email"
                                        placeholder="Email" required>
                                </div>
                                <div class="bor8 bg0 m-b-12">
                                    <textarea placeholder="Địa chỉ giao hàng" class="stext-111 cl8 plh3 size-111 p-lr-15" name="address" required></textarea>
                                </div>
                                <div class="bor8 bg0 m-b-12">
                                    <textarea placeholder="Mô tả" class="stext-111 cl8 plh3 size-111 p-lr-15" name="content" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="p-t-30">
                            <button type="submit" formaction="/order"
                                class="flex-c-m stext-101  cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                                Đặt hàng
                            </button>
                        </div>

                    </div>
                    @csrf
                </form>
            </div>

        </div>
    </div>
    </div>

@endsection
