@php
    /* @var $groups \App\Http\Model\Group[]*/
@endphp

@extends('templates.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="color-orange">Grupos</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-right">
                <a
                        role="button"
                        href="{{route('group_create')}}"
                        class="btn btn-primary rounded-pill"> + Agregar grupo</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th><b>Nombre</b></th>
                        <th><b>Horario</b></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($groups as $group)
                        <tr>
                            <td>{{$group->name}}</td>
                            <td>{{$group->start_hour}} - {{$group->end_hour}}</td>
                            <td>
                                <a href="{{route('group_update',['groupId'=>$group->id])}}">
                                    <i class="fas fa-pencil-alt color-red"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="2">
                                Sin grupos
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection