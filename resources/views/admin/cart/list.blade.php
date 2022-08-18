@extends('admin_layout.index')
@section('content')
@section('title', 'Danh sách đơn hàng')

<main class="content">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="datatables-reponsive" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Mã đơn hàng</th>
                                    <th>Khách hàng</th>
                                    <th>Ngày đặt hàng</th>
                                    <th>Chi tiết đơn hàng</th>
                                    <th>Giá trị đơn hàng</th>
                                    <th>
                                        Tình trạng đơn hàng
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($Listbill as $bill)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>DH-{{$bill->id}}</td>
                                    <td>
                                        Tên: {{$bill->name}} <br>
                                        Địa chỉ: {{$bill->address}} <br>
                                        SĐT: {{$bill->email}}
                                    </td>
                                    <td> {{$bill->ngaylap}}</td>
                                    <td><a href="{{route('chiTietDon', ['id' => $bill->id])}}">Chi tiết</a></td>
                                    <td>{{number_format($bill->tongdonhang)}}</td>
                                    <td>
                                            @if($bill->trangthai == 0)
                                            <a href="{{route('giaoHang', ['id' => $bill->id])}}" class="btn btn-success">Xác nhận</a>
                                            
                                            @elseif($bill->trangthai == 1)
                                            Đang giao
                                            @elseif($bill->trangthai == 3)
                                            Giao hàng thành công
                                         @endif                                          
                                    </td>   
                                </tr>
                             @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

@endsection