@extends('admin.layouts.admin')

@section('content')
    <div class='col-md-10' style='margin-left: 8%; width: 70%'>
        <div class='top' style='width: 100%; '>
            <h1 style='display: inline-block'>News</h1>
            <a href={{ asset('/news/create') }} class='btn-primary  btn-sm'
               style=' margin-top: 25px; float: right'>Create new news
            </a>
        </div>
        <nav class='navbar-collapse collapse' style='margin-top: 50px'>
            <table id='table_id' class='display'>
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th style='width: 270px'>Action</th>
                </tr>
                </thead>

                <tbody>
                @foreach($news as $one)
                    <tr>
                        <td>{{ $one->title }}</td>
                        <td>{{ $one->description }}</td>
                        <td>
                            <img src="{{ asset('images/' . $one->image) }}" style='width: 50px'>
                        </td>


                        <td>
                            <a href="/news/{{ $one->id }}" class='btn-success btn-sm'
                               style='float: right; margin-left: 5px'>Show</a>
                            <a href="/news/{{ $one->id }}/edit"
                               class='btn-primary btn-sm' style='float: right;margin-left: 5px'>Update</a>
                            <a href="/news/{{ $one->id }}/destroy"
                               class='btn-danger btn-sm' style='float: right'>Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </nav>
    </div>
@endsection
