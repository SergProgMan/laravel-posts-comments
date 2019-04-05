@extends('layouts.app')

@section('content')
    <div class="container">
        @include('_success')
        @include('_errors')
        <section>
            <h1>{{ $post->title }}</h1>
            <p>{{ $post->content }}</p>
            <p class="text-info text-right ">{{ $post->user->name }}</p>
        </section>
        @include('_comments');
    </div>

@endsection