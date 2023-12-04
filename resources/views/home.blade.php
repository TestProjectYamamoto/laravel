@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ Auth::user()->name }}さんのマイページ
                </div>

                <div class="card-body">
                    <button type="button" onclick="location.href='{{ route('newpost') }}'" class="inline-flex items-center dark:bg-gray-200 border border-transparent rounded-md font-semibold">NEW POST</button>
                    <button type="button" onclick="location.href='{{ route('postlist') }}'" class="inline-flex items-center dark:bg-gray-200 border border-transparent rounded-md font-semibold">POST LIST</button>
                </div>
            </div>
        </div>

        <br><br><br><br><br><br>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
