{{-- page title --}}
@section('title', __('User Register'))

{{-- page style --}}
@section('page-style')
  <link rel="stylesheet" type="text/css" href="{{asset('css/pages/register.css')}}">
@endsection

{{-- page content --}}
<div id="register-page" class="row">
  <div class="col s12 m6 l4 z-depth-4 card-panel border-radius-6 register-card bg-opacity-8">
    <form class="login-form" wire:submit.prevent="createNewUser">
      <div class="row">
        <div class="input-field col s12">
          <h5 class="ml-4">{{ __('Register') }}</h5>
          <p class="ml-4">{{ __('Join to our community now') }} !</p>
        </div>
      </div>
      <div class="row margin">
        <div class="input-field col s12">
          <i class="material-icons prefix pt-2">person_outline</i>
          <input wire:model.defer="user.name" class="active" id="user.name" type="text" autocomplete="false">
          <label for="user.name" class="center-align">{{ __('Full name') }}</label>
          <div class="error"> @error('user.name') {{ $message }} @enderror</div>
        </div>
      </div>
      <div class="row margin">
        <div class="input-field col s12">
          <i class="material-icons prefix pt-2">mail_outline</i>
          <input wire:model.defer="user.email" class="active" id="user.email" type="email"
                 autocomplete="false">
          <label for="user.email">Email</label>
          <div class="error"> @error('user.email') {{ $message }} @enderror</div>
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
        <div class="input-field col s12">
          <button type="submit"
                  class="btn waves-effect waves-light border-round gradient-45deg-purple-deep-orange col s12">{{ __('Register') }}</button>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <p class="margin medium-small"><a
              href="{{ route('auth.login') }}">{{ __('Already have an account? Login') }}</a></p>
        </div>
      </div>
    </form>
  </div>
</div>
