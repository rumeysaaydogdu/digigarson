const defaultUrl = "./backend/operations.php";
let selectedDataid = 0;
get();

$(document).on("click", "button", function(){
    let dataid =   $(this).closest("tr").attr("data-id");
    let active =   $(this).closest("tr").attr("active");
    let datafunc = $(this).attr("function");
    switch (datafunc){
        case "delete":
            ajax("del_timeline", {"id": dataid, "active": active},"JSON", "POST", function (e){
                console.log(e);
            })
            get();
            break;
        case "edit_info":
            $("#title").val($(this).closest("tr").children("td:nth-child(1)").text())
            $("#text").val($(this).closest("tr").children("td:nth-child(2)").text())
            selectedDataid = dataid;
            $('#timelineform').show();
            let element = `<button  class="btn btn-warning ml-2" function="edit">Düzenle</button>`;
            $(".islem").html(element);
            break;
        case "edit":
            var values = {
                "id": selectedDataid,
                "title": $("#title").val(),
                "text": $("#text").val()
            }
            ajax("edit_timeline", values, "JSON", "POST",function (res){
                if(res.status){
                    get();
                }
            })
            break;
        case "add":
            var values = {
                "title": $("#title").val(),
                "text": $("#text").val()
            }
            ajax("add_timeline",values,"JSON","POST",function success(res){
                if(res.status){
                    get();
                }
            });
            break;
    }
})

function get(){
    ajax("timeline", {}, "JSON","POST",function success(data){
        let elements = `
        <div class="table-responsive">
        <table class="table table-bordered">
            <tbody>
    `;
        const check = (val) =>{
            if(val == 1){
                return `<button class="btn btn-success" function="delete">Aktif</button>`
            }
            else {
                return  `<button class="btn btn-danger" function="delete">Aktif değil</button>`
            }
        }
        data.forEach(function (e){
            elements +=`
                <tr data-id="${e.id}" active="${e.active}">
                   <td class="text-center "><h5 class="mt-5">${e.title}</h5></td>
                    <td data="text">${e.text}</td>
                    <td>${check(e.active)}</td>
                    <td><button class="btn btn-info" function="edit_info">Düzenle</button></td>
                </tr>`;
        })
        elements +=`
            </tbody>
        </table>
        </div>`;
        $(".timelinetable").html(elements);
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
    $('#add_openform').click(function(){
        let element = `<button  class="btn btn-success ml-2" function="add">Add</button>`;
        $(".islem").html(element);
        $('#timelineform').toggle();
    });
});



