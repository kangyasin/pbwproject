<div class="form-group">
    {!! Form::label('category','Category:') !!}
    <select name="category" id="category" class="form-control input-sm">
        @foreach($s as $k)
            <option value="{{ $k['id'] }}">{{ $k['name'] }}</option>
        @endforeach
        {{--<option value="Dance And Music">Dance And Music</option>--}}
    </select>
</div>

<div class="form-group">
    {!! Form::label('subcategory','Subcategory:') !!}
    <select name="subcategory" id="subcategory" class="form-control input-sm">
        <option value=""></option>
    </select>
</div>
