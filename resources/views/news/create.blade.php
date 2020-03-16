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

        <h1 style='margin-top: 30px'>Add news</h1>

        <form method='POST' action='{{ action('NewsController@store') }}' style='margin-top: 30px'
              enctype='multipart/form-data'>
            @csrf

            <div class='form-group'>
                <label for='select_preferences'>Title</label>
                <input type='text' class='form-control' id='formGroupExampleInput' name='title' placeholder='Title'
                       value='{{ old('title') }}'>
            </div>

            <div class='form-group'>
                <label for='select_preferences'>Description:</label>
                <input type='text' class='form-control' id='formGroupExampleInput' name='description' placeholder='Description'
                       value='{{ old('description') }}'>
            </div>

            <div class='form-group'>
                <label for='comment'>Text:</label>
                <textarea class='form-control' rows='5' id='comment' name='text'>{{ old('text') }}</textarea>
            </div>

            <div class='form-group'>
                <label for='select_preferences'>Categories</label>
                <select id='select_preferences' multiple='multiple' name='categories[]' style='width: 100%'>
                    @foreach($categories as $category)
                        <option value='{{ $category->id }}'>{{$category->field }}</option>
                    @endforeach
                </select>
            </div>

            <div class='custom-file'>
                <input type='file' name='image' class='custom-file-input' id='customFile'>
            </div>

            <button type='submit' class='btn btn-primary btn-sm' name='store' style=' margin-top: 15px'>Save</button>
            <a href='{{ asset('/news') }}' class='btn btn-primary btn-sm' style=' margin-top: 15px'>Back</a>
        </form>
    </div>
@endsection


@section('script')
    <script>
        $(document).ready(function () {
            $('#select_preferences').select2();
        });
    </script>
@endsection
