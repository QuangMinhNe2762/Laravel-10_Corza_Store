@extends('admin.users.layouts.base')
@section('main')
@section('title','Danh sách danh mục')
<table>
    <thead>
    <tr>
        <th style="padding: 0 20px;">    ID      </th>
        <th style="padding: 0 20px;">    Name        </th>
        <th style="padding: 0 20px;">    parent_id       </th>
        <th style="padding: 0 20px;">    Active      </th>
        <th style="padding: 0 20px;">    featture      </th>
    </tr>
    </thead>
    <tbody>
        {!! Helper::menu($menus) !!}
    </tbody>

</table>
@endsection
