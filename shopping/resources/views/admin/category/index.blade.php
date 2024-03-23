@extends('layouts.admin')
@section('title','Category List')
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
            <th>Id</th>
            <th>Name</th>
            <th>Total product</th>
            <th>Status</th>
            <th>Created date</th>
            <th class="text-right">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php $stt=1; ?>
        @foreach($data as $cat)
        <tr>
            <td>{{$stt++}}</td>
            <td>{{$cat->name}}</td>
            <td>{{$cat->products->count()}}</td>
            <td>
                @if($cat->status == 0)
                <span class="badge badge-danger">Private</span>
                @else
                <span class="badge badge-success">Publish</span>
                @endif
            </td>
            <td>{{$cat->created_at}}</td>
            <td class="text-right">
                <a href="{{route('category.show',$cat->id)}}" class="btn btn-sm btn-info">
                    <i class="fas fa-info"></i>
                </a>
                <a href="{{route('category.edit', $cat->id)}}" class="btn btn-sm btn-success">
                    <i class="fas fa-edit"></i>
                </a>
                <a href="{{route('category.destroy', $cat->id)}}" class="btn btn-sm btn-danger btndelete">
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