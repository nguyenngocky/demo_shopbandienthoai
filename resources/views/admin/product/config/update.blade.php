@extends('admin_layout.index')
@section('content')
@section('title', 'Cập nhật sản phẩm')
    <div class="card-body h-100">
        <div class="col-12 col-xl-16">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('product.config.update.post', ['id' => $obj->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $obj->id }}">
                       <div class="mb-3">
                            <label class="form-label">Thông tin cấu hình</label>
                            <textarea name="config_product" class="form-control" rows="2" placeholder="Thông tin cấu hình" style="height: 64px;">{{$obj->config_product}}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Giá cấu hình</label>
                            <input type="text" name="price_cf" value="{{$obj->price_cf}}" class="form-control" placeholder="Nhập vào giá cấu hình">
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
    @endsection