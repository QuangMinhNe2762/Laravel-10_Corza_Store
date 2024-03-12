$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
function loadMore()
{
    const page=$('#page').val();
    $.ajax({
        type:'POST',
        dataType:'json',
        data: {page},
        url: 'services/load-product',
        success:function(result){
            if(result.error===false)
            {
                $('#loadProducts').append(result.html);
                $('#page').val(page+1);
            }
            else{
                alert('đã load hết sản phẩm');
            }
        }
    });
}
