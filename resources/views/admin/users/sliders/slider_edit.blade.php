@extends('admin.users.layouts.base')
@section('main')
@section('title','Chỉnh sửa Slider')
@include('admin.users.alert')
<form action="{{route('sliders.update',$slide->id)}}" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="slider">Tiêu đề</label>
                    <input type="text" class="form-control" value="{{$slide->name}}" name="name" placeholder="Nhập Tiêu đề">
                  </div>
                  <div class="form-group">
                    <label for="slider">Đường dẫn</label>
                    <input class="form-control" placeholder="Nhập đường dẫn" value="{{$slide->url}}" type="url" name="url" id="url">
                  </div>
                  <div class="form-group">
                    <label>Ảnh sản phẩm</label>
                    <input type="file" class="form-control" placeholder="Enter image" name="upload" id="upload" accept="image/png, image/jpeg">
                    <div id="image_show">
                        <a href="{{$slide->image}}" target="_blank">
                        <img src="{{$slide->image}}" alt="" width="100px" height="100px">
                        </a>
                    </div>
                    <input type="hidden" name="image" id="image" value="{{$slide->image}}">
                  </div>
                  <div class="form-group">
                    <label for="slider">Sắp xếp</label>
                    <input type="number" class="form-control" placeholder="Nhập số thứ tự ảnh" name="sort_by" id="sort_by" style="width: 200px" value="{{$slide->sort_by}}" min="1">
                  </div>
                  <div class="form-group">
                    <div class="form-check">
                          <input class="form-check-input" value="1" type="radio" name="active"{{$slide->active==1? 'checked=""':''}}>
                          <label class="form-check-label">Kích hoạt</label>
                        </div>
                            <div class="form-check">
                          <input class="form-check-input" value="0" type="radio" name="active"{{$slide->active==0? 'checked=""':''}}>
                          <label class="form-check-label">Không kích hoạt</label>
                        </div>
                  </div>
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Chỉnh sửa slider</button>
                </div>
                @csrf
                @method('PUT')
              </form>
@endsection
