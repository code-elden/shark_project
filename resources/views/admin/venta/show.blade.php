@extends('layouts.app-admin')

@section('content')
<section class="content">
    <div class="container-fluid">
        <h3>Venta: Información</h3>
        <div class="col-md-12">

            <div class="row g-3 align-items-center">
                <div class="col-md-2">
                    <label class="col-form-label"><strong>Número de venta</strong></label>
                </div>
                <div class="col-auto">
                    {{ $venta->nro_venta }}
                </div>
            </div>

            <div class="row g-3 align-items-center">
                <div class="col-md-2">
                    <label class="col-form-label"><strong>Usuario</strong></label>
                </div>
                <div class="col-auto">
                    {{ $venta->user }}
                </div>
            </div>

            <div class="row g-3 align-items-center">
                <div class="col-md-2">
                    <label class="col-form-label"><strong>Fecha</strong></label>
                </div>
                <div class="col-auto">
                    {{ $venta->fecha }}
                </div>
            </div>

            <div class="row g-3 align-items-center">
                <div class="col-md-2">
                    <label class="col-form-label"><strong>Total</strong></label>
                </div>
                <div class="col-auto">
                    {{ $venta->total }}
                </div>
            </div>

            <div class="row g-3">
                <div class="col-md-2">
                    <a class="btn btn-success" href="{{ route('ventas') }}"> Volver</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection