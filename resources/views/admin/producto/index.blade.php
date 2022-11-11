@extends('layouts.app-admin')

@section('content')
<section class="content">
    <div class="container-fluid">
        <h3>Productos</h3>
        <div class="mb-3">
            <form action="{{ route('productos') }}" method="get">
                <div class="row">
                    <div class="col-md-8">
                        <input class="form-control" type="text" name="filter" value="{{ $filter }}" placeholder="Buscar por Nombre">
                    </div>
                    <div class="col-md-4 text-right">
                        <input class="btn btn-dark" type="submit" value="Buscar">
                        <a class="btn btn-success" href="{{ route('producto.create') }}"><i class="fas fa-plus"></i> Crear Nuevo</a>
                    </div>
                </div>
            </form>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Stock</th>
                    <th>Precio</th>
                    <th>Imagen</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $item)
                <tr>
                    <td>{{$item->nombre}}</td>
                    <td>{{$item->stock}}</td>
                    <td>{{$item->precio}}</td>
                    <td>
                        <img class="img-fluid" src="/img-product/{{$item->imagen}}" width="100">
                    </td>
                    <td class="text-right">
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-expanded="false">
                                Opciones
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="{{route('producto.show',$item->id)}}">Ver</a></li>
                                <li><a class="dropdown-item" href="{{route('producto.edit',$item->id)}}">Editar</a></li>
                                <li><button class="dropdown-item" data-toggle="modal" data-target="#modal-{{$item->id}}">Eliminar</button></li>
                            </ul>
                        </div>
                        @include('admin.producto.modal')
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-end">
            {{ $productos->links() }}
        </div>
    </div>
</section>
@endsection