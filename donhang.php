<?php
if(!isset($_COOKIE['admin']))
{
  header("location: login.php");
}
require('database.php');
$query = 'select * from donhang';
$donhangg = executeResult($query);

if(isset($_GET['Status'])){
  $st = $_GET['Status'];
  $query = "select * from donhang where Status='dang giao'";
  $donhangg = executeResult($query);

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="Admin/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="Admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="Admin/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="Admin/plugins/flag-icon-css/css/flag-icon.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="" alt="img/logoweb.png" height="60" width="60">
    </div>

    <nav class="main-header navbar navbar-expand navbar-orange navbar-light">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="http://localhost:80/nhacungcapvashippertoanquoc/index.php" class="nav-link">Trang chủ</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="http://localhost:80/nhacungcapvashippertoanquoc/index.php#lienhe" class="nav-link">Liên hệ</a>
        </li>
      </ul>

      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
          </a>
          <div class="navbar-search-block">
            <form class="form-inline" method="GET">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" name="search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                <!-- <select name="nhacungcap" id="input" class="form-control" required="required">
                  <option value="">Lựa chọn nhà cung cấp</option>
                  <?php foreach ($nhacungcapp as $nhacungcap) {
                  ?>
                    <option value="<?php echo $nhacungcap['id']; ?>"><?php echo $nhacungcap['name'] ?> </option>
                  <?php } ?>
                </select> -->
              </div>
            </form>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
      </ul>
    </nav>

    <aside class="main-sidebar sidebar-light-success elevation-4">
      <a class="brand-link">
        <img src="img/logoweb.png" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">DKT Express</span>
      </a>

      <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="img/logoweb.png" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?php echo $_COOKIE['admin'] ?></a>
          </div>
        </div>

        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item menu-open">
              <a href="" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Shipper
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="http://localhost:80/nhacungcapvashippertoanquoc/create_shipper.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Thêm mới shipper</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="http://localhost:80/nhacungcapvashippertoanquoc/shipper.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Danh sách shipper</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item menu-open">
              <a href="" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Nhà cung cấp
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="http://localhost:80/nhacungcapvashippertoanquoc/create_nhacungcap.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Thêm mới nhà cung cấp</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="nhacungcap.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Danh sách nhà cung cấp</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item menu-open">
              <a href="" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Đơn hàng
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="http://localhost:80/nhacungcapvashippertoanquoc/create_donhang.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Thêm mới đơn hàng</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="http://localhost:80/nhacungcapvashippertoanquoc/donhang.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Danh sách đơn hàng</p>
                  </a>
                </li>
              </ul>
            </li>

          </ul>
        </nav>
      </div>
    </aside>

    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-7 text-center">
              <h1 class="m-0">Danh sách đơn hàng</h1>
            </div><!-- /.col -->
            <div class="col-sm-5">
              <ol class="breadcum-sm-right">
                <a href="http://localhost:80/nhacungcapvashippertoanquoc/donhang.php?Status='dang giao'" class="btn btn-success">Đang giao</a> 
                <a href="http://localhost:80/nhacungcapvashippertoanquoc/donhang.php?Status='xac nhan'" class="btn btn-success">Xác nhận</a> 
                <a href="http://localhost:80/nhacungcapvashippertoanquoc/donhang.php?Status='hoan thanh'" class="btn btn-success">Hoàn thành</a> 
              </ol>    
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
  
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <!-- Default box -->
              <div class="card">
                <div class="card-body">
                  <?php if (isset($messages))
                    echo "<p class='alert-info'>$message</p>";
                  ?>
                  <table class="table">
                    <thead class="table-success">
                      <tr class="table-active">
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Giá cả</th>
                        <th>Trạng thái</th>
                        <th>Thời gian</th>
                        <th>Hành động</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php

                      $index = 1;
                      foreach ($donhangg as $donhang) {
                        echo '<tr>
                              <td>' . ($index++) . '</td>
                              <td>' . $donhang['name'] . '</td>
                              <td>' . $donhang['price'] . '</td>
                              <td>' . $donhang['Status'] . '</td>
                              <td>' . $donhang['date'] . '</td>
                              <td><button class="btn btn-success" onclick=\'window.open("update_donhang.php?id=' . $donhang['id'] . '","_self")\'>Sửa</button>
                                  <button class="btn btn-danger" onclick="deleteDonhang(' . $donhang['id'] . ')">Xóa</button></td>
                            </tr>';
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->

                <!-- /.card-footer-->
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div>
      </section>
      <!-- /.content -->
    </div>
    <footer class="main-footer">
      <strong>Copyright &copy; 2014-2021 <a href="">DKT</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 11.7
      </div>
    </footer>

    <aside class="control-sidebar control-sidebar-dark">
    </aside>
  </div>
  <script type="text/javascript">
    function deleteDonhang(id) {
      option = confirm('Bạn có muốn xoá sản phẩm này không')
      if (!option) {
        return;
      }

      console.log(id)
      $.post('deleteDonhang.php', {
        'id': id
      }, function(data) {
        alert(data)
        location.reload()
      })
    }
  </script>
  <script src="Admin/plugins/jquery/jquery.min.js"></script>
  <script src="Admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="Admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <script src="Admin/dist/js/adminlte.min.js"></script>
  <script src="Admin/dist/js/demo.js"></script>
</body>

</html>