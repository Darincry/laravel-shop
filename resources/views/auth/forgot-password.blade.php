@extends('layouts.auth')

@section('title', 'Забыли пароль')

@section('content')

    <x-forms.auth-forms
        method="POST"
        title="Забыли пароль"
        action=""
    >
        @csrf

        <x-forms.text-input
            name="email"
            type="email"
            placeholder="Email"
            required
            :isError="$errors->has('email')"
        />

        @error('email')
        <x-forms.error>
            {{ $message }}
        </x-forms.error>
        @enderror

        <x-forms.primary-button type="submit">
            Восстановить
        </x-forms.primary-button>

        <x-slot:socialAuth></x-slot:socialAuth>

        <x-slot:buttons>
            <div class="space-y-3 mt-5">
                <div class="text-xxs md:text-xs"><a href="{{ route('login') }}" class="text-white hover:text-white/70 font-bold">Вспомнил пароль</a></div>
            </div>

        </x-slot:buttons>

    </x-forms.auth-forms>

@endsection
