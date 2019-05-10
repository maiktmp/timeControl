@php
        @endphp

@extends('templates.main')
@section('content')
    <div class="container">
        <div class="row mt-5 pt-5">
            <div class="col-4 offset-4">
                <div class="card">
                    <div class="card-header text-center">
                        Login
                    </div>
                    <div class="card-body">
                        <form
                                method="POST"
                                action="{{route('login.auth')}}">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    @input([
                                        'label'=>'Usuario',
                                        'name'=>'username'
                                    ])
                                </div>
                                <div class="col-12">
                                    @input([
                                        'label'=>'Contraseña',
                                        'name'=>'password',
                                        'type'=>'password'
                                    ])
                                </div>
                                <div class="col-12 text-center">
                                    <button
                                            type="submit"
                                            class="btn btn-primary"><i class="fas fa-sign-in-alt"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection