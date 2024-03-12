@extends('admin.users.layouts.base')
@section('main')
@section('title','Thêm sản phẩm')
@include('admin.users.alert')
<div class="card-body">
                <form action="{{route('products.store')}}" method="POST">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Tên sản phẩm</label>
                        <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Enter name product">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                    <label for="menu">Danh mục</label>
                    <select name="menu_id" class="form-control">
                        @foreach ($menus as $menu)
                            <option value="{{$menu->id}}" >{{$menu->name}}</option>
                        @endforeach
                    </select>
                  </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control"  name="description" rows="3" placeholder="Enter description">{{old('description')}}</textarea>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Content</label>
                        <textarea class="form-control" id="content"  name="content" rows="3" placeholder="Enter Content">{{old('content')}}</textarea>
                      </div>
                    </div>
                  </div>

                  <!-- input states -->
                  <div class="form-group">
                    <label>Price</label>
                    <input type="number" name="price" value="{{old('price')}}" class="form-control" placeholder="Enter Price">
                  </div>
                  <div class="form-group">
                    <label>Price sale</label>
                    <input type="number" name="price_salce" value="{{old('price_salce')}}" class="form-control" placeholder="Enter price sale">
                  </div>
                  <div class="form-group">
                    <label>Quantity</label>
                    <input type="number" name="quantity" value="{{old('quantity')}}" class="form-control" placeholder="Enter Quantity">
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- radio -->
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
                  <div class="form-group">
                    <label>Image</label>
                    <input type="file" class="form-control" placeholder="Enter image" id="upload" accept="image/png, image/jpeg">
                    <div id="image_show">

                    </div>
                    <input type="hidden" name="image" id="image">
                  </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
                      </div>
                    </div>
                  </div>
                  @csrf
                </form>
              </div>
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
