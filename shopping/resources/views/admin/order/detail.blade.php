@extends('layouts.admin')
@section('title','Order Detail')
@section('main')
<table class="table table-hover ">
    <thead>
        <tr>
            <th>Number</th>
            <th>Image</th>
            <th>Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <?php $stt=1; ?>
        @foreach($data as $model)
        <?php $total=$model->price*$model->quantity; ?>
        <tr>
            <td>{{$stt++}}</td>
            <td><img src="{{url('public/uploads')}}/{{$model->pro->image}}" width="100px"></td>
            <td>{{$model->pro->name}}</td>
            <td>{{$model->quantity}}</td>
            <td>{{number_format($model->price)}}</td>
            <td>{{number_format($total)}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<hr>
<div>
    {{$data->appends(request()->all())->links()}}
</div>
@stop()
