@extends('admin.users.layouts.base')
@section('title', 'Danh sách giỏ hàng')
@section('main')
    <table>
        <thead>
            <tr>
                <th style="padding: 0 20px;"> ID </th>
                <th style="padding: 0 20px;"> Name</th>
                <th style="padding: 0 20px;"> Phone</th>
                <th style="padding: 0 20px;"> Email</th>
                <th style="padding: 0 20px;"> Content</th>
            </tr>
        </thead>
        <tbody>
            {!! Helper::carts($customers) !!}
        </tbody>

    </table>
    {!! $customers->links() !!}
@endsection
