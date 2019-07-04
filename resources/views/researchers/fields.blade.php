{{-- hidden filed --}}
{!! Form::hidden('type_data',null) !!}
{{-- {!! Form::hidden('_token', csrf_token()) !!} --}}
{!! Form::hidden('id',null) !!}

<!-- Rescode Field -->
<div class="form-group row">
    {!! Form::label('rescode', 'รหัสนักวิจัย',['class'=>'col-md-3 col-form-label text-right ']) !!}
    <div class="col-md-6">
        {!! Form::text('rescode', null, ['class' => 'form-control']) !!}
    </div>
    <div class="col-md-3">
        <button type="button" class="btn btn-primary btn-filter-o"><span> <img  src="{{ url('/img/icon/analysis.png') }}" alt=""></span><small> ดึงข้อมูล
            (E-office)</small>
        </button>
    </div>
</div>

<!-- Restype Field -->
<div class="form-group row">
    {!! Form::label('restype', 'ประเภท',['class'=>'col-md-3 col-form-label text-right ']) !!}
    <div class="col-md-6">
        {!! Form::select('restype', ['0'=>'นิติบุคคล','1'=>'บุคคลธรรมดา'],null, ['class' => 'form-control']) !!}
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

<!-- Cardid Field -->
<div class="form-group row">
    {!! Form::label('cardid', 'รหัสบัตรประชาชน',['class'=>'col-md-3 col-form-label text-right ']) !!}
    <div class="col-md-6">
        {!! Form::text('cardid', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Birthdate Field -->
<div class="form-group row">
    {!! Form::label('birthdate', 'วันเดือนปีเกิด',['class'=>'col-md-3 col-form-label text-right ']) !!}
    <div class="col-md-6">
        {!! Form::text('birthdate', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Sexcode Field -->
<div class="form-group row">
    {!! Form::label('sexcode', 'เพศ',['class'=>'col-md-3 col-form-label text-right ']) !!}
    <div class="col-md-6">
        {!! Form::select('sexcode',['ชาย'=>'ชาย','หญิง'=>'หญิง'], null, ['class' => 'form-control']) !!}
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


<!-- Addr Offth Field -->
<div class="form-group row">
    {!! Form::label('addr_offth', 'ที่อยู่ที่ทำงาน (ไทย)',['class'=>'col-md-3 col-form-label text-right ']) !!}
    <div class="col-md-6">
            {!! Form::textarea('addr_offth', null, ['class' => 'form-control', 'rows' => 2, 'cols' => 40]) !!}
    </div>
</div>

<!-- Addr Offen Field -->
<div class="form-group row">
    {!! Form::label('addr_offen', 'ที่อยู่ที่ทำงาน (อังกฤษ)',['class'=>'col-md-3 col-form-label text-right ']) !!}
    <div class="col-md-6">
            {!! Form::textarea('addr_offen', null, ['class' => 'form-control', 'rows' => 2, 'cols' => 40]) !!}
    </div>
</div>

<!-- Addr Msg Nameth Field -->
<div class="form-group row">
    {!! Form::label('addr_msg_nameth', 'ชื่อสำหรับการจัดส่ง (ไทย)',['class'=>'col-md-3 col-form-label text-right ']) !!}
    <div class="col-md-6">
        {!! Form::text('addr_msg_nameth', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Addr Msg Nameen Field -->
<div class="form-group row">
    {!! Form::label('addr_msg_nameen', 'ชื่อสำหรับการจัดส่ง (อังกฤษ)',['class'=>'col-md-3 col-form-label text-right ']) !!}
    <div class="col-md-6">
        {!! Form::text('addr_msg_nameen', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Addr Msgth Field -->
<div class="form-group row">
    {!! Form::label('addr_msgth', 'ที่อยู่จัดส่ง (ไทย)',['class'=>'col-md-3 col-form-label text-right ']) !!}
    <div class="col-md-6">
            {!! Form::textarea('addr_msgth', null, ['class' => 'form-control', 'rows' => 2, 'cols' => 40]) !!}
    </div>
</div>


<!-- Addr Msgen Field -->
<div class="form-group row">
    {!! Form::label('addr_msgen', 'ที่อยู่จัดส่ง (อังกฤษ)',['class'=>'col-md-3 col-form-label text-right ']) !!}
    <div class="col-md-6">
            {!! Form::textarea('addr_msgen', null, ['class' => 'form-control', 'rows' => 2, 'cols' => 40]) !!}
    </div>
</div>


<!-- Phoneno Field -->
<div class="form-group row">
    {!! Form::label('phoneno', 'เบอร์โทรศัพท์',['class'=>'col-md-3 col-form-label text-right ']) !!}
    <div class="col-md-6">
        {!! Form::text('phoneno', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Mbileno Field -->
<div class="form-group row">
    {!! Form::label('mbileno', 'เบอร์โทรศัพท์มือถือ',['class'=>'col-md-3 col-form-label text-right ']) !!}
    <div class="col-md-6">
        {!! Form::text('mbileno', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Faxcode Field -->
<div class="form-group row">
    {!! Form::label('faxcode', 'ที่อยู่แฟกซ์',['class'=>'col-md-3 col-form-label text-right ']) !!}
    <div class="col-md-6">
        {!! Form::text('faxcode', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Positionth Field -->
<div class="form-group row">
    {!! Form::label('positionth', 'ตำแหน่ง (ไทย)',['class'=>'col-md-3 col-form-label text-right ']) !!}
    <div class="col-md-6">
        {!! Form::text('positionth', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Positionen Field -->
<div class="form-group row">
    {!! Form::label('positionen', 'ตำแหน่ง (อังกฤษ)',['class'=>'col-md-3 col-form-label text-right ']) !!}
    <div class="col-md-6">
        {!! Form::text('positionen', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Email Addr Field -->
<div class="form-group row">
    {!! Form::label('email_addr', 'อีเมล',['class'=>'col-md-3 col-form-label text-right ']) !!}
    <div class="col-md-6">
        {!! Form::text('email_addr', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Postcode Field -->
<div class="form-group row">
    {!! Form::label('postcode', 'รหัสไปรษณีย์',['class'=>'col-md-3 col-form-label text-right ']) !!}
    <div class="col-md-6">
        {!! Form::text('postcode', null, ['class' => 'form-control']) !!}
    </div>
</div>



<!-- Orgid Field -->
<div class="form-group row">
    {!! Form::label('orgid', 'คณะที่สังกัด',['class'=>'col-md-3 col-form-label text-right ']) !!}
    <div class="col-md-6">
        {!! Form::text('orgid', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Orgname Field -->
<div class="form-group row">
    {!! Form::label('orgname', 'ชื่อคณะ',['class'=>'col-md-3 col-form-label text-right ']) !!}
    <div class="col-md-6">
        {!! Form::text('orgname', null, ['class' => 'form-control']) !!}
    </div>
</div>



<!-- Submit Field -->
<div class="form-group col-sm-12 text-center">
    {{ Form::button('<span> <img src="'. url('/img/icon/save.png').' " alt=""></span> บันทึกข้อมูล', ['type' => 'button', 'class' => 'btn  btn-submit'] )  }}
    <a class="btn btn-cancel" data-dismiss="modal"><span> <img src="{{ url('/img/icon/cancel.png') }}" alt=""></span> ยกเลิก</a>
</div>
