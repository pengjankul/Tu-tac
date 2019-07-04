{{-- hidden filed --}}
{!! Form::hidden('type_data',null) !!}
{!! Form::hidden('_token', csrf_token()) !!}
{!! Form::hidden('id',null) !!}

    


<div class="form-group row">
    {!! Form::label('achart_parent_id', 'รหัสคุมบัญชี',['class'=>'col-md-4 col-form-label text-right']) !!}
    <div class="col-md-8">
        {!! Form::hidden('achart_parent_id', null, ['class' => 'form-control']) !!}
        {!! Form::text('AccChartParentrtName', null, ['class' => 'form-control']) !!}
        {{-- <span class="help-block">This is a help text</span> --}}
    </div>
</div>

<!-- Accchartnumber Field -->
<div class="form-group row">
    {!! Form::label('chart_code', 'เลขบัญชี:',['class'=>'col-md-4 col-form-label text-right']) !!}
    <div class="col-md-8">
        {!! Form::text('chart_code', null, ['class' => 'form-control']) !!}
  
        {{-- <span class="help-block">This is a help text</span> --}}
    </div>
</div>

<!-- Nameth Field -->
<div class="form-group row">
    {!! Form::label('nameth', 'ชื่อบัญชี (ไทย)',['class'=>'col-md-4 col-form-label text-right']) !!}
    <div class="col-md-8">
        {!! Form::text('nameth', null, ['class' => 'form-control']) !!}
        {{-- <span class="help-block">This is a help text</span> --}}
    </div>
</div>

<!-- Nameen Field -->
<div class="form-group row">
    {!! Form::label('nameen', 'ชื่อบัญชี (อังกฤษ):',['class'=>'col-md-4 col-form-label text-right']) !!}
    <div class="col-md-8">
        {!! Form::text('nameen', null, ['class' => 'form-control']) !!}
        {{-- <span class="help-block">This is a help text</span> --}}
    </div>
</div>

<!-- Detail Field -->

<div class="form-group row">
    {!! Form::label('chart_detail', 'รายละเอียด',['class'=>'col-md-4 col-form-label text-right']) !!}
    <div class="col-md-8">
        {!! Form::textarea('chart_detail', null, ['class' => 'form-control','rows' => 3, 'cols' => 40]) !!}
        {{-- <input class="form-control" id="text-input" type="text" name="text-input" placeholder="Text"> --}}
        {{-- <span class="help-block">This is a help text</span> --}}
    </div>
</div>



<!-- Type Field -->
<div class="form-group row">
    {!! Form::label('accnt_type', 'เคดิต เดบิต',['class'=>'col-md-4 col-form-label text-right']) !!}
    <div class="col-md-8">
        {!! Form::select('accnt_type',['Debit'=>'เดรดิต','Credit'=>'เคบิต','all'=>'เคบิต/เดรดิต'], null, ['class' => 'form-control']) !!}
        {{-- <span class="help-block">This is a help text</span> --}}
    </div>
</div>



<!-- Charttype Field -->
<div class="form-group row">
    {!! Form::label('chartchart_type', 'ลงบัญชี',['class'=>'col-md-4 col-form-label text-right']) !!}
    <div class="col-md-8">
        {!! Form::select('chartchart_type',['ได้'=>'ได้','ไม่ได้'=>'ไม่ได้'], null, ['class' => 'form-control']) !!}
        {{-- <span class="help-block">This is a help text</span> --}}
    </div>
</div>



{{-- <div class="form-group row">
    {!! Form::label('chartcate_type', 'ประเภท',['class'=>'col-md-4 col-form-label text-right']) !!}
    <div class="col-md-8">
        {!! Form::select('chartcate_type',[], null, ['class' => 'form-control']) !!}

    </div>
</div> --}}



<!-- Format Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('Format', 'Format:') !!}
    {!! Form::text('Format', null, ['class' => 'form-control']) !!}
</div> --}}

{{-- <!-- Datetimeadd Field -->
<div class="form-group col-sm-6">
    {!! Form::label('DateTimeAdd', 'Datetimeadd:') !!}
    {!! Form::text('DateTimeAdd', null, ['class' => 'form-control','id'=>'DateTimeAdd']) !!}
</div>

@section('scripts')
   <script type="text/javascript">
           $('#DateTimeAdd').datetimepicker({
               format: 'YYYY-MM-DD HH:mm:ss',
               useCurrent: true,
               icons: {
                   up: "icon-arrow-up-circle icons font-2xl",
                   down: "icon-arrow-down-circle icons font-2xl"
               },
               sideBySide: true
           })
       </script>
@endsection

<!-- Useradd Field -->
<div class="form-group col-sm-6">
    {!! Form::label('UserAdd', 'Useradd:') !!}
    {!! Form::number('UserAdd', null, ['class' => 'form-control']) !!}
</div>

<!-- Datetimeupdate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('DateTimeUpdate', 'Datetimeupdate:') !!}
    {!! Form::text('DateTimeUpdate', null, ['class' => 'form-control','id'=>'DateTimeUpdate']) !!}
</div>

@section('scripts')
   <script type="text/javascript">
           $('#DateTimeUpdate').datetimepicker({
               format: 'YYYY-MM-DD HH:mm:ss',
               useCurrent: true,
               icons: {
                   up: "icon-arrow-up-circle icons font-2xl",
                   down: "icon-arrow-down-circle icons font-2xl"
               },
               sideBySide: true
           })
       </script>
@endsection

<!-- Userupdate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('UserUpdate', 'Userupdate:') !!}
    {!! Form::number('UserUpdate', null, ['class' => 'form-control']) !!}
</div>

<!-- Allow Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Allow', 'Allow:') !!}
    {!! Form::text('Allow', null, ['class' => 'form-control']) !!}
</div> --}}

<!-- Submit Field -->
<div class="form-group col-sm-12 text-center">
    {{ Form::button('<span> <img src="'. url('/img/icon/save.png').' " alt=""></span> บันทึกข้อมูล', ['type' => 'button', 'class' => 'btn  btn-submit'] )  }}
    <a href="{!! route('accountCharts.index') !!}" class="btn btn-cancel"><span> <img src="{{ url('/img/icon/cancel.png') }}" alt=""></span> ยกเลิก</a>
</div>
