@extends('layouts.app')

@section('content')
<div class="container">
    {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div> --}}
    <div id="posts">
        @include('_posts');
    </div>
    <div class="text-center">
        <button type="button" class="btn btn-info" id="show_more" center>Show more</button>
    </div>
</div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
$(document).ready(function(){
    var page = 1;
    $(document).on('click', '#show_more', function(event){
     event.preventDefault(); 
     page ++;
     fetch_data(page);
    });
   
    function fetch_data(page){
        $.ajax({
        url:"{{ route('home') }}?page="+page,
        success:function(data){
            if(data.html == ''){
                $('#show_more').html('No more posts');
            } else {
                $('#posts').append(data.html);
            }
        }
        });
    }    
   });
   </script>
   