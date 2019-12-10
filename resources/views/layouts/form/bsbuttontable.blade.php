<div style="display: table-cell;">
    {!! Form::open(array('url' => $url, 'method' => $method)) !!}
        <button style="margin-right: 5px; margin-bottom: 5px;"
        @foreach (array_keys($attribute) as $a)
            {{ $a }}="{{ $attribute[$a] }}" 
        @endforeach
        type="submit"><span style="background: inherit;">{!! $title !!}</span></button>
    {!! Form::close() !!}
</div>