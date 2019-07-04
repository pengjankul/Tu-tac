@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{!! route('institutions.index') !!}">ผังบัญชี</a>
        </li>
        <li class="breadcrumb-item active">หน่วยงาน/คณะ (ผู้ว่าจ้าง)</li>
    </ol>

    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            {{-- search --}}
                @include('institutions.search')
            {{-- endsearch --}}
             <div class="row">
                 <div class="col-lg-12">
                        @include('institutions.table')
                        <div class="pull-right mr-3">
                               
                        </div>
                  </div>
             </div>
         </div>
    </div>

    <!-- form institutions -->
    <div class="modal fade" id="intForm">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="text-center">
                        <h4>ข้อมูลหน่วยงาน/คณะ</h4>
                    </div><br>
                    <form id="institution_form">
                    
                        @include('institutions.fields')

                    </form>
                </div>
        
            </div>
        </div>
    </div>
@endsection

