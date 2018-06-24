@if(auth()->guest())
{
  <input class="form-control" type="text" name="name" value="{{ old('name') }}" placeholder="Name">
  {!! $errors->first('name','<span class="error">:message</span>') !!}
  <br>
  <input class="form-control" type="text" name="email" value="{{ old('email') }}" placeholder="Email">
  {!! $errors->first('email','<span class="error">:message</span>') !!}
  <br>
}
@endif
<textarea class="form-control" name="mensaje" rows="8" cols="80">{{ $message->mensaje or old('mensaje') }}</textarea>
{!! $errors->first('mensaje','<span class="error">:message</span>') !!}
<br>
<input class="form-control btn btn-primary" type="submit" name="" value="{{ $btnText or 'Guardar'}}">
