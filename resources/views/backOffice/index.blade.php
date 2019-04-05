@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">Post's list</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                            <thead class="thead-light">
                              <tr>
                                <th scope="col">id</th>
                                <th scope="col">Title</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($posts as $post)
                                <tr>
                                  <td>{{ $post->id }}</td>
                                  <td>{{ $post->getShortTitle() }}</td>
                                  <td>
                                      <a 
                                        class="btn btn-default btn-warning"
                                        href="{{ route('back-office.posts.edit', [$post->id]) }}"> 
                                        Edit
                                      </a>
                                    </td>
                                  <td>                                  
                                      <form action="{{ route('back-office.posts.destroy',$post->id) }}" method="POST">
                                          @csrf
                                          @method('DELETE')
                                          <button type="submit" class="btn btn-default btn-danger">Delete</button>
                                      </form>
                                  </td>
                                </tr>
                              @endforeach
                            </tbody>
                          </table>
                          {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection