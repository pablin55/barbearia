@extends('layouts.app')

@section('title', __('Login'))

@section('content')
<div class="login-page" style="display:flex; justify-content:center; align-items:center; min-height:80vh; background-color:#111; color:#fff;">
    <div class="login-form" style="background:#222; padding:30px; border-radius:10px; width:350px; text-align:center;">
        <h2 style="color:#d59c20;">{{ __('Login') }}</h2>

        @if(session('error'))
            <div style="color:red; margin-bottom:15px;">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group" style="margin-bottom:15px;">
                <input type="email" name="email" placeholder="{{ __('Email') }}" required
                       style="width:100%; padding:10px; border-radius:5px; border:none;">
            </div>

            <div class="form-group" style="margin-bottom:20px;">
                <input type="password" name="password" placeholder="{{ __('Password') }}" required
                       style="width:100%; padding:10px; border-radius:5px; border:none;">
            </div>

            <button type="submit" style="background:#d59c20; color:#fff; padding:10px 20px; border:none; border-radius:5px; width:100%;">
                {{ __('Login') }}
            </button>
        </form>

        <!-- Botão Criar Conta -->
        <a href="{{ route('register') }}" 
           style="display:block; margin-top:15px; background:#d59c20; color:#fff; padding:10px 20px; border-radius:5px; text-decoration:none; width:100%;">
            {{ __('Criar Conta') }}
        </a>
    </div>
</div>
@endsection