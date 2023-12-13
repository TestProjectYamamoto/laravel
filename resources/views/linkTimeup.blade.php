@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <br>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">リンクの有効期限が切れています。</div>

                <div class="card-body">
                    <button type="button" onclick="location.href='{{ route('welcome') }}'" class="inline-flex items-center dark:bg-gray-200 border border-transparent rounded-md font-semibold">TOP</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
