@extends('layouts.app')

@section('template_title')
    {{ $user->name ?? 'Show User' }}
@endsection

@section('content')
    <section class="content container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title"><b>Cuenta de usuario</b></span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('users.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $user->name }}
                        </div>
                        <div class="form-group">
                            <strong>Correo-e:</strong>
                            {{ $user->email }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            @php
                            if($user->active==0)
                                echo'<span class="badge bg-danger" style="color:white">Desactivada</span>';
                            else
                                echo'<span class="badge bg-success" style="color:white">Activada</span>';
                            @endphp
                        </div>
                        <div class="form-group">
                            <strong>Rol:</strong>
                            @php
                            if($user->role==0)
                                echo"Administrador";
                            else if($user->role==1)
                                echo"Cajero";
                            else if($user->role==2)
                                echo"Cocinero";
                            else
                                echo"No definido";
                            @endphp
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
