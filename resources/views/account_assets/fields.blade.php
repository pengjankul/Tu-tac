
{{-- hidden filed --}}
{!! Form::hidden('type_data',null) !!}
{!! Form::hidden('id',null) !!}

<!-- Save Status Field -->
<div class="form-group row">
    {!! Form::label('save_status', 'ประเภท',['class'=>'col-md-3 col-form-label text-right ']) !!}
    <div class="col-md-6">
        {!! Form::select('save_status',['in'=>'หน่วยงานภายใน','out'=> 'หน่วยงานภายนอก'],null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Asset Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('asset_type', 'Asset Type:') !!}
    {!! Form::text('asset_type', null, ['class' => 'form-control']) !!}
</div>

<!-- Asset Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('asset_code', 'Asset Code:') !!}
    {!! Form::text('asset_code', null, ['class' => 'form-control']) !!}
</div>

<!-- Nameth Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nameth', 'Nameth:') !!}
    {!! Form::text('nameth', null, ['class' => 'form-control']) !!}
</div>

<!-- Nameen Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nameen', 'Nameen:') !!}
    {!! Form::text('nameen', null, ['class' => 'form-control']) !!}
</div>

<!-- Asset Detail Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('asset_detail', 'Asset Detail:') !!}
    {!! Form::textarea('asset_detail', null, ['class' => 'form-control']) !!}
</div>

<!-- Asset Unit Field -->
<div class="form-group col-sm-6">
    {!! Form::label('asset_unit', 'Asset Unit:') !!}
    {!! Form::text('asset_unit', null, ['class' => 'form-control']) !!}
</div>

<!-- Asset Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('asset_price', 'Asset Price:') !!}
    {!! Form::number('asset_price', null, ['class' => 'form-control']) !!}
</div>

<!-- Buydate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('buydate', 'Buydate:') !!}
    {!! Form::text('buydate', null, ['class' => 'form-control','id'=>'buydate']) !!}
</div>

@section('scripts')
   <script type="text/javascript">
           $('#buydate').datetimepicker({
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

<!-- Base Depreciation Field -->
<div class="form-group col-sm-6">
    {!! Form::label('base_depreciation', 'Base Depreciation:') !!}
    {!! Form::text('base_depreciation', null, ['class' => 'form-control']) !!}
</div>

<!-- Depreciation Method Field -->
<div class="form-group col-sm-6">
    {!! Form::label('depreciation_method', 'Depreciation Method:') !!}
    {!! Form::text('depreciation_method', null, ['class' => 'form-control']) !!}
</div>

<!-- Brate Dprct Per Field -->
<div class="form-group col-sm-6">
    {!! Form::label('brate_dprct_per', 'Brate Dprct Per:') !!}
    {!! Form::number('brate_dprct_per', null, ['class' => 'form-control']) !!}
</div>

<!-- Dprct Charge Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dprct_charge', 'Dprct Charge:') !!}
    {!! Form::number('dprct_charge', null, ['class' => 'form-control']) !!}
</div>

<!-- Drate Per Field -->
<div class="form-group col-sm-6">
    {!! Form::label('drate_per', 'Drate Per:') !!}
    {!! Form::number('drate_per', null, ['class' => 'form-control']) !!}
</div>

<!-- Cprice Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cprice', 'Cprice:') !!}
    {!! Form::number('cprice', null, ['class' => 'form-control']) !!}
</div>

<!-- Parent Asset Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('parent_asset_code', 'Parent Asset Code:') !!}
    {!! Form::text('parent_asset_code', null, ['class' => 'form-control']) !!}
</div>

<!-- Start Charge Field -->
<div class="form-group col-sm-6">
    {!! Form::label('start_charge', 'Start Charge:') !!}
    {!! Form::text('start_charge', null, ['class' => 'form-control']) !!}
</div>

<!-- Date Dprct Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_dprct', 'Date Dprct:') !!}
    {!! Form::text('date_dprct', null, ['class' => 'form-control','id'=>'date_dprct']) !!}
</div>

@section('scripts')
   <script type="text/javascript">
           $('#date_dprct').datetimepicker({
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

<!-- Lifetime Year Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lifetime_year', 'Lifetime Year:') !!}
    {!! Form::number('lifetime_year', null, ['class' => 'form-control']) !!}
</div>

<!-- Dstatus Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dstatus', 'Dstatus:') !!}
    {!! Form::text('dstatus', null, ['class' => 'form-control']) !!}
</div>

<!-- Asset Acccnt Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('asset_acccnt_code', 'Asset Acccnt Code:') !!}
    {!! Form::text('asset_acccnt_code', null, ['class' => 'form-control']) !!}
</div>

<!-- Dprct Acccnt Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dprct_acccnt_code', 'Dprct Acccnt Code:') !!}
    {!! Form::text('dprct_acccnt_code', null, ['class' => 'form-control']) !!}
</div>

<!-- Acccnt Acode Field -->
<div class="form-group col-sm-6">
    {!! Form::label('acccnt_acode', 'Acccnt Acode:') !!}
    {!! Form::text('acccnt_acode', null, ['class' => 'form-control']) !!}
</div>

<!-- Serialno Field -->
<div class="form-group col-sm-6">
    {!! Form::label('serialno', 'Serialno:') !!}
    {!! Form::text('serialno', null, ['class' => 'form-control']) !!}
</div>

<!-- Assets Note Field -->
<div class="form-group col-sm-6">
    {!! Form::label('assets_note', 'Assets Note:') !!}
    {!! Form::text('assets_note', null, ['class' => 'form-control']) !!}
</div>

<!-- Store Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('store_code', 'Store Code:') !!}
    {!! Form::text('store_code', null, ['class' => 'form-control']) !!}
</div>

<!-- Store Note Field -->
<div class="form-group col-sm-6">
    {!! Form::label('store_note', 'Store Note:') !!}
    {!! Form::text('store_note', null, ['class' => 'form-control']) !!}
</div>

<!-- Datetime Add Field -->
<div class="form-group col-sm-6">
    {!! Form::label('datetime_add', 'Datetime Add:') !!}
    {!! Form::text('datetime_add', null, ['class' => 'form-control','id'=>'datetime_add']) !!}
</div>

@section('scripts')
   <script type="text/javascript">
           $('#datetime_add').datetimepicker({
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

<!-- User Add Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_add', 'User Add:') !!}
    {!! Form::number('user_add', null, ['class' => 'form-control']) !!}
</div>

<!-- Datetime Update Field -->
<div class="form-group col-sm-6">
    {!! Form::label('datetime_update', 'Datetime Update:') !!}
    {!! Form::text('datetime_update', null, ['class' => 'form-control','id'=>'datetime_update']) !!}
</div>

@section('scripts')
   <script type="text/javascript">
           $('#datetime_update').datetimepicker({
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

<!-- User Update Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_update', 'User Update:') !!}
    {!! Form::number('user_update', null, ['class' => 'form-control']) !!}
</div>

<!-- Tsdatetime Update Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tsdatetime_update', 'Tsdatetime Update:') !!}
    {!! Form::text('tsdatetime_update', null, ['class' => 'form-control','id'=>'tsdatetime_update']) !!}
</div>

@section('scripts')
   <script type="text/javascript">
           $('#tsdatetime_update').datetimepicker({
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

<!-- Tsuser Update Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tsuser_update', 'Tsuser Update:') !!}
    {!! Form::number('tsuser_update', null, ['class' => 'form-control']) !!}
</div>

<!-- Fag Allow Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fag_allow', 'Fag Allow:') !!}
    {!! Form::text('fag_allow', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('accountAssets.index') !!}" class="btn btn-default">Cancel</a>
</div>
