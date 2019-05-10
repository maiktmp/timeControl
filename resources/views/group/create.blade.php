@php
        @endphp

@extends('templates.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="color-orange">Agregar grupo</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-6 offset-3">
                <form
                        method="post"
                        action="{{route('group_create_post')}}">
                    @csrf
                    @include('group._form')
                    <div class="col-12 text-center">
                        <button
                                type="submit"
                                class="btn btn-primary rounded-pill">Agregar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection