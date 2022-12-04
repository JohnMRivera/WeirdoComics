@extends('Plantilla')
<!-- manda a llamar lo que contiene la plantilla-->
    @section('contenido')



{{-- Tarjeta en Bootstrap --}}
    <div class="container col-md-6">
        <h1 class="display-4 text-center mt-5 mb-5 ">Eliminar Recuerdo</h1>

<!-- interacion con el foreach-->
         {{-- @if($errors->any())
        @foreach($errors->all() as $error)
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Estas apunto de eliminar este recuerdo</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        @endforeach
        @endif --}}
        <div class="card text-center mb-5 ">

            <div class="card-header">
             Confirmar eliminacion
            </div>

            <div class="card-body">
                                            {{-- Ruta del recuerdo --}}
                <form method="post" action="{{ route('recuerdo.update',$consultaId->idRecuerdo) }}">

                     {{-- llave Autorizacion de token para el post --}}
                    @csrf
                    {!! method_field('PUT') !!}
                    <div class="mb-3">
                        <label class="form-label ">{{$consultaId->titulo }} </label>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">{{ $consultaId->recuerdo }}</label>
                    </div>

                     </div>

                 <div class="card-footer">
                    <form action="{{ route('recuerdos.destroy',$consultaId->idRecuerdo) }}" method="POST">
                        @csrf
                        @method('delete')
                    <button type="submit"  class="btn btn-warning">Si, eliminalo</button>
                    </form>
                    <a href="{{ route('recuerdos.index')}}" class="btn btn-warning">No, regresame</a>
                </form >
                </div>

          </div>
          {{-- Fin de tarjeta --}}
    </div>



    @stop
