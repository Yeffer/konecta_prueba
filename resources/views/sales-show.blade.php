@include('header');
<div class="container">
    <div class="card">
            <div class="card-header">LISTA VENTAS</div>
            <div class="card-body">            
            <table class='table table-hover table-striped'>                    
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Referencia</th>
                        <th>Peso Kg</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Categoría</th>
                        <th>Vendidos</th>
                    </tr>
                </thead>
                <tbody>                    
                    @forelse($sales as $sale)
                        <tr>
                            <td>{{ $sale->product->name }}</td>
                            <td>{{ $sale->product->reference }}</td>
                            <td>{{ $sale->product->weight }}</td>
                            <td>{{ $sale->product->stock }}</td>
                            <td>{{ $sale->product->price }}</td>
                            <td>{{ $sale->product->category->name }}</td>
                            <td>{{ $sale->quantity }}</td>
                        </tr>
                    @empty
                        <td>No hay registros para mostrar</td>			
                    @endforelse		
                </tbody>
            </table>
        </div>
        </div>
</div>
@include('footer');