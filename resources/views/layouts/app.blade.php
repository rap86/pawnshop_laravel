<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('design/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('design/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('design/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('design/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('design/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('design/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('design/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('design/plugins/summernote/summernote-bs4.min.css') }}">
  
    <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('design/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('design/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('design/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  
	<!--SweetAlert 2-->
	<link href="{{ asset('swal/sweetalert2.min.css') }}" rel="stylesheet">

	
	<style>
		label.label-align {
			text-align: left;
		}
	</style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <!--img class="animation__shake" src="{{ asset('design/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="90" width="90"-->
      <h1 class="animation__shake">Pawnshop</h1>
    </div>
  
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <!--li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('home.download_database') }}" class="nav-link">Backup DB</a>
        </li-->
      </ul>
  
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a href="{{ route('transactions.dashboard') }}" class="nav-link">
            <i class="fas fa-chart-pie"></i>
            Dashboard
          </a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{ route('home.download_database') }}" class="nav-link">
            <i class="fas fa-database"></i>
            Backup DB
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt"></i>
            {{ __('Logout') }}
          </a>
  
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
          </form>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown d-none d-sm-inline-block">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-user"></i>
            <!--span class="badge badge-warning navbar-badge">15</span-->
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">Developer</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> Ronaldo Panuelos
              <!--span class="float-right text-muted text-sm">3 mins</span-->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> ronaldo.panuelos@yahoo.com
              <!--span class="float-right text-muted text-sm">12 hours</span-->
            </a>
            <!--div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a-->
          </div>
        </li>
        <!--li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
        <i class="fas fa-th-large"></i>
        </a>
        </li-->
      </ul>
    </nav>
    <!-- /.navbar -->
  
    <!-- Main Sidebar Container bg-success-->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="/" class="brand-link">
        <!--img src="{{ asset('design/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"-->
        <span class="brand-text font-weight-light">
        @if (!Auth::guest())
        You : {{ Auth::user()->role }}
        @endif
        </span>
      </a>
  
      <!-- Sidebar -->
      <div class="sidebar">
  
        <!-- Sidebar user panel (optional) -->
        <!--div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        <img src="{{ asset('design/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        <a href="#" class="d-block">Alexander Pierce</a>
        </div>
        </div-->
        <!--div style="margin-top:10px;">
        <div class="btn btn-secondary btn-block">
        Logout
        </div>
        </div-->
        <!-- SidebarSearch Form -->
        <div class="form-inline" style="margin-top:10px;">
          <form action="/customers/search" method="GET" class="form-inline">
            <div class="input-group">
              <input class="form-control" type="text" name="last_name" placeholder="Search Customer" autocomplete="off" id="txtLastnameSearch" style="background-color:#e9ecef;">
              <div class="input-group-append">
                <button class="btn btn-sidebar" type="submit" id="btnCustomerSearch">
                  <i class="fas fa-search fa-fw"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
        <div class="form-inline" style="padding-top:10px;">
          <form action="/transaction_payments/ptsearch" method="GET" class="form-inline">
            <div class="input-group">
              <input class="form-control" type="text" name="ptnumber" placeholder="Search Pawn Ticket" autocomplete="off" id="txtPtNumberSearch" style="background-color:#e9ecef;">
              <div class="input-group-append">
                <button class="btn btn-sidebar" type="submit" id="btnPtNumberSearch">
                  <i class="fas fa-search fa-fw"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
  
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="{{ route('transactions.index') }}" class="nav-link">
                <i class="fa fa-circle nav-icon text-danger"></i>
                <p>
                  Granted x
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('transactions.underauction') }}" class="nav-link">
                <i class="fa fa-circle nav-icon text-success"></i>
                <p>
                  Under auction
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('transactions.outside') }}" class="nav-link">
                <i class="fa fa-circle nav-icon text-warning"></i>
                <p>
                  Outside
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon far fa-envelope"></i>
                <p>
                  Reports
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('transactions.collected') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Collected</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('transactions.granted') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Granted</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon far fa-envelope"></i>
                <p>
                  Admin
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('customer_logs.index')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Edited Customer</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('ptnumber_logs.index')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Edited Pawn Ticket</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('items.index')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Items</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('item_interests.index')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Item Interests</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('books.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Books</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('book_interests.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Book Interests</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('users.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Users</p>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
  
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <!--div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">
                <a href="#">Dashboard</a>
              </h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard v1</li>
              </ol>
            </div>
          </div>
        </div>
      </div-->
      <!-- /.content-header -->
      <br>
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
        @yield('content')
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>Template by: <a href="#">AdminLTE.io</a>.</strong>
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.1.0
      </div>
    </footer>
  
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('design/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('design/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('design/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('design/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('design/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('design/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('design/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('design/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('design/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('design/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('design/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('design/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('design/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('design/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('design/dist/js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('design/dist/js/pages/dashboard.js') }}"></script>

<!-- DataTables  & Plugins -->
<script src="{{ asset('design/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('design/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('design/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('design/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('design/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('design/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('design/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('design/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('design/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('design/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('design/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('design/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

<!--SweetAlert-->
<script src="{{ asset('swal/sweetalert2.all.min.js') }}"></script>


<script>
$(document).ready(function () {
    $("#example1").DataTable({
      "responsive": true, 
	  "lengthChange": false, 
	  "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
	
	
    $('.dataTables').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
	  "pageLength": 25
    });
	
	 // For master record input search
    $('#btnCustomerSearchMaster').click(function() {
        
        var lastnameMaster = $('#txtLastnameSearchMaster').val();
            if($.trim(lastnameMaster) == '')
            {   
                modalMessage('Input the <b>Lastname</b> you want to search!');
                return false;
            }
    });

    // For customer's name input search
    $('#btnCustomerSearch').click(function() {
        
		var lastname = $('#txtLastnameSearch').val();
        if($.trim(lastname) == '')
        {   
            modalMessage('Input the <b>Lastname</b> you want to search!');
            return false;
        }
    });

    // For pawn ticket input search
    $('#btnPtNumberSearch').click(function() {
        
        var ptnumber = $('#txtPtNumberSearch').val();
            if($.trim(ptnumber) == '')
            {   
                modalMessage('Input the <b>PT Number</b> you want to search!');
                return false;
            }
    });

    // This is for modal confirmation for global saving,edit etc...
    $('div#btnConfirmationForNewRecord').click(function() {
        var attr_text = $(this).attr('data-text-message');
        var $this = $(this);
        modalConfirmation($this, attr_text);
    });

    // Function for modal dialog confirmation
    function modalConfirmation($this, attr_text = 'save') 
    {
        Swal.fire({
            title: 'You want to ' + attr_text + ' ?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, '+attr_text+' it!'
        }).then((result) => {
            if (result.value) {

                $this.parents('form').submit();
                //$this.parents('form').find('button#btnSubmit').trigger('click');
            } else {

                $('.modal').modal('hide');
            }
        })
    }

    // Function for Modal diaglog message
    function modalMessage(message)
    {
        Swal.fire({
            type: 'error',
            title: 'Oops...',
            html: message,
            showConfirmButton: false,
            timer: 1500
        });
    }   

    // For flash message success
    @if(Session::has('flash_success'))
        Swal.fire({
            type: 'success',
            title: 'Success',
            text: ' {{ Session::get('flash_success')}}',
            showConfirmButton: false,
            timer: 1500
        });
    @endif

    // For flash message failure
    @if(Session::has('flash_failure'))
        Swal.fire({
            type: 'error',
            title: 'Oops!',
            text: ' {{ Session::get('flash_failure')}}',
            showConfirmButton: false,
            timer: 1500
        });
    @endif

    /**
     * Once click the image of customer or item it will enlarge via modal, 
     * regarless the location of image display it will enlarge once clicked.
    */
    $('img').click(function() {
		Swal.fire({
            title: 'Image',
            imageUrl: $(this).attr('src'),
            imageWidth: 420,
            imageHeight: 320,
            imageAlt: 'Image',
            animation: false
		});
	});

    // Once the controller validation is true and with error, it will call this.
    @if($errors->any())
        var errorMessage = "";
       // errorMessage = '<ul class="list-group">'
            @foreach($errors->all() as $error)
                errorMessage += '<p class="text-danger">{{ $error }}</p>'
            @endforeach
       // errorMessage += '</ul>'

        modalMessage(errorMessage);
    @endif

    /**
     * Trasactions contoller, create method 
     * This is for items input select
    */
    $('#itemInput').change(function() {

        var is_Jewelry = $(this).find(":selected").attr("data-jewelry")

        if(is_Jewelry == "yes")
        {
            // tab 1 is disabled and not clickable when tab 2 is active
            $('a#one-tab').removeClass('disabled');
            $('a#two-tab').addClass('disabled');

            // tab 1
            $('a#one-tab').addClass(' active').attr('aria-selected', true);
            // tab 1 body
            $('div#one').addClass(' active show');

            // tab 2 
            $('a#two-tab').removeClass(' active').attr('aria-selected', false);
            // tab 2 body
            $('div#two').removeClass(' active show');

            // remove the children in tab 2, once tab 1 is selected
            $('div#nonDefaultDivJewelryNot').children().remove();
            
            // clear the input of tab 2, once tab 1 is selected
            $('input.non_jewelry_input').val('');

             // disabled the input of tab 2
            $('input.non_jewelry_input').attr('disabled', 'disabled');
            
            // enable the input of tab 1
            $('input.jewelry_input').removeAttr('disabled', 'disabled');

            $('.itemCircle').removeClass('text-success').addClass('text-primary')

            $('a#btnNewInputJewelry').removeClass('disabled');

            $('a#btnNewInputJewelryNot').addClass('disabled');

            /*
            * This is for div and input for Jewelry  and Non Jewelry
            */
            $('.JewelryInput').show();
            $('.NonJewelryInput').hide();
            $('input.NonJewelryInput').val('');

        } else if($.trim(is_Jewelry) == false) {

          
            $('.itemCircle').removeClass('text-primary').removeClass('text-success').addClass('text-black');
            
            /*
            * If no item id is selected, hide the div input for jewelry and non jewelry id
            */
            $('.JewelryInput').hide();
            $('.NonJewelryInput').hide();
            $('input.JewelryInput').val('');
            $('input.NonJewelryInput').val('');

            modalMessage('Please select an item!');

        } else {

            // tab 1 is disabled and not clickable when tab 2 is active
            $('a#one-tab').addClass('disabled');
            $('a#two-tab').removeClass('disabled');

            // tab 2
            $('a#two-tab').addClass(' active').attr('aria-selected', true);
            // tab 2 body
            $('div#two').addClass(' active show');

            //tab 1
            $('a#one-tab').removeClass(' active').attr('aria-selected', false);
            //tab 1 body
            $('div#one').removeClass(' active show');

            // remove the children in tab 1, once tab 2 is selected
            $('div#nonDefaultDivJewelry').children().remove();

            // clear the input of tab 1, once tab 1 is selected
            $('input.jewelry_input').val('');

            // enable the input of tab 2
            $('input.non_jewelry_input').removeAttr('disabled', 'disabled');
            
            // disabled the input of tab 1
            $('input.jewelry_input').attr('disabled', 'disabled');

            $('.itemCircle').removeClass('text-primary').addClass('text-success');

            $('a#btnNewInputJewelry').addClass('disabled');

            $('a#btnNewInputJewelryNot').removeClass('disabled');

            /*
            * This is for div and input for Jewelry  and Non Jewelry
            */
            $('.JewelryInput').hide();
            $('.NonJewelryInput').show();
            $('input.JewelryInput').val('');
            
        }
    });

    /**
     * Start, input for jewelry
     * Once clicked the button, it will add new input for jewelry item
    */
    var i = 2;
    $('a#btnNewInputJewelry').click(function() {

        var newInput = '';
        newInput += '<div class="newDivJewelry">'
            newInput += '<div class="form-group row">'
                newInput += '<label class="col-sm-3 col-form-label label-align">Jewelry Type</label>'
                newInput += '<div class="col-sm-9">'
                    newInput += '<div class="input-group mb-3">'
                        newInput += '<input type="text" name="data[Item]['+ i +'][item_name]" class="form-control">'
                        newInput += '<div class="input-group-append">'
                            newInput += '<a class="btn btn-outline-danger" id="btnRemoveInputJewelry" style="cursor:pointer;">'
                                newInput += '<i class="fa fa-remove">X</i>'
                            newInput += '</a>'
                        newInput += '</div>'
                    newInput += '</div>'
                newInput += ' </div>'
            newInput += '</div>'
        newInput += '</div>';

        $('div#nonDefaultDivJewelry').append(newInput);
        i++;
    });

    // Remove input for jewelry item, once clicked the x button.
    $('div#nonDefaultDivJewelry').on('click', 'a#btnRemoveInputJewelry', function() {
        $(this).closest('div.newDivJewelry').remove();
        i--;
    });

    // End, input for jewelry


    /* 
     * Start, input for non jewelry
     * Once clicked the button, it will add new input for jewelry item
    */
	var x = 2;
    $('a#btnNewInputJewelryNot').click(function() {

        var newInput = '';
        newInput += '<div class="newDivJewelryNot">'
            newInput += '<div class="form-group row">'
                newInput += '<label class="col-sm-3 col-form-label label-align">Item Type</label>'
                newInput += '<div class="col-sm-9">'
                    newInput += '<div class="input-group mb-3">'
                        newInput += '<input type="text" name="data[Item]['+ x +'][item_name]" class="form-control">'
                        newInput += '<div class="input-group-append">'
                            newInput += '<a class="btn btn-outline-danger" id="btnRemoveInputJewelryNot" style="cursor:pointer;">'
                                newInput += '<i class="fa fa-remove">X</i>'
                            newInput += '</a>'
                        newInput += '</div>'
                    newInput += '</div>'
                newInput += ' </div>'
            newInput += '</div>'
        newInput += '</div>';

        $('div#nonDefaultDivJewelryNot').append(newInput);
        x++;
    });

    // Remove input for jewelry item, once clicked the x button.
    $('div#nonDefaultDivJewelryNot').on('click', 'a#btnRemoveInputJewelryNot', function() {
        $(this).closest('div.newDivJewelryNot').remove();
        x--;
    });

    // End, input for non jewelry


    /**
     * This is a computation for renew or redeem.
     * If status = redeem, it will add the remaining
     * principal to the total amount that need to pay by customer.
     * 
     * If the status = renew, only the interest need to pay by the customer.
    */
    $('#statusInputSelectPayment').change(function() {
        status = $(this).find(":selected").val();
        
        if(status == 'redeemed') {

            $('div#div_add_principal_amount').show();
            $('input#add_principal_amount').removeAttr('disabled', 'disabled').attr('readonly', 'readonly');

            var add_principal_amount = $('input#add_principal_amount').val();  
            totalPaymentRenewOrRedeem(add_principal_amount);

        } else if(status == 'renewed') {
            
            $('div#div_add_principal_amount').hide();
            $('input#add_principal_amount').attr('disabled', 'disabled');

            totalPaymentRenewOrRedeem();

        } else {

            $('div#div_add_principal_amount').hide();
            $('input#add_principal_amount').attr('disabled', 'disabled');

            makeValueEmpty();
        }

    });

    /**
     * This is input with id below will accept numbers only.
    */
	$('input#less_charge_amount, input#less_partial_amount, input#add_charge_amount').on('keyup blur', function(event) {
		this.value = this.value.replace(/[^0-9]/g,''); 
	});


    /**
     * Once the below keyup for the below IDs it fired, 
     * it will invoke the function isRedeemedSelectedThenAdd(); 
    */
    $("input#less_charge_amount").on('keyup', function(event) {
        isRedeemedSelectedThenAdd(); 
    });
    
    $("input#less_partial_amount").on('keyup', function(event) {
        isRedeemedSelectedThenAdd(); 
    });

    $("input#add_charge_amount").on('keyup', function(event) {
        isRedeemedSelectedThenAdd();        
    });

    function isRedeemedSelectedThenAdd() {
        if(status == 'redeemed') {
            var add_principal_amount = $('input#add_principal_amount').val(); 
            totalPaymentRenewOrRedeem(add_principal_amount);
        } else {
            totalPaymentRenewOrRedeem();
        }
    }


    /**
     * This is computation for total amount for payment
     * for renew or redeemed.
    */
    function totalPaymentRenewOrRedeem(principal_amount = 0) {

        var less_charge_amount      = Number( $('input#less_charge_amount').val() );
        var less_partial_amount     = Number( $('input#less_partial_amount').val() );
        var add_percent_amount      = Number( $('input#add_percent_amount').val() );
        var add_charge_amount       = Number( $('input#add_charge_amount').val() );
        var add_service_charge      = Number( $('input#add_service_charge').val() );

        var total_amount = ((add_percent_amount + add_charge_amount + add_service_charge +  Number(principal_amount) ) - (less_partial_amount + less_charge_amount));
        $('input#total_amount').val(total_amount);
    }

    /**
     * When button payment is clicked and the dropdown status
     * is selected and value is empty, it will empty the
     * text field value the below input.
    */
    function makeValueEmpty() {

        $('input#less_charge_amount').val('');
        $('input#less_partial_amount').val('');
        $('input#add_percent_amount').val('');
        $('input#add_charge_amount').val('');
        $('input#add_service_charge').val('');
        $('input#total_amount').val('');
    }
	
  });
</script>
</body>
</html>
