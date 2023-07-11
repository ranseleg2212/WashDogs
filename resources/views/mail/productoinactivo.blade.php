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
            <h1>Producto Inactivo</h1>

            <spacer size="16"></spacer>

            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Disponible</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($inactivos as $product)
                    <tr>
                        <td style="text-align: center; border: 2px;">{{ $product['id'] }}</td>
                        <td style="text-align: center; border: 2px;">{{ $product['nombre'] }}</td>
                        <td style="text-align: center; border: 2px;">{{ $product['cantidad_disponible'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <hr />
            <p>Verifique la cantidad del producto, si es un error, cambie su estado a activo</p>
        </columns>
    </row>
</container>
{{-- FIN NUEVO EMAIL --}}
