const defaultUrl = "./backend/operations.php";
let imageBase64 = "";
get();

$(document).on("click", "button", function(){
    let dataid =   $(this).closest("tr").attr("data-id");
    let active =   $(this).closest("tr").attr("active");
    let datafunc = $(this).attr("function");
    switch (datafunc){
        case "delete_features":
            ajax("del_features", {"id": dataid, "active": active},"JSON", "POST", function (e){
                console.log(e);
            })
            get();
            break;
        case "edit_features_info":
            $("#name").val($(this).closest("tr").children("td:nth-child(1)").text())
            $("#description").val($(this).closest("tr").children("td:nth-child(3)").text())
            selectedDataid = dataid;
            $('#addFeaturesForm').show();
            let element = `<button  class="btn btn-warning ml-2" function="edit_features">düzenle</button> <button  class="btn btn-danger ml-2" function="close" >İptal</button>`;
            $(".islem").html(element);
            break;
        case "edit_features":
            var values = {
                "id": selectedDataid,
                "name": $("#name").val(),
                "description": $("#description").val()
            }
            ajax("edit_features", values, "JSON", "POST",function (res){
                if(res.status){
                    get();
                }
            })
            break;
        case "add_features":
            var values = {
                "name": $("#name").val(),
                "description": $("#description").val(),
                "image" : imageBase64
            }
            console.log(values);
            ajax("add_features",values,"JSON","POST",function success(res){
                if(res.status){
                    get();
                }
            });
            break;
        case "close":
            $("#name").val("");
            $("#description").val("");
            $('#addFeaturesForm').hide();
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
    ajax("features", {}, "JSON","POST",function success(data){
        let elements = `
        <div class="table-responsive">
        <table class="table table-bordered">
            <tbody>
    `;
        const check = (val) =>{
            if(val == 1){
                return `<button class="btn btn-success mt-5" function="delete_features">Aktif</button>`
            }
            else {
                return  `<button class="btn btn-danger mt-5" function="delete_features">Aktif değil</button>`
            }
        }
        data.forEach(function (e){
            elements +=`
                <tr data-id="${e.id}" active="${e.active}">
                    <td class="text-center "><h5 class="mt-5">${e.name}</h5></td>
                    <td><img src=".${e.image}" alt="" width="140px"></td>
                    <td>${e.desc}</td>
                    <td>${check(e.active)}</td>
                    <td><button class="btn btn-outline-info mt-5" function="edit_features_info">düzenle</button></td>
                </tr>`;
        })
        elements +=`
            </tbody>
        </table>
        </div>`;
        $(".features").html(elements);
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
    $('#addFeatures').click(function(){
        let element = `<button  class="btn btn-outline-success ml-2" function="add_features">Ekle</button>`;
        $(".islem").html(element);
        $('#addFeaturesForm').toggle();
    });
});