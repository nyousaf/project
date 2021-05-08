<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
  
  <!-- favicon-icon -->
  <link rel="icon" type="image/icon" href="<?php echo e(asset('images/favicon/favicon.ico')); ?>"> 
      <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet"><!-- font awesome css -->
  <link href="<?php echo e(asset('vendor/fontawesome/css/fontawesome-all.css')); ?>" rel="stylesheet" type="text/css"/> 
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
  <!-- Admin (main) Style Sheet -->
  <link rel="stylesheet" href="<?php echo e(asset('css/admin.css')); ?>">
</head>
  <body class="hold-transition skin-blue">
<div class="wrapper">
  <!-- Main Header -->
  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo e(url('admin')); ?>" class="logo">
       <?php if($general->logo != Null): ?>
            <img src="<?php echo e(asset('images/'.$general->logo)); ?>" alt="logo">
        <?php else: ?>
          <?php echo e($general->w_name); ?>

        <?php endif; ?>
    </a>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <a href="<?php echo e(url('/')); ?>" class="visit-site-btn btn">Visit Site <i class="material-icons right">keyboard_arrow_right</i></a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown admin-nav">
            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><i class="material-icons">account_circle</i></button>
            <ul class="dropdown-menu animated flipInX">
              <li><a href="<?php echo e(url('admin/profile')); ?>">My Profile</a></li>
              <li>
                <a href="<?php echo e(route('logout')); ?>"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                    <?php echo e(csrf_field()); ?>

                </form>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar" style="background-image: url(<?php echo e(asset('images/sidebar-7.jpg')); ?>);">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <i class="material-icons">account_circle</i>
        </div>
        <div class="pull-left info">
          <h4 class="user-name"></h4>
          <p>Admin</p>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <!-- Optionally, you can add icons to the links -->
        <li><a href="<?php echo e(url('admin')); ?>"><i class="material-icons">dashboard</i> <span>Dashboard</span></a></li>                    
        <li class="treeview">
          <a href="#" class="<?php echo e(Nav::isResource('catgeory')); ?>">
            <i class="material-icons">device_hub</i> <span>Category</span>
            <span class="pull-right-container">
              <i class="fas fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo e(url('admin/category/create')); ?>"><i class="material-icons">label_outline</i> Add Category</a></li>
            <li><a href="<?php echo e(route('category.index')); ?>"><i class="material-icons">label_outline</i> All Categories</a></li>
          </ul>
        </li> 
        <li class="treeview">
          <a href="#" class="<?php echo e(Nav::isResource('gallery')); ?>">
            <i class="material-icons">collections</i> <span>Gallery</span>
            <span class="pull-right-container">
              <i class="fas fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo e(url('admin/gallery/create')); ?>"><i class="material-icons">label_outline</i> Add Gallery</a></li>
            <li><a href="<?php echo e(route('gallery.index')); ?>"><i class="material-icons">label_outline</i> All Gallery</a></li>
          </ul>
        </li> 
        <li class="treeview">
          <a href="#" class="<?php echo e(Nav::isResource('video')); ?>">
            <i class="material-icons">video_library</i> <span>Video</span>
            <span class="pull-right-container">
              <i class="fas fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo e(url('admin/video/create')); ?>"><i class="material-icons">label_outline</i> Add Video</a></li>
            <li><a href="<?php echo e(route('video.index')); ?>"><i class="material-icons">label_outline</i> All Video</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#" class="<?php echo e(Nav::isResource('work')); ?>">
            <i class="material-icons">color_lens</i> <span>Work</span>
            <span class="pull-right-container">
              <i class="fas fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo e(url('admin/work/create')); ?>"><i class="material-icons">label_outline</i> Add Work</a></li>
            <li><a href="<?php echo e(route('work.index')); ?>"><i class="material-icons">label_outline</i> All Work</a></li>
          </ul>
        </li>        
        <li class="treeview">
          <a href="#" class="<?php echo e(Nav::isResource('testimonial')); ?>">
            <i class="material-icons">sms</i> <span>Testimonial</span>
            <span class="pull-right-container">
              <i class="fas fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo e(url('admin/testimonial/create')); ?>"><i class="material-icons">label_outline</i> Add Testimonial</a></li>
            <li><a href="<?php echo e(route('testimonial.index')); ?>"><i class="material-icons">label_outline</i> All Testimonial</a></li>
          </ul>
        </li>
        <li class="<?php echo e(Nav::isResource('tag')); ?>"><a href="<?php echo e(url('admin/tag')); ?>"><i class="material-icons">local_offer</i><span>Tag</span></a></li> 
        <li class="<?php echo e(Nav::isResource('general')); ?>"><a href="<?php echo e(url('admin/general')); ?>"><i class="material-icons">settings</i><span>General Settings</span></a></li>   
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
      <?php if(Session::has('added')): ?>
        <div id="sessionModal" class="sessionmodal rgba-green-strong z-depth-2">
          <i class="fa fa-check-circle"></i> <p><?php echo e(session('added')); ?></p>
        </div>
      <?php elseif(Session::has('updated')): ?>
        <div id="sessionModal" class="sessionmodal rgba-cyan-strong z-depth-2">
          <i class="fa fa-check-circle"></i> <p><?php echo e(session('updated')); ?></p>
        </div>
      <?php elseif(Session::has('deleted')): ?>
        <div id="sessionModal" class="sessionmodal rgba-red-strong z-depth-2">
          <i class="fa fa-window-close"></i> <p><?php echo e(session('deleted')); ?></p>
        </div>
      <?php endif; ?>
      <?php echo $__env->yieldContent('content'); ?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Main Footer -->
</div>
<!-- ./wrapper -->
<!-- Admin Js -->
<script src="<?php echo e(asset('js/jquery-3.3.1.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('js/admin.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('js/datatables.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('js/ckeditor.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('js/utils.js')); ?>" type="text/javascript"></script>
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
    
    $(".select2-selection__arrow")
        .addClass("material-icons")
        .html("arrow_drop_down");
  
      });
</script>
<?php echo $__env->yieldContent('custom-script'); ?>
</body>
</html>
