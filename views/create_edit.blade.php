@extends('spark::layouts.app')

@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.css" rel="stylesheet">

    <div class="container">
        <form id="page_form" action="{{ !isset($page) ? '/pages' : '/pages/' . $page->slug }}" method="POST">
            {{ csrf_field() }}
            @if(isset($page))
                <input type="hidden" name="_method" value="PUT">
            @endif

            <div class="form-group">
                <label for="slug">URL Alias</label>
                <input type="text" class="form-control" id="email" name="slug" value="{{ old('slug', (isset($page) ? $page->slug : '')) }}">
            </div>
            <div class="form-group">
                <label for="title">Page Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', (isset($page) ? $page->title : '')) }}">
            </div>
            <textarea name="body" id="summernote">{{ old('body', (isset($page) ? $page->body : '')) }}</textarea>
            <div class="checkbox">
                <label><input type="checkbox" name="published" {{ old('published', (isset($page) && $page->published ? 'checked' : '')) }}> Published?</label>
            </div>
            @if(isset($page))
                @include('vendor.laravel-spark-pages.delete-button')
            @endif
            <button id="submit_button" type="submit" class="btn btn-default">{{ (isset($page) ? 'Update' : 'Submit') }}</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 200,
            });
        });
    </script>
@endsection
