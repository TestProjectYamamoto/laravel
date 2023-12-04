@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <br>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">仮登録が完了しました!</div>

                <div class="card-body">
                    <p>添付URLから本登録を完了させてください。</p>

                    @isset($content)
                    <a href='{{ $content }}'>{{ $content }}</a>
                    <br><hr>
                    @endisset
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
