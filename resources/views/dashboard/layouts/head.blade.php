<!-- Title -->
<title> Valex -  Premium dashboard ui bootstrap rwd admin html5 template </title>
@yield('css')
<!--- Style css -->
@if (App::getLocale()== 'ar')
<!-- Favicon -->
<link rel="icon" href="{{URL::asset('dashboard/img/brand/favicon.png')}}" type="image/x-icon"/>
<!-- Icons css -->
<link href="{{URL::asset('dashboard/css/icons.css')}}" rel="stylesheet">
<!--  Custom Scroll bar-->
<link href="{{URL::asset('dashboard/plugins/mscrollbar/jquery.mCustomScrollbar.css')}}" rel="stylesheet"/>
<!--  Sidebar css -->
<link href="{{URL::asset('dashboard/plugins/sidebar/sidebar.css')}}" rel="stylesheet">
<!-- Sidemenu css -->
<link rel="stylesheet" href="{{URL::asset('dashboard/css-rtl/sidemenu.css')}}">
<link href="{{URL::asset('dashboard/css-rtl/style.css')}}" rel="stylesheet">
<!--- Dark-mode css -->
<link href="{{URL::asset('dashboard/css-rtl/style-dark.css')}}" rel="stylesheet">
<!---Skinmodes css-->
<link href="{{URL::asset('dashboard/css-rtl/skin-modes.css')}}" rel="stylesheet">

@else
    <!-- Favicon -->
<link rel="icon" href="{{URL::asset('dashboard/img/brand/favicon.png')}}" type="image/x-icon"/>
<!-- Icons css -->
<link href="{{URL::asset('dashboard/css/icons.css')}}" rel="stylesheet">
<!--  Custom Scroll bar-->
<link href="{{URL::asset('dashboard/plugins/mscrollbar/jquery.mCustomScrollbar.css')}}" rel="stylesheet"/>
<!--  Right-sidemenu css -->
<link href="{{URL::asset('dashboard/plugins/sidebar/sidebar.css')}}" rel="stylesheet">
<!-- Sidemenu css -->
<link rel="stylesheet" href="{{URL::asset('dashboard/css/sidemenu.css')}}">
<!-- Maps css -->
<link href="{{URL::asset('dashboard/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
<!-- style css -->
<link href="{{URL::asset('dashboard/css/style.css')}}" rel="stylesheet">
<link href="{{URL::asset('dashboard/css/style-dark.css')}}" rel="stylesheet">
<!---Skinmodes css-->
@endif