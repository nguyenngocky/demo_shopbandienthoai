<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from demo.adminkit.io/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 29 Jul 2021 03:11:55 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com/">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<link rel="canonical" href="index.php" />

	<title>Đăng nhập</title>

	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&amp;display=swap" rel="stylesheet">

	<!-- Choose your prefered color scheme -->
	<!-- <link href="css/light.css" rel="stylesheet"> -->
	<!-- <link href="css/dark.css" rel="stylesheet"> -->

	<!-- BEGIN SETTINGS -->
	<!-- Remove this after purchasing -->
	<link class="js-stylesheet" href="{{ asset('Admin_layout/css/light.css') }}" rel="stylesheet">
	<style>
		body {
			opacity: 0;
		}
	</style>
	<!-- END SETTINGS -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-120946860-10"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-120946860-10', { 'anonymize_ip': true });
</script></head>
<main class="d-flex w-100 h-100">
    <div class="container d-flex flex-column">
        <div class="row vh-100">
            <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                <div class="d-table-cell align-middle">

                    <div class="text-center mt-4">
                        <h1 class="h2">Welcome</h1>
                        <p class="lead">
                            Vui lòng đăng nhập tài khoản để tiếp tục
                        </p>
                    </div>
                    
                    <div class="card">
                        <div class="card-body">
                            <div class="m-sm-4">
                                <div class="text-center">
                                    <img src="{{asset('Admin_layout/img/avatars/avatar.jpg')}}" alt="Charles Hall" class="img-fluid rounded-circle" width="132" height="132" />
                                </div>
                                <form action="{{ route('sign-in') }}" method="post">

                                     @csrf  {{-- Bảo mật --}}
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input value="{{old('email')}}" class="form-control form-control-lg" type="text" name="email" placeholder="Nhập vào email" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Mật khẩu</label>
                                        <input class="form-control form-control-lg" value="{{old('password')}}" type="password" name="password" placeholder="Nhập vào mật khẩu" />
                                        <small>
                                            <a href="#">Bạn quên mật khẩu?</a>
                                        </small>
                                    </div>
                                    <div>
                                        <label class="form-check">
                                            <input class="form-check-input" type="checkbox" value="remember-me" name="remember-me" checked>
                                            <span class="form-check-label">
                                                Ghi nhớ tài khoản
                                            </span>
                                        </label>

                                        <label for="form">
                                            <a href="{{route('sign-up')}}">Bạn chưa có tài khoản ? Đăng ký ngay</a>
                                        </label>
                                    </div>
                                    <div class="text-center mt-3">
                                        <button type="submit"  class="btn btn-lg btn-primary">Đăng nhập</button>
                                    </div>
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
            </div>
        </div>
    </div>
</main>
<script src="{{ asset('Admin_layout/js/app.js') }}"></script>

<script>
  document.addEventListener("DOMContentLoaded", function(event) { 
    setTimeout(function(){
      if(localStorage.getItem('popState') !== 'shown'){
        window.notyf.open({
          type: "success",
          messages: "Get access to all 500+ components and 45+ pages with AdminKit PRO. <u><a class=\"text-white\" href=\"https://adminkit.io/pricing\" target=\"_blank\">More info</a></u> 🚀",
          duration: 10000,
          ripple: true,
          dismissible: false,
          position: {
            x: "left",
            y: "bottom"
          }
        });

        localStorage.setItem('popState','shown');
      }
    }, 15000);
  });
</script></body>


<!-- Mirrored from demo.adminkit.io/pages-sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 29 Jul 2021 03:12:49 GMT -->
</html>