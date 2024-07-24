@extends('layoutadmin')
@section('title')
    Danh sách sản phẩm
@endsection
@section('content')
    <a href="{{route('category.create')}}" class="btn btn-success">Thêm mới</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">name</th>
            <th scope="col">status</th>
        </tr>
        </thead>
        <tbody>
        @foreach($listCate as $item)
        <tr>
            <th scope="row">{{$item->id}}</th>
            <td>{{$item->name}}</td>
            <td>{{$item->status}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {{$listCate->links()}}
@endsection
