<?php
    $connection=mysqli_connect('localhost','dgsite','FOj$qbBJc0XXdu4g8Cf#ArBrDTSQ30cw','dgsite_wp59');
    if (!$connection){
        echo("baglantida bir hata olustu");
    }else{  
        $query="SELECT * FROM contact"; 
        $result=mysqli_query($connection,$query);
        $row=mysqli_fetch_assoc($result); 
        $address=$row["address"];
        $mail=$row["mail"];
        $phone=$row["phone"];
    }
    if(isset($_POST['address'])){
        $postAddress=$_POST['address'];
        $queryPost="UPDATE contact SET address='".$postAddress."'"; 
        $resultPost=mysqli_query($connection,$queryPost);
        if($resultPost){
            header("Refresh:0");
        }
        
    }elseif(isset($_POST['mail'])){
        $postMail=$_POST['mail'];
        $queryPost="UPDATE contact SET mail='".$postMail."'"; 
        $resultPost=mysqli_query($connection,$queryPost);
        if($resultPost){
            header("Refresh:0");
        }
    }elseif(isset($_POST['phone'])){
        $postPhone=$_POST['phone'];
        $queryPost="UPDATE contact SET phone='".$postPhone."'"; 
        $resultPost=mysqli_query($connection,$queryPost);
        if($resultPost){
            header("Refresh:0");
        }
    }
?>
<!-- Content Wrapper. Contains page content -->
<section page-id="contact">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">İletişim</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <table class="table">
                    <tbody>
                    <tr>
                        <td>Address</td>
                        <td><?php echo $address;?></td>
                        <td><button id="editAddress" class="btn btn-default">Edit</button></td>
                    </tr>
                    <tr>
                        <td>Mail</td>
                        <td><?php echo $mail;?></td>
                        <td><button id="editMail" class="btn btn-default">Edit</button></td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td><?php echo $phone;?></td>
                        <td><button id="editPhone" class="btn btn-default">Edit</button></td>
                    </tr>
                    </tbody>
                </table>
                <div id="editAddressForm" style="display:none;">
                    <form method="post" role="form" class="php-email-form">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Address:   </span>
                            </div>
                            <input type="text" class="form-control" placeholder="Address"name="address" aria-describedby="basic-addon1">
                            <div class="text-center" style="margin-right:70px;"><button type="submit" class="btn btn-link">Update</button></div>
                        </div>
                    </form>
                </div>
                <div id="editMailForm" style="display:none;">
                    <form method="post" role="form" class="php-email-form">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Mail:   </span>
                            </div>
                            <input type="text" class="form-control" placeholder="Address"name="mail" aria-describedby="basic-addon1">
                            <div class="text-center" style="margin-right:70px;"><button type="submit" class="btn btn-link">Update</button></div>
                        </div>
                    </form>
                </div>
                <div id="editPhoneForm" style="display:none;">
                    <form method="post" role="form" class="php-email-form">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Phone:   </span>
                            </div>
                            <input type="text" class="form-control" placeholder="Address"name="phone" aria-describedby="basic-addon1">
                            <div class="text-center" style="margin-right:70px;"><button type="submit" class="btn btn-link">Update</button></div>
                        </div>
                    </form>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
</section>
 <script>
    $(document).ready(function(){
        $('#editAddress').click(function(){
            $('#editAddressForm').toggle();
        });
        $('#editMail').click(function(){
            $('#editMailForm').toggle();
        });
        $('#editPhone').click(function(){
            $('#editPhoneForm').toggle();
        });
    });
 </script>
<script src="./assets/js/main.js"></script>

  
  
  
  
  
  
  
  
  
  