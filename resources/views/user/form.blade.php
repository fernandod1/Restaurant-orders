<div class="box box-info padding-1">
    <div class="box-body">
        {{ Form::hidden('password_old', $user->password) }}
        <div class="form-group">
            {{ Form::label('Nombre') }}
            {{ Form::text('name', $user->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nombre', 'required' => 'required']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Contraseña') }}
            @php
            if((isset($op))&&($op=='edit'))
                echo Form::text('password', null, ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => 'Dejar vacío para mantener contraseña anterior']);
            else
                echo Form::text('password', $user->password, ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => 'Contraseña', 'required' => 'required']);
            @endphp
            {!! $errors->first('password', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Correo-e') }}
            {{ Form::text('email', $user->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Correo-e', 'required' => 'required']) }}
            {!! $errors->first('email', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Estado') }}
            {{ Form::select('active', array('1' => 'Cuenta activada', '0' => 'Cuenta desactivada'), null, ['class' => 'form-control' . ($errors->has('active') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione', 'required' => 'required'] ) }}
            {!! $errors->first('active', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Rol') }}
            {{ Form::select('role', array('0' => 'Administrador', '1' => 'Cajero', '2' => 'Cocinero'), null, ['class' => 'form-control' . ($errors->has('role') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione', 'required' => 'required'] ) }}
            {!! $errors->first('role', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</div>