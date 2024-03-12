@extends('admin.users.layouts.base')
@section('title', 'Danh sách sản phẩm trong giỏ hàng')
@section('main')
    <table>
        <thead>
            <tr>
                <th style="padding: 0 20px;"> ID </th>
                <th style="padding: 0 20px;"> Customer ID</th>
                <th style="padding: 0 20px;"> Product ID</th>
                <th style="padding: 0 20px;"> Quantity</th>
                <th style="padding: 0 20px;"> Price</th>
            </tr>
        </thead>
        <tbody>
            {!! Helper::cartProduct($products) !!}
        </tbody>

    </table>
    {!! $products->links() !!}
@endsection
