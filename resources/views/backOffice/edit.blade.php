@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">Edit Post</div>

                    <div class="card-body">
                        @include('_success')
                        @include('_errors')

                        <form method="POST" action="{{ route('back-office.posts.update', [$post->id]) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text"
                                       class="form-control"
                                       id="title"
                                       name="title"
                                       placeholder="Title for new Post"
                                       value="{{ old('title', $post->title) }}"
                                       required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea class="form-control"
                                          id="content"
                                          name="content"
                                          rows="10"
                                          required>{{ old('content', $post->content) }}</textarea>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary mb-2">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection