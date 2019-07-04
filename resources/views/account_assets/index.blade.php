@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{!! route('accountAssets.index') !!}">บัญชีสินทรัพย์</a>
        </li>
        {{--
        <li class="breadcrumb-item active">หน่วยงาน/คณะ (ผู้ว่าจ้าง)</li>
        --}}
    </ol>

    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            {{-- search --}}
                @include('account_assets.search')
            {{-- endsearch --}}
             <div class="row">
                 <div class="col-lg-12">
                        @include('account_assets.table')
                        <div class="pull-right mr-3">
                               
                        </div>
                  </div>
             </div>
         </div>
    </div>

    <!-- form account_assets -->
    <div class="modal fade" id="intForm">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="text-center">
                        <h4>บัญชีสินทรัพย์</h4>
                    </div><br>
                    <form id="account_assets_form">
                    
                        @include('account_assets.fields')

                    </form>
                </div>
        
            </div>
        </div>
    </div>
@endsection

