<!-- Content Wrapper. Contains page content -->
<section page-id="features">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Özellikler</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Anasayfa</a></li>
                            <li class="breadcrumb-item active">Özellikler</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <button class="btn btn-outline-info " style="float:right;margin-bottom:1%;margin-right:2%;" id="addFeatures">Add</button>
                <div id="addFeaturesForm" style="display:none;" class="col-6">
                    <div class="form-group mb-3 ">
                        <div class="input-group-prepend">
                            <span class="" style="width: 40%;">Name:   </span>
                        </div>
                        <input type="text" class="form-control" placeholder="Name:  " id="name" name="name">
                    </div>
                    <div class="form-group">
                        <div class="input-group-prepend">
                            <span style="width: 40%;">İcon Seç:   </span>
                        </div>
                        <input type="file" name="image" accept="image/png, image/jpeg">
                    </div>
                    <div class="form-group">
                        <div class="input-group-prepend">
                            <span style="width: 40%;">Description:   </span>
                        </div>
                        <input type="text" class="form-control" placeholder="Description:  " id="description" name="description">
                    </div>
                    <div class="text-center islem m-3" style="float: right;"></div>

                </div>
                <div class="features"></div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>


</section>
 <script src="./assets/js/features.js"></script>
<script src="./assets/js/main.js"></script>

  
  
  
  
  
  
  
  
  
  