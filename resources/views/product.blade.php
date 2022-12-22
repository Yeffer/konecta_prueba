@include('header');
<div class="container">
    <div class="card">
            <div class="card-header">LISTA PRODUCTOS</div>
            <div class="card-body">		
            <a href="/create">
                <button class='btn btn-primary btn-sm'>Nuevo Producto</button>
            </a>	
                <table class='table table-hover table-striped'>
                    
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Referencia</th>
                        <th>Peso Kg</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Categoría</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                        <tr @if($product->stock == 0) style="color:red" @endif>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->reference }}</td>
                            <td>{{ $product->weight }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>
                                @if($product->stock == 0)
                                    <a href="{{ route('create.edit', $product->id) }}" style="text-decoration:none;">
                                        <button class='btn btn-outline-warning'>
                                            <i class="fa-solid fa-arrow-up-from-bracket"></i>
                                        </button>
                                    </a>
                                @else 
                                    <a href="#" style="text-decoration:none;">
                                        <button class='btn btn-outline-success'>
                                            <i class="fa-regular fa-square-check"></i>
                                        </button>
                                    </a>
                                    <a href="{{ route('create.edit', $product->id) }}" style="text-decoration:none;">
                                        <button type="button" class="btn btn-outline-primary">
                                            <i class="fa-sharp fa-solid fa-pen-to-square"></i>
                                        </button>
                                    </a>
                                @endif
                                <a href="{{ route('create.delete', $product->id) }}" style="text-decoration:none;">
                                    <button type="button" class="btn btn-outline-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </a>
                            </td>
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