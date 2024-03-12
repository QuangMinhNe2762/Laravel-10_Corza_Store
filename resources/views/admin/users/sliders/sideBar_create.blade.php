@extends('admin.users.layouts.base')
@section('main')
@section('title','Thêm Slider')
@include('admin.users.alert')
<form action="{{route('sliders.store')}}" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="slider">Tiêu đề</label>
                    <input type="text" class="form-control" value="{{old('name')}}" name="name" placeholder="Nhập Tiêu đề">
                  </div>
                  <div class="form-group">
                    <label for="slider">Đường dẫn</label>
                    <input class="form-control" placeholder="Nhập đường dẫn" value="{{old('url')}}" type="url" name="url" id="url">
                  </div>
                  <div class="form-group">
                    <label>Ảnh sản phẩm</label>
                    <input type="file" class="form-control" placeholder="Enter image" name="upload" id="upload" accept="image/png, image/jpeg">
                    <div id="image_show">
                    </div>
                    {{-- src="{{old('thumb')}}" --}}
                    <input type="hidden" name="image" id="image">
                  </div>
                  <div class="form-group">
                    <label for="slider">Sắp xếp</label>
                    <input type="number" class="form-control" placeholder="Nhập số thứ tự ảnh" name="sort_by" id="sort_by" style="width: 200px" value="{{old('sort_by')}}" min="1">
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
                  <button type="submit" class="btn btn-primary">Thêm slider</button>
                </div>
                @csrf
              </form>
@endsection
