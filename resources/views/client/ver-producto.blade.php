@extends('layouts.app')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 mb-3">
                <h3>Categorías</h3>

                <div class="list-group mt-3">
                    @foreach($categorias as $item)
                    <a class="list-group-item list-group-item-action" href="{{ route('catalogo-categoria', $item->nombre) }}">{{ $item }}</a>
                    @endforeach
                </div>
            </div>

            <div class="col-md-8 ml-5">
                <h3>Información del producto</h3>

                <div class="row g-3 align-items-center mb-3">
                    <div class="col-auto">
                        <img class="img-fluid" src="/img-product/{{$producto->imagen}}" width="300">
                    </div>
                </div>

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
                    <div class="col-md-12">
                        <label class="col-form-label"><strong>Características</strong></label>
                    </div>
                    <div class="col-auto">
                        {{ $producto->caracteristica }}
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection