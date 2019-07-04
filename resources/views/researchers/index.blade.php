@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{!! route('researchers.index') !!}">ผังบัญชี</a>
        </li>
        <li class="breadcrumb-item active">นักวิจัย</li>
    </ol>

    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            {{-- search --}}
                @include('researchers.search')
            {{-- endsearch --}}
             <div class="row">
                 <div class="col-lg-12">
                        @include('researchers.table')
                        <div class="pull-right mr-3">
                               
                        </div>
                  </div>
             </div>
         </div>
    </div>

    <!-- form researchers -->
    <div class="modal fade" id="resForm">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="text-center">
                        <h4>ข้อมูลนักวิจัย</h4>
                    </div><br>
                    <form id="researcher_form">

                        @include('researchers.fields')

                    </form>
                </div>
        
            </div>
        </div>
    </div>

 
@endsection




