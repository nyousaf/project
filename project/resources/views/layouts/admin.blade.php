<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{$general->w_title ? $general->w_title : ''}}</title>
  <!-- favicon-icon -->
  <link rel="icon" type="image/icon" href="{{asset('images/favicon/'.$general->favicon)}}"> <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet"> 
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
       <link rel="stylesheet" href="{{asset('css/fontawesome-iconpicker.min.css')}}">
  <!-- Select 2 -->
  <link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
  <!-- summernote css -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.10/summernote-bs4.css"/> 
  <!-- Admin (main) Style Sheet -->
  <link rel="stylesheet" href="{{asset('css/admin.css')}}">
  {{-- Custom Css --}}
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">



</head>
  <body class="hold-transition skin-blue">
<div class="wrapper">
  <!-- Main Header -->
  <header class="main-header">
    <!-- Logo -->
    <a href="{{url('admin')}}" class="logo">
       @if($general->logo != Null)
            <img src="{{ asset('images/'.$general->footer_logo) }}" alt="logo">
        @else
          {{$general->w_name}}
        @endif
    </a>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- <a href="{{url('/')}}" class="visit-site-btn btn" target="_blank">Visit Site <i class="material-icons right">keyboard_arrow_right</i></a> -->
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown admin-nav">
            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><i class="material-icons">account_circle</i></button>
            <ul class="dropdown-menu animated flipInX">
              <li><a href="{{url('admin/profile')}}">My Profile</a></li>
              <li>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          @if($auth->image !="")
         <img style="border-radius:50%;margin-left: 25px;" src="{{asset('images/user/'.$auth->image)}}" alt="User" class="img-fluid">
          @else
           <img src="{{asset('images/user/user.png')}}" alt="User" class="img-fluid">
          @endif
        </div>
        <div class="pull-left info">
          <h4 class="user-name">{{-- {{$auth->first_name}} {{$auth->last_name}} --}}</h4>
          <p>Admin</p>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <!-- Optionally, you can add icons to the links -->
        <li class="{{ Nav::isRoute('admin.dash') }}"><a href="{{url('admin')}}"><i class="material-icons">dashboard</i> <span>Dashboard</span></a></li>   
		<li class="treeview">
          <a href="#" class="{{ Nav::isResource('user') }}">
            <i class="material-icons">perm_identity</i> <span>Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('txt.user')}}"><i class="material-icons">label_outline</i> All Users</a></li>
            <li><a href="{{route('txt.sus')}}"><i class="material-icons">label_outline</i> Suspended Users</a></li>

          </ul>
        </li> 
        <li class="treeview">
          <a href="#" class="{{ Nav::isResource('catgeory') }}">
            <i class="material-icons">device_hub</i> <span>Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('admin/category/create')}}"><i class="material-icons">label_outline</i> Add Category</a></li>
            <li><a href="{{route('category.index')}}"><i class="material-icons">label_outline</i> All Categories</a></li>
          </ul>
        </li>         
        <li class="treeview">
          <a href="#" class="{{ Nav::isResource('photos') }}">
            <i class="material-icons">color_lens</i> <span>Photos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">           
            <li><a href="{{url('admin/photos/create')}}"><i class="material-icons">label_outline</i> Add Photos</a></li>
            <li><a href="{{route('photos.index')}}"><i class="material-icons">label_outline</i> All Photos</a></li>
            <li><a href="{{route('pend.pho')}}"><i class="material-icons">label_outline</i>  Request for Approval</a></li>
			<li><a href="{{url('admin/tag')}}"><i class="material-icons">label_outline</i><span>Tag</span></a></li> 
          </ul>
        </li> 
        
        <!-- <li class="{{ Nav::isRoute('blog.index') }}{{ Nav::isRoute('blog.create') }}{{ Nav::isRoute('blog.edit') }}"><a href="{{ route('blog.index')}}"><i class="material-icons">library_books</i> <span>Blog</span></a></li> 
        -->
        <!-- <li class="{{ Nav::isRoute('faq.index') }}{{ Nav::isRoute('faq.create') }}{{ Nav::isRoute('faq.edit') }}"><a href="{{ route('faq.index')}}"><i class="material-icons">help_outline</i> <span>FAQs</span></a></li> 
        <li class="{{ Nav::isRoute('lic.index') }}{{ Nav::isRoute('lic.create') }}{{ Nav::isRoute('lic.edit') }}"><a href="{{ route('lic.index')}}"><i class="material-icons">info_outline</i> <span>License</span></a></li> -->
        <!-- <li class="{{ Nav::isRoute('rep.index') }}"><a href="{{ route('rep.index')}}"><i class="material-icons">warning</i> <span>Reported Images</span></a></li>  
        <li class="{{ Nav::isRoute('lis.comment.all') }}"><a href="{{ route('lis.comment.all') }}"><i class="material-icons">comment</i> <span>Comments</span></a></li>
        <li class="treeview">
          <a href="#" class="{{ Nav::isResource('pages') }}">
            <i class="material-icons">pages</i> <span>Pages</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('admin/pages/create')}}"><i class="material-icons">label_outline</i> Add Pages</a></li>
            <li><a href="{{route('pages.index')}}"><i class="material-icons">label_outline</i>All Pages</a></li>
          </ul>
        </li> -->
         <li class="treeview">
          <a href="#" class="{{ Nav::isResource('setting') }}">
            <i class="material-icons">build</i> <span>Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('admin/general')}}"><i class="material-icons">label_outline</i>General Settings</a></li>
            <!-- <li><a href="{{url('admin/social')}}"><i class="material-icons">label_outline</i>Social Icons</a></li>
            <li><a href="{{url('admin/sociallogin')}}"><i class="material-icons">label_outline</i>Social Login Settings</a></li>

            <li><a href="{{route('mail.getset')}}"><i class="material-icons">label_outline</i> Mail Settings</a></li>
            <li><a href="{{url('admin/AdSetting')}}"><i class="material-icons">label_outline</i>ShutterStock Settings</a></li> -->
          </ul>
        </li> 
       
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    </section>
    <!-- Main content -->
    <section class="content container-fluid">
      @if (Session::has('added'))
        <div id="sessionModal" class="sessionmodal rgba-green-strong z-depth-2">
          <i class="fa fa-check-circle"></i> <p>{{session('added')}}</p>
        </div>
      @elseif (Session::has('updated'))
        <div id="sessionModal" class="sessionmodal rgba-cyan-strong z-depth-2">
          <i class="fa fa-check-circle"></i> <p>{{session('updated')}}</p>
        </div>
      @elseif (Session::has('deleted'))
        <div id="sessionModal" class="sessionmodal rgba-red-strong z-depth-2">
          <i class="fa fa-window-close"></i> <p>{{session('deleted')}}</p>
        </div>
      @endif
      @yield('content')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Main Footer -->
</div>
<!-- ./wrapper -->
<!-- Admin Js -->
<script src="{{asset('js/jquery-3.3.1.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/admin.js')}}" type="text/javascript"></script>
<script src="{{asset('js/datatables.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/ckeditor.js')}}" type="text/javascript"></script>
<script src="{{asset('vendor/summernote/js/summernote-bs4.min.js')}}"></script>
<!-- summernote js -->
<script src="{{asset('js/utils.js')}}" type="text/javascript"></script>



<script>
  $(function () {
    $('#flash-overlay-modal').modal();
    $('.alert').addClass('active');
    $('.alert').addClass('z-depth-1');
    setTimeout(function(){
      $('.alert:not(.alert-important)').removeClass('active');
    }, 4000); 
    
    // DataTables
    $('#movies_table').DataTable({
      responsive: true,
      "sDom": "<'row'><'row'<'col-md-4'l><'col-md-4'B><'col-md-4'f>r>t<'row'<'col-sm-12'p>>",
      "language": {
        "paginate": {
          "previous": '<i class="material-icons paginate-btns">keyboard_arrow_left</i>',
          "next": '<i class="material-icons paginate-btns">keyboard_arrow_right</i>'
          }
      },
      buttons: [
        {
          extend: 'print',
          exportOptions: {
              columns: ':visible'
          }
        },
        'csvHtml5',
        'excelHtml5',
        'colvis',
      ]
    });

    $('#full_detail_table').DataTable({
      "sDom": "<'row'><'row'<'col-md-4'l><'col-md-4'B><'col-md-4'f>r>t<'row'<'col-sm-12'p>>",
      "language": {
      "paginate": {
        "previous": '<i class="material-icons paginate-btns">keyboard_arrow_left</i>',
        "next": '<i class="material-icons paginate-btns">keyboard_arrow_right</i>'
        }
      },
      buttons: [
        {
          extend: 'print',
          exportOptions: {
              columns: ':visible'
          }
        },
        'csvHtml5',
        'excelHtml5',
        'colvis',
      ]
    });
    $(".js-select2").select2({
        placeholder: "Pick states",
        theme: "material"
    });

    $('#summernote-main').summernote({
      height: 100,
    });
    
    $(".select2-selection__arrow")
        .addClass("material-icons")
        .html("arrow_drop_down");
  
      });
</script>
@yield('custom-script')
@yield('scripts')
</body>
</html>
