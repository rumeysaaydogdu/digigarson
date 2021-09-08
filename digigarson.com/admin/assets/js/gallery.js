const defaultUrl = "./backend/operations.php";
let imageBase64 = "";
get();

$(document).on("click", "button", function(){
    let datafunc = $(this).attr("function");
    switch (datafunc){
        case "add_gallery":
            var values = {
                "name": $("#name").val(),
                "category": $("#category").val(),
                "image" : imageBase64
            }
            ajax("add_gallery",values,"JSON","POST",function success(res){
                if(res.status){
                    get();
                }
            });
            break;
        case "close":
            $("#name").val("");
            $('#adGalleryForm').hide();
            break;
    }
})

$('input[type=file]').change(function () {
    let file =this.files[0];
    var reader = new FileReader();
    var baseString;
    reader.onloadend = function () {
        baseString = reader.result;
        imageBase64 = baseString;
    };
    reader.readAsDataURL(file);
});

function get(){
    ajax("gallery", {}, "JSON","POST",function success(data){
        let elements = `
        <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                  <th scope="col">Name</th>
                  <th scope="col">Image</th>
                  <th scope="col">Category</th>
                  <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
        `;
        data.forEach(function (e){
            elements +=`
                <tr>
                    <td class="text-center "><h5 class="mt-5">${e.name}</h5></td>
                    <td><img src="${e.path}" alt="" width="140px"></td>
                    <td>${e.category}</td>
                    <td><button class="btn btn-outline-info mt-5" function="edit_gallery" style="float:right;margin-top:0px;">duzenle</button></td>
                </tr>`;
        })
        elements +=`
            </tbody>
        </table>
        </div>`;
        $(".gallery").html(elements);
    })
}

function ajax (function_type, data, dataType, type, success){
    data["function_type"] = function_type;
    $.ajax({
        type: type,
        url: defaultUrl,
        data: data,
        dataType: dataType,
        success: function (response) {
            success(response)
        }
    });
}

$(document).ready(function(){
    $('#addGallery').click(function(){
        let element = `<button  class="btn btn-outline-success ml-2" function="add_gallery">Ekle</button>`;
        $(".islem").html(element);
        $('#addGalleryForm').toggle();
    });
});