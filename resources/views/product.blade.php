@include('header');
<div class="container">
    <div>
            <div class="card-header">LISTA PRODUCTOS</div>
            <div class="card-body">		
            <a href="/create" style="text-decoration:none;">
                <button class='btn btn-outline-primary'>Nuevo Producto</button>
            </a>	
            <a href="/sales" style="text-decoration:none;">
                <button class='btn btn-outline-success'>Ventas realizadas</button>
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
                                        <button class='btn btn-outline-warning' data-bs-toggle="tooltip" data-bs-html="true" title="Agregar">
                                            <i class="fa-solid fa-arrow-up-from-bracket"></i>
                                        </button>
                                    </a>
                                @else 
                                    <a href="{{ route('sales.edit', $product->id) }}" style="text-decoration:none;" data-bs-toggle="tooltip" data-bs-html="true" title="Vender">
                                        <button class='btn btn-outline-success'>
                                            <i class="fas fa-cart-arrow-down"></i>
                                        </button>
                                    </a>
                                    <a href="{{ route('create.edit', $product->id) }}" style="text-decoration:none;">
                                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="tooltip" data-bs-html="true" title="Editar">
                                            <i class="fa-sharp fa-solid fa-pen-to-square"></i>
                                        </button>
                                    </a>
                                @endif
                                <a href="{{ route('create.delete', $product->id) }}" style="text-decoration:none;">
                                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="tooltip" data-bs-html="true" title="Eliminar">
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
            <nav aria-label="Page navigation example">
                <ul class="pagination">                    
                    <li class="page-item">{{ $products->links() }}</li>                    
                </ul>
            </nav>
        </div>
        </div>
</div>
@include('footer');