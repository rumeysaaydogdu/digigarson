<!-- Content Wrapper. Contains page content -->
<section page-id="timeline">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">TimeLİne</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Anasayfa</a></li>
                            <li class="breadcrumb-item active">Timeline</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
            <button class="btn btn-default" style="position: relative; float: right; margin-right: 120px" id="add_openform">Add</button>

            <div class="container-fluid">
                <div id="timelineform" style="display:none;">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Title:   </span>
                        </div>
                        <input type="text" class="form-control" placeholder="title:  " id="title" name="title" aria-describedby="basic-addon1">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Text:   </span>
                        </div>
                        <input type="text" class="form-control" placeholder="text:" id="text" name="text" aria-describedby="basic-addon1">
                        <div class="text-center islem" style="margin-right:60px;"></div>
                    </div>
                </div>
                <h6><span style="color: #a11919">NOT: </span>' <b>-</b> '<small style="color: #0c525d"> işareti Ayırıcı olarak eklenir zorunludur..</small></h6>
                <div class="timelinetable"></div>

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
</section>
 <script src="./assets/js/timeline.js"></script>
<script src="./assets/js/main.js"></script>


  
  
  
  
  
  
  
  
  