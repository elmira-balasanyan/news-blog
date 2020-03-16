@extends('admin.layouts.admin')

@section('content')
    <div class='col-md-10' style='margin-left: 8%; width: 70%'>
        <div class='top' style='width: 100%; '>
            <h1 style='display: inline-block'>Categories</h1>
            <a href='{{ asset('/categories/create') }}' class='btn-primary  btn-sm' style=' margin-top: 25px; float: right'>Create new category</a>
        </div>
        <nav class='navbar-collapse collapse' style='margin-top: 50px'>
            <table id='table_id' class='display'>
                <thead>
                <tr>
                    <th>Field</th>
                    <th>Craeted</th>
                    <th>Updated</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->field }}</td>
                        <td>{{ $category->created_at }}</td>
                        <td>{{ $category->updated_at }}</td>
                        <td>
                            <a href="/categories/{{ $category->id }}/edit"
                               class='btn-primary btn-sm' style='float: right; margin-left: 10px;'>Update</a>
                            <a href="/categories/{{ $category->id }}/destroy"
                               class='btn-danger btn-sm' style='float: right'>Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </nav>
    </div>
@endsection

