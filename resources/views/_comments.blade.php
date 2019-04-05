<div class="container">
    @foreach($comments as $comment)
        <p>{{ $comment->content }}</p>
        <p class="text-info text-right ">{{ $comment->user->name }}</p>
        <hr>
    @endforeach
    {{ $comments->links() }}

    @guest
        <p class="text-center text-muted">You need to login if you want to comment post</p>
    @else
        <form method="POST" action="{{ route('comments.store', ['post' => $post]) }}">
            @csrf
            <div class="form-group">
                <label for="content">Comment</label>
                <textarea class="form-control"
                          id="content"
                          name="content"
                          rows="10"
                          required>{{ old('content') }}</textarea>
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-primary mb-2">Comment</button>
            </div>
        </form>
    @endguest


</div>
