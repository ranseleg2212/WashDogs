@extends('layouts.app')

@section('template_title')
    {{ $mascota->nombre ?? "{{ __('Show') Mascota" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Mascota</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('mascotas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Mascota Id:</strong>
                            {{ $mascota->mascota_id }}
                        </div>
                        <div class="form-group">
                            <strong>Id User:</strong>
                            {{ $mascota->id_user }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $mascota->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Raza:</strong>
                            {{ $mascota->raza }}
                        </div>
                        <div class="form-group">
                            <strong>Condicion:</strong>
                            {{ $mascota->condicion }}
                        </div>
                        <div class="form-group">
                            <strong>Edad:</strong>
                            {{ $mascota->edad }}
                        </div>
                        <div class="form-group">
                            <strong>Genero:</strong>
                            {{ $mascota->genero }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
