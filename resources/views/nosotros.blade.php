@extends('layouts.app')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-dark">{{ __('Misión') }}</div>

            <div class="card-body">
                <p>
                Nuestra misión es crear sistemas de control eficaces para
                nuestros clientes con el motivo de crecer como estudiantes
                en nuestra carrera universitaria y también adquirir mas
                experiencia en la construcción de sistemas y desarrollo web.
                </p>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-info">{{ __('Visión') }}</div>

            <div class="card-body">
                <p>
                Nuestra visión con nuestro proyecto es que se mantenga un
                orden de los productos que se ofrezcan dentro de la empresa
                technoshark todo con la finalidad de que se mantenga un control
                de calidad y ventas de manera eficiente.
                </p>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-success">{{ __('Información') }}</div>

            <div class="card-body">
                <p>
                    Nuestra tienda de aparatos electrónicos Techno Shark tiene
                    el propósito de vender productos de marcas reconocidas para
                    una mejor calidad y asi tener la confianza de nuestros clientes.
                </p>
            </div>
        </div>
    </div>
</section>
@endsection