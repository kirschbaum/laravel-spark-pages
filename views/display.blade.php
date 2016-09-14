@extends('spark::layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-8">
            <h1>{{$page->title}}</h1>
            {!! $page->body !!}
        </div>

        @include('laravel-spark-pages::sidebar')
    </div>
@endsection
