<!-- header navigation area start -->
@php
use App\Models\category;
$category = new Category();
$listCate = $category->loadListClient();
@endphp


<div class="header-nav-area d-none d-lg-block sticky-nav">
    <div class="container">
        <div class="header-nav">
            <div class="main-menu position-relative">
                <ul>
                    {{-- <li class="dropdown"><a href="#">Home <i class="fa fa-angle-down"></i></a>
                        <ul class="sub-menu">
                            <li><a href="index.html">Home 1</a></li>
                            <li><a href="index-2.html">Home 2</a></li>
                        </ul>
                    </li> --}}
                    @foreach ($listCate as $cate)
                        <li><a href="{{route('homePageCate', ['id' => $cate->id])}}">{{$cate->name}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- header navigation area end -->