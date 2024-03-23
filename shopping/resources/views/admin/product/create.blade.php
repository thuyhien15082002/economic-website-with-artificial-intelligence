@extends('layouts.admin')
@section('title','Add Product')
@section('main')

<form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-9">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Input Name">
                @error('name')
                <small class="form-text text-muted">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <textarea class="form-control" id="content" name="description"></textarea>
            </div>
            <div class="form-group">
                <label for="">Image</label>
                <input type="file" name="file_upload" class="form-control" placeholder="Input Image">
                @error('file_upload')
                <small class="form-text text-muted">{{$message}}</small>
                @enderror
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="">Category</label>
                <select class="form-control" name="category_id">
                    <option>--SELECT ONE--</option>
                    @foreach($cats as $cat)
                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                    @endforeach
                </select>
                @error('category_id')
                <small class="form-text text-muted">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Price</label>
                <input type="text" name="price" class="form-control" placeholder="Input Price">
                @error('price')
                <small class="form-text text-muted">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Sale Price</label>
                <input type="text" name="sale_price" class="form-control" placeholder="Input Sale Price">
                @error('sale_price')
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
                    <input type="number" name="prioty" class="form-control" placeholder="Input Prioty">
                    @error('prioty')
                    <small id="helpId" class="text-muted">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Save data</button>
        </div>
    </div>
</form>
@stop()

@section('css')
<link rel="stylesheet" href="{{url('public/ad')}}/plugins/summernote/summernote-bs4.min.css">
@stop()

@section('js')
<script src="{{url('public/ad')}}/plugins/summernote/summernote-bs4.min.js"></script>
<script>
  $(function () {
    $('#content').summernote({
        height:250,
        placeholder:"Input Description"
    })
  })
</script>
@stop()