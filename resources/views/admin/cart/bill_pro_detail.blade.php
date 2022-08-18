@extends('admin_layout.index')
@section('content')
@section('title', 'Danh sách chi tiết đơn hàng')

<main class="content">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <a href="javascript:history.back()">Quay lại</a>
                        <table id="datatables-reponsive" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">Sản phẩm</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Tổng tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ListProBill as $item)
                                <tr>
                                    <td>
                                        <div class="d-flex">
                                            <div class="img">
                                                <img width="100px" height="100px" src="{{ $item->image_pro?''.Storage::url($item->image_pro):'http://placehold.it/100x100' }}" alt="">
                                            </div>
                                            <div class="box">
                                                <div class="name">
                                                    {{$item->name_pro}}
                                                </div>
                                                <div class="price">
                                                    Giá: {{number_format($item->price_pro)}}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        {{$item->quantily_pro}}
                                    </td>
                                    <td>
                                        {{number_format($item->total_price)}}
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