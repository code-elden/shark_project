@extends('layouts.app')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-dark">{{ __('Misión') }}</div>

            <div class="card-body">
                <p>
                    Mi Misión
                </p>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-info">{{ __('Visión') }}</div>

            <div class="card-body">
                <p>
                    Mi Visión
                </p>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-success">{{ __('Información') }}</div>

            <div class="card-body">
                <p>
                    Mi Información
                </p>
            </div>
        </div>
    </div>
</section>
@endsection