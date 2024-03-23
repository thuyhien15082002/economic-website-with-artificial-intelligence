@foreach($cmt as $comment)
<div class="comment-list">
    <div class="single-comment justify-content-between d-flex">
        <div class="user justify-content-between d-flex">
            <div class="thumb">
                <img src="{{url('public/site')}}/img/comment/comment_1.png" alt="">
            </div>
            <div class="desc">
                <h5>{{$comment->users->name}}</h5>
                <p class="comment">{{$comment->content}}</p>
                <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                        <p class="date">{{date('d-m-Y', strtotime($comment->created_at))}}</p>
                    </div>
                    <div class="reply-btn">
                        <a href="#" class="btn-reply text-uppercase">reply</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
</div>
@endforeach