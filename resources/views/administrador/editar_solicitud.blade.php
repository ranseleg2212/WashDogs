@extends('administrador.admin')
@section('contenido_administrador')
    <div class=" bg-neutral-900 border border-gray-200 rounded-lg shadow dark:bg-white dark:border-gray-700 py-4 px-4">
        <h2 class="text-center text-2xl font-extrabold" id="titulo-seccion">Solitud de credito</h2>
        <form method="POST" action="{{ route('solicitud-creditos.update', $solicitudCredito) }}" role="form"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="input-group py-4">
                <label for="estado_solicitud" class="input-group-text bg-slate-600 text-white font-extrabold w-44">Solicitud de
                    credito</label>
                <select name="estado_solicitud" id="" class="form-select">
                    <option value="{{ $solicitudCredito->estado_solicitud }}">{{ $solicitudCredito->estado_solicitud }}
                    </option>
                    <option value="Nueva">Nueva</option>
                    <option value="Renovada">Renovada</option>
                    <option value="Anulada">Anulada</option>
                </select>
            </div>
            <div class="input-group py-1">
                <label for="monto_solicitado" class="input-group-text bg-slate-600 text-white font-extrabold w-44">Monto Solicitado</label>
                <input type="number" name="monto_solicitado" id="" class="form-control"
                    value="{{ $solicitudCredito->monto_solicitado }}">
            </div>
            {{-- DATOS DEL SOLICITANTE --}}
            <div id="datos_personales_solicitante">
                <h2 class="text-center text-2xl font-extrabold" id="titulo-seccion">Datos del solicitante</h2>
                {{-- ! --}}
                <div class="row py-3">
                    {{-- NOMBRE --}}
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input name="nombres_solicitante" type="text" class="form-control" placeholder="."
                                value="{{ $solicitudCredito->nombres_solicitante }}">
                            <label for="nombres_solicitante">Nombres</label>
                        </div>
                    </div>
                    {{-- APELLIDOS --}}
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input name="apellidos_solicitante" type="text" class="form-control" placeholder="."
                                value="{{ $solicitudCredito->apellidos_solicitante }}">
                            <label for="apellidos_solicitante">Apellidos</label>
                        </div>
                    </div>
                </div>
                {{-- ! --}}
                <div class="row py-3">
                    {{-- OCUPACION --}}
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input name="ocupacion_solicitante" type="text" class="form-control" placeholder="."
                                value="{{ $solicitudCredito->ocupacion_solicitante }}">
                            <label for="ocupacion_solicitante">Ocupacion</label>
                        </div>
                    </div>
                    {{-- NACIMIENTO --}}
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input name="nacimiento_solicitante" type="date" class="form-control" placeholder="."
                                value="{{ $solicitudCredito->nacimiento_solicitante }}">
                            <label for="nacimiento_solicitante">Fecha de nacimiento</label>
                        </div>
                    </div>
                </div>
                {{-- ! --}}
                <div class="row py-3">
                    {{-- DIRECCION --}}
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input name="direccion_solicitante" type="text" class="form-control" placeholder="."
                                value="{{ $solicitudCredito->direccion_solicitante }}">
                            <label for="direccion_solicitante">Direccion</label>
                        </div>
                    </div>
                    {{-- TELEFONO --}}
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="tel" name="tel_residencial_solicitante" class="form-control" placeholder="."
                                value="{{ $solicitudCredito->tel_residencial_solicitante }}">
                            <label for="tel_residencial_solicitante">Telefono</label>
                        </div>
                    </div>
                </div>
                {{-- ! --}}
                {{-- REFERENCIA DE UBICACION --}}
                <div class="form-floating mb-3">
                    <input type="text" name="referencia_ubicacion_solicitante" class="form-control" placeholder="."
                        value="{{ $solicitudCredito->referencia_ubicacion_solicitante }}">
                    <label for="referencia_ubicacion_solicitante">Referencia de ubicacion</label>
                </div>
                {{-- ! --}}
                <div class="row py-3">
                    {{-- CELULAR --}}
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="tel" name="tel_celular_solicitante" class="form-control" placeholder="."
                                value="{{ $solicitudCredito->tel_celular_solicitante }}">
                            <label for="tel_celular_solicitante">Celular</label>
                        </div>
                    </div>
                    {{-- MONTO DE PAGO DE ALQUILER --}}
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="number" name="monto_alquiler_solicitante" class="form-control" placeholder="."
                                value="{{ $solicitudCredito->monto_alquiler_solicitante }}">
                            <label for="monto_alquiler_solicitante">Monto de pago alquiler</label>
                        </div>
                    </div>
                </div>
                {{-- ! --}}
                {{-- TIPO DE VIVIENDA --}}
                <div class="form-floating mb-3">
                    <select name="tipo_vivienda_solicitante" class="form-select">
                        <option value="{{ $solicitudCredito->tipo_vivienda_solicitante }}">
                            {{ $solicitudCredito->tipo_vivienda_solicitante }}</option>
                        <option value="Propia">Propia</option>
                        <option value="Alquilada">Alquilada</option>
                    </select>
                    <label for="tipo_vivienda_solicitante">Residencia</label>
                </div>
                {{-- ! --}}
                <div class="row py-3">
                    {{-- APODO --}}
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="text" name="apodo_solicitante" class="form-control" placeholder="."
                                value="{{ $solicitudCredito->apodo_solicitante }}">
                            <label for="apodo_solicitante">Apodo</label>
                        </div>
                    </div>
                    {{-- ESTADO CIVIL --}}
                    <div class="col">
                        <div class="form-floating mb-3">
                            <select name="estado_civil_solicitante" id="" class="form-select">
                                <option value="{{ $solicitudCredito->estado_civil_solicitante }}">
                                    {{ $solicitudCredito->estado_civil_solicitante }}</option>
                                <option value="Soltero/a">Soltero/a</option>
                                <option value="Casado/a">Casado/a</option>
                                <option value="Union libre">Union libre</option>
                                <option value="En relacion">En relacion</option>
                            </select>
                            <label for="estado_civil_solicitante">Estado civil</label>
                        </div>
                    </div>
                </div>
                {{-- ! --}}
                {{-- CEDULA O PASAPORTE --}}
                <div class="form-floating mb-3">
                    <input type="text" name="cedula_pasaporte_solicitante" class="form-control" placeholder="."
                        value="{{ $solicitudCredito->cedula_pasaporte_solicitante }}">
                    <label for="cedula_pasaporte_solicitante">Cedula o pasaporte</label>
                </div>
                {{-- ! --}}
                {{-- VEHICULO --}}
                <div class="form-floating mb-3">
                    <select name="vehiculo_solicitante" id="" class="form-select">
                        <option value="{{ $solicitudCredito->vehiculo_solicitante }}">
                            {{ $solicitudCredito->vehiculo_solicitante }}</option>
                        <option value="Si">Si</option>
                        <option value="No">No</option>
                    </select>
                    <label for="vehiculo_solicitante">Posee vehiculo?</label>
                </div>
                {{-- ! --}}
                {{-- MARCA DE VEHICULO --}}
                <div class="form-floating mb-3">
                    <input type="text" name="marca_vehiculo_solicitante" class="form-control" placeholder="."
                        value="{{ $solicitudCredito->marca_vehiculo_solicitante }}">
                    <label for="marca_vehiculo_solicitante">Marca del vehiculo</label>
                </div>
                {{-- ! --}}
                {{-- CORREO --}}
                <div class="form-floating mb-3">
                    <input type="email" name="correo_solicitante" class="form-control" placeholder="."
                        value="{{ $solicitudCredito->correo_solicitante }}">
                    <label for="correo_solicitante">Correo</label>
                </div>
                {{-- ! --}}
            </div>
            {{-- *INFORMACION DEL NEGOCIO --}}
            <div id="datos_del_negocio" class="">
                <h2 class="text-center text-2xl font-extrabold" id="titulo-seccion">Datos del negocio</h2>
                {{-- ! --}}
                <div class="row py-3">
                    {{-- NOMBRE DEL NEGOCIO --}}
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="text" name="nombre_negocio_solicitante" class="form-control" placeholder="."
                                value="{{ $solicitudCredito->nombre_negocio_solicitante }}">
                            <label for="nombre_negocio_solicitante">Nombre</label>
                        </div>
                    </div>
                    {{-- TELEFONO --}}
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="tel" name="tel_negocio_solicitante" class="form-control" placeholder="."
                                value="{{ $solicitudCredito->tel_negocio_solicitante }}">
                            <label for="tel_negocio_solicitante">Telefono</label>
                        </div>
                    </div>
                </div>
                {{-- ! --}}
                <div class="row py-3">
                    {{-- TIPO DE GARANTIA --}}
                    <div class="col">
                        <div class="form-floating mb-3">
                            <select name="tipo_garantia_negocio_solicitante" class="form-select">
                                <option value="{{ $solicitudCredito->tipo_garantia_negocio_solicitante }}">
                                    {{ $solicitudCredito->tipo_garantia_negocio_solicitante }}</option>
                                <option value="Matricula">Matricula</option>
                                <option value="Co-deudor">Co-deudor</option>
                            </select>
                            <label for="tipo_garantia_negocio_solicitante">Tipo de garantia</label>
                        </div>
                    </div>
                </div>
                {{-- ! --}}
                {{-- DIRECCION --}}
                <div class="form-floating mb-3">
                    <input type="text" name="direccion_negocio_solicitante" class="form-control" placeholder="."
                        value="{{ $solicitudCredito->direccion_negocio_solicitante }}">
                    <label for="direccion_negocio_solicitante">Direccion</label>
                </div>
                {{-- ! --}}
                {{-- CANTIDAD DE EMPLEADOS --}}
                <div class="form-floating mb-3">
                    <input type="number" name="empleados_negocio_solicitante" class="form-control" placeholder="."
                        value="{{ $solicitudCredito->empleados_negocio_solicitante }}">
                    <label for="empleados_negocio_solicitante">Cantidad de empleados</label>
                </div>
                {{-- ! --}}
                {{-- MONTO DE PAGO DE ALQUILER --}}
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="number" name="monto_alquiler_negocio_solicitante" class="form-control"
                            placeholder="." value="{{ $solicitudCredito->monto_alquiler_negocio_solicitante }}">
                        <label for="monto_alquiler_negocio_solicitante">Monto de pago de alquiler</label>
                    </div>
                    {{-- ! --}}
                    {{-- TIPO DE LOCAL --}}
                    <div class="form-floating mb-3">
                        <select name="tipo_local_negocio_solicitante" class="form-control">
                            <option value="{{ $solicitudCredito->tipo_local_negocio_solicitante }}">
                                {{ $solicitudCredito->tipo_local_negocio_solicitante }}</option>
                            <option value="Alquilado">Alquilado</option>
                            <option value="Propio">Propio</option>
                        </select>
                        <label for="tipo_local_negocio_solicitante">Local</label>
                    </div>
                    {{-- ! --}}
                    {{-- TIEMPO DEL NEGOCIO --}}
                    <div class="form-floating mb-3">
                        <input type="text" name="tiempo_negocio_solicitante" class="form-control" placeholder="."
                            value="{{ $solicitudCredito->tiempo_negocio_solicitante }}">
                        <label for="tiempo_negocio_solicitante">Tiempo del negocio</label>
                    </div>
                    {{-- ! --}}
                    {{-- VENTAS DIARIAS --}}
                    <div class="form-floating mb-3">
                        <input type="number" name="ventas_diarias_negocio_solicitante" class="form-control"
                            placeholder="." value="{{ $solicitudCredito->ventas_diarias_negocio_solicitante }}">
                        <label for="ventas_diarias_negocio_solicitante">Volumen de ventas diarias</label>
                    </div>
                    {{-- OTRO NEGOCIO QUE POSEA --}}
                    <div class="form-floating mb-3">
                        <input type="text" name="otro_negocio_solicitante" class="form-control" placeholder="."
                            value="{{ $solicitudCredito->otro_negocio_solicitante }}">
                        <label for="otro_negocio_solicitante">Otro negocio que posea</label>
                    </div>
                    {{-- ! --}}
                </div>
                {{-- *DATOS LABORALES --}}
                <div id="datos_laborales">
                    <h2 class="text-center text-2xl font-extrabold" id="titulo-seccion">Datos laborales</h2>
                    {{-- ! --}}
                    <div class="row py-3">
                        {{-- NOMBRE DE LA EMPRESA --}}
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" name="empresa_laboral_solicitante" id=""
                                    class="form-control" placeholder="."
                                    value="{{ $solicitudCredito->empresa_laboral_solicitante }}">
                                <label for="empresa_laboral_solicitante">Empresa</label>
                            </div>
                        </div>
                        {{-- TIPO DE EMPRESA --}}
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" name="tipo_empresa_laboral_solicitante" id=""
                                    class="form-control" placeholder="."
                                    value="{{ $solicitudCredito->tipo_empresa_laboral_solicitante }}">
                                <label for="tipo_empresa_laboral_solicitante">Tipo</label>
                            </div>
                        </div>
                    </div>
                    {{-- ! --}}
                    {{-- DIRECCION --}}
                    <div class="form-floating mb-3">
                        <input type="text" name="direccion_empresa_laboral_solicitante" class="form-control"
                            placeholder="." value="{{ $solicitudCredito->direccion_empresa_laboral_solicitante }}">
                        <label for="direccion_empresa_laboral_solicitante">Direccion</label>
                    </div>

                    {{-- ! --}}
                    {{-- TELEFONOS --}}
                    <div class="form-floating mb-3">
                        <input type="text" name="tel_empresa_laboral_solicitante" class="form-control"
                            placeholder="." value="{{ $solicitudCredito->tel_empresa_laboral_solicitante }}">
                        <label for="tel_empresa_laboral_solicitante">Telefonos</label>
                    </div>

                    {{-- ! --}}
                    <div class="row py-3">
                        {{-- CARGO --}}
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" name="cargo_laboral_solicitante" placeholder="."
                                    class="form-control" value="{{ $solicitudCredito->cargo_laboral_solicitante }}">
                                <label for="cargo_laboral_solicitante">Cargo</label>
                            </div>
                        </div>
                        {{-- SALARIO --}}
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="number" name="salario_laboral_solicitante" placeholder="."
                                    class="form-control" value="{{ $solicitudCredito->salario_laboral_solicitante }}">
                                <label for="salario_laboral_solicitante">Salario</label>
                            </div>
                        </div>
                    </div>
                    {{-- ! --}}
                    {{-- TIEMPO LABORANDO --}}
                    <div class="form-floating mb-3">
                        <input type="text" name="tiempo_laboral_solicitante" placeholder="." class="form-control"
                            value="{{ $solicitudCredito->tiempo_laboral_solicitante }}">
                        <label for="tiempo_laboral_solicitante">Tiempo laborando</label>
                    </div>
                    {{-- ! --}}
                    {{-- NOMBRE DEL JEFE --}}
                    <div class="form-floating mb-3">
                        <input type="text" name="nombre_jefe_laboral_solicitante" placeholder="."
                            class="form-control" value="{{ $solicitudCredito->nombre_jefe_laboral_solicitante }}">
                        <label for="nombre_jefe_laboral_solicitante">Nombre del jefe inmediato</label>
                    </div>
                </div>
                {{-- *DATOS DEL CONYUGUE --}}
                <div id="datos_conyugue">
                    <h2 class="text-center text-2xl font-extrabold" id="titulo-seccion">Datos del conyugue</h2>
                    {{-- ! --}}
                    <div class="row py-3">
                        {{-- NOMBRES --}}
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" name="nombres_conyugue_solicitante" placeholder="."
                                    class="form-control" value="{{ $solicitudCredito->nombres_conyugue_solicitante }}">
                                <label for="nombres_conyugue_solicitante">Nombres</label>
                            </div>
                        </div>
                        {{-- APELLIDOS --}}
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" name="apellidos_conyugue_solicitante" placeholder="."
                                    class="form-control" value="{{ $solicitudCredito->apellidos_conyugue_solicitante }}">
                                <label for="apellidos_conyugue_solicitante">Apellidos</label>
                            </div>
                        </div>
                    </div>
                    {{-- ! --}}
                    {{-- CEDULA --}}
                    <div class="form-floating mb-3">
                        <input type="text" name="cedula_conyugue_solicitante" placeholder="." class="form-control"
                            value="{{ $solicitudCredito->cedula_conyugue_solicitante }}">
                        <label for="cedula_conyugue_solicitante">Cedula</label>
                    </div>
                    {{-- ! --}}
                    {{-- LUGAR DE TRABAJO --}}
                    <div class="form-floating mb-3">
                        <input type="text" name="trabajo_conyugue_solicitante" placeholder="." class="form-control"
                            value="{{ $solicitudCredito->trabajo_conyugue_solicitante }}">
                        <label for="trabajo_conyugue_solicitante">Lugar de trabajo</label>
                    </div>
                    {{-- ! --}}
                    {{-- DIRECCION DE TRABAJO --}}
                    <div class="form-floating mb-3">
                        <input type="text" name="direccion_trabajo_conyugue_solicitante" placeholder="."
                            class="form-control" value="{{ $solicitudCredito->direccion_trabajo_conyugue_solicitante }}">
                        <label for="direccion_trabajo_conyugue_solicitante">Direccion del trabajo</label>
                    </div>
                    {{-- ! --}}
                    {{-- DIRECCION RESIDENCIAL --}}

                    <div class="form-floating mb-3">
                        <input type="text" name="direccion_residencial_conyugue_solicitante" placeholder="."
                            class="form-control"
                            value="{{ $solicitudCredito->direccion_residencial_conyugue_solicitante }}">
                        <label for="direccion_residencial_conyugue_solicitante">Direccion residencial</label>
                    </div>

                    {{-- ! --}}
                    <div class="row py-3">
                        {{-- TELEFONOS DEL TRABAJO --}}
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" name="tel_trabajo_conyugue_solicitante" placeholder="."
                                    class="form-control"
                                    value="{{ $solicitudCredito->tel_trabajo_conyugue_solicitante }}">
                                <label for="tel_trabajo_conyugue_solicitante">Tel trabajo</label>
                            </div>
                        </div>
                        {{-- CELULAR --}}
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" name="tel_celular_conyugue_solicitante" placeholder="."
                                    class="form-control"
                                    value="{{ $solicitudCredito->tel_celular_conyugue_solicitante }}">
                                <label for="tel_celular_conyugue_solicitante">Tel celular</label>
                            </div>
                        </div>
                    </div>
                    {{-- ! --}}
                    {{-- INGRESOS --}}
                    <div class="form-floating mb-3">
                        <input type="text" name="ingresos_conyugue_solicitante" placeholder="." class="form-control"
                            value="{{ $solicitudCredito->ingresos_conyugue_solicitante }}">
                        <label for="ingresos_conyugue_solicitante">Ingresos</label>
                    </div>
                    {{-- ! --}}
                </div>
                {{-- *DATOS DE FAMILIARES QUE NO VIVAN CON EL SOLICITANTE --}}
                <div id="datos_familiares_no_cercanos">
                    <h2 class="text-center text-2xl font-extrabold" id="titulo-seccion">Datos de familiares que no vivan
                        con
                        el solicitante</h2>
                    <table class="table">
                        <thead class="text-center bg-slate-600 text-white">
                            <th>Campo</th>
                            <th>Familiar #1</th>
                            <th>Familiar #2</th>
                        </thead>
                        <tbody>
                            {{-- FAMILIAR NO CERCANO #1 --}}
                            {{-- NOMBRE Y APELLIDO --}}
                            <tr>
                                <td>
                                    <p class="text-center font-extrabold">Nombre</p>
                                </td>
                                <td class="border">
                                    <input type="text" name="nombre_familiar_uno" id="" class="form-control"
                                        value="{{ $solicitudCredito->nombre_familiar_uno }}">
                                </td>
                                <td class="border">
                                    <input type="text" name="nombre_familiar_dos" id="" class="form-control"
                                        value="{{ $solicitudCredito->nombre_familiar_dos }}">
                                </td>
                            </tr>
                            {{-- PARENTESCO --}}
                            <tr>
                                <td class="border">
                                    <p class="text-center font-extrabold">Parentesco</p>
                                </td>
                                <td>
                                    <input type="text" name="parentesco_familiar_uno" id=""
                                        class="form-control" value="{{ $solicitudCredito->parentesco_familiar_uno }}">
                                </td>
                                <td class="border">
                                    <input type="text" name="parentesco_familiar_dos" id=""
                                        class="form-control" value="{{ $solicitudCredito->parentesco_familiar_dos }}">
                                </td>
                            </tr>
                            {{-- TELEFONO --}}
                            <tr>
                                <td class="border">
                                    <p class="text-center font-extrabold">Tel</p>
                                </td>
                                <td class="border">
                                    <input type="tel" name="tel_familiar_uno" id=""
                                        class="form-control w-full" value="{{ $solicitudCredito->tel_familiar_uno }}">
                                </td>
                                <td class="border">
                                    <input type="tel" name="tel_familiar_dos" id="" class="form-control"
                                        value="{{ $solicitudCredito->tel_familiar_dos }}">
                                </td>
                            </tr>
                            {{-- DIRECCION --}}
                            <tr>
                                <td class="border">
                                    <p class="text-center font-extrabold">Direccion</p>
                                </td>
                                <td class="border">
                                    <input type="text" name="direccion_familiar_uno" id=""
                                        class="form-control" value="{{ $solicitudCredito->direccion_familiar_uno }}">
                                </td>
                                <td class="border">
                                    <input type="text" name="direccion_familiar_dos" id=""
                                        class="form-control" value="{{ $solicitudCredito->direccion_familiar_dos }}">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                {{-- DATOS DEL CO-DEUDOR 1 --}}
                <div id="datos_codeudor_uno">
                    <h2 class="text-center text-2xl font-extrabold" id="titulo-seccion">Datos del co-deudor 1</h2>
                    <div class="row py-3">
                        {{-- ! --}}
                        {{-- NOMBRES --}}
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" name="nombres_codeudor_uno" placeholder="." class="form-control"
                                    value="{{ $solicitudCredito->nombres_codeudor_uno }}">
                                <label for="nombres_codeudor_uno">Nombres</label>
                            </div>
                        </div>
                        {{-- APELLIDOS --}}
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" name="apellidos_codeudor_uno" placeholder="." class="form-control"
                                    value="{{ $solicitudCredito->apellidos_codeudor_uno }}">
                                <label for="apellidos_codeudor_uno">Apellidos</label>
                            </div>
                        </div>
                    </div>
                    {{-- ! --}}
                    {{-- NACIMIENTO --}}
                    <div class="form-floating mb-3">
                        <input type="date" name="nacimiento_codeudor_uno" placeholder="." class="form-control"
                            value="{{ $solicitudCredito->nacimiento_codeudor_uno }}">
                        <label for="nacimiento_codeudor_uno">Nacimiento</label>
                    </div>
                    {{-- ! --}}
                    {{-- DIRECCION --}}
                    <div class="form-floating mb-3">
                        <input type="text" name="direccion_codeudor_uno" placeholder="." class="form-control"
                            value="{{ $solicitudCredito->direccion_codeudor_uno }}">
                        <label for="direccion_codeudor_uno">Direccion</label>
                    </div>
                    {{-- ! --}}
                    {{-- REFERENCIA DE UBICACION --}}
                    <div class="form-floating mb-3">
                        <input type="text" name="referencia_ubicacion_codeudor_uno" placeholder="."
                            class="form-control" value="{{ $solicitudCredito->referencia_ubicacion_codeudor_uno }}">
                        <label for="referencia_ubicacion_codeudor_uno">Referencia de ubicacion</label>
                    </div>
                    {{-- ! --}}
                    <div class="row py-3">
                        {{-- TELEFONO --}}
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="tel" name="tel_residencial_codeudor_uno" placeholder="."
                                    class="form-control" value="{{ $solicitudCredito->tel_residencial_codeudor_uno }}">
                                <label for="tel_residencial_codeudor_uno">Tel residencial</label>
                            </div>
                        </div>
                        {{-- CELULAR --}}
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" name="tel_celular_codeudor_uno" placeholder="."
                                    class="form-control" value="{{ $solicitudCredito->tel_celular_codeudor_uno }}">
                                <label for="tel_celular_codeudor_uno">Tel celular</label>
                            </div>
                        </div>
                    </div>
                    {{-- ! --}}
                    {{-- TIPO DE RESIDENCIA --}}
                    <div class="form-floating mb-3">
                        <select name="tipo_vivienda_codeudor_uno" class="form-select" wireModel="ola">
                            <option value="{{ $solicitudCredito->tipo_vivienda_codeudor_uno }}">
                                {{ $solicitudCredito->tipo_vivienda_codeudor_uno }}</option>
                            <option value="Propia">Propia</option>
                            <option value="Alquilada">Alquilada</option>
                        </select>
                        <label for="tipo_vivienda_codeudor_uno">Residencia</label>
                    </div>
                    {{-- ! --}}
                    <div class="row py-3">
                        {{-- MONTO DE PAGO DE ALQUILER --}}
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="number" name="monto_alquiler_codeudor_uno" placeholder="."
                                    class="form-control" value="{{ $solicitudCredito->monto_alquiler_codeudor_uno }}">
                                <label for="monto_alquiler_codeudor_uno">Pago alquiler</label>
                            </div>
                        </div>
                        {{-- APODO --}}
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" name="apodo_codeudor_uno" placeholder="." class="form-control"
                                    value="{{ $solicitudCredito->apodo_codeudor_uno }}">
                                <label for="apodo_codeudor_uno">Apodo</label>
                            </div>
                        </div>
                    </div>
                    {{-- ! --}}
                    {{-- CEDULA O PASAPORTE --}}
                    <div class="form-floating mb-3">
                        <input type="text" name="cedula_pasaporte_codeudor_uno" placeholder="." class="form-control"
                            value="{{ $solicitudCredito->cedula_pasaporte_codeudor_uno }}">
                        <label for="cedula_pasaporte_codeudor_uno">Cedula o pasaporte</label>
                    </div>
                    {{-- ! --}}
                    {{-- OCUPACION --}}
                    <div class="form-floating mb-3">
                        <input type="text" name="ocupacion_codeudor_uno" placeholder="." class="form-control"
                            value="{{ $solicitudCredito->ocupacion_codeudor_uno }}">
                        <label for="ocupacion_codeudor_uno">Ocupacion</label>
                    </div>
                    {{-- ! --}}
                    {{-- POSEE VEHICULO? --}}
                    <div class="form-floating mb-3">
                        <select name="vehiculo_codeudor_uno" class="form-select">
                            <option value="{{ $solicitudCredito->vehiculo_codeudor_uno }}">
                                {{ $solicitudCredito->vehiculo_codeudor_uno }}</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                        <label for="vehiculo_codeudor_uno">Posee vehiculo?</label>
                    </div>
                    {{-- ! --}}
                    {{-- MARCA VEHICULO --}}
                    <div class="form-floating mb-3">
                        <input type="text" name="marca_vehiculo_codeudor_uno" placeholder="." class="form-control"
                            value="{{ $solicitudCredito->marca_vehiculo_codeudor_uno }}">
                        <label for="marca_vehiculo_codeudor_uno">Marca del vehiculo</label>
                    </div>
                    {{-- ! --}}
                    {{-- ESTADO CIVIL --}}
                    <div class="form-floating mb-3">
                        <select name="estado_civil_codeudor_uno" class="form-select">
                            <option value="{{ $solicitudCredito->estado_civil_codeudor_uno }}">
                                {{ $solicitudCredito->estado_civil_codeudor_uno }}</option>
                            <option value="Soltero">Soltero</option>
                            <option value="Casado">Casado</option>
                            <option value="En relacion">En relacion</option>
                            <option value="Union libre">Union libre</option>
                            <option value="Divorciado">Divorciado</option>
                        </select>
                        <label for="estado_civil_codeudor_uno">Estado civil</label>
                    </div>

                    {{-- ! --}}
                    {{-- NEGOCIO --}}
                    <div class="form-floating mb-3">
                        <input type="text" name="nombre_negocio_codeudor_uno" placeholder="." class="form-control"
                            value="{{ $solicitudCredito->nombre_negocio_codeudor_uno }}">
                        <label for="nombre_negocio_codeudor_uno">Negocio que posea</label>
                    </div>
                    {{-- ! --}}
                    {{-- DIRECCION --}}
                    <div class="form-floating mb-3">
                        <input type="text" name="direccion_negocio_codeudor_uno" placeholder="." class="form-control"
                            value="{{ $solicitudCredito->direccion_negocio_codeudor_uno }}">
                        <label for="direccion_negocio_codeudor_uno">Direccion del negocio</label>
                    </div>
                    {{-- ! --}}
                    <div class="row py-3">
                        {{-- VENTAS DIARIAS --}}
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="number" name="ventas_negocio_codeudor_uno" placeholder="."
                                    class="form-control" value="{{ $solicitudCredito->ventas_negocio_codeudor_uno }}">
                                <label for="ventas_negocio_codeudor_uno">Ventas diarias</label>
                            </div>
                        </div>
                        {{-- TIPO DE LOCAL --}}
                        <div class="col">
                            <div class="form-floating mb-3">
                                <select name="tipo_local_negocio_codeudor_uno" class="form-select">
                                    <option value="{{ $solicitudCredito->tipo_local_negocio_codeudor_uno }}">
                                        {{ $solicitudCredito->tipo_local_negocio_codeudor_uno }}</option>
                                    <option value="Propia">Propio</option>
                                    <option value="Alquilada">Alquilado</option>
                                </select>
                                <label for="tipo_local_negocio_codeudor_uno">Local</label>
                            </div>
                        </div>
                    </div>
                    {{-- ! --}}
                </div>
            </div>
            {{-- DATOS DEL CO-DEUDOR 2 --}}
            <div id="datos_codeudor_dos">
                <h2 class="text-center text-2xl font-extrabold" id="titulo-seccion">Datos del co-deudor 2</h2>
                <div class="row py-3">
                    {{-- ! --}}
                    {{-- NOMBRES --}}
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="text" name="nombres_codeudor_dos" placeholder="." class="form-control"
                                value="{{ $solicitudCredito->nombres_codeudor_dos }}">
                            <label for="nombres_codeudor_dos">Nombres</label>
                        </div>
                    </div>
                    {{-- APELLIDOS --}}
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="text" name="apellidos_codeudor_dos" placeholder="." class="form-control"
                                value="{{ $solicitudCredito->apellidos_codeudor_dos }}">
                            <label for="apellidos_codeudor_dos">Apellidos</label>
                        </div>
                    </div>
                </div>
                {{-- ! --}}
                {{-- NACIMIENTO --}}
                <div class="form-floating mb-3">
                    <input type="date" name="nacimiento_codeudor_dos" placeholder="." class="form-control"
                        value="{{ $solicitudCredito->nacimiento_codeudor_dos }}">
                    <label for="nacimiento_codeudor_dos">Nacimiento</label>
                </div>
                {{-- ! --}}
                {{-- DIRECCION --}}
                <div class="form-floating mb-3">
                    <input type="text" name="direccion_codeudor_dos" placeholder="." class="form-control"
                        value="{{ $solicitudCredito->direccion_codeudor_dos }}">
                    <label for="direccion_codeudor_dos">Direccion</label>
                </div>
                {{-- ! --}}
                {{-- REFERENCIA DE UBICACION --}}
                <div class="form-floating mb-3">
                    <input type="text" name="referencia_ubicacion_codeudor_dos" placeholder="." class="form-control"
                        value="{{ $solicitudCredito->referencia_ubicacion_codeudor_dos }}">
                    <label for="referencia_ubicacion_codeudor_dos">Referencia de ubicacion</label>
                </div>
                {{-- ! --}}
                <div class="row py-3">
                    {{-- TELEFONO --}}
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="tel" name="tel_residencial_codeudor_dos" placeholder="."
                                class="form-control" value="{{ $solicitudCredito->tel_residencial_codeudor_dos }}">
                            <label for="tel_residencial_codeudor_dos">Tel residencial</label>
                        </div>
                    </div>
                    {{-- CELULAR --}}
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="text" name="tel_celular_codeudor_dos" placeholder="." class="form-control"
                                value="{{ $solicitudCredito->tel_celular_codeudor_dos }}">
                            <label for="tel_celular_codeudor_dos">Tel celular</label>
                        </div>
                    </div>
                </div>
                {{-- ! --}}
                {{-- TIPO DE RESIDENCIA --}}
                <div class="form-floating mb-3">
                    <select name="tipo_vivienda_codeudor_dos" class="form-select">
                        <option value="{{ $solicitudCredito->tipo_vivienda_codeudor_dos }}">
                            {{ $solicitudCredito->tipo_vivienda_codeudor_dos }}</option>
                        <option value="Propia">Propia</option>
                        <option value="Alquilada">Alquilada</option>
                    </select>
                    <label for="tipo_vivienda_codeudor_dos">Residencia</label>
                </div>
                {{-- ! --}}
                <div class="row py-3">
                    {{-- MONTO DE PAGO DE ALQUILER --}}
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="number" name="monto_alquiler_codeudor_dos" placeholder="."
                                class="form-control" value="{{ $solicitudCredito->monto_alquiler_codeudor_dos }}">
                            <label for="monto_alquiler_codeudor_dos">Pago alquiler</label>
                        </div>
                    </div>
                    {{-- APODO --}}
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="text" name="apodo_codeudor_dos" placeholder="."
                                class="form-control" value="{{ $solicitudCredito->apodo_codeudor_dos }}">
                            <label for="apodo_codeudor_dos">Apodo</label>
                        </div>
                    </div>
                </div>
                {{-- ! --}}
                {{-- CEDULA O PASAPORTE --}}
                <div class="form-floating mb-3">
                    <input type="text" name="cedula_pasaporte_codeudor_dos" placeholder="." class="form-control"
                        value="{{ $solicitudCredito->cedula_pasaporte_codeudor_dos }}">
                    <label for="cedula_pasaporte_codeudor_dos">Cedula o pasaporte</label>
                </div>
                {{-- ! --}}
                {{-- OCUPACION --}}
                <div class="form-floating mb-3">
                    <input type="text" name="ocupacion_codeudor_dos" placeholder="." class="form-control"
                        value="{{ $solicitudCredito->ocupacion_codeudor_dos }}">
                    <label for="ocupacion_codeudor_dos">Ocupacion</label>
                </div>
                {{-- ! --}}
                {{-- POSEE VEHICULO? --}}
                <div class="form-floating mb-3">
                    <select name="vehiculo_codeudor_dos" class="form-select">
                        <option value="{{ $solicitudCredito->vehiculo_codeudor_dos }}">
                            {{ $solicitudCredito->vehiculo_codeudor_dos }}</option>
                        <option value="Si">Si</option>
                        <option value="No">No</option>
                    </select>
                    <label for="vehiculo_codeudor_dos">Posee vehiculo?</label>
                </div>
                {{-- ! --}}
                {{-- MARCA VEHICULO --}}
                <div class="form-floating mb-3">
                    <input type="text" name="marca_vehiculo_codeudor_dos" placeholder="." class="form-control"
                        value="{{ $solicitudCredito->marca_vehiculo_codeudor_dos }}">
                    <label for="marca_vehiculo_codeudor_dos">Marca del vehiculo</label>
                </div>
                {{-- ! --}}
                {{-- ESTADO CIVIL --}}
                <div class="form-floating mb-3">
                    <select name="estado_civil_codeudor_dos" class="form-select">
                        <option value="{{ $solicitudCredito->estado_civil_codeudor_dos }}">
                            {{ $solicitudCredito->estado_civil_codeudor_dos }}</option>
                        <option value="Soltero">Soltero</option>
                        <option value="Casado">Casado</option>
                        <option value="En relacion">En relacion</option>
                        <option value="Union libre">Union libre</option>
                        <option value="Divorciado">Divorciado</option>
                    </select>
                    <label for="estado_civil_codeudor_dos">Estado civil</label>
                </div>

                {{-- ! --}}
                {{-- NEGOCIO --}}
                <div class="form-floating mb-3">
                    <input type="text" name="nombre_negocio_codeudor_dos" placeholder="." class="form-control"
                        value="{{ $solicitudCredito->nombre_negocio_codeudor_dos }}">
                    <label for="nombre_negocio_codeudor_dos">Negocio que posea</label>
                </div>
                {{-- ! --}}
                {{-- DIRECCION --}}
                <div class="form-floating mb-3">
                    <input type="text" name="direccion_negocio_codeudor_dos" placeholder="." class="form-control"
                        value="{{ $solicitudCredito->direccion_negocio_codeudor_dos }}">
                    <label for="direccion_negocio_codeudor_dos">Direccion del negocio</label>
                </div>
                {{-- ! --}}
                <div class="row py-3">
                    {{-- VENTAS DIARIAS --}}
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="number" name="ventas_negocio_codeudor_dos" placeholder="."
                                class="form-control" value="{{ $solicitudCredito->ventas_negocio_codeudor_dos }}">
                            <label for="ventas_negocio_codeudor_dos">Ventas diarias</label>
                        </div>
                    </div>
                    {{-- TIPO DE LOCAL --}}
                    <div class="col">
                        <div class="form-floating mb-3">
                            <select name="tipo_local_negocio_codeudor_dos" class="form-select">
                                <option value="{{ $solicitudCredito->tipo_local_negocio_codeudor_dos }}">
                                    {{ $solicitudCredito->tipo_local_negocio_codeudor_dos }}</option>
                                <option value="Propia">Propio</option>
                                <option value="Alquilada">Alquilado</option>
                            </select>
                            <label for="tipo_local_negocio_codeudor_dos">Local</label>
                        </div>
                    </div>
                </div>
                {{-- ! --}}
            </div>
            <input type="submit" value="Editar Solicitud"
                class="btn bg-green-700 hover:bg-green-900 w-full text-white font-extrabold">
    </div>
    </form>
    </div>
@endsection
