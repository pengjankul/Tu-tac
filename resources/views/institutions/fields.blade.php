{{-- hidden filed --}}
{!! Form::hidden('type_data',null) !!}
{!! Form::hidden('id',null) !!}

<!-- Rescode Field -->
<div class="form-group row">
    {!! Form::label('instcode', 'รหัสผู้ว่าจ้าง',['class'=>'col-md-3 col-form-label text-right ']) !!}
    <div class="col-md-6">
        {!! Form::text('instcode', null, ['class' => 'form-control']) !!}
    </div>
    <div class="col-md-3">
        <button type="button" class="btn btn-primary btn-filter-o"><span> <img src="{{ url('/img/icon/analysis.png') }}" alt=""></span> ดึงข้อมูล </button>
    </div>
</div>

<!-- Fag Status Field -->
<div class="form-group row">
    {!! Form::label('fag_status', 'ประเภท',['class'=>'col-md-3 col-form-label text-right ']) !!}
    <div class="col-md-6">
        {!! Form::select('fag_status',['in'=>'หน่วยงานภายใน','out'=> 'หน่วยงานภายนอก'],null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Taxcode Field -->
<div class="form-group row">
    {!! Form::label('taxcode', 'เลขที่ผู้เสียภาษี',['class'=>'col-md-3 col-form-label text-right ']) !!}
    <div class="col-md-6">
        {!! Form::text('taxcode', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Nameth Field -->
<div class="form-group row">
    {!! Form::label('nameth', 'ชื่อ (ไทย)',['class'=>'col-md-3 col-form-label text-right ']) !!}
    <div class="col-md-6">
        {!! Form::text('nameth', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Nameen Field -->
<div class="form-group row">
    {!! Form::label('nameen', 'ชื่อ (อังกฤษ)',['class'=>'col-md-3 col-form-label text-right ']) !!}
    <div class="col-md-6">
        {!! Form::text('nameen', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Addr Psonth Field -->
<div class="form-group row">
    {!! Form::label('addr_psonth', 'ที่อยู่ (ไทย)',['class'=>'col-md-3 col-form-label text-right ']) !!}
    <div class="col-md-6">
            {!! Form::textarea('addr_psonth', null, ['class' => 'form-control', 'rows' => 2, 'cols' => 40]) !!}
    </div>
</div>


<!-- Addr Psonen Field -->
<div class="form-group row">
    {!! Form::label('addr_psonen', 'ที่อยู่ (อังกฤษ)',['class'=>'col-md-3 col-form-label text-right ']) !!}
    <div class="col-md-6">
            {!! Form::textarea('addr_psonen', null, ['class' => 'form-control', 'rows' => 2, 'cols' => 40]) !!}
    </div>
</div>

<!-- Addr Msg Nameth Field -->
<div class="form-group row">
    {!! Form::label('addr_msg_name_th', 'ชื่อสำหรับการจัดส่ง (ไทย)',['class'=>'col-md-3 col-form-label text-right ']) !!}
    <div class="col-md-6">
        {!! Form::text('addr_msg_name_th', null, ['class' => 'form-control']) !!}
    </div>
</div>
<!-- Addr Msgth Field -->
<div class="form-group row">
    {!! Form::label('addr_msg_th', 'ที่อยู่จัดส่ง (ไทย)',['class'=>'col-md-3 col-form-label text-right ']) !!}
    <div class="col-md-6">
            {!! Form::textarea('addr_msg_th', null, ['class' => 'form-control', 'rows' => 2, 'cols' => 40]) !!}
    </div>
</div>


<!-- Addr Field -->
<div class="form-group row">
    {!! Form::label('addr', 'ที่อยู่',['class'=>'col-md-3 col-form-label text-right ']) !!}
    <div class="col-md-6">
            {!! Form::textarea('addr', null, ['class' => 'form-control', 'rows' => 2, 'cols' => 40]) !!}
    </div>
</div>


<!-- Telno Field -->
<div class="form-group row">
    {!! Form::label('telno', 'ติดต่อ',['class'=>'col-md-3 col-form-label text-right ']) !!}
    <div class="col-md-6">
        {!! Form::text('telno', null, ['class' => 'form-control']) !!}
    </div>
</div>



<!-- Fax Addr Field -->
<div class="form-group row">
    {!! Form::label('fax_addr', 'ที่อยู่แฟกซ์',['class'=>'col-md-3 col-form-label text-right ']) !!}
    <div class="col-md-6">
        {!! Form::text('fax_addr', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Email Addr Field -->
<div class="form-group row">
    {!! Form::label('email_addr', 'อีเมล',['class'=>'col-md-3 col-form-label text-right ']) !!}
    <div class="col-md-6">
        {!! Form::text('email_addr', null, ['class' => 'form-control']) !!}
    </div>
</div>



<!-- Website Addr Field -->
<div class="form-group row">
    {!! Form::label('website_addr', 'เว็บไซต์',['class'=>'col-md-3 col-form-label text-right ']) !!}
    <div class="col-md-6">
        {!! Form::text('website_addr', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Departtype Field -->
<div class="form-group row">
    {!! Form::label('departtype', 'สาขาหลัก',['class'=>'col-md-3 col-form-label text-right ']) !!}
    <div class="col-md-6">
        {!! Form::text('departtype', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Depart Lv Second Field -->
<div class="form-group row">
    {!! Form::label('depart_lv_second', 'สาขารองอันดับ2',['class'=>'col-md-3 col-form-label text-right ']) !!}
    <div class="col-md-6">
        {!! Form::text('depart_lv_second', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Depart Lv Third Field -->
<div class="form-group row">
    {!! Form::label('depart_lv_third', 'สาขารองอันดับ3',['class'=>'col-md-3 col-form-label text-right ']) !!}
    <div class="col-md-6">
        {!! Form::text('depart_lv_third', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Depart Lv Fourth Field -->
<div class="form-group row">
    {!! Form::label('depart_lv_fourth', 'สาขารองอันดับ4',['class'=>'col-md-3 col-form-label text-right ']) !!}
    <div class="col-md-6">
        {!! Form::text('depart_lv_fourth', null, ['class' => 'form-control']) !!}
    </div>
</div>






<!-- Submit Field -->
<div class="form-group col-sm-12 text-center">
    {{ Form::button('<span> <img src="'. url('/img/icon/save.png').' " alt=""></span> บันทึกข้อมูล', ['type' => 'button', 'class' => 'btn  btn-submit'] )  }}
    <a class="btn btn-cancel" data-dismiss="modal"><span> <img src="{{ url('/img/icon/cancel.png') }}" alt=""></span> ยกเลิก</a>
</div>

