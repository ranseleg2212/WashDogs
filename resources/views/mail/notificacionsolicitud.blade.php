<style type="text/css">
    body,
    html,
    .body {
        background: #f3f3f3 !important;
    }
</style>
<!-- move the above styles into your custom stylesheet -->

<spacer size="16"></spacer>

<container>

    <spacer size="16"></spacer>

    <row>
        <columns>
            <h1>Solicitud Nueva</h1>
            <p>Estaremos contactando contigo para dar seguimiento a tu solicitud</p>
            <spacer size="16"></spacer>
            <callout class="secondary">
                <row>
                    <columns large="6">
                        <p>
                            <strong>Solicitud #</strong><br />
                            {{ $sc->id }}
                        </p>
                        <p>
                            <strong>Nombre</strong><br />
                            {{ $sc->nombres_solicitante . ' ' . $sc->apellidos_solicitante }}
                        </p>
                        <p>
                            <strong>Email</strong><br />
                            {{ $sc->correo_solicitante }}
                        </p>
                    </columns>
                    <columns large="6">
                        <p>
                            <strong>Estado</strong><br />
                            {{ $sc->estado_solicitud }}
                        </p>
                        <p>
                            <strong>Direccion</strong><br />
                            {{ $sc->direccion_solicitante }}
                        </p>
                        <p>
                            <strong>Monto</strong><br />
                            RD$ {{ number_format($sc->monto_solicitado,2) }}
                        </p>
                    </columns>
                </row>
            </callout>
        </columns>
    </row>
    <row class="footer text-center">
        <columns large="3">
            <p>
                Llámanos: 829-799-3862<br />
                Nuestro email: marlenyshome1@gmail.com
            </p>
        </columns>
        <columns large="3">
            <p>
                Av.Hispanoamericana<br />
                Plaza Daite, módulo 308
            </p>
        </columns>
    </row>
</container>
