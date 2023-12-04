@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <br>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">POST DELETE</div>
            </div>

            <hr>
            <div class="card">
                <div class="card-header">
                    <div>
                        title:{{ $title = $postData->useIdForData(session()->get('postId'))[0]['title'] }}
                    </div>
                </div>
                <div class="card-body">
                    <div>
                        sentence:{{ $sentence = $postData->useIdForData(session()->get('postId'))[0]['sentence'] }}
                    </div>
                </div>
                <br>
                <div class="btn-toolbar">
                    <div class="btn-group mx-auto">
                        <form method="POST" action="{{ route('postDelete') }}">
                            @csrf
                            <input type="hidden" name="postId" value="{{ session()->get('postId') }}">
                            <input type="submit" class="btn btn-success" name="delete" value="delete">
                        </form>
                    </div>
                </div>
                <br>
            </div>

            <hr>
            <div class="card">
                <div class="card-body">
                    <button type="button" onclick="location.href='{{ route('welcome') }}' ">TOP</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
