@extends('layouts.admin')
@section('title','Account List')
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
<table class="table table-hover ">
    <thead>
        <tr>
            <th>Number</th>
            <th>Name</th>
            <th>Email</th>
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
            <td>{{$model->created_at}}</td>
            <td class="text-right">
                <a href="{{route('user.destroy', $model->id)}}" class="btn btn-sm btn-danger btndelete">
                    <i class="fas fa-trash"></i>
                </a>
            </td>
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