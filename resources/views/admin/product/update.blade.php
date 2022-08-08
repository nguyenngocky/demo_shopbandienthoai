@extends('admin_layout.index')
@section('content')
@section('title', 'Cập nhật sản phẩm')
    <div class="card-body h-100">
        <div class="col-12 col-xl-16">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('product.update.post', ['id' => $obj->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $obj->id }}">
                       <div class="mb-3">
                            <label class="form-label">Tên sản phẩm</label>
                            <input type="text" name="name" value="{{$obj->name}}" class="form-control" placeholder="Nhập vào tên danh mục">
                        </div>

                        <div class="mb-3">
                            <label class="form-label w-100">Ảnh ( nếu có )</label>
                            <img id="image"
                                src="{{ $obj->image?''.Storage::url($obj->image):'http://placehold.it/100x100' }}"
                                alt="your image"
                                style="max-width: 200px; height:100px; margin-bottom: 10px;" class="img-responsive"/>
                                
                            <input name="image" type="file" id="img">
                            <small class="form-text text-muted">Chọn ảnh kích thước nhỏ hơn 5mb</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Giá sản phẩm</label>
                            <input type="text" name="price" value="{{$obj->price}}" class="form-control" placeholder="Nhập vào giá">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Giảm giá sản phẩm</label>
                            <input type="text" name="discount" value="{{$obj->discount}}" class="form-control" placeholder="Nhập vào giá">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Mô tả ngắn</label>
                            <textarea name="desc" class="form-control" rows="2" placeholder="Mô tả ngắn sản phẩm" style="height: 64px;">{{$obj->desc}}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Trạng thái</label>
                            <select name="status" class="form-select flex-grow-1">
                                @if($obj->status == 1)
                                <option value="1" selected> Hoạt động </option>
                                <option value="0"> Không hoạt động </option>
                                @else
                                <option value="0" selected> Không hoạt động </option>
                                <option value="1"> Hoạt động </option>
                                @endif
                            </select>
                        </div>

                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a class="btn btn-primary" href="{{route('product')}}">Quay lại</a>
                    </form>
                    {{-- //Hiển thị thông báo thành công --}}
                    <br>
                    @if ( Session::has('success') )
                        <div class="alert alert-success alert-outline alert-dismissible" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <div class="alert-icon">
                                <i class="far fa-fw fa-bell"></i>
                            </div>
                            <div class="alert-message">
                                <strong>{{ Session::get('success') }}</strong>
                            </div>
                        </div>
                    @endif
                    <?php //Hiển thị thông báo lỗi?>
                    @if ( Session::has('error') )
                        <div class="alert alert-danger alert-outline alert-dismissible" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <div class="alert-icon">
                                <i class="far fa-fw fa-bell"></i>
                            </div>
                            <div class="alert-message">
                                <strong>{{ Session::get('error') }}</strong>
                            </div>
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger alert-outline alert-dismissible" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <div class="alert-icon">
                                <i class="far fa-fw fa-bell"></i>
                            </div>
                            <div class="alert-message">
                                <strong>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </strong>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@include('admin_layout.js_upload_file');
    @endsection