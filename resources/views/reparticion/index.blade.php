@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Reparticion</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <p class="mb-0">Reparticion</p>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-right">
                            <a class="btn btn-success" href="{{ route('ReparticionController.create') }}"> Crear Nuevo</a>
                        </div>
                    </div>
                </div>

                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                @if ($message = Session::get('danger'))
                    <div class="alert alert-danger">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                @if ($message = Session::get('info'))
                    <div class="alert alert-info">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                <table class="table table-bordered">
                    <tr>
                        <th>No</th>
                        <th>Num</th>
                        <th>Sexo</th>
                        <th width="280px">Acción</th>
                    </tr>
                    @foreach ($items as $item)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $item->Num }}</td>
                        <td>{{ $item->Sexo }}</td>
                        <td>
                            <form action="{{ route('ReparticionController.destroy',$item->id) }}" method="POST">

                                <a class="btn btn-info" href="{{ route('ReparticionController.show',$item->id) }}">Ver</a>

                                <a class="btn btn-primary" href="{{ route('ReparticionController.edit',$item->id) }}">Editar</a>

                                @csrf
                                @method('DELETE')

                                <button type="submit" href="{{ route('ReparticionController.destroy',$item->id) }}" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>

                {!! $items->links() !!}

                </div>
            </section>
        </div>
    </div>
@stop
