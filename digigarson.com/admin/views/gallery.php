 <!-- Content Wrapper. Contains page content -->
 <section page-id="gallery">  <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <div class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1 class="m-0 text-dark">Galeri</h1>
                     </div><!-- /.col -->
                     <div class="col-sm-6">
                         <ol class="breadcrumb float-sm-right">
                             <li class="breadcrumb-item"><a href="index.php">Anasayfa</a></li>
                             <li class="breadcrumb-item active">Galeri</li>
                         </ol>
                     </div><!-- /.col -->
                 </div><!-- /.row -->
             </div><!-- /.container-fluid -->
         </div>
         <!-- /.content-header -->

         <!-- Main content -->
         <section class="content">
             <div class="container-fluid">
                <button class="btn btn-outline-info " style="float:right;margin-bottom:1%;margin-right:2%;" id="addGallery">Add</button>
                <div id="addGalleryForm" style="display:none;" class="col-6">
                    <div class="form-group mb-3 ">
                        <div class="input-group-prepend">
                            <span class="" style="width: 40%;">Name:   </span>
                        </div>
                        <input type="text" class="form-control" placeholder="Name:  " id="name" name="name">
                    </div>
                    <div class="form-group">
                        <div class="input-group-prepend">
                            <span style="width: 40%;">Resim:   </span>
                        </div>
                        <input type="file" name="image" accept="image/png, image/jpeg">
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select class="form-control" id="category" name="category">
                          <option>Pos</option>
                          <option>Managament</option>
                          <option>Garson El Terminali</option>
                          <option>Mobil Görünüm</option>
                        </select>
                    </div>
                    <div class="text-center islem m-3" style="float: right;"></div>
                </div>
                <div class="gallery"></div>
            </div><!-- /.container-fluid -->
         </section>
         <!-- /.content -->
     </div>
 </section>
 <script src="./assets/js/gallery.js"></script>
 <script src="./assets/js/main.js"></script>

