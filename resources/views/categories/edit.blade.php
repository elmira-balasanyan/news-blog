@extends('admin.layouts.admin')

@section('content')
    <div class='col-md-10' style='margin-left: 8%; width: 70%'>
        @if ($errors->any())
            <div class='alert alert-danger'>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <br/>
        @endif

        <h1>Make some changes</h1>

        <form method='POST' action="{{ action('CategoryController@update', $category) }}">
            @csrf
            @method('PUT')

            <div class='form-group'>
                <label for='formGroupExampleInput'>Field</label>
                <input type='text' class='form-control' id='formGroupExampleInput' name='field'
                       value="{{$category->field}}">
            </div>

            <button type='submit' class='btn btn-primary btn-sm' name='update'>Update</button>
            <a href='/categories' class='btn btn-primary btn-sm'>Back</a>
        </form>
    </div>
@endsection
