<!-- Content Wrapper. Contains page content -->
<section page-id="usageareas">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Kullanım Alanları</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Anasayfa</a></li>
                            <li class="breadcrumb-item active">Kullanım Alanları</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <button class="btn btn-default" style="float:right;margin-bottom:1%;margin-right:2%;" id="edit_from_btn">Yeni Ekle</button>
                <div id="editform" style="display:none;" class="col-6">
                    <div class="form-group mb-3 ">
                        <div class="input-group-prepend">
                            <span class="" style="width: 40%;">Title:   </span>
                        </div>
                        <input type="text" class="form-control" placeholder="Name:  " id="title" name="title">
                    </div>
                    <div class="form-group">
                        <div class="input-group-prepend">
                            <span style="width: 40%;">Description:</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Description:" id="description" name="description">
                    </div>
                    <div class="text-center islem m-3" style="float: right;"></div>

                </div>
                <div class="usageareas"></div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
</section>




<script src="./assets/js/usageareas.js?v=<?php echo rand(0, 100)?>"></script>
<script src="./assets/js/main.js"></script>










