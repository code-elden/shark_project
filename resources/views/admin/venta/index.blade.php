@extends('layouts.app-admin')

@section('content')
<section class="content">
    <div class="container-fluid">
        <h3>Ventas</h3>
        <div class="mb-3">
            <form action="{{ route('ventas') }}" method="get">
                <div class="row">
                    <div class="col-md-8">
                        <input class="form-control" type="text" name="filter" value="{{ $filter }}" placeholder="Buscar por Número de venta o Fecha (yyyy-mm-dd)">
                    </div>
                    <div class="col-md-4 text-right">
                        <input class="btn btn-dark" type="submit" value="Buscar">
                    </div>
                </div>
            </form>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Nro. Venta</th> 
                    <th>Usuario</th>
                    <th>Fecha</th>
                    <th>Total</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ventas as $item)
                <tr>
                    <td>{{ $item->nro_venta }}</td>
                    <td>{{ $item->user }}</td>
                    <td>{{ $item->fecha }}</td>
                    <td>{{ $item->total }}</td>
                    <td class="text-right">
                        <a class="btn btn-primary" href="{{ route('detalleventa.show', $item->id) }}">Ver detalle</a>
                        @include('admin.venta.modal')
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-end">
            {{ $ventas->links() }}
        </div>
    </div>
</section>
@endsection