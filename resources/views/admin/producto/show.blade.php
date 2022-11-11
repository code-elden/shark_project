@extends('layouts.app-admin')

@section('content')
<section class="content">
    <div class="container-fluid">
    <h3>Producto: Información</h3>
    <div class="col-md-12">
        <div class="row g-3 align-items-center">
            <div class="col-md-2">
                <label class="col-form-label"><strong>Nombre</strong></label>
            </div>
            <div class="col-auto">
                {{ $producto->nombre }}
            </div>
        </div>

        <div class="row g-3 align-items-center">
            <div class="col-md-2">
                <label class="col-form-label"><strong>Características</strong></label>
            </div>
            <div class="col-auto">
                {{ $producto->caracteristica }}
            </div>
        </div>

        <div class="row g-3 align-items-center">
            <div class="col-md-2">
                <label class="col-form-label"><strong>Stock</strong></label>
            </div>
            <div class="col-auto">
                {{ $producto->stock }}
            </div>
        </div>

        <div class="row g-3 align-items-center">
            <div class="col-md-2">
                <label class="col-form-label"><strong>Precio</strong></label>
            </div>
            <div class="col-auto">
                {{ $producto->precio }}
            </div>
        </div>

        <div class="row g-3 align-items-center">
            <div class="col-md-2">
                <label class="col-form-label"><strong>Imagen</strong></label>
            </div>
            <div class="col-auto">
                <img class="img-fluid" src="/img-product/{{$producto->imagen}}" width="300">
            </div>
        </div>

        <div class="row g-3">
            <div class="col-md-2">
                <a class="btn btn-success" href="{{ route('productos') }}"> Volver</a>
            </div>
        </div>
    </div>
</div>
</section>
@endsection