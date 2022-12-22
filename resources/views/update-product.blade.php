
@include('header');    
<div class="container">
    <br>
    <div class="card">
        <div class="card-header">ACTULIZAR PRODUCTO</div>
        <div class="card-body">                    
            <form class="form-horizontal" method="POST" action="{{ route('create.update',  $products->id) }}">
                @csrf @method('PATCH')
                <div class="form-group row">
                    <label class="control-label col-sm-2" for="name">Nombre:</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" id="name" placeholder="Ingrese nombre" class="form-control" value="{{ $products->name }}">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="control-label col-sm-2" for="reference">Referencia:</label>
                    <div class="col-sm-10">
                        <input type="text" id="reference" placeholder="Ingrese referencia" name="reference" class="form-control" value="{{ $products->reference }}">  
                        @error('reference')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror                                  
                    </div>
                </div>

                <div class="form-group row">
                    <label class="control-label col-sm-2" for="price">Precio:</label>
                    <div class="col-sm-10">
                        <input type="number" id="price" placeholder="Ingrese precio" name="price" class="form-control" value="{{ $products->price }}">
                        @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="control-label col-sm-2" for="weight">Peso:</label>
                    <div class="col-sm-10">
                        <input type="number" id="weight" placeholder="Ingrese peso" name="weight" class="form-control" value="{{ $products->weight  }}">
                        @error('weight')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="control-label col-sm-2" for="category">Categoría:</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="category_id" name="category_id" aria-label="Default select example">
                        <option value="">Seleccione...</option> 
                            @forelse($categories as $category)
                                @if($products->category_id == $category->id)
			        				<option value="{{ $category->id}}" selected>{{ $category->name}}</option>
			        			@else
			                    	<option value="{{$category->id}}"> {{ $category->name }}</option>
			                	@endif                                
                            @empty
                                <option>No existen categorías.</option>
                            @endforelse  
                            </select>  
                            @error('category_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="control-label col-sm-2" for="category">Cantidad:</label>
                    <div class="col-sm-10">
                        <input type="number" id="stock" placeholder="Ingrese cantidad" name="stock" class="form-control" value="{{ $products->stock }}">   
                        @error('stock')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror                                 
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-outline-primary" id="registro">Actualizar</button>
                        <a href="{{ url()->previous() }}" style="text-decoration:none;">
                            <button type="button" class="btn btn-outline-dark" id="volver">Volver</button>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@include('footer');