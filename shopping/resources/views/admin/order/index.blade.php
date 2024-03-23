@extends('layouts.admin')
@section('title','Order List')
@section('main')
<form action="" class="form-inline">
    <div class="form-group">
        <h5>From:</h5>
        <input type="date" name="fromdate" class="form-control" >
        <h5>&ensp;To:</h5>
        <input type="date" name="todate" class="form-control" >
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-search"></i>
        </button>
    </div>
</form>
<hr>
<table class="table table-hover ">
    <thead>
        <tr>
            <th>Number</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Created date</th>
            <th class="text-right">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php $stt=1; ?>
        @foreach($data as $model)
        <tr>
            <td>{{$stt++}}</td>
            <td>{{$model->name}}</td>
            <td>{{$model->email}}</td>
            <td>{{$model->phone}}</td>
            <td>{{$model->address}}</td>
            <td>{{$model->created_at}}</td>
            <td class="text-right">
                <a href="{{route('order.show', $model->id)}}" class="btn btn-sm btn-primary">
                    <i class="fas fa-info"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<hr>
<div>
    {{$data->appends(request()->all())->links()}}
</div>
@stop()
