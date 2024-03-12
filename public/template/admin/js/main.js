$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});
function removerow(id, url) {
    if (confirm("bạn có chắc chắn muốn xóa không?")) {
        $.ajax({
            type: "DELETE",
            datatype: "json",
            url: url,
            data: { id },
            success: function (result) {
                if (result.error == false) {
                    alert(result.message);
                    location.reload();
                } else {
                    alert("Xóa thất bại");
                }
            },
        });
    }
}
// upload file
$('#upload').change(function(){
    const form=new FormData();
    form.append('file',$(this)[0].files[0]);
    $.ajax({
        processData: false,
        contentType: false,
        type:'POST',
        dataType:'JSON',
        data:form,
        url:'/upload/service',
        success:function(result){
            if(result.error==false)
            {
                $('#image_show').html('<a href="'+result.url+'" target="_blank" ><img src="'+result.url+'" width="100px" height="100px"></a>');
                $('#image').val(result.url);
            }
            else{
                alert('upload file lỗi');
            }
        }
    });
});


