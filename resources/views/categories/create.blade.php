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

        <h1 style='margin-top: 30px'>Add new category</h1>

        <form method='POST' action='{{ action('CategoryController@store') }}' style='margin-top: 30px'
              enctype='multipart/form-data'>
            @csrf

            <div class='form-group'>
                <input type='text' class='form-control' id='formGroupExampleInput' name='field'
                       placeholder='Field'>
            </div>

            <button type='submit' class='btn btn-primary btn-sm' name='store'>Save</button>
            <a href='/categories' class='btn btn-primary btn-sm'>Back</a>
        </form>
    </div>
@endsection

