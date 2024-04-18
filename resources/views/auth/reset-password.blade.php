@extends('layouts.auth')

@section('title', 'Восстановления пароля')

@section('content')

    <x-forms.auth-forms
        method="POST"
        title="Сброс пароля"
        action="{{ route('password.update') }}"
    >
        @csrf

        <input name="token" type="hidden" value="{{ $token }}">

        <x-forms.text-input
            name="email"
            type="email"
            placeholder="Email"
            value="{{ request('email') }}"
            required
            :isError="$errors->has('email')"
        />

        @error('email')
        <x-forms.error>
            {{ $message }}
        </x-forms.error>
        @enderror

        <x-forms.text-input
            name="password"
            type="password"
            placeholder="Пароль"
            required
            :isError="$errors->has('password')"
        />

        @error('password')
        <x-forms.error>
            {{ $message }}
        </x-forms.error>
        @enderror

        <x-forms.text-input
            name="password_confirmation"
            type="password"
            placeholder="Повторите пароль"
            required
            :isError="$errors->has('password_confirmation')"
        />

        @error('password_confirmation')
        <x-forms.error>
            {{ $message }}
        </x-forms.error>
        @enderror

        <x-slot:socialAuth></x-slot:socialAuth>
        <x-slot:buttons></x-slot:buttons>

        <x-forms.primary-button type="submit">
            Обновить пароль
        </x-forms.primary-button>

    </x-forms.auth-forms>

@endsection
