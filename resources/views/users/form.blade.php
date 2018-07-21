{{ csrf_field() }}

<input class="form-control" type="text" name="name" value="{{ $user->name or old('name') }}" placeholder="Name">
{!! $errors->first('name','<span class="error">:message</span>') !!}
<br>
<input class="form-control" type="text" name="email" value="{{ $user->email or old('example@domain.com') }}" placeholder="Email">
{!! $errors->first('email','<span class="error">:message</span>') !!}
<br>

@unless ($user->id)

  <label for="password">Password</label>
  <input class="form-control" type="password" name="password" value="{{ $user->password  or old('') }}">
  {!! $errors->first('password','<span class="error">:message</span>') !!}
  <br>

  <label for="password">Password Confirmed</label>
  <input class="form-control" type="password" name="password_confirmation" value="{{ $user->password or old('') }}">
  {!! $errors->first('password_confirmation','<span class="error">:message</span>') !!}
  <br>


@endunless





@foreach ($roles as $id => $name)
  <input
    type="checkbox"
    name="roles[]"
    value="{{$id}}"
    {{ $user->roles->pluck('id')->contains($id) ? 'checked' : '' }}>

    {{$name}}
@endforeach
<br>
{!! $errors->first('roles','<span class="error">:message</span>') !!}


<br>
