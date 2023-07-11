{{-- INICIO NUEVO EMAIL --}}
<style type="text/css">
    body,
    html,
    .body {
        background: #f3f3f3 !important;
    }
</style>
<style>
    table {
        border-collapse: collapse;
        margin: auto;
    }

    th,
    td {
        border: 2px solid black;
        text-align: center;
        padding: 10px;
    }
</style>

<spacer size="16"></spacer>

<container>

    <spacer size="16"></spacer>

    <row>
        <columns>
            <h1>¡Gracias por preferirnos!</h1>
            <p>¡Muchas gracias por su compra! Apreciamos mucho su confianza en WashDogs y en nuestros servicios para
                mascotas.</p>
            <p>Estamos aquí para atender cualquier pregunta o problema que pueda surgir. No dude en ponerse en contacto
                con nuestro equipo de atención al cliente.</p>
            <p>¡Gracias nuevamente por elegirnos como su opción de cuidado y bienestar para sus queridas mascotas!</p>

            <spacer size="16"></spacer>

            <callout class="secondary">
                <row>
                    <columns large="6">
                        <p>
                            <strong>Nombre</strong><br />
                            {{ $user->name }}
                        </p>
                        <p>
                            <strong>Telefono</strong><br />
                            {{ $user->telefono }}
                        </p>
                        <p>
                            <strong>Cedula</strong><br />
                            {{ $user->cedula }}
                        </p>
                        <p>
                            <strong>Correo electrónico</strong><br />
                            {{ $user->email }}
                        </p>
                        <p>
                            <strong>Mascota</strong><br />
                            {{ $mascota->nombre }}
                        </p>
                        <p>
                            <strong>Id del pedido</strong><br />
                            {{ $order->id }}
                        </p>
                    </columns>
                </row>
            </callout>

            <h4>Detalles del pedido</h4>

            <table style="border: 2px;">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->shoppingCart->products as $product)
                    <tr>
                        <td style="text-align: center">{{ $product->name }}</td>
                        <td style="text-align: center">RD${{ number_format($product->precio_oferta, 2) }}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td><b>Total:</b></td>
                        <td>RD${{ number_format($order->total, 2) }}</td>
                    </tr>
                </tbody>
            </table>

            <hr />

            <h4>Qué sigue?</h4>

            <p>Nuestro equipo estará trabajando en tu pedido, puedes cosultar el estado de la orden en el apartado de
                compras en nuestra web</p>
        </columns>
    </row>
    <row class="footer text-center">
        <columns large="3">
            <p>
                Llámanos: 829-744-7031<br />
                Nuestro email: ranseleg2212@gmail.com
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
{{-- FIN NUEVO EMAIL --}}
