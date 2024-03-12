@extends('admin.users.layouts.base')
@section('main')
@section('title','Thêm danh mục')
@include('admin.users.alert')
<form action="" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="menu">Tên danh mục</label>
                    <input type="text" class="form-control" name="name" placeholder="Nhập tên danh mục">
                  </div>
                  <div class="form-group">
                    <label for="menu">Danh mục</label>
                    <select name="parent_id" class="form-control">
                        <option value="0">Danh mục cha</option>
                        @foreach ($menus as $menu)
                            <option value="{{$menu->id}}">{{$menu->name}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="menu">Mô tả</label>
                    <textarea name="description" class="form-control" placeholder="Nhập mô tả"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="menu">Nội dung</label>
                    <textarea class="form-control" placeholder="Nhập nội dung" name="content" id="content"></textarea>
                  </div>
                  <div class="form-group">
                    <div class="form-check">
                          <input class="form-check-input" value="1" type="radio" name="active" checked="">
                          <label class="form-check-label">Kích hoạt</label>
                        </div>
                                            <div class="form-check">
                          <input class="form-check-input" value="0" type="radio" name="active">
                          <label class="form-check-label">Không kích hoạt</label>
                        </div>
                  </div>
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Tạo danh mục</button>
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
