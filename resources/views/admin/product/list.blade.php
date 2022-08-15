@extends('admin_layout.index')
@section('content')
@section('title', 'Danh sách sản phẩm')

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
                                        <th>Tên Sản phẩm</th>
                                        <th>Ảnh</th>
                                        <th>Giá</th>
                                        <th>Giảm giá</th>
                                        <th>Số lượng</th>
                                        <th>Lượt xem</th>
                                        <th>Mô tả ngắn</th>
                                        <th>Sản phẩm thuộc danh mục</th>
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
                                                    <form action="{{route('addProduct')}}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Thêm sản phẩm</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Tên sản phẩm</label>
                                                                    <input type="text" name="name" class="form-control" placeholder="Nhập vào tên sản phẩm">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label class="form-label w-100">Ảnh</label>
                                                                    <img id="image" src="https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg" alt="your image"
                                                                        style="max-width: 200px; height:100px; margin-bottom: 10px;" class="img-fluid"/>
                                                                    <input name="image" type="file" id="img">
                                                                    <small class="form-text text-muted">Chọn ảnh kích thước nhỏ hơn 5mb</small>
                                                                </div>


                                                                <div class="mb-3">
                                                                    <label class="form-label">Giá</label>
                                                                    <input type="number" name="price" class="form-control" placeholder="Nhập vào giá sản phẩm">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label class="form-label">Số lượng</label>
                                                                    <input type="number" name="quantity" class="form-control" placeholder="Nhập vào số lượng sản phẩm">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label class="form-label">Giảm giá</label>
                                                                    <input type="number" name="discount" class="form-control" placeholder="Nhập vào giảm giá ">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label class="form-label">Mô tả ngắn</label>
                                                                    <textarea name="desc" class="form-control" rows="2" placeholder="Mô tả ngắn sản phẩm" style="height: 64px;"></textarea>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label class="form-label">Sản phẩm thuộc danh mục</label>
                                                                    <select name="cate_id" class="form-select flex-grow-1">
                                                                        @foreach($category as $cate)
                                                                            <option value="{{$cate->id}}">{{$cate->name}}</option>
                                                                           
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
                                @foreach ($listPro as $pro)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$pro->name}}</td>
                                        <td class="text-center"><img width="100px" src="{{asset('storage/'. $pro->image)}}" alt=""></td>
                                        <td>{{ number_format($pro->price)}}</td>
                                        <td>{{ $pro->discount}}%</td>
                                        <td>{{ $pro->quantity}}</td>
                                        <td>{{ $pro->view}}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#sizedModalMd{{$pro->id}}">
                                                Xem chi tiết
                                            </button>
                                            <div class="modal fade" id="sizedModalMd{{$pro->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-md" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Mô tả ngắn</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body m-3">
                                                            <p class="mb-0">{{$pro->desc}}</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                            @foreach ($category as $cate)
                                               @if($pro->cate_id == $cate->id)
                                               <td>{{$cate->name}}</td>
                                               @endif
                                            @endforeach

                                        <td>
                                                @if($pro->status == 1)
                                                <a href="{{route('ActiveStatusPro', ['id' => $pro->id])}}" class="btn btn-success">Hoạt động</a>
                                                @endif
                                                @if($pro->status == 0)
                                                <a href="{{route('UnactiveStatusPro', ['id' => $pro->id])}}" class="btn btn-danger">Không hoạt động</a>
                                             @endif                                          
                                        </td>
                                        <td>{{$pro->created_at}}</td>
                                        <td>{{$pro->updated_at}}</td>
                                        <td>
                                            <a href="{{route('product.update', ['id' => $pro->id])}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 align-middle"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a>
                                            <a onclick="return Del()" href="{{route('deleteProduct', ['id' => $pro->id])}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash align-middle"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a>
                                            <a href="{{route('product.config', ['id' => $pro->id])}}">Cấu hình</a> /
                                            <a href="{{route('product.color', ['id' => $pro->id])}}">Màu sắc</a> /
                                            <a href="{{route('product.image', ['id' => $pro->id])}}">Hình ảnh</a>
                                        </td>
                                    </tr>
                                 @endforeach
                                </tbody>
                            </table>
                            <div class="text-center">
                                {{$listPro->links()}} 
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
            return confirm("Bạn có muốn xóa? Xóa sản phẩm sẽ xóa cả cấu hình lẫn màu sắc của sản phẩm đó !");
        }
    </script>
    @include('admin_layout.js_upload_file')

@endsection