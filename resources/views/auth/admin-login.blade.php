<!DOCTYPE html>
<html lang="en">

@include('templates.adminPartials.head')

<body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="POST" action="{{ route('admin.login.submit') }}">
                @csrf
              <h1>Login As Admin</h1>
              <div>
                <input id="email" type="email" placeholder="Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
              </div>
              <div>
                <input id="password" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                @if ($errors->has('password'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
              </div>
              <div>
                {{--  <a class="btn btn-default submit" type="submit">Log in</a>  --}}
                {{--  <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}  --}}
                <button type="submit" class="btn btn-default submit">
                    {{ __('Login') }}
                </button>
                <a class="reset_pass" href="{{ route('password.request') }}">Lost your password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator"></div>
            </form>
          </section>
        </div>

     
      </div>
    </div>
  </body>

</html>
