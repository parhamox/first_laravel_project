
@extends('layout.layout')

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-3">
            @include('shared.left-sidebar')
        </div>
        <div class="col-6">
            @include('shared.succes-massage')
            <div class="mt-3">
                <a href="{{ route ('dashboard')}}"><button class="btn btn-warning btn-sm fa fa-arrow-left mb-3"></button></a>
                @include('shared.user-card')
            </div>
        </div>
        <div class="col-3">
            @include('shared.search-bar')
            @include('shared.follow-box')
        </div>
    </div>
</div>
@endsection

