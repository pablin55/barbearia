@extends('layouts.app')

@section('title', __('Criar Conta'))

@section('content')
<div class="register-page" style="display:flex; justify-content:center; align-items:center; min-height:80vh; background-color:#111; color:#fff;">
    <div class="register-form" style="background:#222; padding:30px; border-radius:10px; width:350px; text-align:center; box-shadow: 0 0 15px rgba(213,156,32,0.5);">
        <h2 style="color:#d59c20; margin-bottom:20px;">{{ __('Criar Conta') }}</h2>

        <!-- Exibir erros de validação -->
        @if($errors->any())
            <div style="color:red; text-align:left; margin-bottom:15px;">
                <ul style="padding-left:15px; margin:0;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group" style="margin-bottom:15px;">
                <input type="text" name="name" placeholder="{{ __('Nome') }}" value="{{ old('name') }}" required
                       style="width:100%; padding:10px; border-radius:5px; border:none; background:#333; color:#fff;">
            </div>

            <div class="form-group" style="margin-bottom:15px;">
                <input type="email" name="email" placeholder="{{ __('Email') }}" value="{{ old('email') }}" required
                       style="width:100%; padding:10px; border-radius:5px; border:none; background:#333; color:#fff;">
            </div>

            <div class="form-group" style="margin-bottom:15px;">
                <input type="password" name="password" placeholder="{{ __('Senha') }}" required
                       style="width:100%; padding:10px; border-radius:5px; border:none; background:#333; color:#fff;">
            </div>

            <div class="form-group" style="margin-bottom:20px;">
                <input type="password" name="password_confirmation" placeholder="{{ __('Confirme a Senha') }}" required
                       style="width:100%; padding:10px; border-radius:5px; border:none; background:#333; color:#fff;">
            </div>

            <button type="submit" 
                    style="background:#d59c20; color:#fff; padding:10px 20px; border:none; border-radius:5px; width:100%; font-weight:bold;">
                {{ __('Criar Conta') }}
            </button>
        </form>

        <!-- Botão para Login -->
        <p style="margin-top:15px; color:#fff;">
            {{ __('Já tem uma conta?') }} 
            <a href="{{ route('login') }}" style="color:#d59c20; text-decoration:underline;">{{ __('Login') }}</a>
        </p>
    </div>
</div>
@endsection