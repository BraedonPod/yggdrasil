@extends('auth.account.index', ['tab' => 'profile'])

@section('main_content')
  <div class="card">
    <div class="card-body">
      <h1>Account Settings</h1>
      <hr class="my-4">

      {!! Form::model($user, ['method' => 'PATCH', 'route' => ['users.update', $user]]) !!}

        <div class="form-group row">
          {!! Form::label('username', __('users.attributes.username'), ['class' => 'col-sm-2 col-form-label']) !!}

          <div class="col-sm-5">
            {!! Form::text('username', null, ['class' => 'form-control' . ($errors->has('username') ? ' is-invalid' : ''), 'placeholder' => __('users.placeholder.username'), 'required']) !!}

            @if ($errors->has('username'))
                <span class="invalid-feedback">{{ $errors->first('username') }}</span>
            @endif
          </div>
        </div>

        <div class="form-group row">
          {!! Form::label('email', __('users.attributes.email'), ['class' => 'col-sm-2 col-form-label']) !!}

          <div class="col-sm-5">
            {!! Form::text('email', null, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => __('users.placeholder.email'), 'required']) !!}

            @if ($errors->has('email'))
                <span class="invalid-feedback">{{ $errors->first('email') }}</span>
            @endif
          </div>
        </div>

        <div class="form-group offset-sm-2">
          {!! Form::submit(__('forms.actions.save'), ['class' => 'btn btn-success']) !!}
        </div>

      {!! Form::close() !!}
    </div>
  </div>
@endsection