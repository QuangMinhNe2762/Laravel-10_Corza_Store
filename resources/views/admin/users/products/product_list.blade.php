@extends('admin.users.layouts.base');
@section('main')
@section('title','Danh sách sản phẩm')
<table>
    <thead>
    <tr>
        <th style="padding: 0 20px;">    ID      </th>
        <th style="padding: 0 20px;">    Name        </th>
        <th style="padding: 0 20px;">   description       </th>
        <th style="padding: 0 20px;">    content      </th>
        <th style="padding: 0 20px;">    price      </th>
        <th style="padding: 0 20px;">    price_sale      </th>
        <th style="padding: 0 20px;">    quantity      </th>
        <th style="padding: 0 20px;">    menu_id      </th>
        <th style="padding: 0 20px;">    image      </th>
        <th style="padding: 0 20px;">    active      </th>
    </tr>
    </thead>
    <tbody>
        {{-- @foreach ($products as $product)
        <tr>
        <td style="padding: 0 20px;">{{$product->id}}</td>
        <td style="padding: 0 20px;">{{$product->name}}</td>
        <td style="padding: 0 20px;">{{$product->description}}</td>
        <td style="padding: 0 20px;">{{$product->content}}</td>
        <td style="padding: 0 20px;">{{$product->price}}</td>
        <td style="padding: 0 20px;">{{$product->price_salce}}</td>
        <td style="padding: 0 20px;">{{$product->quantity}}</td>
        <td style="padding: 0 20px;">{{$product->menu_id}}</td>
        <td style="padding: 0 20px;"> <img src="{{$product->image}}" width="50px" height="100px"></td>
        <td style="padding: 0 20px;">{!!Helper::active($product->active)!!}</td>
        <td style="padding: 0 20px;">
        <a href="{{route('products.edit',$product->id)}}"><i class="fa-solid fa-pen-to-square"></i></a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="#" onclick=""><i class="fa-solid fa-trash"></i></i></a>
        </td>
        </tr>
        @endforeach --}}
        {!!Helper::products($products)!!}
    </tbody>

</table>
{!!$products->links()!!}
@endsection
