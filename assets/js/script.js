

function sortTable(columnName){
    
    var sort = $("#sort").val();
    $.ajax({
        url:'/krocomumet/C_Admin/admin',
        type:'post',
        data:{columnName:columnName,sort:sort},
        success: function(response){
       
            $("#table_data tr:not(:first)").remove();
            
            $("#table_data").append(response);
            if(sort == "asc"){
                $("#sort").val("desc");
            }else{
                $("#sort").val("asc");
            }
                        
        }
    });
}

function editKota(){
    var provinsi = $("#provinsi_name").val();
    $.ajax({
        url:'/krocomumet/C_Admin/editKota',
        type:'get',
        data:{provinsi:provinsi},
        success: function(response){
            alert(response);
                        
        }
    });
}

function del_data(email,nama){
    
    $.ajax({
        url:'/senimanmengajar/C_Admin/del_data',
        type:'post',
        data:{nama:nama,email:email},
        success: function(response){
            var message = response;
             alert(message);
            
                        
        }
    });
}
// $(document).ready(function(){
//     $("#change_provinsi").click(function(){
//         $("#provinsi_label").remove();
//     });
// });

