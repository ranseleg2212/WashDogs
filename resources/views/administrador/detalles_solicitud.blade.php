@extends('administrador.admin')
@section('contenido_administrador')
    <div class=" bg-neutral-900 border border-gray-200 rounded-lg shadow dark:bg-white dark:border-gray-700 relative overflow-x-auto shadow-md sm:rounded-lg"
        style="padding: 10px">
        <h1 class="text-center text-2xl font-extrabold">Datos del solicitante</h1>
        <div class="input-group py-1">
            <label for="solicitud_nr_slct" class="input-group-text bg-slate-600 text-white font-extrabold w-44">Solicitud de
                credito</label>
            <input type="text" name="solicitud_nr_slct" id="" class="form-control" readonly
                value="{{ $solicitud->estado_solicitud }}">
        </div>
        <div class="input-group py-1">
            <label for="monto_solicitado_txt" class="input-group-text bg-slate-600 text-white font-extrabold w-44">Monto Solicitado</label>
            <input type="text" name="monto_solicitado_txt" id="" class="form-control" readonly
                value="RD$ {{ number_format($solicitud->monto_solicitado,2) }}">
        </div>
        <table class="table">
            <thead class="text-center bg-slate-600 text-white">
                <th>Campo</th>
                <th colspan="2">Dato</th>

            </thead>
            <tbody>
                {{-- !DATOS DEL SOLICITANTE --}}
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Nombres</p>
                    </td>
                    <td class="border" colspan="2">
                        {{ $solicitud->nombres_solicitante }}
                    </td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Apellidos</p>
                    </td>
                    <td class="border" colspan="2">
                        {{ $solicitud->apellidos_solicitante }}
                    </td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Ocupacion</p>
                    </td>
                    <td class="border" colspan="2">
                        {{ $solicitud->ocupacion_solicitante }}
                    </td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Nacimiento</p>
                    </td>
                    <td class="border" colspan="2">
                        {{ $solicitud->nacimiento_solicitante }}
                    </td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Direccion</p>
                    </td>
                    <td class="border" colspan="2">
                        {{ $solicitud->direccion_solicitante }}
                    </td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Referencia de ubicacion</p>
                    </td>
                    <td class="border" colspan="2">
                        {{ $solicitud->referencia_ubicacion_solicitante }}
                    </td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Tel Residencial</p>
                    </td>
                    <td class="border" colspan="2">
                        {{ $solicitud->tel_residencial_solicitante }}
                    </td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Tel Celular</p>
                    </td>
                    <td class="border" colspan="2">
                        {{ $solicitud->tel_celular_solicitante }}
                    </td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Vivienda</p>
                    </td>
                    <td class="border" colspan="2">
                        {{ $solicitud->tipo_vivienda_solicitante }}
                    </td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Monto pago alquiler</p>
                    </td>
                    <td class="border" colspan="2">
                        RD$ {{ number_format($solicitud->monto_alquiler_solicitante, 2) }}
                    </td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Apodo</p>
                    </td>
                    <td class="border" colspan="2">
                        {{ $solicitud->apodo_solicitante }}
                    </td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Estado civil</p>
                    </td>
                    <td class="border" colspan="2">
                        {{ $solicitud->estado_civil_solicitante }}
                    </td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Cedula</p>
                    </td>
                    <td class="border" colspan="2">
                        {{ $solicitud->cedula_pasaporte_solicitante }}
                    </td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Vehiculo</p>
                    </td>
                    <td class="border" colspan="2">
                        {{ $solicitud->vehiculo_solicitante }}
                    </td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Marca del vehiculo</p>
                    </td>
                    <td class="border" colspan="2">
                        {{ $solicitud->marca_vehiculo_solicitante }}
                    </td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Correo</p>
                    </td>
                    <td class="border" colspan="2">
                        {{ $solicitud->correo_solicitante }}
                    </td>
                </tr>
                {{-- *negocio del solicitante --}}
                <tr class="text-center bg-slate-600 text-white">
                    <td colspan="3">
                        <p class="text-center font-extrabold">NEGOCIO DEL SOLICITANTE</p>
                    </td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Nombre del negocio</p>
                    </td>
                    <td class="border" colspan="2">
                        {{ $solicitud->nombre_negocio_solicitante }}
                    </td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Tel negocio</p>
                    </td>
                    <td class="border" colspan="2">
                        {{ $solicitud->tel_negocio_solicitante }}
                    </td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Tipo de garantia</p>
                    </td>
                    <td class="border" colspan="2">
                        @if ($solicitud->nombre_negocio_solicitante == '')
                            {{ '' }}
                        @else
                            {{ $solicitud->tipo_garantia_negocio_solicitante }}
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Direccion</p>
                    </td>
                    <td class="border" colspan="2">
                        {{ $solicitud->direccion_negocio_solicitante }}
                    </td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Empledos</p>
                    </td>
                    <td class="border" colspan="2">
                        {{ $solicitud->empleados_negocio_solicitante }}
                    </td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Tipo de local</p>
                    </td>
                    <td class="border" colspan="2">
                        @if ($solicitud->nombre_negocio_solicitante == '')
                            {{ '' }}
                        @else
                            {{ $solicitud->tipo_local_negocio_solicitante }}
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Pago aqluiler</p>
                    </td>
                    @if ($solicitud->tipo_local_negocio_solicitante == 'Propio')
                        <td class="border" colspan="2">RD$ {{ number_format(0, 2) }}</td>
                    @else
                        <td class="border" colspan="2">RD$
                            {{ number_format($solicitud->monto_alquiler_negocio_solicitante, 2) }}</td>
                    @endif
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Tiempo del negocio</p>
                    </td>
                    <td class="border" colspan="2">
                        {{ $solicitud->tiempo_negocio_solicitante }}
                    </td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Ventas diarias</p>
                    </td>
                    <td class="border" colspan="2">
                        {{ $solicitud->ventas_diarias_negocio_solicitante }}
                    </td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Otro negocio</p>
                    </td>
                    <td class="border" colspan="2">
                        {{ $solicitud->otro_negocio_solicitante }}
                    </td>
                </tr>
                <tr class="text-center bg-slate-600 text-white">
                    <td colspan="3">
                        <p class="text-center font-extrabold">DATOS LABORALES</p>
                    </td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Empresa</p>
                    </td>
                    <td class="border" colspan="2">
                        {{ $solicitud->empresa_laboral_solicitante }}
                    </td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Tipo</p>
                    </td>
                    <td class="border" colspan="2">
                        {{ $solicitud->tipo_empresa_laboral_solicitante }}
                    </td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Direccion</p>
                    </td>
                    <td class="border" colspan="2">
                        {{ $solicitud->direccion_empresa_laboral_solicitante }}
                    </td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Cargo</p>
                    </td>
                    <td class="border" colspan="2">
                        {{ $solicitud->cargo_laboral_solicitante }}
                    </td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Salario</p>
                    </td>
                    <td class="border" colspan="2">
                        RD$ {{ number_format($solicitud->salario_laboral_solicitante, 2) }}
                    </td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Tiempo</p>
                    </td>
                    <td class="border" colspan="2">
                        {{ $solicitud->tiempo_laboral_solicitante }}
                    </td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Jefe inmediato</p>
                    </td>
                    <td class="border" colspan="2">
                        {{ $solicitud->nombre_jefe_laboral_solicitante }}
                    </td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Telefono</p>
                    </td>
                    <td class="border" colspan="2">
                        {{ $solicitud->tel_empresa_laboral_solicitante }}
                    </td>
                </tr>
                {{-- *datos del conyugue --}}
                <tr class="text-center bg-slate-600 text-white">
                    <td colspan="3">
                        <p class="text-center font-extrabold">DATOS DEL CONYUGUE</p>
                    </td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Nombres</p>
                    </td>
                    <td class="border" colspan="2">
                        {{ $solicitud->nombres_conyugue_solicitante }}
                    </td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Apellidos</p>
                    </td>
                    <td class="border" colspan="2">
                        {{ $solicitud->apellidos_conyugue_solicitante }}
                    </td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Cedula</p>
                    </td>
                    <td class="border" colspan="2">
                        {{ $solicitud->cedula_conyugue_solicitante }}
                    </td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Lugar de trabajo</p>
                    </td>
                    <td class="border" colspan="2">
                        {{ $solicitud->trabajo_conyugue_solicitante }}
                    </td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Direccion de la empresa</p>
                    </td>
                    <td class="border" colspan="2">
                        {{ $solicitud->direccion_trabajo_conyugue_solicitante }}
                    </td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Direccion residencial</p>
                    </td>
                    <td class="border" colspan="2">
                        {{ $solicitud->direccion_residencial_conyugue_solicitante }}
                    </td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Tel de la empresa</p>
                    </td>
                    <td class="border" colspan="2">
                        {{ $solicitud->tel_trabajo_conyugue_solicitante }}
                    </td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Tel celular</p>
                    </td>
                    <td class="border" colspan="2">
                        {{ $solicitud->tel_celular_conyugue_solicitante }}
                    </td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Ingresos</p>
                    </td>
                    <td class="border" colspan="2">
                        RD$ {{ number_format($solicitud->ingresos_conyugue_solicitante, 2) }}
                    </td>
                </tr>
                <tr class="text-center bg-slate-600 text-white">
                    <td colspan="3">
                        <p class="text-center font-extrabold">FAMILIARES NO CERCANOS</p>
                    </td>
                </tr>
                <tr class="text-center bg-slate-600 text-white">
                    <th>Campo</th>
                    <th>Familiar 1</th>
                    <th>Familiar 2</th>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Nombre</p>
                    </td>
                    <td class="border" colspan="">
                        {{ $solicitud->nombre_familiar_uno }}
                    </td>
                    <td class="border" colspan="">
                        {{ $solicitud->nombre_familiar_dos }}
                    </td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Parentesco</p>
                    </td>
                    <td class="border" colspan="">
                        {{ $solicitud->parentesco_familiar_uno }}
                    </td>
                    <td class="border" colspan="">
                        {{ $solicitud->parentesco_familiar_dos }}
                    </td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Telefono</p>
                    </td>
                    <td class="border" colspan="">
                        {{ $solicitud->tel_familiar_uno }}
                    </td>
                    <td class="border" colspan="">
                        {{ $solicitud->tel_familiar_dos }}
                    </td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Direcion</p>
                    </td>
                    <td class="border" colspan="">
                        {{ $solicitud->direccion_familiar_uno }}
                    </td>
                    <td class="border" colspan="">
                        {{ $solicitud->direccion_familiar_dos }}
                    </td>
                </tr>
                <tr class="text-center bg-slate-600 text-white">
                    <td colspan="3">
                        <p class="text-center font-extrabold">CO-DEUDOR 1</p>
                    </td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Nombres</p>
                    </td>
                    <td class="border" colspan="2">{{ $solicitud->nombres_codeudor_uno }}</td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Apellidos</p>
                    </td>
                    <td class="border" colspan="2">{{ $solicitud->apellidos_codeudor_uno }}</td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Nacimiento</p>
                    </td>
                    <td class="border" colspan="2">{{ $solicitud->nacimiento_codeudor_uno }}</td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Direcion</p>
                    </td>
                    <td class="border" colspan="2">{{ $solicitud->direccion_codeudor_uno }}</td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Referencia de ubicacion</p>
                    </td>
                    <td class="border" colspan="2">{{ $solicitud->referencia_ubicacion_codeudor_uno }}</td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Tel Residencial</p>
                    </td>
                    <td class="border" colspan="2">{{ $solicitud->tel_residencial_codeudor_uno }}</td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Tel Celular</p>
                    </td>
                    <td class="border" colspan="2">{{ $solicitud->tel_celular_codeudor_uno }}</td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Tipo vivienda</p>
                    </td>
                    <td class="border" colspan="2">{{ $solicitud->tipo_vivienda_codeudor_uno }}</td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Pago alquiler</p>
                    </td>
                    @if ($solicitud->tipo_vivienda_codeudor_uno == 'Propia')
                        <td class="border" colspan="2">RD$ {{ number_format(0, 2) }}</td>
                    @else
                        <td class="border" colspan="2">RD$
                            {{ number_format($solicitud->monto_alquiler_codeudor_uno, 2) }}</td>
                    @endif
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Apodo</p>
                    </td>
                    <td class="border" colspan="2">{{ $solicitud->apodo_codeudor_uno }}</td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Cedula</p>
                    </td>
                    <td class="border" colspan="2">{{ $solicitud->cedula_pasaporte_codeudor_uno }}</td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Ocupacion</p>
                    </td>
                    <td class="border" colspan="2">{{ $solicitud->ocupacion_codeudor_uno }}</td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Vehiculo</p>
                    </td>
                    <td class="border" colspan="2">{{ $solicitud->vehiculo_codeudor_uno }}</td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Marca</p>
                    </td>
                    <td class="border" colspan="2">{{ $solicitud->marca_vehiculo_codeudor_uno }}</td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Estado civil</p>
                    </td>
                    <td class="border" colspan="2">{{ $solicitud->estado_civil_codeudor_uno }}</td>
                </tr>
                </tr>
                <tr class="text-center bg-slate-600 text-white">
                    <td colspan="3">
                        <p class="text-center font-extrabold">NEGOCIO CO-DEUDOR 1</p>
                    </td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Nombre</p>
                    </td>
                    <td class="border" colspan="2">{{ $solicitud->nombre_negocio_codeudor_uno }}</td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Direccion</p>
                    </td>
                    <td class="border" colspan="2">{{ $solicitud->direccion_negocio_codeudor_uno }}</td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Ventas diarias</p>
                    </td>
                    <td class="border" colspan="2">{{ $solicitud->ventas_negocio_codeudor_uno }}</td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Tipo de local</p>
                    </td>
                    @if ($solicitud->nombre_negocio_codeudor_uno == '')
                        <td class="border" colspan="2">{{ '' }}</td>
                    @else
                        <td class="border" colspan="2">{{ $solicitud->tipo_local_negocio_codeudor_uno }}</td>
                    @endif
                </tr>
                <tr class="text-center bg-slate-600 text-white">
                    <td colspan="3">
                        <p class="text-center font-extrabold">CO-DEUDOR 2</p>
                    </td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Nombres</p>
                    </td>
                    <td class="border" colspan="2">{{ $solicitud->nombres_codeudor_dos }}</td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Apellidos</p>
                    </td>
                    <td class="border" colspan="2">{{ $solicitud->apellidos_codeudor_dos }}</td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Nacimiento</p>
                    </td>
                    <td class="border" colspan="2">{{ $solicitud->nacimiento_codeudor_dos }}</td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Direcion</p>
                    </td>
                    <td class="border" colspan="2">{{ $solicitud->direccion_codeudor_dos }}</td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Referencia de ubicacion</p>
                    </td>
                    <td class="border" colspan="2">{{ $solicitud->referencia_ubicacion_codeudor_dos }}</td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Tel Residencial</p>
                    </td>
                    <td class="border" colspan="2">{{ $solicitud->tel_residencial_codeudor_dos }}</td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Tel Celular</p>
                    </td>
                    <td class="border" colspan="2">{{ $solicitud->tel_celular_codeudor_dos }}</td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Tipo vivienda</p>
                    </td>
                    <td class="border" colspan="2">{{ $solicitud->tipo_vivienda_codeudor_dos }}</td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Pago alquiler</p>
                    </td>
                    @if ($solicitud->tipo_vivienda_codeudor_dos == 'Propia')
                        <td class="border" colspan="2">RD$ {{ number_format(0, 2) }}</td>
                    @else
                        <td class="border" colspan="2">RD$
                            {{ number_format($solicitud->monto_alquiler_codeudor_dos, 2) }}</td>
                    @endif
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Apodo</p>
                    </td>
                    <td class="border" colspan="2">{{ $solicitud->apodo_codeudor_dos }}</td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Cedula</p>
                    </td>
                    <td class="border" colspan="2">{{ $solicitud->cedula_pasaporte_codeudor_dos }}</td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Ocupacion</p>
                    </td>
                    <td class="border" colspan="2">{{ $solicitud->ocupacion_codeudor_dos }}</td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Vehiculo</p>
                    </td>
                    <td class="border" colspan="2">{{ $solicitud->vehiculo_codeudor_dos }}</td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Marca</p>
                    </td>
                    <td class="border" colspan="2">{{ $solicitud->marca_vehiculo_codeudor_dos }}</td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Estado civil</p>
                    </td>
                    <td class="border" colspan="2">{{ $solicitud->estado_civil_codeudor_dos }}</td>
                </tr>
                </tr>
                <tr class="text-center bg-slate-600 text-white">
                    <td colspan="3">
                        <p class="text-center font-extrabold">NEGOCIO CO-DEUDOR 2</p>
                    </td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Nombre</p>
                    </td>
                    <td class="border" colspan="2">{{ $solicitud->nombre_negocio_codeudor_dos }}</td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Direccion</p>
                    </td>
                    <td class="border" colspan="2">{{ $solicitud->direccion_negocio_codeudor_dos }}</td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Ventas diarias</p>
                    </td>
                    <td class="border" colspan="2">{{ $solicitud->ventas_negocio_codeudor_dos }}</td>
                </tr>
                <tr>
                    <td class="border">
                        <p class="text-center font-extrabold">Tipo de local</p>
                    </td>
                    @if ($solicitud->nombre_negocio_codeudor_dos == '')
                        <td class="border" colspan="2">{{ '' }}</td>
                    @else
                        <td class="border" colspan="2">{{ $solicitud->tipo_local_negocio_codeudor_dos }}</td>
                    @endif
                </tr>
            </tbody>
        </table>
        <a class="my-1 btn btn-sm btn-success w-full h-10 text-lg text-extrabold hover:bg-green-900"
            href="{{ route('solicitud-creditos.edit', $solicitud->id) }}"> Editar</a>
        <br>
        @if ($solicitud->estado_solicitud != 'Anulada')
            <!-- Button trigger modal -->
            <button type="button"
                class="my-1 btn bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded w-full"
                data-bs-toggle="modal" data-bs-target="#exampleModal">
                Anular Solicitud
            </button>
        @else
        @endif


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Anular</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('solicitud-creditos.anular', $solicitud) }}" method="POST"
                            role="form" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <label for="id">Id solicitud</label>
                            <input type="text" name="id" id="" value="{{ $solicitud->id }}" readonly
                                class="form-control">
                            <label for="id">Motivo de anulacion</label>
                            <textarea name="anulacion" id="" cols="30" rows="10" class="w-full form-control h-40"></textarea>
                            <button type="submit"
                                class="btn bg-yellow-600 text-white font-extrabold hover:bg-yellow-500 my-1 w-full">Anular</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-red-700 text-white font-extrabold hover:bg-red-900 w-full"
                            data-bs-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
