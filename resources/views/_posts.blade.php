@foreach ($posts as $post)
<section>
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>
    <p class="text-info text-right">{{ $post->user->name }}</p>
</section>
@endforeach