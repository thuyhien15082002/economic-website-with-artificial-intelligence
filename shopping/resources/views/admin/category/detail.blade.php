@extends('layouts.admin')
@section('title','Category Detail')
@section('main')
<form action="" class="form-inline">
    <div class="form-group">
        <input type="text" name="key" class="form-control" placeholder="Search by name">
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-search"></i>
        </button>
    </div>
</form>
<hr>
<h2>{{$category->name}}</h2>
<table class="table table-hover ">
    <thead>
        <tr>
            <th>Number</th>
            <th>Image</th>
            <th>Name</th>
            <th>Price / Sale Price</th>
            <th>Status</th>
            <th>Created date</th>
        </tr>
    </thead>
    <tbody>
        <?php $stt=1; ?>
        @foreach($data as $model)
        <tr>
            <td>{{$stt++}}</td>
            <td><img src="{{url('public/uploads')}}/{{$model->image}}" width="100px"></td>
            <td>{{$model->name}}</td>
            <td>{{number_format($model->price)}}/{{number_format($model->sale_price)}}</td>
            <td>
                @if($model->status == 0)
                <span class="badge badge-danger">Private</span>
                @else
                <span class="badge badge-success">Publish</span>
                @endif
            </td>
            <td>{{$model->created_at}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<form action="" method="POST" id="form-delete">
    @csrf @method('DELETE')
</form>
<hr>
<div>
    {{$data->appends(request()->all())->links()}}
</div>
@stop()

@section('js')
<script>
$('.btndelete').click(function(ev) {
    ev.preventDefault();
    var _href = $(this).attr('href');
    $('form#form-delete').attr('action', _href);
    if (confirm('Bạn có chắc muốn xóa không?')) {
        $('form#form-delete').submit();
    }
})
</script>
@stop()