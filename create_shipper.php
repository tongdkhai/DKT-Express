<?php
if(!isset($_COOKIE['admin']))
{
  header("location: login.php");
}
require('database.php');
$query = 'select * from nhacungcap';
$nhacungcapp = executeResult($query);
?>
<?php
    if (isset($_POST['submit'])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "file quá lớn";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            echo "xin hãy chọn ảnh";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Không thể upload";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " đã được upload.";
            } else {
                echo "Không thể upload";
            }
        }

        if (isset($_POST['name'])) {
            $name = $_POST['name'];
        }

        $image = $target_file;


        if (isset($_POST['nhacungcap'])) {
            $nhacungcap = $_POST['nhacungcap'];
        }

        if (isset($_POST['description'])) {
            $description = $_POST['description'];
        }

        $sql = "insert into shipper(name, image, nhacungcap_id, description) value ('$name', '$image', '$nhacungcap', '$description')";
        execute($sql);
        $messages = 'Thêm mới thành công';
    }
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="Admin/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="Admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
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
                <select name="nhacungcap" id="input" class="form-control" required="required">
                  <option value="">Lựa chọn nhà cung cấp</option>
                  <?php foreach ($nhacungcapp as $nhacungcap) {
                  ?>
                    <option value="<?php echo $nhacungcap['id']; ?>"><?php echo $nhacungcap['name'] ?> </option>
                  <?php } ?>
                </select>
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
            <div class="col-sm-10 text-center">
              <h1 class="m-0">Thêm thông tin shipper</h1>
            </div><!-- /.col -->
            <div class="col-sm-2">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="http://localhost:80/nhacungcapvashippertoanquoc/index.php">Trang chủ</a></li>
                <li class="breadcrumb-item active">Admin</li>
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
                <?php
    if(isset($messages))
        echo ' <div class="alert alert-primary" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$messages.'</div>';
    ?>
    <form action="" method="POST" enctype="multipart/form-data">

        <div class="col-6 input_group">
            <label for="">Tên</label>
            <input type="text" name="name" class="form-control" id="" placeholder="">
        </div>

        <div class="col-6 input_group">
            <label for="">Hình ảnh</label>
            <input type="file" name="fileToUpload" class="form-control" id="" placeholder="">
        </div>

        <div class="col-6 input_group">
            <label for="">Mô tả</label>
            <textarea name="description" id="input" class="form-control" rows="3" required="required"></textarea>
        </div>

        <div class="col-6 input_group">
            <label for="">Nhà cung cấp</label>
            <select name="nhacungcap" id="input" class="form-control" required="required">
                <option value="">Lựa chọn nhà cung cấp</option>
                    <?php foreach ($nhacungcapp as $nhacungcap) {
                    ?>
                    <option value="<?php echo $nhacungcap['id']; ?>"><?php echo $nhacungcap['name'] ?> </option>
                <?php } ?>
            </select>
        </div>
<br><br>
        <button type="submit" name="submit" class="btn btn-success">Cập nhật</button>
        <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
    </form>
    
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
    function deleteShipper(id) {
      option = confirm('Bạn có muốn xoá sản phẩm này không')
      if (!option) {
        return;
      }

      console.log(id)
      $.post('deleteShipper.php', {
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