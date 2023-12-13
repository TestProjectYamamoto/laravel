@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <br>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">POST LIST</div>
            </div>

            <div class="card"> <!-- 検索エリア -->
                <div class="card-body">
                    <form method="POST" action="{{ route('searchPost') }}">
                        @csrf
                        Serch Post /
                        <br>
                        title:
                        <input type="text" class="form-control" name="searchTitle">
                        <br>
                        sentence:
                        <input type="text" class="form-control" name="searchSentence">
                        <input type="submit" class="btn btn-success" value="search">
                    </form>
                </div>
            </div>
            <br>

            <table class="table">
                @foreach($postsData as $post)
                <br>
                <tr>
                    <a class="card btn" onclick="location.href='{{ route('postditail', ['id' => $post->id]) }}' ">
                        <div class="card-header">
                            <span>
                                title:{{ $post->title }}
                            </span>
                            /
                            <span>
                                user:{{ $name = $userData->useUidForData($post->user_uid)[0]["name"] }}
                            </span>
                        </div>

                        <div class="card-body">
                            <span>{{$post->sentence}}</span>
                        </div>
                    </a>
                </tr>
              
                @endforeach
            </table>
            <br>

            <p>{!! $postsData->render() !!}</p>

            <div class="card">
                <div class="card-body">
                    <button type="button" onclick="location.href='{{ route('welcome') }}'" class="inline-flex items-center dark:bg-gray-200 border border-transparent rounded-md font-semibold">TOP</button>
                    <button type="button" onclick="location.href='{{ route('home') }}'" class="inline-flex items-center dark:bg-gray-200 border border-transparent rounded-md font-semibold">HOME</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
