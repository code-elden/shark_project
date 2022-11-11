@extends('layouts.app')

@section('content')
<section class="content">
    <div class="container">
        <div class="card">
            <div class="card-header bg-info">{{ __('Integrantes') }}</div>

            <div class="card-body">
                <ul>
                    <li>Integrante 1</li>
                    <li>Integrante 2</li>
                    <li>Integrante 3</li>
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection