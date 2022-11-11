@extends('layouts.app-admin')

@section('content')
<section class="content">
    <div class="container">
        <h3>Detalle de venta</h3>
        <h5>Nro de venta: {{ $detalles[0]->venta }}</h5>

        <table class="table mt-5">
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($detalles as $item)
                <tr>
                    <td><img class="img-fluid" src="/img-product/{{$item->producto->imagen}}" width="100"></td>
                    <td>{{ $item->producto }}</td>
                    <td>{{ $item->cantidad }}</td>
                    <td>{{ $item->precio }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</section>
@endsection