

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
@extends('layout.layout')

@section('content')
<div class="row">
    <div class="col-3">
        @include('shared.left-sidebar')
    </div>

    <div class="col-6">
        @include('shared.succes-message')
        @include('shared.submit-idea')
        <hr>

        @forelse ($ideas as $idea)
            <div class="mt-3">
                @include('shared.idea-card')
            </div>
        @empty
            <p class="text-center mt-4">No results Found.</p>
        @endforelse

        <div class="mt-3">
            {{ $ideas->withQueryString()->links() }}
        </div>
    </div>

    <div class="col-3">
        @include('shared.search-bar')
    </div>
</div>
@endsection
