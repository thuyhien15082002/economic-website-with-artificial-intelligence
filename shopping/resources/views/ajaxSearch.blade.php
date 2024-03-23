@foreach($data as $pro)

<div class="media">
    <img class="mr-1" src="{{url('public/uploads')}}/{{$pro->image}}" width="70">
    <div class="media-body">
        <h6 class="mt-0"><a href="{{route('productdetail',['id'=>$pro->id])}}"
                style="color: #212529;">{{$pro->name}}</a></h6>
        <p style="font-size: 12px">{{Str::words(strip_tags($pro->description),7)}}</p>
    </div>
</div>

@endforeach