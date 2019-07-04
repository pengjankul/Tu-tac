<div class="row">
    <div class="col-md-7 col-sm-6">
        <div class=" row" >
            <span style="display: flex;justify-content: center; align-items: center;">ค้นหา</span>
            <div class="col-md-3">
                <select  id="acc_search" class="form-control-custom">
                    <option value="0">เลขที่บัญชี</option>
                    <option value="1">ชื่อบัญชี</option>
                </select>
            </div>
            <div class="col-md-4">
                <input class="form-control-custom" id="search_val" type="text"  placeholder="ค้นหาเลขที่บัญชี" >
            </div>
            <div class="col-md-2">
                <button class="btn btn-search" id="btn-search" type="button"><span> <img src="{{ url('/img/icon/loupe.png') }}" alt=""></span>ค้นหาข้อมูล</button>
            </div>
           
        </div>
        
    </div>
     
    <div class="col-md-5 text-right col-sm-6">

        <a class="pull-right btn btn-create m-1"  onclick="rscCreate()" href="#"><span> <img src="{{ url('/img/icon/plus.png') }}" alt=""></span> เพิ่มข้อมูล</a>
        <a class=" btn  btn-filter " data-toggle="modal" data-target="#ModalReport" ><span> <img src="{{ url('/img/icon/rising.png') }}" alt=""></span> กรองรายงาน</a>
        <a class="" href="#"><span> <img src="{{ url('/img/icon/excel.png') }}" alt=""></span></a>

    </div>
    
</div>

{{-- modal search report --}}
<div class="modal fade" id="ModalReport" tabindex="-1" role="dialog" aria-labelledby="ModalReportLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        {{-- <div class="modal-header">
            
        </div> --}}
        <div class="modal-body">
            <div class="row p-3">
                <div class="col-md-12">
                    <h4 class="modal-title text-center" id="ModalReportLabel">ตัวเลือกกรองข้อมูล</h4>
                </div>
                {{-- <div class="pull-right">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                </div> --}}
                
            </div>
            
            
            <form action="" method="get">
                <div class="row form-group">
                
                    {!! Form::label('Type', 'วันที่กรอง',['class'=>'col-md-3 col-form-label text-right']) !!}
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="" id="">
                    </div>
                    {!! Form::label('Type', 'จนถึง',['class'=>'col-md-1 col-form-label text-right']) !!}
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="" id="">
                    </div>
                    
                </div>
                <div class="row form-group">
            
                    {!! Form::label('Type', 'ประเภท',['class'=>'col-md-3 col-form-label text-right']) !!}
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="" id="">
                    </div>
                    
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="" id="">
                    </div>
                    
                </div>
                <div class="row form-group">
            
                    {!! Form::label('Type', 'การจัดเรียง',['class'=>'col-md-3 col-form-label text-right']) !!}
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="" id="">
                    </div>
                    
                    
                    
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-filter"><span> <img src="{{ url('/img/icon/analysis.png') }}" alt=""></span> ค้นหาข้อมูล</button>
                    <button type="button" class="btn btn-secondary btn-cancel" data-dismiss="modal"><span> <img src="{{ url('/img/icon/cancel.png') }}" alt=""></span> ยกเลิก</button>
                        
                </div>
                
            </form>
            
        </div>
        
        </div>
    </div>
</div>