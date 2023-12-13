@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <br>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">COMMENT DELETE</div>
            </div>

            <hr>
            <div class="card">
                <div class="card-header">
                    <div>
                        post/ <!-- コメントIDからポストデータ取得 -->
                        <br>
                        title:{{ $postTitle = $commentData->useIdForPostData(session()->get('commentId'))[0]['title'] }}
                        <br>
                        sentence:{{ $postSentence = $commentData->useIdForPostData(session()->get('commentId'))[0]['sentence'] }}
                    </div>
                </div>
                <div class="card-body">
                    <div>
                        comment: <!-- コメントIDからコメント取得 -->
                        {{ $comment = $commentData->useIdForData(session()->get('commentId'))[0]['sentence'] }}
                    </div>
                </div>
                <br>
            </div>
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('commentDelete') }}">
                        @csrf
                        <input type="hidden" name="commentId" value="{{ session()->get('commentId') }}">
                        <p>Really?</p>
                        <input type="submit" class="btn btn-danger" value="delete">
                    </form>
                </div>
                <br>
            </div>

            <hr>
            <div class="card">
                <div class="card-body">
                    <button type="button" onclick="location.href='{{ route('welcome') }}'" class="inline-flex items-center dark:bg-gray-200 border border-transparent rounded-md font-semibold">TOP</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
