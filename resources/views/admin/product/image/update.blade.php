@extends('admin_layout.index')
@section('content')
@section('title', 'Cập nhật Ảnh')
    <div class="card-body h-100">
        <div class="col-12 col-xl-16">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('product.image.update.post', ['id' => request()->route('id')])}}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $obj->id }}">

                        <div class="mb-3">
                            <label class="form-label w-100">Ảnh 1</label>
                            <img id="image"
                                src="{{ $obj->image1?''.Storage::url($obj->image1):'http://placehold.it/100x100' }}"
                                alt="your image"
                                style="max-width: 200px; height:100px; margin-bottom: 10px;" class="img-responsive"/>
                                
                            <input name="image1" type="file" id="img">
                            <small class="form-text text-muted">Chọn ảnh kích thước nhỏ hơn 5mb</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label w-100">Ảnh 2</label>
                            <img id="image2"
                                src="{{ $obj->image2?''.Storage::url($obj->image2):'http://placehold.it/100x100' }}"
                                alt="your image"
                                style="max-width: 200px; height:100px; margin-bottom: 10px;" class="img-responsive"/>
                                
                            <input name="image2" type="file" id="img2">
                            <small class="form-text text-muted">Chọn ảnh kích thước nhỏ hơn 5mb</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label w-100">Ảnh 3</label>
                            <img id="image3"
                                src="{{ $obj->image3?''.Storage::url($obj->image3):'http://placehold.it/100x100' }}"
                                alt="your image"
                                style="max-width: 200px; height:100px; margin-bottom: 10px;" class="img-responsive"/>
                                
                            <input name="image3" type="file" id="img3">
                            <small class="form-text text-muted">Chọn ảnh kích thước nhỏ hơn 5mb</small>
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
                        <a class="btn btn-primary" href="{{route('product.image', ['id' => $obj->pro_id])}}">Quay lại</a>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
     $(function(){
         function readURL(input, selector) {
             if (input.files && input.files[0]) {
                 let reader = new FileReader();
 
                 reader.onload = function (e) {
                     $(selector).attr('src', e.target.result);
                 };
 
                 reader.readAsDataURL(input.files[0]);
             }
         }
         $("#img").change(function () {
             readURL(this, '#image');
         });
         $("#img2").change(function () {
             readURL(this, '#image2');
         });
         $("#img3").change(function () {
             readURL(this, '#image3');
         });
 
     });
 </script>

    @endsection