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

                    <h1 style='margin-top: 30px'>Update</h1>

                    <form method='POST' action="{{ action('NewsController@update', $singleNews) }}" style='margin-top: 30px' enctype='multipart/form-data'>

                        @csrf
                        @method('PUT')

                        <div class='form-group'>
                            <label for='select_preferences'>Title</label>
                            <input type='text' class='form-control' id='formGroupExampleInput' name='title'
                                   placeholder='Title' value={{ $singleNews->title }}>
                        </div>

                        <div class='form-group'>
                            <label for='select_preferences'>Description:</label>
                            <input type='text' class='form-control' id='formGroupExampleInput' name='description' placeholder='Description'
                                   value={{ $singleNews->description }}>
                        </div>

                        <div class='form-group'>
                            <label for='text'>Text:</label>
                            <textarea name='text' class='form-control' rows='5' id='comment'> {{ $singleNews->text }}</textarea>
                        </div>

                        <div class='form-group'>
                            <label for='select_preferences'>Categories</label>
                            <select id='select_preferences' multiple='multiple' name='categories[]'
                                    style='width: 100%'>
                                @foreach ($categories as $category)
                                    <option value='{{$category->id}}'
                                    @foreach($singleNews->categories as $selected_category)
                                        {{ in_array($category->id,[$selected_category->id]) ? 'selected' : ''}}
                                        @endforeach>
                                        {{ $category->field }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class='custom-file'>
                            <input type='file' name='image' class='custom-file-input' id='customFile'>
                        </div>

                        <button type='submit' class='btn btn-primary btn-sm' name='update'
                                style=' margin-top: 15px'>Update
                        </button>
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
