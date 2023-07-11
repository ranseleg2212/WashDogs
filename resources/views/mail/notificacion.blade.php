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

    th, td {
        border: 2px solid black;
        text-align: center;
        padding: 10px;
    }
</style>
<!-- move the above styles into your custom stylesheet -->

<spacer size="16"></spacer>

<container>

    <spacer size="16"></spacer>

    <row>
        <columns>
            <h1>Gracias por tu compra</h1>
            <p>¡Muchas gracias por su compra! Apreciamos mucho su confianza en nosotros.
                Estamos a su disposición para cualquier pregunta o
                problema que pueda surgir. ¡Gracias de nuevo!</p>

            <spacer size="16"></spacer>

            <callout class="secondary">
                <row>
                    <columns large="6">
                        <p>
                            <strong>Nombre</strong><br />
                            {{$order->name}}
                        </p>
                        <p>
                            <strong>Correo electrónico</strong><br />
                            {{$order->email}}
                        </p>
                        <p>
                            <strong>Id del pedido</strong><br />
                            {{$order->id}}
                        </p>
                    </columns>
                    <columns large="6">
                        <p>
                            <strong>Dirección</strong><br />
                            {{$order->address}}
                        </p>
                    </columns>
                </row>
            </callout>

            <h4>Detalles del pedido</h4>

            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->shoppingCart->products as $product)
                    <tr>
                        <td style="text-align: center; border: 2px">{{ $product->name }}</td>
                        <td style="text-align: center; border: 2px">RD${{ number_format($product->precio_oferta, 2) }}</td>
                        <td style="text-align: center; border: 2px">{{$product->pivot->cantidad}}</td>
                        <td style="text-align: center; border: 2px">{{$product->pivot->cantidad * $product->precio_oferta}}</td>
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
{{-- FIN NUEVO EMAIL --}}
