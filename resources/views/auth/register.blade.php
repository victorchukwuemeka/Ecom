@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="px-8 py-6 mt-6 text-left bg-white shadow-lg">
        <div class="flex justify-center">

                <h3  class="text-2xl font-bold text-center">
                  {{ __('Register') }}
                </h3>
         </div>
                <div class="mt-4">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mt-4">
                            <label for="name" class="">
                                {{ __('Name') }}
                           </label>

                            <div class="">
                                <input id="name" type="text"
                                class="w-full px-4 py-2 mt-2 border rounderd-md
                                 @error('name')focus:outline-none focus:ring-1
                                 focus:ring-blue-600 @enderror"
                                name="name" value="{{ old('name') }}"
                                required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-4">
                            <label for="email" class="block">
                              {{ __('Email Address') }}
                            </label>


                                <input id="email" type="email"
                                 class="w-full px-4 py-2 mt-2 border rounded-md @error('email')
                                 focus:outline-none focus:ring-1
                                 focus:ring-blue-600 @enderror"
                                 name="email" value="{{ old('email') }}"
                                 required autocomplete="email">

                                @error('email')
                                    <span class="text-xs tracking-wide text-red-600" role="alert">
                                        <strong>
                                          {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                          </div>


                        <div class="mt-4">
                            <label for="password"
                               class="block">
                               {{ __('Password') }}
                           </label>


                                <input id="password" type="password"
                                 class="w-full px-4 py-2 mt-2 border rounded-md
                                  @error('password') focus:outline-none focus:ring-1
                                  focus:ring-blue-600 @enderror"
                                 name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="text-xs text-red-400" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>

                        <div class="mt-4">
                            <label for="password-confirm" class="block">
                              {{ __('Confirm Password') }}
                            </label>

                            <div class="">
                                <input id="password-confirm" type="password"
                                class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none
                                focus:ring-1
                                focus:ring-blue-600" name="password_confirmation"
                                 required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="mt-2">

                                <button type="submit" class="px-6  text-white bg-blue-600
                                rounded-lg hover:bg-blue-900">
                                    {{ __('Register') }}
                                </button>

                        </div>
                    </form>
                </div>

    </div>
</div>
@endsection
