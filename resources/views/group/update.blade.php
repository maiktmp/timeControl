@php
    /* @var $group \App\Http\Model\Group*/
@endphp

@extends('templates.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="color-orange">Modificar grupo</h2>
                <h5>{{$group->name}}</h5>
                <h5>{{$group->start_hour}} - {{$group->end_hour}}</h5>
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
                                class="btn btn-primary rounded-pill">Modificar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection