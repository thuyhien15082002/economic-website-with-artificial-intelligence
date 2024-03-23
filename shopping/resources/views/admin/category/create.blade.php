@extends('layouts.admin')
@section('title','Add Category')
@section('main')

<form action="{{route('category.store')}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="">Name</label>
        <input type="text" class="form-control" name="name" placeholder="">
        @error('name')
        <small class="form-text text-muted">{{$message}}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Status</label>
        <div class="radio">
            <label>
                <input type="radio" name="status" value="1" checked>
                Public
            </label>
            <label>
                <input type="radio" name="status" value="0">
                Private
            </label>
        </div>
        <div class="form-group">
            <label for="">Prioty</label>
            <input type="number" name="prioty" class="form-control" placeholder="">
            @error('prioty')
            <small id="helpId" class="text-muted">{{$message}}</small>
            @enderror
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Save data</button>
</form>
@stop()