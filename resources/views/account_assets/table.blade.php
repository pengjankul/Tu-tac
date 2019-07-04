@section('css')
    @include('layouts.datatables_css')
@endsection

{!! $dataTable->table(['width' => '100%', 'class' => 'table table-striped table-bordered table-custom']) !!}

@section('scripts')
    <!-- toastr notifications -->
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    {{-- modules reacher --}}
    <script src="{{ url('js/modules/account_assets/index.js') }}"></script>
    @include('layouts.datatables_js')
    {!! $dataTable->scripts() !!}
@endsection