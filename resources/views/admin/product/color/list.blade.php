@extends('admin_layout.index')
@section('content')
@section('title', 'Danh sách màu sản phẩm')

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
                                        <th>Tên màu</th>
                                        <th>Mã màu ( Nhập mã màu đúng như với tên màu)</th>
                                        <th>Giá màu (Không có thì để = 0)</th>
                                        <th>Màu thuộc sản phẩm</th>
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
                                                    <form action="{{route('product.color.add', ['id' => $getNamePro->id])}}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Thêm màu</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Mã màu</label>
                                                                    <input type="text" name="name" class="form-control" placeholder="Nhập vào tên màu">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label class="form-label">Mã màu ( Nhập mã màu đúng như với tên màu)</label>
                                                                    <a target="_blank" class="sidebar-link" href="https://imagecolorpicker.com/vi">Liên kết lấy mã màu</a>
                                                                    <input type="text" name="color_code" class="form-control" placeholder="Nhập vào mã màu">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label class="form-label">Giá màu (Không có thì để = 0)</label>
                                                                    <input type="number" name="price_cl" class="form-control" placeholder="Nhập vào giá màu">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label class="form-label">Màu thuộc sản phẩm</label>
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
                                @foreach ($listColor as $color)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$color->name}}</td>
                                        <td><div style="width: 50px; height: 50px; background: {{$color->color_code}}"></div>{{$color->color_code}}</td>
                                        <td>{{$color->price_cl}}</td>
                                        <td>{{$getNamePro->name}}</td>
                                        <td>
                                                @if($color->status == 1)
                                                <a href="{{route('ActiveStatusColor', ['id' => $color->id])}}" class="btn btn-success">Hoạt động</a>
                                                @endif
                                                @if($color->status == 0)
                                                <a href="{{route('UnactiveStatusColor', ['id' => $color->id])}}" class="btn btn-danger">Không hoạt động</a>
                                             @endif                                          
                                        </td>
                                        <td>{{$color->created_at}}</td>
                                        <td>{{$color->updated_at}}</td>
                                        <td>
                                            <a href="{{route('product.color.update', ['id' => $color->id])}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 align-middle"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a>
                                            <a  href="{{route('deleteColor', ['id' => $color->id])}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash align-middle"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a>
                                        </td>
                                    </tr>
                                 @endforeach
                                </tbody>
                            </table>
                            <div class="text-center">
                                {{$listColor->links()}} 
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

@endsection