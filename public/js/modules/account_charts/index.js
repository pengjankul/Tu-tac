$(function () {
      
        //grid tree
        var $tg = $('#tg').treegrid({

            url: url+"/getAccountChartJson",
            method : 'GET',
            animate: false,
            lines:true,
            // minHeight:100,
            maxHeight:500,
            collapsible: true,
            fitColumns: true,
            noheader:true,
            idField: 'id',
            showFilterBar:false,
            treeField: 'name',
            onContextMenu: onContextMenu,
            loadMsg:"กำลังโหลดข้อมูล",
            emptyMsg:"ไม่มีข้อมูล",
            

            columns: [
                [{
                        title: 'เลขที่บัญชี',
                        field: 'name',
                        width: 40,
                        
                        // align: 'left'
                    },
                    {
                        field: 'budget',
                        title: 'ชื่อบัญชี',
                        width: 60,
                        // align: 'center'
                    },
                    
                    // {
                    //     field: 'tools',
                    //     title: '&nbsp;',
                    //     width: 25,
                    //     align: 'right'
                    // },
                    // {field:'end',title:'End Date',width:80}
                ]
            ],
            onLoadSuccess: function (row) {
              
                // $(this).treegrid('enableDnd', row ? row.id : null);
            },
            onSelect: function(field, row)
            {
                $('input[name="id"]').val(field.id);
            },

            onClickCell:function(field,row){
                // console.clear();
                // console.log(row.id);
                // set id to form
                $('input[name="id"]').val(row.id);
                $('input[name="type_data"]').val('edit');

                $('#main-index').removeClass('col-md-12').addClass('col-md-8');
                $tg.treegrid('resize',{
                    width: '100%'
                });
                $('#acc_data').collapse('show');

                // get data acc
                $.ajax({
                    method: "GET",
                    url: url + '/getAccount',
                    data:{ id:row.id},
                    success: function(data){
                        // alert(data);
                        // set value to form filed
                        $('input[name="chart_code"]').val(data.chart_code);
                        $('input[name="nameth"]').val(data.nameth);
                        $('input[name="nameen"]').val(data.nameen);
                        $('textarea[name="chart_detail"]').val(data.chart_detail);
                        $('input[name="AccChartParentrtName"]').val(data.parentName);
                        $('input[name="achart_parent_id"]').val(data.achart_parent_id);

                        $('select[name="chartcate_type"]').val(data.chartcate_type);
                        $('select[name="ChartType"]').val(data.ChartType);

                        var form = document.getElementById("acc_form");
                        var elements = form.elements;
                        for (var i = 0, len = elements.length; i < len; ++i) {
                            elements[i].readOnly = true;
                        }

                        $('select[name="chartcate_type"]').prop('disabled', true);
                        $('select[name="accnt_type"]').prop('disabled', true);
                        $('select[name="chartchart_type"]').prop('disabled', true);
                        $('.btn-submit').prop('disabled', true);
                      
                    },
                    error: function(data){
            
                    }
                })
            
                
            }
            


        }).treegrid('enableFilter', [{
                field: 'name',
                type: 'text',
            },
            {
                field: 'budget',
                type: 'text',
                options: {
                    precision: 1
                },
            },
        ]);

        

        // search data
        $('#btn-search').click(function(){
            var type = $('#acc_search').val();
            var value = $('#search_val').val();
            
            $tg.treegrid('addFilterRule', {
                field:  (type == 0)?'name':'budget',
                op: 'contains',
                value: value
            }).treegrid('doFilter');

        })

        // chart tree tu

        
        var $tt = $('#tt').tree({
            url: url+"/getTreeAccountTu",
            method : 'GET',
            animate: true,
            checkbox:true,
            onLoadSuccess: function(node, data){
                $('#tt').tree('collapseAll');//collapse all but expand the root node
                
                // check node
                var node = $(this).tree('find', 1);
                if (node){
                    $(this).tree('check', node.target);
                }
            }
            // collapseAll:true
        });

        $('.btn-chart_click').click(function(){
            var selected = $tt.tree('getChecked');
            console.log(selected);
        })


    //grid tree info create edit delete change year
    $('#acc_create').click(function(){

       toastr.options = {
            timeOut : 0,
            extendedTimeOut : 100,
            tapToDismiss : true,
            debug : false,
            fadeOut: 10,
            positionClass : "toast-top-center"
        };
        toastr.warning("<button type='button' id='confirmationRevertYes' class='btn btn-danger'>ยืนยัน</button>",'ต้องการเพิ่มปีงบประมาณหรือไม่',
        {
            closeButton: false,
            allowHtml: true,

            onShown: function (toast) {
                $("#confirmationRevertYes").click(function(){
                
                        e.preventDefault(e);
                        // $.ajax({
                        //     type: "DELETE",
                        //     url: url + '/accountCharts/'+id,
                        //     data:{
                        //         '_token': $('input[name=_token]').val()
                        //     },
                        //     success: function(data){
                        //         console.log(data);
                        //         toastr.success('Successfully added Post!', 'Success Alert', {timeOut: 5000});
                        //         // $tg.treegrid('reload');
                        //         location.reload();
                        //     },
                        //     error: function(data){
                    
                        //     }
                        // })
                });
            }
        });
        // $('#main-index').removeClass('col-md-12').addClass('col-md-8');
        // $tg.treegrid('resize',{
        //     width: '100%'
        // });

        // var isVisibleShow = $('#acc_data').is( ":visible" ); 
        // if (!isVisibleShow) 
        //     $('#acc_data').collapse('show');
        // // else
        // //     $('#acc_data').collapse('hide');

        // $('input[name="type_data"]').val('create');

        // // check create chid
        // var id = $('input[name="id"]').val();
        // if (id != ''){
        //     $('input[name="chart_code"]').val('');
        //     $('input[name="nameth"]').val('');
        //     $('input[name="nameen"]').val('');
        //     $('textarea[name="chart_detail"]').val('');
        //     $('input[name="achart_parent_id"]').val(id);

      
        // }

    });
    $('#acc_edit').click(function(){
        // check id click
        var id =  $('input[name="id"]').val();
        if (id != ''){
            $('#main-index').removeClass('col-md-12').addClass('col-md-8');
            $tg.treegrid('resize',{
                width: '100%'
            });
    
            var isVisibleShow = $('#acc_data').is( ":visible" ); 
            if (!isVisibleShow) 
                $('#acc_data').collapse('show');
            // else
            //     $('#acc_data').collapse('hide');
            $('input[name="type_data"]').val('edit');
        }
        
    });
    $('#acc_delete').click(function(e){

        var id =  $('input[name="id"]').val();
        if (id != ''){
            toastr.warning("<button type='button' id='confirmationRevertYes' class='btn btn-danger'>ยืนยัน</button>",'ต้องการลบข้อมูลใช่หรือไม่',
            {
                closeButton: false,
                allowHtml: true,
                onShown: function (toast) {
                    $("#confirmationRevertYes").click(function(){
                    
                            e.preventDefault(e);
                            $.ajax({
                                type: "DELETE",
                                url: url + '/accountCharts/'+id,
                                data:{
                                    '_token': $('input[name=_token]').val()
                                },
                                success: function(data){
                                    console.log(data);
                                    toastr.success('Successfully added Post!', 'Success Alert', {timeOut: 5000});
                                    // $tg.treegrid('reload');
                                    location.reload();
                                },
                                error: function(data){
                        
                                }
                            })
                    });
                }
            });
        }

       
    })

    //hidden data 
    $('#acc_data').on('hidden.bs.collapse', function () {
        $('#main-index').removeClass('col-md-8').addClass('col-md-12');
       
       $tg.treegrid('resize',{
           width: '100%'
       });
    })

    //submit data

    $('.btn-submit').click(function(e){
        // get data type
        var type = $('input[name="type_data"]').val();
        
        if (type == 'create'){
            // get data  filed
            var data =   $('#acc_form').serialize();
            console.log(url);
            e.preventDefault(e);
            $.ajax({
                method: "POST",
                url: url + '/accountCharts',
                data:$('#acc_form').serialize(),
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
             var data =   $('#acc_form').serialize();
             var id =  $('input[name="id"]').val();
             console.log(id);
             e.preventDefault(e);
             $.ajax({
                type: "PUT",
                 url: url + '/accountCharts/'+id,
                 data:$('#acc_form').serialize(),
                 success: function(data){
                    toastr.success('Successfully added Post!', 'Success Alert', {timeOut: 5000});
                    //  console.log(data);
                    //  // $tg.treegrid('reload');
                     location.reload();
                 },
                 error: function(data){
         
                 }
             })
        }
    })


    //get chart tu 
    $('#chart_tu').click(function(){
        
    })


});





function onContextMenu(e, row) {
    if (row) {
        e.preventDefault();
        $(this).treegrid('select', row.id);
        $('#mm').menu('show', {
            left: e.pageX,
            top: e.pageY
        });
    }
}

var idIndex = 100;

function append(){

    var id = $('input[name="id"]').val();
    var node = $('#tg').treegrid('find', id);
  
    
    $('#main-index').removeClass('col-md-12').addClass('col-md-8');
    $('#tg').treegrid('resize',{
        width: '100%'
    });

    var form = document.getElementById("acc_form");
    var elements = form.elements;
    for (var i = 0, len = elements.length; i < len; ++i) {
        elements[i].readOnly = false;
    }
    $('select[name="chartcate_type"]').prop('disabled', false);
    $('select[name="accnt_type"]').prop('disabled', false);
    $('select[name="chartchart_type"]').prop('disabled', false);
    $('.btn-submit').prop('disabled', false);

    var isVisibleShow = $('#acc_data').is( ":visible" ); 
    if (!isVisibleShow) 
        $('#acc_data').collapse('show');
    // else
    //     $('#acc_data').collapse('hide');

    $('input[name="type_data"]').val('create');

    // check create chid
    var id = $('input[name="id"]').val();
    if (id != ''){
        $('input[name="chart_code"]').val('');
        $('input[name="nameth"]').val('');
        $('input[name="nameen"]').val('');
        $('textarea[name="chart_detail"]').val('');
        $('input[name="achart_parent_id"]').val(id);
        $('input[name="AccChartParentrtName"]').val(node.name);

  
    }

    // idIndex++;
    // var d1 = new Date();
    // var d2 = new Date();
    // d2.setMonth(d2.getMonth()+1);
    // var node = $('#tg').treegrid('getSelected');
    // $('#tg').treegrid('append',{
    //     parent: node.id,
    //     data: [{
    //         id: idIndex,
    //         name: 'New Task'+idIndex,
    //         persons: parseInt(Math.random()*10),
    //         begin: $.fn.datebox.defaults.formatter(d1),
    //         end: $.fn.datebox.defaults.formatter(d2),
    //         progress: parseInt(Math.random()*100)
    //     }]
    // })
}
function editIt(){


    var id = $('input[name="id"]').val();
    // get data acc
    $.ajax({
        method: "GET",
        url: url + '/getAccount',
        data:{ id:id},
        success: function(data){
            // alert(data);
            // set value to form filed
            $('input[name="chart_code"]').val(data.chart_code);
            $('input[name="nameth"]').val(data.nameth);
            $('input[name="nameen"]').val(data.nameen);
            $('textarea[name="chart_detail"]').val(data.chart_detail);
            $('input[name="AccChartParentrtName"]').val(data.parentName);
            $('input[name="achart_parent_id"]').val(data.achart_parent_id);

            $('select[name="accnt_type"]').val(data.accnt_type);
            $('select[name="chartchart_type"]').val(data.chartchart_type);


        
        },
        error: function(data){

        }
    })

    $('#main-index').removeClass('col-md-12').addClass('col-md-8');
    $('#tg').treegrid('resize',{
        width: '100%'
    });
    var form = document.getElementById("acc_form");
    var elements = form.elements;
    for (var i = 0, len = elements.length; i < len; ++i) {
        elements[i].readOnly = false;
    }

    $('select[name="chartcate_type"]').prop('disabled', false);
    $('select[name="accnt_type"]').prop('disabled', false);
    $('select[name="chartchart_type"]').prop('disabled', false);
    $('.btn-submit').prop('disabled', false);

    var isVisibleShow = $('#acc_data').is( ":visible" ); 
    if (!isVisibleShow) 
        $('#acc_data').collapse('show');



}

function removeIt(){
    var id =  $('input[name="id"]').val();
    if (id != ''){
        toastr.warning("<button type='button' id='confirmationRevertYes' class='btn btn-danger'>ยืนยัน</button>",'ต้องการลบข้อมูลใช่หรือไม่',
        {
            closeButton: false,
            allowHtml: true,
            onShown: function (toast) {
                $("#confirmationRevertYes").click(function(e){
                
                        e.preventDefault(e);
                        $.ajax({
                            type: "DELETE",
                            url: url + '/accountCharts/'+id,
                            data:{
                                '_token': $('input[name=_token]').val()
                            },
                            success: function(data){
                     
                                toastr.success('ลบข้อมูลเรียบร้อยแล้ว', 'ข้อความแจ้งเตือน!!', {timeOut: 5000});
                                // $tg.treegrid('reload');
                                location.reload();
                            },
                            error: function(data){
                    
                            }
                        })
                });
            }
        });
    }
}

function collapse(){
    var node = $('#tg').treegrid('getSelected');
    if (node){
        $('#tg').treegrid('collapse', node.id);
    }
}

function expand(){
    var node = $('#tg').treegrid('getSelected');
    if (node){
        $('#tg').treegrid('expand', node.id);
    }
}
