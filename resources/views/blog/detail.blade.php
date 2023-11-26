@extends('layout_rythm')

@section('content')
    <section class="page-section bg-dark light-content">
        <div class="container relative">

            <div class="row">
                <!-- Content -->
                <div class="col-md-8 mb-sm-80">

                    <!-- Post -->
                    <div class="blog-item mb-80 mb-xs-40">

                        <!-- Text -->
                        <div class="blog-item-body">

                            <!-- Media Gallery -->
                            <div class="blog-media mt-40 mb-40 mb-xs-30">
                                <ul class="clearlist content-slider dark-content">
                                    <li>
                                        <img src="{{ $post->image }}" alt="image post" />
                                    </li>
                                </ul>
                            </div>

                            {!! $post->content !!}


                        </div>
                        <!-- End Text -->

                    </div>
                    <!-- End Post -->

                    <!-- Comments -->
                    <div class="mb-80 mb-xs-40">

                        <h4 class="blog-page-title">Comments <small
                                class="number">({{ count($post->postComments) }})</small></h4>

                        <ul class="media-list comment-list clearlist">
                            @foreach ($post->postComments as $postComment)
                                <!-- Comment Item -->
                                <li class="media comment-item">

                                    <div class="media-body">

                                        <div class="comment-item-data">
                                            <div class="comment-author">
                                                <a href="#">{{ $postComment->user->name }}</a>
                                            </div>
                                            {{ $postComment->created_at }} <span class="separator">&mdash;</span>
                                        </div>

                                        <p>
                                            {{ $postComment->comment }}
                                        </p>

                                        @foreach ($postComment->replyPostComment as $replyPostComment)
                                            <!-- Comment of second level -->
                                            <div class="media comment-item">

                                                <a class="float-start" href="#"><img class="media-object comment-avatar" src="images/user-avatar.png" alt=""></a>
                                                
                                                <div class="media-body">

                                                    <div class="comment-item-data">
                                                        <div class="comment-author">
                                                            <a href="#">{{ $replyPostComment->user->name }}</a>
                                                        </div>
                                                        {{ $postComment->created_at }} <span
                                                            class="separator">&mdash;</span>
                                                    </div>

                                                    <p>
                                                        {{ $replyPostComment->reply }}
                                                    </p>


                                                </div>

                                            </div>
                                            <!-- End Comment of second level -->
                                        @endforeach

                                        @if (Auth::id() != null)
                                            <!-- Add Comment -->
                                            <div class="mb-80 mb-xs-40">

                                                <!-- Form -->
                                                <form method="post" action="{{ route('blog.reply', $postComment->id) }}"
                                                    id="form" class="form">
                                                    @csrf
                                                    <div class="row mb-30 mb-md-20">
                                                        <div class="col-md-2"></div>
                                                        <div class="col-md-10 mb-md-20">
                                                            <label for="reply">Relpy</label>
                                                            <input type="text" name="reply" id="reply"
                                                                class="input-md round form-control"
                                                                placeholder="Enter your reply" maxlength="100" required
                                                                aria-required="true">
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2"></div>
                                                        <div class="col-md-10">
                                                            <!-- Send Button -->
                                                            <button type="submit"
                                                                class="btn btn-mod btn-w btn-medium btn-round">
                                                                Send reply
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <!-- End Form -->

                                            </div>
                                            <!-- End Add Comment -->
                                        @endauth

                                </div>

                            </li>
                            <!-- End Comment Item -->
                        @endforeach

                    </ul>

                </div>
                <!-- End Comments -->

                @if (Auth::id() != null)
                    <!-- Add Comment -->
                    <div class="mb-60 mb-xs-40 comment">

                        <!-- Form -->
                        <form method="post" action="{{ route('blog.comment', $post->id) }}" id="form"
                            class="form">
                            @csrf
                            <div class="row mb-30 mb-md-20">

                                <div class="col-md-12 mb-md-20">
                                    <label for="comment">Comment</label>
                                    <input type="text" name="comment" id="comment"
                                        class="input-md round form-control" placeholder="Enter your comment"
                                        maxlength="100" required aria-required="true">
                                </div>

                            </div>

                            <!-- Send Button -->
                            <button type="submit" class="btn btn-mod btn-w btn-medium btn-round">
                                Send comment
                            </button>

                        </form>
                        <!-- End Form -->

                    </div>
                    <!-- End Add Comment -->
                @endauth

        </div>
        <!-- End Content -->
    </div>
</div>
</section>
@endsection
