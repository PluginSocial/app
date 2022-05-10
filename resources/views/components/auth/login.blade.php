{{-- page title --}}
@section('title', __('User Login'))

{{-- page style --}}
@section('page-style')
  <link rel="stylesheet" type="text/css" href="{{asset('css/pages/login.css')}}">
@endsection

{{-- page content --}}
<div id="login-page" class="row">
  <div class="col s12 m6 l4 z-depth-4 card-panel border-radius-6 login-card bg-opacity-8">
    <form wire:submit.prevent="login" class="login-form">
      <div class="row">
        <div class="input-field col s12">
          <h5 class="ml-4">{{ __('User Login') }}</h5>
        </div>
      </div>
      <div class="row margin">
        <div class="input-field col s12">
          <i class="material-icons prefix pt-2">mail_outline</i>
          <input wire:model.defer="user.email" class="active" id="user.email" type="email"
                 autocomplete="false">
          <label for="user.email">Email</label>
          <div class="row margin">
            <div class="error"> @error('user.email') {{ $message }} @enderror</div>
          </div>
        </div>
      </div>
      <div class="row margin">
        <div class="input-field col s12">
          <i class="material-icons prefix pt-2">lock_outline</i>
          <input wire:model.defer="user.password" id="user.password" type="password" autocomplete="false">
          <label for="user.password">{{ __('Password') }}</label>
          <div class="error"> @error('user.password') {{ $message }} @enderror</div>
        </div>
      </div>
      <div class="row">
        <div class="col s12 m12 l12 ml-2 mt-1">
          <p>
            <label>
              <input wire:model.defer="remember" type="checkbox"/>
              <span>{{ __('Remember Me') }}</span>
            </label>
          </p>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <button
            class="btn waves-effect waves-light border-round gradient-45deg-purple-deep-orange col s12">Login
          </button>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6 m6 l6">
          <p class="margin medium-small"><a href="{{ route('auth.register') }}">{{ __('Register Now') }}!</a></p>
        </div>
        <div class="input-field col s6 m6 l6">
          <p class="margin right-align medium-small"><a
              href="{{ route('auth.password-forgot') }}">{{ __('Forgot password') }} ?</a>
          </p>
        </div>
      </div>
    </form>
  </div>
</div>
