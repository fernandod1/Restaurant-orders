@extends('layouts.app')

@section('template_title')
    {{ $order->name ?? 'Show Order' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Order</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('orders.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Order:</strong>
                            {{ $order->id_order }}
                        </div>
                        <div class="form-group">
                            <strong>Id User:</strong>
                            {{ $order->id_user }}
                        </div>
                        <div class="form-group">
                            <strong>Id Product:</strong>
                            {{ $order->id_product }}
                        </div>
                        <div class="form-group">
                            <strong>Quantity:</strong>
                            {{ $order->quantity }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $order->status }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
