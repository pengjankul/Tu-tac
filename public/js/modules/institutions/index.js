$(function () {
    //submit data
    $('.btn-submit').click(function(e){
        // get data type
        var type = $('input[name="type_data"]').val();
        
        if (type == 'create'){
            // get data  filed
         
            console.log($('#institution_form').serialize());
            e.preventDefault(e);

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "POST",
                url: url + '/institutions',
                data:$('#institution_form').serialize(),
                success: function(data){
                    // console.log(data);
                    toastr.success('Successfully added Post!', 'Success Alert', {timeOut: 5000});
                    // $tg.treegrid('reload');
                    location.reload();
                },
                error: function(data){
        
                }
            })
        }
        else{
            // get data  filed
            var id =  $('input[name="id"]').val();
            e.preventDefault(e);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "PUT",
                url: url + '/institutions/'+id,
                data:$('#institution_form').serialize(),
                success: function(data){
                 
                    toastr.success('Successfully added Post!', 'Success Alert', {timeOut: 5000});
                    location.reload(); 
                },
                error: function(data){
        
                }
            })
        }
    })



});


function intCreate(){
    
    $('input').val('');
    $('select').val('');
    $('textarea').val('');

    $('input[name="type_data"]').val('create');


    $('#intForm').modal();
}

function intEdit(id){
    $('input[name="id"]').val(id);
    $('input[name="type_data"]').val('edit');

    // load data
    $.ajax({
        type: "GET",
        url: url + '/institutions/'+id+'/edit',
        success: function(res){
            if (res.data){
                var data = res.data;

                $('input[name="instcode"]').val(data.instcode);
                $('select[name="fag_status"]').val(data.fag_status);
                $('input[name="taxcode"]').val(data.taxcode);
                $('input[name="nameth"]').val(data.nameth);
                $('input[name="nameen"]').val(data.nameen);
                $('textarea[name="addr_psonth"]').val(data.addr_psonth);
                $('textarea[name="addr_psonen"]').val(data.addr_psonen);
                $('input[name="addr_msg_name_th"]').val(data.addr_msg_name_th);
                $('textarea[name="addr_msg_th"]').val(data.addr_msg_th);
                $('textarea[name="addr"]').val(data.addr);
                $('input[name="telno"]').val(data.telno);
                $('input[name="fax_addr"]').val(data.fax_addr);
                $('input[name="email_addr"]').val(data.email_addr);
                $('input[name="website_addr"]').val(data.website_addr);
                
                $('input[name="departtype"]').val(data.departtype);
                $('input[name="depart_lv_second"]').val(data.depart_lv_second);
                $('input[name="depart_lv_third"]').val(data.depart_lv_third);
                $('input[name="depart_lv_fourth"]').val(data.depart_lv_fourth);
             

                $('#intForm').modal();
            }
        },
        error: function(data){

        }
    })
   
}

