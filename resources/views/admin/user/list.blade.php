@extends('admin_layout.index')
@section('content')
@section('title', 'Danh sách người dùng')

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
                                        <th>Tên</th>
                                        <th>Email</th>
                                        <th>Địa chỉ</th>
                                        <th>Avatar</th>
                                        <th>SĐT</th>
                                        <th>Vai trò</th>
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
                                                    <form action="{{route('addUser')}}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Thêm người dùng</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Tên</label>
                                                                    <input type="text" name="name" class="form-control" placeholder="Nhập vào tên">
                                                                </div>


                                                                <div class="mb-3">
                                                                    <label class="form-label">Email</label>
                                                                    <input type="email" name="email" class="form-control" placeholder="Nhập vào email">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label class="form-label">Mật khẩu</label>
                                                                    <input type="password" name="password" class="form-control" placeholder="Nhập vào mật khẩu ">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label class="form-label">Địa chỉ</label>
                                                                    <input type="text" name="address" class="form-control" placeholder="Nhập vào địa chỉ ">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label class="form-label w-100">Ảnh</label>
                                                                    <img id="image" src="https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg" alt="your image"
                                                                        style="max-width: 200px; height:100px; margin-bottom: 10px;" class="img-fluid"/>
                                                                    <input name="avatar" type="file" id="img">
                                                                    <small class="form-text text-muted">Chọn ảnh kích thước nhỏ hơn 5mb</small>
                                                                </div>
                                                                
                                                                <div class="mb-3">
                                                                    <label class="form-label">Số điện thoại</label>
                                                                    <input type="number" name="phone" class="form-control" placeholder="Nhập vào SĐT ">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label class="form-label">Vai trò</label>
                                                                    <select name="role_id" class="form-select flex-grow-1">
                                                                            @foreach ($role as $rl)
                                                                                <option value="{{$rl->id}}"> {{$rl->name}}</option>
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
                                @foreach ($listUser as $user)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email }}</td>
                                        <td>{{$user->address }}</td>
                                        <td class="text-center"><img width="100px" src="{{asset('storage/'. $user->avatar)}}" alt=""></td>
                                        <td>{{$user->phone }}</td>
                                        <td>
                                            @foreach ($role as $r)
                                                @if($r->id == $user->role_id)
                                                   {{$r->name}}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                                @if($user->status == 1)
                                                <a href="{{route('ActiveStatusUser', ['id' => $user->id])}}" class="btn btn-success">Hoạt động</a>
                                                @endif
                                                @if($user->status == 0)
                                                <a href="{{route('UnactiveStatusUser', ['id' => $user->id])}}" class="btn btn-danger">Không hoạt động</a>
                                             @endif                                          
                                        </td>
                                        <td>{{$user->created_at}}</td>
                                        <td>{{$user->updated_at}}</td>
                                        <td>
                                            <a href="{{route('user.update', ['id' => $user->id])}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 align-middle"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a>
                                            <a href="{{route('deleteUser', ['id' => $user->id])}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash align-middle"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a>
                                        </td>
                                    </tr>
                                 @endforeach
                                </tbody>
                            </table>
                            <div class="text-center">
                                {{$listUser->links()}} 
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
    {{-- <script>
        function Del(name){
            return confirm("Bạn có muốn xóa? Xóa sản phẩm sẽ xóa cả cấu hình lẫn màu sắc của sản phẩm đó !");
        }
    </script> --}}
    @include('admin_layout.js_upload_file')

@endsection