<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Correo de ejemplo</title>
    <style type="text/css">
        body,
        html,
        .body {
            background: #f3f3f3 !important;
        }

        .container.header {
            background: #f3f3f3;
        }

        .body-border {
            border-top: 8px solid #663399;
        }
    </style>
</head>

<body>
    <spacer size="16"></spacer>

    <container class="header">
        <row>
            <columns>
                <center>
                    <h1 class="text-center">Bienvenido a WashDogs</h1>
                </center>
            </columns>
        </row>
    </container>

    <container class="body-border">
        <row>
            <columns>

                <h4>Hola {{ $data['name'] }}!</h4>
                <p><strong>¡Bienvenido/a!</strong><br>
                    ¡Estamos encantados de tener a WashDogs como parte de nuestra comunidad!<br>
                    Esperamos que disfrutes de todos los beneficios que ofrecemos y encuentres todo lo que necesitas en
                    nuestra plataforma de servicios para mascotas.<br>
                    En WashDogs, nos esforzamos por brindarte la mejor experiencia y atención para ti y tus adorables
                    compañeros caninos.<br>
                    Si necesitas ayuda en algún momento o tienes alguna sugerencia para mejorar nuestros servicios, no dudes
                    en ponerte en contacto con nosotros. ¡Valoramos tu opinión!<br>
                    ¡Gracias por unirte a WashDogs y confiar en nosotros para el cuidado y bienestar de tus mascotas!<br>
                    ¡Te damos la bienvenida y esperamos poder atenderte pronto!
                </p>
                <center>
                    <menu>
                        <item><a href="mailto:ranseleg2212@gmail.com">Email</a></item>
                        <item><a href="tel:8297447031">829-799-3862</a></item>
                    </menu>
                </center>
            </columns>
        </row>
        <spacer size="16"></spacer>
    </container>
</body>

</html>
