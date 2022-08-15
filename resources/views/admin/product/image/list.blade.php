@extends('admin_layout.index')
@section('content')
@section('title', 'Danh sách ảnh')

    <main class="content">
        <div class="container-fluid p-0">

            <div class="mb-3">
                <h1 class="h3 d-inline align-middle"></h1>
            </div>
            <a class="btn btn-primary" href="{{route('product')}}">Quay lại</a>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
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
                            <table id="datatables-reponsive" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Ảnh 1</th>
                                        <th>Ảnh 2</th>
                                        <th>Ảnh 3</th>
                                        <th>Ảnh thuộc sản phẩm</th>
                                        <th>Trạng thái</th>
                                        <th>Ngày tạo</th>
                                        <th>Ngày cập nhật</th>
                                        <th>
                                            
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#defaultModalPrimary">
                                                Tạo mới
                                            </button>
                                            <!-- Create -->
                                            <div class="modal fade" id="defaultModalPrimary" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form action="{{route('product.image.add', ['id' => $getNamePro->id])}}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Thêm Ảnh</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">

                                                                <div class="mb-3">
                                                                    <label class="form-label w-100">Ảnh 1</label>
                                                                    <img id="image" src="https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg" alt="your image"
                                                                        style="max-width: 200px; height:100px; margin-bottom: 10px;" class="img-fluid"/>
                                                                    <input name="image1" type="file" id="img">
                                                                    <small class="form-text text-muted">Chọn ảnh kích thước nhỏ hơn 5mb</small>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label class="form-label w-100">Ảnh 2</label>
                                                                    <img id="image2" src="https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg" alt="your image"
                                                                        style="max-width: 200px; height:100px; margin-bottom: 10px;" class="img-fluid"/>
                                                                    <input name="image2" type="file" id="img2">
                                                                    <small class="form-text text-muted">Chọn ảnh kích thước nhỏ hơn 5mb</small>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label class="form-label w-100">Ảnh 3</label>
                                                                    <img id="image3" src="https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg" alt="your image"
                                                                        style="max-width: 200px; height:100px; margin-bottom: 10px;" class="img-fluid"/>
                                                                    <input name="image3" type="file" id="img3">
                                                                    <small class="form-text text-muted">Chọn ảnh kích thước nhỏ hơn 5mb</small>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label class="form-label">Ảnh thuộc sản phẩm</label>
                                                                    <select name="pro_id" class="form-select flex-grow-1">
                                                                        @foreach($Product as $pro)
                                                                            @if($pro->id == $getNamePro->id)
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
                                                                            <option value="1"> Hoạt động </option>
                                                                            <option value="0"> Không hoạt động </option>
                                                                    </select>
                                                                </div>
                                                                
                                                            </div>
                                                            
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Thêm</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- end create -->
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($listImage as $img)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>

                                        <td class="text-center"><img width="100px" src="{{asset('storage/'. $img->image1)}}" alt=""></td>
                                        <td class="text-center"><img width="100px" src="{{asset('storage/'. $img->image2)}}" alt=""></td>
                                        <td class="text-center"><img width="100px" src="{{asset('storage/'. $img->image3)}}" alt=""></td>
                                        <td>{{$getNamePro->name}}</td>
                                        <td>
                                                @if($img->status == 1)
                                                <a href="{{route('UnactiveStatusImage', ['id' => $img->id])}}" class="btn btn-success">Hoạt động</a>
                                                @endif
                                                @if($img->status == 0)
                                                <a href="{{route('ActiveStatusImage', ['id' => $img->id])}}" class="btn btn-danger">Không hoạt động</a>
                                             @endif                                          
                                        </td>
                                
                                        <td>{{$img->created_at}}</td>
                                        <td>{{$img->updated_at}}</td>
                                        <td>
                                            <a href="{{route('product.image.update', ['id' => $img->id])}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 align-middle"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a>
                                            <a onclick="return Del()" href="{{route('deleteImage', ['id' => $img->id])}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash align-middle"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a>
                                            <a href="{{route('product')}}">Sản phẩm</a>
                                        </td>
                                    </tr>
                                 @endforeach
                                </tbody>
                            </table>
                            <div class="text-center">
                                {{$listImage->links()}} 
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
	</main>
    {{-- <script src="{{ asset('Admin_layout/js/datatables.js')}}"></script> --}}
    <script>
		document.addEventListener("DOMContentLoaded", function() {
			// Datatables Responsive
			$("#datatables-reponsive").DataTable({
				responsive: true
			});
		});
	</script>
    <script>
        function Del(name){
            return confirm("Bạn có muốn xóa?");
        }
    </script>
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