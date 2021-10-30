@extends('layouts.app')

@section('template_title')
    {{ $product->name ?? 'Show Product' }}
@endsection

@section('content')
    <section class="content container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title"><b>Ver producto</b></span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('products.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Categoría:</strong>
                            {{ $product->category->name }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $product->name }}
                        </div>
                        <div class="form-group">
                            <strong>Descripción:</strong>
                            {{ $product->description }}
                        </div>
                        <div class="form-group">
                            <strong>Precio:</strong>
                            {{ $product->price }}
                        </div>
                        <div class="form-group">
                            <strong>Stock:</strong>
                            @php
                            if($product->stock)
                                echo '<span class="badge rounded-pill bg-success" style="color:white">Sí</span>';
                            else {
                                echo '<span class="badge rounded-pill bg-danger" style="color:white">No</span>';
                            }    
                            @endphp
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
