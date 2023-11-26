@extends('layout_rythm')

@section('content')
    <!-- Section -->
    <section class="page-section bg-dark">
        <div class="container relative">

            <div class="row">
                @foreach ($posts as $post)
                    <!-- Post Item -->
                    <div class="col-sm-6 col-md-4 mb-60 mb-xs-40">

                        <div class="post-prev-img">
                            <a href="{{route('blog.detail', $post->id)}}" tabindex="-1">
                                @if($post->image != null)
                                <img
                                src="{{$post->image}}" width="609" height="390" alt="image post"
                                class="wow scaleOutIn" data-wow-duration="1.2s" /></a>
                                @else
                                <img
                                src="{{asset('assets/rhytm')}}/images/blog/post-prev-1.jpg" alt="image post"
                                class="wow scaleOutIn" data-wow-duration="1.2s" /></a>
                                @endif
                                
                        </div>

                        <h3 class="post-prev-title">
                            <a href="{{route('blog.detail', $post->id)}}">{{$post->title}}</a>
                        </h3>

                        <div class="post-prev-info">
                            <a href="{{ asset('assets/rhytm') }}/">{{$post->user->name}}</a> • 10 December
                        </div>

                        <div class="post-prev-text">
                            {!! \Illuminate\Support\Str::words($post->content, 50) !!}
                        </div>

                        <div class="post-prev-more">
                            <a href="{{route('blog.detail', $post->id)}}" class="text-link"
                                tabindex="-1">Learn More</a>
                        </div>

                    </div>
                    <!-- End Post Item -->
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Section -->
@endsection
