@extends('layouts.app')
@section('content')
    <div class=" bg-neutral-900 border border-gray-200 rounded-lg shadow dark:bg-white dark:border-gray-700 py-4 px-4">
        <h2 class="text-center text-2xl font-extrabold" id="titulo-seccion">Solitud de credito</h2>
        <form action="{{route('enviar_solicitud')}}">
            @csrf
            <div class="input-group py-1">
                <label for="solicitud_nr_slct" class="input-group-text bg-slate-600 text-white font-extrabold w-44">Solicitud de
                    credito</label>
                <select name="solicitud_nr_slct" id="" class="form-select">
                    <option value="Nueva">Nueva</option>
                    <option value="Renovada">Renovada</option>
                </select>
            </div>
            <div class="input-group py-1">
                <label for="monto_solicitado_txt" class="input-group-text bg-slate-600 text-white font-extrabold w-44">Monto Solicitado</label>
                <input type="text" name="monto_solicitado_txt" id="" class="form-control"
                    value="">
            </div>
            {{-- DATOS DEL SOLICITANTE --}}
            <div id="datos_personales_solicitante">
                <h2 class="text-center text-2xl font-extrabold" id="titulo-seccion">Datos del solicitante</h2>
                {{-- ! --}}
                <div class="row py-3">
                    {{-- NOMBRE --}}
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input name="nombre_txt" type="text" class="form-control" placeholder=".">
                            <label for="nombre_txt">Nombres</label>
                        </div>
                    </div>
                    {{-- APELLIDOS --}}
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input name="apellido_txt" type="text" class="form-control" placeholder=".">
                            <label for="apellido_txt">Apellidos</label>
                        </div>
                    </div>
                </div>
                {{-- ! --}}
                <div class="row py-3">
                    {{-- OCUPACION --}}
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input name="ocupacion_txt" type="text" class="form-control" placeholder=".">
                            <label for="ocupacion_txt">Ocupacion</label>
                        </div>
                    </div>
                    {{-- NACIMIENTO --}}
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input name="nacimiento_date" type="date" class="form-control" placeholder=".">
                            <label for="nacimiento_date">Fecha de nacimiento</label>
                        </div>
                    </div>
                </div>
                {{-- ! --}}
                <div class="row py-3">
                    {{-- DIRECCION --}}
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input name="direccion_txt" type="text" class="form-control" placeholder=".">
                            <label for="direccion_txt">Direccion</label>
                        </div>
                    </div>
                    {{-- TELEFONO --}}
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="tel" name="telefono_txt" class="form-control" placeholder=".">
                            <label for="telefono_txt">Telefono</label>
                        </div>
                    </div>
                </div>
                {{-- ! --}}
                {{-- REFERENCIA DE UBICACION --}}
                <div class="form-floating mb-3">
                    <input type="text" name="referencia_ubicacion_txt" class="form-control" placeholder=".">
                    <label for="referencia_ubicacion_txt">Referencia de ubicacion</label>
                </div>
                {{-- ! --}}
                <div class="row py-3">
                    {{-- CELULAR --}}
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="tel" name="celular_txt" class="form-control" placeholder=".">
                            <label for="celular_txt">Celular</label>
                        </div>
                    </div>
                    {{-- MONTO DE PAGO DE ALQUILER --}}
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="number" name="pago_alquiler_txt" class="form-control" placeholder=".">
                            <label for="pago_alquiler_txt">Monto de pago alquiler</label>
                        </div>
                    </div>
                </div>
                {{-- ! --}}
                {{-- TIPO DE VIVIENDA --}}
                <div class="form-floating mb-3">
                    <select name="tipo_vivienda_slct" class="form-select">
                        <option value="Propia">Propia</option>
                        <option value="Alquilada">Alquilada</option>
                    </select>
                    <label for="tipo_vivienda_slct">Residencia</label>
                </div>
                {{-- ! --}}
                <div class="row py-3">
                    {{-- APODO --}}
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="text" name="apodo_txt" class="form-control" placeholder=".">
                            <label for="apodo_txt">Apodo</label>
                        </div>
                    </div>
                    {{-- ESTADO CIVIL --}}
                    <div class="col">
                        <div class="form-floating mb-3">
                            <select name="estado_civil_slct" id="" class="form-select">
                                <option value="Soltero/a">Soltero/a</option>
                                <option value="Casado/a">Casado/a</option>
                                <option value="Union libre">Union libre</option>
                                <option value="En relacion">En relacion</option>
                            </select>
                            <label for="estado_civil_slct">Estado civil</label>
                        </div>
                    </div>
                </div>
                {{-- ! --}}
                {{-- CEDULA O PASAPORTE --}}
                <div class="form-floating mb-3">
                    <input type="text" name="cedula_pasaporte_txt" class="form-control" placeholder=".">
                    <label for="cedula_pasaporte_txt">Cedula o pasaporte</label>
                </div>
                {{-- ! --}}
                {{-- VEHICULO --}}
                <div class="form-floating mb-3">
                    <select name="vehiculo_slct" id="" class="form-select">
                        <option value="Si">Si</option>
                        <option value="No">No</option>
                    </select>
                    <label for="vehiculo_slct">Posee vehiculo?</label>
                </div>
                {{-- ! --}}
                {{-- MARCA DE VEHICULO --}}
                <div class="form-floating mb-3">
                    <input type="text" name="marca_vehiculo_txt" class="form-control" placeholder=".">
                    <label for="marca_vehiculo_txt">Marca del vehiculo</label>
                </div>
                {{-- ! --}}
                {{-- CORREO --}}
                <div class="form-floating mb-3">
                    <input type="email" name="email_txt" class="form-control" placeholder=".">
                    <label for="email_txt">Correo</label>
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
                            <input type="text" name="nombre_negocio_txt" class="form-control" placeholder=".">
                            <label for="nombre_negocio_txt">Nombre</label>
                        </div>
                    </div>
                    {{-- TELEFONO --}}
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="tel" name="telefono_negocio_txt" class="form-control" placeholder=".">
                            <label for="telefono_negocio_txt">Telefono</label>
                        </div>
                    </div>
                </div>
                {{-- ! --}}
                <div class="row py-3">
                    {{-- TIPO DE GARANTIA --}}
                    <div class="col">
                        <div class="form-floating mb-3">
                            <select name="tipo_garantia_slct" class="form-select">
                                <option value="Matricula">Matricula</option>
                                <option value="Co-deudor">Co-deudor</option>
                            </select>
                            <label for="tipo_garantia_slct">Tipo de garantia</label>
                        </div>
                    </div>
                </div>
                {{-- ! --}}
                {{-- DIRECCION --}}
                <div class="form-floating mb-3">
                    <input type="text" name="direccion_negocio_txt" class="form-control" placeholder=".">
                    <label for="direccion_negocio_txt">Direccion</label>
                </div>
                {{-- ! --}}
                {{-- CANTIDAD DE EMPLEADOS --}}
                <div class="form-floating mb-3">
                    <input type="number" name="cantidad_empleados_txt" class="form-control" placeholder=".">
                    <label for="cantidad_empleados_txt">Cantidad de empleados</label>
                </div>
                {{-- ! --}}
                {{-- MONTO DE PAGO DE ALQUILER --}}
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="number" name="monto_pago_alquiler_local_txt" class="form-control" placeholder=".">
                        <label for="monto_pago_alquiler_local_txt">Monto de pago de alquiler</label>
                    </div>
                    {{-- ! --}}
                    {{-- TIPO DE LOCAL --}}
                    <div class="form-floating mb-3">
                        <select name="tipo_local_slct" class="form-control">
                            <option value="Alquilado">Alquilado</option>
                            <option value="Propio">Propio</option>
                        </select>
                        <label for="tipo_local_slct">Local</label>
                    </div>
                    {{-- ! --}}
                    {{-- TIEMPO DEL NEGOCIO --}}
                    <div class="form-floating mb-3">
                        <input type="text" name="tiempo_negocio_txt" class="form-control" placeholder=".">
                        <label for="tiempo_negocio_txt">Tiempo del negocio</label>
                    </div>
                    {{-- ! --}}
                    {{-- VENTAS DIARIAS --}}
                    <div class="form-floating mb-3">
                        <input type="number" name="ventas_diarias_txt" class="form-control" placeholder=".">
                        <label for="ventas_diarias_txt">Volumen de ventas diarias</label>
                    </div>
                    {{-- OTRO NEGOCIO QUE POSEA --}}
                    <div class="form-floating mb-3">
                        <input type="text" name="otro_negocio_txt" class="form-control" placeholder=".">
                        <label for="otro_negocio_txt">Otro negocio que posea</label>
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
                                <input type="text" name="nombre_empresa_txt" id="" class="form-control"
                                    placeholder=".">
                                <label for="nombre_empresa_txt">Empresa</label>
                            </div>
                        </div>
                        {{-- TIPO DE EMPRESA --}}
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" name="tipo_empresa_txt" id="" class="form-control"
                                    placeholder=".">
                                <label for="tipo_empresa_txt">Tipo</label>
                            </div>
                        </div>
                    </div>
                    {{-- ! --}}
                    {{-- DIRECCION --}}
                    <div class="form-floating mb-3">
                        <input type="text" name="direccion_empresa_txt" class="form-control" placeholder=".">
                        <label for="direccion_empresa_txt">Direccion</label>
                    </div>

                    {{-- ! --}}
                    {{-- TELEFONOS --}}
                    <div class="form-floating mb-3">
                        <input type="text" name="telefonos_empresa_txt" class="form-control" placeholder=".">
                        <label for="telefonos_empresa_txt">Telefonos</label>
                    </div>

                    {{-- ! --}}
                    <div class="row py-3">
                        {{-- CARGO --}}
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" name="cargo_empresa_txt" placeholder="." class="form-control">
                                <label for="cargo_empresa_txt">Cargo</label>
                            </div>
                        </div>
                        {{-- SALARIO --}}
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="number" name="salario_txt" placeholder="." class="form-control">
                                <label for="salario_txt">Salario</label>
                            </div>
                        </div>
                    </div>
                    {{-- ! --}}
                    {{-- TIEMPO LABORANDO --}}
                    <div class="form-floating mb-3">
                        <input type="text" name="tiempo_laborando_txt" placeholder="." class="form-control">
                        <label for="tiempo_laborando_txt">Tiempo laborando</label>
                    </div>
                    {{-- ! --}}
                    {{-- NOMBRE DEL JEFE --}}
                    <div class="form-floating mb-3">
                        <input type="text" name="nombre_jefe_txt" placeholder="." class="form-control">
                        <label for="nombre_jefe_txt">Nombre del jefe inmediato</label>
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
                                <input type="text" name="nombre_conyugue_txt" placeholder="." class="form-control">
                                <label for="nombre_conyugue_txt">Nombres</label>
                            </div>
                        </div>
                        {{-- APELLIDOS --}}
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" name="apellido_conyugue_txt" placeholder="." class="form-control">
                                <label for="apellido_conyugue_txt">Apellidos</label>
                            </div>
                        </div>
                    </div>
                    {{-- ! --}}
                    {{-- CEDULA --}}
                    <div class="form-floating mb-3">
                        <input type="text" name="cedula_conyugue_txt" placeholder="." class="form-control">
                        <label for="cedula_conyugue_txt">Cedula</label>
                    </div>
                    {{-- ! --}}
                    {{-- LUGAR DE TRABAJO --}}
                    <div class="form-floating mb-3">
                        <input type="text" name="trabajo_conyugue_txt" placeholder="." class="form-control">
                        <label for="trabajo_conyugue_txt">Lugar de trabajo</label>
                    </div>
                    {{-- ! --}}
                    {{-- DIRECCION DE TRABAJO --}}
                    <div class="form-floating mb-3">
                        <input type="text" name="direccion_trabajo_conyugue_txt" placeholder="."
                            class="form-control">
                        <label for="direccion_trabajo_conyugue_txt">Direccion del trabajo</label>
                    </div>
                    {{-- ! --}}
                    {{-- DIRECCION RESIDENCIAL --}}

                    <div class="form-floating mb-3">
                        <input type="text" name="direccion_conyugue_txt" placeholder="." class="form-control">
                        <label for="direccion_conyugue_txt">Direccion residencial</label>
                    </div>

                    {{-- ! --}}
                    <div class="row py-3">
                        {{-- TELEFONOS DEL TRABAJO --}}
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" name="telefonos_trabajo_conyugue_txt" placeholder="."
                                    class="form-control">
                                <label for="telefonos_trabajo_conyugue_txt">Tel trabajo</label>
                            </div>
                        </div>
                        {{-- CELULAR --}}
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" name="celular_conyugue_txt" placeholder="." class="form-control">
                                <label for="celular_conyugue_txt">Tel celular</label>
                            </div>
                        </div>
                    </div>
                    {{-- ! --}}
                    {{-- INGRESOS --}}
                    <div class="form-floating mb-3">
                        <input type="text" name="ingresos_conyugue_txt" placeholder="." class="form-control">
                        <label for="ingresos_conyugue_txt">Ingresos</label>
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
                                    <input type="text" name="nombre_apellido_familiar_uno_txt" id=""
                                        class="form-control">
                                </td>
                                <td class="border">
                                    <input type="text" name="nombre_apellido_familiar_dos_txt" id=""
                                        class="form-control">
                                </td>
                            </tr>
                            {{-- PARENTESCO --}}
                            <tr>
                                <td class="border">
                                    <p class="text-center font-extrabold">Parentesco</p>
                                </td>
                                <td>
                                    <input type="text" name="parentesco_familiar_uno_txt" id=""
                                        class="form-control">
                                </td>
                                <td class="border">
                                    <input type="text" name="parentesco_familiar_dos_txt" id=""
                                        class="form-control">
                                </td>
                            </tr>
                            {{-- TELEFONO --}}
                            <tr>
                                <td class="border">
                                    <p class="text-center font-extrabold">Tel</p>
                                </td>
                                <td class="border">
                                    <input type="tel" name="telefono_familiar_uno_txt" id=""
                                        class="form-control w-full">
                                </td>
                                <td class="border">
                                    <input type="tel" name="telefono_familiar_dos_txt" id=""
                                        class="form-control">
                                </td>
                            </tr>
                            {{-- DIRECCION --}}
                            <tr>
                                <td class="border">
                                    <p class="text-center font-extrabold">Direccion</p>
                                </td>
                                <td class="border">
                                    <input type="text" name="direccion_familiar_uno_txt" id=""
                                        class="form-control">
                                </td>
                                <td class="border">
                                    <input type="text" name="direccion_familiar_dos_txt" id=""
                                        class="form-control">
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
                                <input type="text" name="nombres_codeudor_uno_txt" placeholder="."
                                    class="form-control">
                                <label for="nombres_codeudor_uno_txt">Nombres</label>
                            </div>
                        </div>
                        {{-- APELLIDOS --}}
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" name="apellidos_codeudor_uno_txt" placeholder="."
                                    class="form-control">
                                <label for="apellidos_codeudor_uno_txt">Apellidos</label>
                            </div>
                        </div>
                    </div>
                    {{-- ! --}}
                    {{-- NACIMIENTO --}}
                    <div class="form-floating mb-3">
                        <input type="date" name="nacimiento_codeudor_uno_date" placeholder="." class="form-control">
                        <label for="nacimiento_codeudor_uno_date">Nacimiento</label>
                    </div>
                    {{-- ! --}}
                    {{-- DIRECCION --}}
                    <div class="form-floating mb-3">
                        <input type="text" name="direccion_codeudor_uno_txt" placeholder="." class="form-control">
                        <label for="direccion_codeudor_uno_txt">Direccion</label>
                    </div>
                    {{-- ! --}}
                    {{-- REFERENCIA DE UBICACION --}}
                    <div class="form-floating mb-3">
                        <input type="text" name="referencia_ubicacion_codeudor_uno_txt" placeholder="."
                            class="form-control">
                        <label for="referencia_ubicacion_codeudor_uno_txt">Referencia de ubicacion</label>
                    </div>
                    {{-- ! --}}
                    <div class="row py-3">
                        {{-- TELEFONO --}}
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="tel" name="telefono_codeudor_uno_txt" placeholder="."
                                    class="form-control">
                                <label for="telefono_codeudor_uno_txt">Tel residencial</label>
                            </div>
                        </div>
                        {{-- CELULAR --}}
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" name="celular_codeudor_uno_txt" placeholder="."
                                    class="form-control">
                                <label for="celular_codeudor_uno_txt">Tel celular</label>
                            </div>
                        </div>
                    </div>
                    {{-- ! --}}
                    {{-- TIPO DE RESIDENCIA --}}
                    <div class="form-floating mb-3">
                        <select name="tipo_vivienda_codeudor_uno_txt" class="form-select" wireModel="ola">
                            <option value="Propia">Propia</option>
                            <option value="Alquilada">Alquilada</option>
                        </select>
                        <label for="tipo_vivienda_codeudor_uno_txt">Residencia</label>
                    </div>
                    {{-- ! --}}
                    <div class="row py-3">
                        {{-- MONTO DE PAGO DE ALQUILER --}}
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="number" name="pago_alquiler_codeudor_uno_txt" placeholder="."
                                    class="form-control">
                                <label for="pago_alquiler_codeudor_uno_txt">Pago alquiler</label>
                            </div>
                        </div>
                        {{-- APODO --}}
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" name="apodo_codeudor_uno_txt" placeholder="."
                                    class="form-control">
                                <label for="apodo_codeudor_uno_txt">Apodo</label>
                            </div>
                        </div>
                    </div>
                    {{-- ! --}}
                    {{-- CEDULA O PASAPORTE --}}
                    <div class="form-floating mb-3">
                        <input type="text" name="cedula_codeudor_uno_txt" placeholder="." class="form-control">
                        <label for="cedula_codeudor_uno_txt">Cedula o pasaporte</label>
                    </div>
                    {{-- ! --}}
                    {{-- OCUPACION --}}
                    <div class="form-floating mb-3">
                        <input type="text" name="ocupacion_codeudor_uno_txt" placeholder="." class="form-control">
                        <label for="ocupacion_codeudor_uno_txt">Ocupacion</label>
                    </div>
                    {{-- ! --}}
                    {{-- POSEE VEHICULO? --}}
                    <div class="form-floating mb-3">
                        <select name="vehiculo_codeudor_uno_slct" class="form-select">
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                        <label for="vehiculo_codeudor_uno_slct">Posee vehiculo?</label>
                    </div>
                    {{-- ! --}}
                    {{-- MARCA VEHICULO --}}
                    <div class="form-floating mb-3">
                        <input type="text" name="marca_vehiculo_codeudor_uno_txt" placeholder="."
                            class="form-control">
                        <label for="marca_vehiculo_codeudor_uno_txt">Marca del vehiculo</label>
                    </div>
                    {{-- ! --}}
                    {{-- ESTADO CIVIL --}}
                    <div class="form-floating mb-3">
                        <select name="estado_civil_codeudor_uno_slct" class="form-select">
                            <option value="Soltero">Soltero</option>
                            <option value="Casado">Casado</option>
                            <option value="En relacion">En relacion</option>
                            <option value="Union libre">Union libre</option>
                            <option value="Divorciado">Divorciado</option>
                        </select>
                        <label for="estado_civil_codeudor_uno_slct">Estado civil</label>
                    </div>

                    {{-- ! --}}
                    {{-- NEGOCIO --}}
                    <div class="form-floating mb-3">
                        <input type="text" name="negocio_codeudor_uno_txt" placeholder="." class="form-control">
                        <label for="negocio_codeudor_uno_txt">Negocio que posea</label>
                    </div>
                    {{-- ! --}}
                    {{-- DIRECCION --}}
                    <div class="form-floating mb-3">
                        <input type="text" name="direccion_negocio_codeudor_uno_txt" placeholder="."
                            class="form-control">
                        <label for="direccion_negocio_codeudor_uno_txt">Direccion del negocio</label>
                    </div>
                    {{-- ! --}}
                    <div class="row py-3">
                        {{-- VENTAS DIARIAS --}}
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="number" name="ventas_diarias_codeudor_uno_txt" placeholder="."
                                    class="form-control">
                                <label for="ventas_diarias_codeudor_uno_txt">Ventas diarias</label>
                            </div>
                        </div>
                        {{-- TIPO DE LOCAL --}}
                        <div class="col">
                            <div class="form-floating mb-3">
                                <select name="tipo_local_codeudor_uno_txt" class="form-select">
                                    <option value="Propia">Propio</option>
                                    <option value="Alquilada">Alquilado</option>
                                </select>
                                <label for="tipo_local_codeudor_uno_txt">Local</label>
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
                            <input type="text" name="nombres_codeudor_dos_txt" placeholder="." class="form-control">
                            <label for="nombres_codeudor_dos_txt">Nombres</label>
                        </div>
                    </div>
                    {{-- APELLIDOS --}}
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="text" name="apellidos_codeudor_dos_txt" placeholder="."
                                class="form-control">
                            <label for="apellidos_codeudor_dos_txt">Apellidos</label>
                        </div>
                    </div>
                </div>
                {{-- ! --}}
                {{-- NACIMIENTO --}}
                <div class="form-floating mb-3">
                    <input type="date" name="nacimiento_codeudor_dos_date" placeholder="." class="form-control">
                    <label for="nacimiento_codeudor_dos_date">Nacimiento</label>
                </div>
                {{-- ! --}}
                {{-- DIRECCION --}}
                <div class="form-floating mb-3">
                    <input type="text" name="direccion_codeudor_dos_txt" placeholder="." class="form-control">
                    <label for="direccion_codeudor_dos_txt">Direccion</label>
                </div>
                {{-- ! --}}
                {{-- REFERENCIA DE UBICACION --}}
                <div class="form-floating mb-3">
                    <input type="text" name="referencia_ubicacion_codeudor_dos_txt" placeholder="."
                        class="form-control">
                    <label for="referencia_ubicacion_codeudor_dos_txt">Referencia de ubicacion</label>
                </div>
                {{-- ! --}}
                <div class="row py-3">
                    {{-- TELEFONO --}}
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="tel" name="telefono_codeudor_dos_txt" placeholder="." class="form-control">
                            <label for="telefono_codeudor_dos_txt">Tel residencial</label>
                        </div>
                    </div>
                    {{-- CELULAR --}}
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="text" name="celular_codeudor_dos_txt" placeholder="." class="form-control">
                            <label for="celular_codeudor_dos_txt">Tel celular</label>
                        </div>
                    </div>
                </div>
                {{-- ! --}}
                {{-- TIPO DE RESIDENCIA --}}
                <div class="form-floating mb-3">
                    <select name="tipo_vivienda_codeudor_dos_txt" class="form-select" wireModel="ola">
                        <option value="Propia">Propia</option>
                        <option value="Alquilada">Alquilada</option>
                    </select>
                    <label for="tipo_vivienda_codeudor_dos_txt">Residencia</label>
                </div>
                {{-- ! --}}
                <div class="row py-3">
                    {{-- MONTO DE PAGO DE ALQUILER --}}
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="number" name="pago_alquiler_codeudor_dos_txt" placeholder="."
                                class="form-control">
                            <label for="pago_alquiler_codeudor_dos_txt">Pago alquiler</label>
                        </div>
                    </div>
                    {{-- APODO --}}
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="text" name="apodo_codeudor_dos_txt" placeholder="." class="form-control">
                            <label for="apodo_codeudor_dos_txt">Apodo</label>
                        </div>
                    </div>
                </div>
                {{-- ! --}}
                {{-- CEDULA O PASAPORTE --}}
                <div class="form-floating mb-3">
                    <input type="text" name="cedula_codeudor_dos_txt" placeholder="." class="form-control">
                    <label for="cedula_codeudor_dos_txt">Cedula o pasaporte</label>
                </div>
                {{-- ! --}}
                {{-- OCUPACION --}}
                <div class="form-floating mb-3">
                    <input type="text" name="ocupacion_codeudor_dos_txt" placeholder="." class="form-control">
                    <label for="ocupacion_codeudor_dos_txt">Ocupacion</label>
                </div>
                {{-- ! --}}
                {{-- POSEE VEHICULO? --}}
                <div class="form-floating mb-3">
                    <select name="vehiculo_codeudor_dos_slct" class="form-select">
                        <option value="Si">Si</option>
                        <option value="No">No</option>
                    </select>
                    <label for="vehiculo_codeudor_dos_slct">Posee vehiculo?</label>
                </div>
                {{-- ! --}}
                {{-- MARCA VEHICULO --}}
                <div class="form-floating mb-3">
                    <input type="text" name="marca_vehiculo_codeudor_dos_txt" placeholder="." class="form-control">
                    <label for="marca_vehiculo_codeudor_dos_txt">Marca del vehiculo</label>
                </div>
                {{-- ! --}}
                {{-- ESTADO CIVIL --}}
                <div class="form-floating mb-3">
                    <select name="estado_civil_codeudor_dos_slct" class="form-select">
                        <option value="Soltero">Soltero</option>
                        <option value="Casado">Casado</option>
                        <option value="En relacion">En relacion</option>
                        <option value="Union libre">Union libre</option>
                        <option value="Divorciado">Divorciado</option>
                    </select>
                    <label for="estado_civil_codeudor_dos_slct">Estado civil</label>
                </div>

                {{-- ! --}}
                {{-- NEGOCIO --}}
                <div class="form-floating mb-3">
                    <input type="text" name="negocio_codeudor_dos_txt" placeholder="." class="form-control">
                    <label for="negocio_codeudor_dos_txt">Negocio que posea</label>
                </div>
                {{-- ! --}}
                {{-- DIRECCION --}}
                <div class="form-floating mb-3">
                    <input type="text" name="direccion_negocio_codeudor_dos_txt" placeholder="."
                        class="form-control">
                    <label for="direccion_negocio_codeudor_dos_txt">Direccion del negocio</label>
                </div>
                {{-- ! --}}
                <div class="row py-3">
                    {{-- VENTAS DIARIAS --}}
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="number" name="ventas_diarias_codeudor_dos_txt" placeholder="."
                                class="form-control">
                            <label for="ventas_diarias_codeudor_dos_txt">Ventas diarias</label>
                        </div>
                    </div>
                    {{-- TIPO DE LOCAL --}}
                    <div class="col">
                        <div class="form-floating mb-3">
                            <select name="tipo_local_codeudor_dos_txt" class="form-select">
                                <option value="Propia">Propio</option>
                                <option value="Alquilada">Alquilado</option>
                            </select>
                            <label for="tipo_local_codeudor_dos_txt">Local</label>
                        </div>
                    </div>
                </div>
                {{-- ! --}}
            </div>
            <input type="submit" value="Enviar solicitud"
                class="btn bg-orange-600 w-full text-white font-extrabold hover:bg-orange-700">
    </div>
    </form>
    </div>
@endsection
