@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <br>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">POST UPDATE</div>
            </div>

            <hr>
            <div class="card">
                <form method="POST" action="{{ route('postUpdate') }}">
                    @csrf
                    <div class="card-header">
                        <div>
                            title:
                            <input type="text" class="form-control @error('postTitle') is-invalid @enderror" name="title" value="{{ $title = $postData->useIdForData(session()->get('postId'))[0]['title'] }}">

                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-body">
                        <div>
                            sentence:
                            <input type="text" class="form-control @error('postSentence') is-invalid @enderror" name="sentence" value="{{ $sentence = $postData->useIdForData(session()->get('postId'))[0]['sentence'] }}">

                            @error('sentence')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <div class="btn-toolbar">
                        <div class="btn-group mx-auto">
                            <form method="POST">
                                <input type="hidden" name="postId" value="{{ session()->get('postId') }}">
                                <input type="submit" class="btn btn-success" name="update" value="update">
                            </form>
                        </div>
                    </div>
                </form>
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
