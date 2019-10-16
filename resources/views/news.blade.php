
@extends('layouts.app')

@section('content')
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <post-component user={{auth()->user()}} ></post-component>
                            {{--@php--}}
                                {{--$tmp = auth()->user();--}}
                            {{--@endphp--}}
                        {{--{{--}}
                        {{--$tmp--}}
                        {{--}}--}}
            </div>
        </div>
    </div>
@endsection