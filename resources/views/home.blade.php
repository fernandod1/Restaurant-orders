@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Panel de control') }}</div>

                <div class="card-body" style="text-align:center">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                    @elseif ($message = Session::get('error'))
                    <div class="alert alert-danger">
                        <p>{{ $message }}</p>
                    </div>
                    @endif

                    <img width=250px src=/img/logo.png>
                    <br><a href=/orders><h2><b>VER PEDIDOS</b></h2></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
