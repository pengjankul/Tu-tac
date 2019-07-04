$(function () {
    //submit data
    $('.btn-submit').click(function(e){
        // get data type
        var type = $('input[name="type_data"]').val();
        
        if (type == 'create'){
            // get data  filed
         
            console.log(url);
            e.preventDefault(e);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "POST",
                url: url + '/researchers',
                data:$('#researcher_form').serialize(),
                success: function(data){
                    console.log(data);
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
                url: url + '/researchers/'+id,
                data:$('#researcher_form').serialize(),
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


function rscCreate(){
    
    $('input').val('');
    $('select').val('');
    $('textarea').val('');

    $('input[name="type_data"]').val('create');


    $('#resForm').modal();
}

function rscEdit(id){
    $('input[name="id"]').val(id);
    $('input[name="type_data"]').val('edit');

    // load data
    $.ajax({
        type: "GET",
        url: url + '/researchers/'+id+'/edit',
        success: function(res){
            if (res.data){
                var data = res.data;

                $('input[name="rescode"]').val(data.rescode);
                $('select[name="restype"]').val(data.restype);
                $('input[name="nameth"]').val(data.nameth);
                $('input[name="nameen"]').val(data.nameen);
                $('input[name="cardid"]').val(data.cardid);
                $('input[name="birthdate"]').val(data.birthdate);
                $('input[name="sexcode"]').val(data.sexcode);
                $('textarea[name="addr_psonth"]').val(data.addr_psonth);
                $('textarea[name="addr_psonen"]').val(data.addr_psonen);
                $('textarea[name="addr_offth"]').val(data.addr_offth);
                $('textarea[name="addr_offen"]').val(data.addr_offen);
                $('input[name="addr_msg_nameth"]').val(data.addr_msg_nameth);
                $('input[name="addr_msg_nameen"]').val(data.addr_msg_nameen);
                $('textarea[name="addr_msgth"]').val(data.addr_msgth);
                $('textarea[name="addr_msgen"]').val(data.addr_msgen);
                $('input[name="phoneno"]').val(data.phoneno);
                $('input[name="mbileno"]').val(data.mbileno);
                $('input[name="faxcode"]').val(data.faxcode);
                $('input[name="positionth"]').val(data.positionth);
                $('input[name="positionen"]').val(data.positionen);
                $('input[name="email_addr"]').val(data.email_addr);
                $('input[name="postcode"]').val(data.postcode);
                $('input[name="orgid"]').val(data.orgid);
                $('input[name="orgname"]').val(data.orgname);

                $('#resForm').modal();
            }
        },
        error: function(data){

        }
    })
   
}

