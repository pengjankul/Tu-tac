{!! Form::open(['route' => ['institutions.destroy', $instid], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('institutions.show', $instid) }}" class='btn'>
        <span> <img src="{{ url('/img/icon/view.png') }}" alt=""></span>
    </a>
    <a href="#" onclick="intEdit({{$instid}})" class='btn'>
        <span> <img src="{{ url('/img/icon/edit.png') }}" alt=""></span>
    </a>
    {!! Form::button('<span> <img src="'.url('/img/icon/delete.png').'" alt=""></span>', [
        'type' => 'submit',
        'class' => 'btn',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
</div>
{!! Form::close() !!}
