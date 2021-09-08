
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>DashBoard</title>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<style>
    * input:focus{
        box-shadow: none;
        border:none;
        outline: none;
        box-shadow: 0.200rem 0.12rem 0.01rem rgba(0, 0, 0, 0.48);

    }

    .input{
        width: 100%;
        height: 38px;
        background-color: #f1eef0;
        border: 0px !important;
    }
    .input:hover{
        border: 1px solid rgba(0, 0, 0, 0.47);
        box-shadow: 0.200rem 0.12rem 0.02rem rgba(0, 0, 0, 0.48);
    }
    .title{
        font-family: "Open Sans", sans-serif;
        padding: 12px;
    }
    body{
    background-image:url("https://www.janeirodigital.com/wp-content/uploads/2017/03/how-we-work-hero-bg-1.png") ;
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <aside class="control-sidebar control-sidebar-dark">
        <div class="container" style="">
            <div class="row  justify-content-center" style="margin-top:200px; padding:22px;">
                <div class="col-lg-5">
                    <div class="title text-center">
                        <h3 >Digigarson Yönetim Paneli</h3>
                    </div>
                    <div class="form-group mt-3">
                        <label for="email">Email</label>
                        <input class="input" id="email" name="email" placeholder="Email">
                    </div>
                    <div class="form-group mt-3">
                        <label for="pass">Password</label>
                        <input type="password" class="input" id="pass" name="pass" placeholder="Password">
                    </div>

                    <button class="btn btn-success e_login mt-3" style="float: right" >Giriş</button>
                </div>
            </div>
        </div>
    </aside>
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="./plugins/jquery/jquery.min.js"></script>

<!-- jQuery UI 1.11.4 -->
<script src="./plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script>
$(".e_login").click(function (){
    let data = {
        "function_type": "login",
        "email": inputVal("email"),
        "pass": inputVal("pass"),
    }
    $.ajax({
        type: "POST",
        url: "./backend/operations.php",
        data: data,
        dataType: "JSON",
        success: function (res) {
            let count = 0;
                if(res.status == "success"){
                    Swal.fire({
                        title: 'Giriş Başarılı',
                        text: `Hoşgeldin ${res.name}`,
                        icon: 'success',
                    })
                    setInterval(function () {
                        if(count>0)
                        window.location.href = "./index.php";
                        else
                            count = 1
                    },0.850)
                }
        }
    });
});



function inputVal(value){
    return $(`input[name=${value}]`).val();
}
</script>
</body>
</html>