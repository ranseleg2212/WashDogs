@extends('layouts.app')

@section('template_title')
    Mascota
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Mascota') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('mascotas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

										<th>Mascota Id</th>
										{{-- <th>Id User</th>
										<th>Nombre</th> --}}
										<th>Raza</th>
										<th>Condicion</th>
										<th>Edad</th>
										<th>Genero</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($mascotas as $mascota)
                                        <tr>
                                            <td>{{ ++$i }}</td>
											{{-- <td>{{ $mascota->mascota_id }}</td>
											<td>{{ $mascota->id_user }}</td> --}}
											<td>{{ $mascota->nombre }}</td>
											<td>{{ $mascota->raza }}</td>
											<td>{{ $mascota->condicion }}</td>
											<td>{{ $mascota->edad }}</td>
											<td>{{ $mascota->genero }}</td>
                                            <td>
                                                <form action="{{ route('mascotas.destroy',$mascota->mascota_id) }}" method="POST">
                                                    {{-- <a class="btn btn-sm btn-primary " href="{{ route('mascotas.show',$mascota->mascota_id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a> --}}
                                                    <a class="btn btn-sm btn-success" href="{{ route('mascotas.edit',$mascota->mascota_id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm bg-red-600"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $mascotas->links() !!}
            </div>
        </div>
    </div>
@endsection
