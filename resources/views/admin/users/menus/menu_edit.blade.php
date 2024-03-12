@extends('admin.users.layouts.base')
@section('main')
@section('title','chỉnh sửa danh mục'.$menu->name)
@include('admin.users.alert')
<form action="" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="menu">Tên danh mục</label>
                    <input type="text" class="form-control" name="name" placeholder="Nhập tên danh mục" value="{{$menu->name}}">
                  </div>
                  <div class="form-group">
                    <label for="menu">Danh mục</label>
                    <select name="parent_id" class="form-control">
                        <option value="0">Danh mục cha</option>
                        @foreach ($menus as $menuParrent)
                            <option value="{{$menuParrent->id}}" {{$menu->parent_id==$menuParrent->id ? 'selected':''}} >{{$menuParrent->name}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="menu">Mô tả</label>
                    <textarea name="description" class="form-control" placeholder="Nhập mô tả">{{$menu->description}}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="menu">Nội dung</label>
                    <textarea class="form-control" placeholder="Nhập nội dung" name="content" id="content">{{$menu->content}}</textarea>
                  </div>
                  <div class="form-group">
                    <div class="form-check">
                          <input class="form-check-input" value="1" type="radio" name="active" {{$menu->active==1 ?'checked=""':''}}>
                          <label class="form-check-label">Kích hoạt</label>
                        </div>
                                            <div class="form-check">
                          <input class="form-check-input" value="0" type="radio" name="khong_kich_hoat" {{$menu->active==0 ?'checked=""':''}}>
                          <label class="form-check-label">Không kích hoạt</label>
                        </div>
                  </div>
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Cập nhật danh mục</button>
                </div>
                @csrf
              </form>
@endsection
@section('js-custom')
<script>
  ClassicEditor
        .create(document.querySelector('#content'))
        .catch(error => {
            console.error(error);
        });
</script>
@endsection
