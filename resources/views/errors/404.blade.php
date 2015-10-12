@extends('master')

@section('content')

    <div class="header">
        @include('gallery.partials.breadcrumb', [
            'breadcrumb' => [
                ['text' => 'Albums', 'url' => route('gallery.albums')],
            ]
        ])
        @include('gallery.partials.title', ['title' => $exception->getMessage()])
        @include('gallery.partials.description', ['description' => null])
    </div>

    {{--<div class="error-row">--}}
        {{--<div class="error-message">{{ $exception->getMessage() }}</div>--}}
    {{--</div>--}}

@stop


