@extends('admin_layout.index')
@section('content')
@section('title', 'Danh sách danh mục')

    <main class="content">
        <div class="container-fluid p-0">

            <div class="mb-3">
                <h1 class="h3 d-inline align-middle"></h1>
            </div>

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
                                        <th>Tên Danh mục</th>
                                        <th>Ảnh</th>
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
                                                    <form action="{{route('addCategory')}}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Thêm Danh mục</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Tên danh mục</label>
                                                                    <input type="text" name="name" class="form-control" placeholder="Nhập vào tên danh mục">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label class="form-label w-100">Ảnh ( nếu có )</label>
                                                                    <img id="image" src="https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg" alt="your image"
                                                                        style="max-width: 200px; height:100px; margin-bottom: 10px;" class="img-fluid"/>
                                                                    <input name="image" type="file" id="img">
                                                                    <small class="form-text text-muted">Chọn ảnh kích thước nhỏ hơn 5mb</small>
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
                                @foreach ($listCate as $cate)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$cate->name}}</td>
                                        <td class="text-center"><img width="100px" src="{{asset('storage/'. $cate->image)}}" alt=""></td>
                                        <td>
                                                @if($cate->status == 1)
                                                <a href="{{route('UnactiveStatus', ['id' => $cate->id])}}" class="btn btn-success">Hoạt động</a>
                                                @endif
                                                @if($cate->status == 0)
                                                <a href="{{route('ActiveStatus', ['id' => $cate->id])}}" class="btn btn-danger">Không hoạt động</a>
                                             @endif                                          
                                        </td>
                                        <td>{{$cate->created_at}}</td>
                                        <td>{{$cate->updated_at}}</td>
                                        <td>
                                            <a href="{{route('category.update', ['id' => $cate->id])}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 align-middle"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a>
                                            <a onclick="return Del()" href="{{route('deleteCategory', ['id' => $cate->id])}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash align-middle"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a>
                                            <a href="{{route('product')}}">Sản phẩm</a>
                                        </td>
                                    </tr>
                                 @endforeach
                                </tbody>
                            </table>
                            <div class="text-center">
                                {{$listCate->links()}} 
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
            return confirm("Bạn có muốn xóa? Xóa danh mục sẽ xóa cả sản phẩm trong danh mục đó !");
        }
    </script>
    @include('admin_layout.js_upload_file')

@endsection