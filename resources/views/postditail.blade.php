@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <br>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">POST DITAIL</div>
            </div>

            <hr>
            <div class="card">
                @foreach($postData as $post)
                <div class="card-header">
                    <div>title:{{  $post->title  }}</div>
                    <div>name:{{  $name = $userData->useUidForData($post->user_uid)[0]["name"]  }}</div>
                </div>
                <div class="card-body">
                    <div>{{  $post->sentence  }}</div>
                </div>
                @endforeach

                @if ($post->user_uid === Auth::user()->uid)
                <div class="btn-toolbar">
                    <div class="btn-group mx-auto">
                        <form method="POST" action="{{ route('postUpdateView') }}">
                            @csrf
                            <input type="hidden" name="postId" value="{{ $post->id }}">
                            <input type="submit" class="btn btn-success" name="update" value="編集">
                        </form>
                        <form method="POST" action="{{ route('postDeleteView') }}">
                            @csrf
                            <input type="hidden" name="postId" value="{{ $post->id }}">
                            <input type="submit" class="btn btn-danger" name="delete" value="削除">
                        </form>
                    </div>
                </div>
                @endif
            </div>

            <br>
            <!-- コメント入力欄 -->
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('newcomment') }}">
                        @csrf
                        <div class="d-flex">
                            <div class="row mb-3">
                                <label for="comment" class="col-md-4 col-form-label text-md-end">{{ __('comment') }}</label>

                                <div class="col-md-6">
                                    <input id="comment" class="form-control @error('comment') is-invalid @enderror" name="comment">

                                    @error('comment')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <input type="hidden" name="postId" value="{{ $post->id }}">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('send') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <br>


            <table class="table" style="width: 1000px; max-width: 0 auto;"> <!-- コメント一覧 -->
                @foreach($commentsData as $comment)
                <div class="card">
                    <tr>
                        <div class="card-header">
                            user:{{$name = $userData->useUidForData($comment->user_uid)[0]["name"]}}
                        </div>
                        <div class="card-body">
                            {{$comment->sentence}}
                        </div>

                        @if (Auth::user()->uid === $comment->user_uid) <!-- コメント編集ボタン表示・非表示 -->
                        <div class="btn-toolbar">
                            <div class="btn-group mx-auto">
                                <form method="POST" action="{{ route('commentUpdateView') }}">
                                    @csrf
                                    <input type="hidden" name="commentId" value="{{ $comment->id }}">
                                    <input type="submit" class="btn btn-success" name="updateComment" value="update">
                                </form>
                                <form method="POST" action="{{ route('commentDeleteView') }}">
                                    @csrf
                                    <input type="hidden" name="commentId" value="{{ $comment->id }}">
                                    <input type="submit" class="btn btn-danger" name="deleteComment" value="delete">
                                </form>
                            </div>
                        </div>
                        @endif
                    </tr>
                </div>
                <br>
                @endforeach
            </table>

            <p>{!! $commentsData->render() !!}</p>

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
