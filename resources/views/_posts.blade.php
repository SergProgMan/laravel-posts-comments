@foreach ($posts as $post)
<section class="m-5">
    <a href=""></a>
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->getShortContent() }}</p>
    <p class="text-info text-right">{{ $post->user->name }}</p>    
    <div class="text-center">
        <a href="{{ route('post.show', ['post'  => $post]) }}" class="btn btn-secondary btn-sm">Show post</a>
    </div>
</section>
@endforeach