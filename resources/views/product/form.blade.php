<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Categoría') }}
            @php
            if(isset($category)){
                foreach ($category as $one){
                    $categories["$one->id"] = $one->name;
                }
                echo Form::select('id_category', $categories, null, ['class' => 'form-control' . ($errors->has('id_category') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione', 'required' => 'required'] );
            }
            @endphp
            {!! $errors->first('id_category', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Nombre') }}
            {{ Form::text('name', $product->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nombre', 'required' => 'required']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Descripción') }}
            {{ Form::text('description', $product->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Descripción']) }}
            {!! $errors->first('description', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Precio') }}
            {{ Form::text('price', $product->price, ['class' => 'form-control' . ($errors->has('price') ? ' is-invalid' : ''), 'placeholder' => 'Precio', 'required' => 'required']) }}
            {!! $errors->first('price', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Stock') }}
            {{ Form::select('stock', array('1' => 'Sí disponible', '0' => 'No disponible'), null, ['class' => 'form-control' . ($errors->has('stock') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione', 'required' => 'required'] ) }}
            {!! $errors->first('stock', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</div>