<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Descripción</th>
            <th>Cantidad</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($invoices as $invoice)
            <tr>
                <td>{{ $stock->id_art }}</td>
                <td>{{ $stock->art_desc }}</td>
                <td>{{ $stock->cantidad }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
