let navStatu =  $("section").first().attr("page-id");
if(!navStatu){
}
let navLiid = $(`.nav-sidebar li a#${navStatu}`).addClass("active");
