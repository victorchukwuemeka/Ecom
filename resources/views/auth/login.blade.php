@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="px-8 py-6 mt-6 text-left bg-white shadow-lg">
        <div class="flex justify-center">
            
                <div class="text-2xl font-bold text-center">
                    {{ __('Login') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mt-4">
                            <label for="email" class="block">
                                {{ __('Email Address') }}
                            </label>

                                <input id="email" type="email"
                                class="w-full px-4 py-2 mt-2 border rounderd-md
                                 @error('email') focus:outline-none focus:ring-1
                                  focus:ring-blue-600  @enderror" name="email"
                                  value="{{ old('email') }}"
                                 required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="text-xs tracking-wide text-red-60" role="alert">
                                        <strong>
                                          {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="mt-4">
                            <label for="password" class="block">
                              {{ __('Password') }}
                            </label>

                                <input id="password" type="password"
                                class="w-full px-4 py-2 mt-2 border rounded-md
                                @error('password') focus:outline-none focus:ring-1 focus:ring-blue-600 @enderror"
                                name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>

                        <div class="mt-4">
                                <div class="block">
                                    <input class="w-full px-4 py-2 mt-2 border rounded-md"
                                            type="checkbox" name="remember" id="remember"
                                             {{ old('remember') ? 'checked' : '' }}>

                                    <label  for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                        </div>

                        <div class="flex items-baseline justify-between">
                                <button type="submit"
                                 class="px-6  text-white bg-blue-600 rounded-lg hover:bg-blue-900">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="text-sm text-blue-600 hover:underline"
                                    href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif

                        </div>
                    </form>
                </div>

        </div>
    </div>
</div>
@endsection
