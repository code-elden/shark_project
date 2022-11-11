@extends('layouts.app')

@section('content')
<section class="content">
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($carritos as $item)
                <tr>
                    <td><img class="img-fluid" src="/img-product/{{$item->producto->imagen}}" width="100"></td>
                    <td><a class="text-dark" href="{{ route('ver-producto',$item->producto->id) }}">{{ $item->producto }}</a></td>
                    <td>{{ $item->cantidad }}</td>
                    <td>{{ $item->precio }}</td>
                    <td class="text-right">
                        <button class="btn btn-danger" data-toggle="modal" data-target="#modal-{{ $item->id }}">
                            <i class="fas fa-trash-alt"></i> Eliminar
                        </button>
                        @include('client.carrito-modal')
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-3">
            @if(count($carritos) > 0)
            <h3><strong>Total a pagar: </strong>${{ $total }}</h3>
            <a class="btn btn-primary" href="{{ route('carrito.comprar') }}">Realizar Compra</a>
            @else
            <p>No tiene productos</p>
            @endif
        </div>

    </div>
</section>
@endsection