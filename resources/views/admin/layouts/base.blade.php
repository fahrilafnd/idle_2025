<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta name="_token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicons -->
    <link href="{{ asset('favicon/favicon-32x32.png') }}" rel="icon">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon/site.webmanifest') }}">
    <link rel="mask-icon" href="{{asset('favicon/safari-pinned-tab.svg')}}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/main.css') }}">

    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  
  	<!-- CKEditor 4 -->
  	<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    @yield('css')
</head>
<body class="app sidebar-mini rtl">
<!-- Navbar-->
@include('admin.includes.header')
<!-- Sidebar menu-->
@include('admin.includes.side-menu')

<main class="app-content">
    <div class="app-title">
        <div>
            <h1>@yield('app-title')</h1>
            <p>@yield('app-description')</p>
        </div>
    </div>

    @yield('content')
</main>
<!-- Essential javascripts for application to work-->
<script src="{{ asset('assets/admin/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/main.js') }}"></script>
<script src="{{ asset('assets/admin/js/plugins/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/plugins/dataTables.bootstrap.min.js') }}"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="{{ asset('assets/admin/js/plugins/pace.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('assets/admin/js/plugins/bootstrap-notify.min.js') }}"></script>
{{--<script type="text/javascript" src="{{ asset('assets/admin/js/plugins/sweetalert.min.js') }}"></script>--}}
<script>

    $(function() {
      $.ajaxSetup({
        headers: {
          'X-CSRF-Token': $('meta[name="_token"]').attr('content')
        }
      });
    });

    function successNotification(title, message) {
        $.notify({
                title: title,
                message: message,
                icon: 'fa fa-check'
            },
            {
                type: 'success'
            }
        );
    }

    function errorNotification(title, message) {
        $.notify({
                title: title,
                message: message,
                icon: 'fa fa-exclamation-triangle'
            },
            {
                type: 'danger'
            }
        );
    }

    @if($message = Session::get('success'))
    successNotification('Success : ', "{{ $message }}");

    @endif

    @if($message = Session::get('error'))
    errorNotification('Error : ', "{{ $message }}");

    @endif

</script>


<!-- Page specific javascripts-->
<script type="text/javascript" src="{{ asset('assets/admin/js/plugins/chart.js') }}"></script>
@yield('js')
</body>
</html>
