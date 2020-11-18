<x-master>
    <div class="flex justify-center">
        <div class="container">
        <div class="flex justify-center mt-12">
            <div class="col-md-8">
                <div class="card">
                    <div class="text-3xl mb-4">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-4">
                                <label for="email" class="text-md-left">Email</label>

                                <div class="mt-2">
                                    <input id="email" type="email" class="focus:outline-none border-b border-blue-500 font-light @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="password" class="text-md-left">{{ __('Password') }}</label>

                                <div class="mt-2">
                                    <input id="password" type="password" class="focus:outline-none border-b border-blue-500 font-light  @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="font-light text-sm" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="border border-blue-500 p-2 bg-blue-500 text-white">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="font-light" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-master>
