@extends('admin_layout.index')
@section('content')
@section('title', 'Danh sách cấu hình sản phẩm')

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
                                        <th>Thông tin cấu hình</th>
                                        <th>Giá cấu hình</th>
                                        <th>Số lượng</th>
                                        <th>Cấu hình thuộc sản phẩm</th>
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
                                                    <form action="{{route('product.config.add', ['id' => $getNamePro->id])}}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Thêm cấu hình</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Thông tin cấu hình</label>
                                                                    <textarea name="config_product" class="form-control" rows="2" placeholder="Thông tin cấu hình" style="height: 64px;"></textarea>
                                                                </div>


                                                                <div class="mb-3">
                                                                    <label class="form-label">Giá cấu hình</label>
                                                                    <input type="number" name="price_cf" class="form-control" placeholder="Nhập vào giá cấu hình">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label class="form-label">Số lượng cấu hình</label>
                                                                    <input type="number" name="quantity" class="form-control" placeholder="Nhập vào số lượng cấu hình">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label class="form-label">Cấu hình thuộc sản phẩm</label>
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
                                @foreach ($listConfig as $conf)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td style="max-width: 500px">{{$conf->config_product}}</td>
                                        <td>{{ $conf->price_cf}}</td>
                                        <td>{{ $conf->quantity}}</td>
                                        <td>{{$getNamePro->name}}</td>
                                        <td>
                                                @if($conf->status == 1)
                                                <a href="{{route('ActiveStatusConfig', ['id' => $conf->id])}}" class="btn btn-success">Hoạt động</a>
                                                @endif
                                                @if($conf->status == 0)
                                                <a href="{{route('UnactiveStatusConfig', ['id' => $conf->id])}}" class="btn btn-danger">Không hoạt động</a>
                                             @endif                                          
                                        </td>
                                        <td>{{$conf->created_at}}</td>
                                        <td>{{$conf->updated_at}}</td>
                                        <td>
                                            <a href="{{route('product.config.update', ['id' => $conf->id])}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 align-middle"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a>
                                            <a  href="{{route('deleteConfig', ['id' => $conf->id])}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash align-middle"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a>
                                        </td>
                                    </tr>
                                 @endforeach
                                </tbody>
                            </table>
                            <div class="text-center">
                                {{$listConfig->links()}} 
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