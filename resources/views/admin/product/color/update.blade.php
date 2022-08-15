@extends('admin_layout.index')
@section('content')
@section('title', 'Cập nhật màu')
    <div class="card-body h-100">
        <div class="col-12 col-xl-16">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('product.color.update.post', ['id' => $obj->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $obj->id }}">
                       <div class="mb-3">
                            <label class="form-label">Tên màu</label>
                            <input type="text" name="name" class="form-control" value="{{ $obj->name }}"placeholder="Nhập vào tên màu">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Mã màu ( Nhập mã màu đúng như với tên màu)</label>
                            <a target="_blank" class="sidebar-link" href="https://imagecolorpicker.com/vi">Liên kết lấy mã màu</a>
                            <input type="text" name="color_code" value="{{ $obj->color_code }}" class="form-control" placeholder="Nhập vào mã màu">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Giá màu (Không có thì để = 0)</label>
                            <input type="text" name="price_cl" value="{{ $obj->price_cl }} "class="form-control" placeholder="Nhập vào giá màu">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Số lượng</label>
                            <input type="text" name="quantity" value="{{ $obj->quantity }}" class="form-control" placeholder="Nhập vào tên màu">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Cấu hình thuộc sản phẩm</label>
                            <select name="pro_id" class="form-select flex-grow-1">
                                @foreach($Product as $pro)
                                    @if($pro->id == $obj->pro_id)
                                    <option selected value="{{$pro->id}}">{{$pro->name}}</option>
                                    @else
                                    <option value="{{$pro->id}}">{{$pro->name}}</option>
                                    @endif
                                @endforeach
                            </select>
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
                        <a class="btn btn-primary" href="{{route('product.color', ['id' => $obj->pro_id])}}">Quay lại</a>
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
    @endsection