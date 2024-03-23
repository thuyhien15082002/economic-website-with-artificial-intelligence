@extends('layouts.admin')
@section('title','Add Product')
@section('main')

<form action="{{route('product.update',$product->id)}}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')
    <input type="hidden" name="id" value="{{$product->id}}">
    <div class="row">
        <div class="col-md-9">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Input Name" value="{{$product->name}}">
                @error('name')
                <small class="form-text text-muted">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <textarea class="form-control" id="content" name="description">{{$product->description}}</textarea>
                @error('description')
                <small class="form-text text-muted">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Image</label>
                <input type="file" name="file_upload" class="form-control">
                <img src="{{url('public/uploads')}}/{{$product->image}}" width="70px">
                @error('image')
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
                    <?php $selected = $cat->id == $product->category_id ? 'selected' : ''; ?>
                    <option {{$selected}} value="{{$cat->id}}">{{$cat->name}}</option>
                    @endforeach
                </select>
                @error('category')
                <small class="form-text text-muted">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Price</label>
                <input type="text" name="price" class="form-control" placeholder="Input Price"
                    value="{{$product->price}}">
                @error('price')
                <small class="form-text text-muted">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Sale Price</label>
                <input type="text" name="sale_price" class="form-control" placeholder="Input Sale Price"
                    value="{{$product->sale_price}}">
                @error('sale_price')
                <small class="form-text text-muted">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Status</label>
                <div class="radio">
                    <label>
                        <input type="radio" name="status" value="1" <?php echo $product->status == 1 ? 'checked' : '' ?>>
                        Public
                    </label>
                    <label>
                        <input type="radio" name="status" value="0" <?php echo $product->status == 0 ? 'checked' : '' ?>>
                        Private
                    </label>
                </div>
                <div class="form-group">
                    <label for="">Prioty</label>
                    <input type="number" name="prioty" class="form-control" placeholder="Input Prioty" value="{{$product->prioty}}">
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
$(function() {
    $('#content').summernote({
        height: 250,
        placeholder: "Input Description"
    })
})
</script>
@stop()