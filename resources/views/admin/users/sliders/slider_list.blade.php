@extends('admin.users.layouts.base');
@section('main')
@section('title','Danh sách slider')
<table>
    <thead>
    <tr>
        <th style="padding: 0 20px;">    ID      </th>
        <th style="padding: 0 20px;">    Name        </th>
        <th style="padding: 0 20px;">    Image       </th>
        <th style="padding: 0 20px;">    Sort by      </th>
        <th style="padding: 0 20px;">    Url      </th>
        <th style="padding: 0 20px;">    Active      </th>
    </tr>
    </thead>
    <tbody>
        {!!Helper::sliders($sliders)!!}
    </tbody>

</table>
@endsection
