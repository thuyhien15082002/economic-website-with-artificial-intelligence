@extends('layouts.admin')
@section('title','Edit Category')
@section('main')

<form action="{{route('category.update',$category->id)}}" method="POST">
    @csrf @method('PUT')
    <input type="hidden" name="id" value="{{$category->id}}">
    <div class="form-group">
        <label for="">Name</label>
        <input type="text" class="form-control" name="name" value="{{$category->name}}" placeholder="Category Name">
        @error('name')
        <small class="form-text text-muted">{{$message}}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Status</label>
        <div class="radio">
            <label>
                <input type="radio" name="status" value="1" <?php echo $category->status == 1 ? 'checked' : '' ?>>
                Public
            </label>
            <label>
                <input type="radio" name="status" value="0" <?php echo $category->status == 0 ? 'checked' : '' ?>>
                Private
            </label>
        </div>
        <div class="form-group">
            <label for="">Prioty</label>
            <input type="number" value="{{$category->prioty}}" name="prioty" class="form-control"
                placeholder="0,1,2,...">
            @error('prioty')
            <small id="helpId" class="text-muted">{{$message}}</small>
            @enderror
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Save data</button>
</form>
@stop()