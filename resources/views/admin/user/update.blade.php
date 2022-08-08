@extends('admin_layout.index')
@section('content')
@section('title', 'Cập nhật người dùng')
    <div class="card-body h-100">
        <div class="col-12 col-xl-16">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('user.update.post', ['id' => $obj->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $obj->id }}">
                        
                        <div class="mb-3">
                            <label class="form-label">Tên</label>
                            <input type="text" name="name" value="{{$obj->name}}" class="form-control" placeholder="Nhập vào tên">
                        </div>


                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" value="{{$obj->email}}" class="form-control" placeholder="Nhập vào email">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Mật khẩu</label>
                            <input type="password" name="password" class="form-control" placeholder="Nhập vào mật khẩu ">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Địa chỉ</label>
                            <input type="text" name="address" value="{{$obj->address}}" class="form-control" placeholder="Nhập vào địa chỉ ">
                        </div>

                        <div class="mb-3">
                            <label class="form-label w-100">Ảnh ( nếu có )</label>
                            <img id="image"
                                src="{{ $obj->avatar?''.Storage::url($obj->avatar):'http://placehold.it/100x100' }}"
                                alt="your image"
                                style="max-width: 200px; height:100px; margin-bottom: 10px;" class="img-responsive"/>
                                
                            <input name="avatar" type="file" id="img">
                            <small class="form-text text-muted">Chọn ảnh kích thước nhỏ hơn 5mb</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Số điện thoại</label>
                            <input type="number" name="phone" value="{{ $obj->phone }}" class="form-control" placeholder="Nhập vào SĐT ">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Vai trò</label>
                            <select name="role_id" class="form-select flex-grow-1">
                                    @foreach ($role as $rl)
                                    @if($rl->id == $obj->role_id)
                                      <option selected value="{{$obj->id}}"> {{$rl->name}}</option>
                                    @else
                                    <option value="{{$rl->id}}"> {{$rl->name}}</option>
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
                        <a class="btn btn-primary" href="{{route('user')}}">Quay lại</a>
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