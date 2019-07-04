
{{-- 
<li class="nav-item {{ Request::is('accountCharts*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! route('accountCharts.index') !!}"><i class="nav-icon icon-cursor"></i><span>ผังบัญชี</span></a>
</li>

<li class="nav-item {{ Request::is('researchers*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! route('researchers.index') !!}"><i class="nav-icon icon-cursor"></i><span>ข้อมูลนักวิจัย</span></a>
</li>
<li class="nav-item {{ Request::is('institutions*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! route('institutions.index') !!}"><i class="nav-icon icon-cursor"></i><span>หน่วยงาน/คณะ</span></a>
</li>
<li class="nav-item {{ Request::is('accountAssets*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! route('accountAssets.index') !!}"><i class="nav-icon icon-cursor"></i><span>บัญชีสินทรัพย์</span></a>
</li>
--}}

@php $i = 0; 
$menu = session()->get('menu');
@endphp
@foreach ($menu as $key =>$value)
       {{-- 
        <li class="nav-item ">
        <a class="nav-link" href="{{ $value['level1']['menu_path'] }}"><i class="nav-icon icon-cursor"></i><span>{{ $value['level1']['menu_name'] }}</span></a>
        </li>
        --}}
        @php 
        $i++;
        $id_drop = 'navbarDropdown_'.$i;
        @endphp
        <li class="nav-item dropdown">
           <a class="nav-link dropdown-toggle" href="#" id="{{$id_drop}}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ $value['level1']['menu_name'] }}
            </a>

            @if(count($value['level2']))
            <div class="dropdown-menu" aria-labelledby="{{$id_drop}}">
                @foreach ($value['level2'] as $key2=>$val2)
             
             @if($val2['submenu_path'] != 'javascript:void(0);')
                <a class="dropdown-item" href="{{ route(''.$val2['submenu_path']) }}" >{{ $val2['submenu_name'] }}</a>
             @else
                <a class="dropdown-item" href="{{ $val2['submenu_path'] }}" onclick="alert('Under Consturction')" >{{ $val2['submenu_name'] }}</a>
             @endif
           
                @endforeach
            </div>
            @endif
          </li>

@endforeach
