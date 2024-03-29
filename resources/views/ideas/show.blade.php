
@extends('layout.layout')

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-3">
            @include('shared.left-sidebar')
        </div>
        <div class="col-6">
            @include('shared.succes-message')

            <div class="mt-3">

                <a href="{{ route ('dashboard')}}"><button class="btn btn-warning btn-sm fa fa-arrow-left"></button></a>
                <br>
                <br>

                @include('shared.idea-card')

            </div>
        </div>
        <div class="col-3">
            @include('shared.search-bar')
            @include('shared.follow-box')
        </div>
    </div>
</div>
@endsection

