@extends('sample')

@section('title')Авторизация@endsection

@section('content')
    <link href="https://unpkg.com/tailwindcss@2.0.3/dist/tailwind.min.css" rel="stylesheet">
    <body>
    <div class="bg-white flex flex-col space-y-10 justify-center items-center" style="height: 700px">
        <div class="bg-white w-96 shadow-xl rounded p-4">
            <h1 class="text-3xl font-medium">Вход</h1>

            <form method="POST" action="{{ route("login_process") }}" class="space-y-5 mt-4">
                @csrf

                <input name="email" type="text" class="w-full h-12 border border-gray-800 rounded px-3 @error('email') border-red-500 @enderror" placeholder="Почта" />

                @error('email')
                <p class="text-red-500">{{ $message }}</p>
                @enderror

                <input name="password" type="password" class="w-full h-12 border border-gray-800 rounded px-3 @error('password') border-red-500 @enderror" placeholder="Пароль" />

                @error('password')
                <p class="text-red-500">{{ $message }}</p>
                @enderror

                <div>
                    <a href="{{ route("forgot") }}" class="font-medium text-blue-900 hover:bg-blue-300 rounded-md p-2">Забыли пароль?</a>
                </div>

                <div>
                    <a href="{{ route("register") }}" class="font-medium text-blue-900 hover:bg-blue-300 rounded-md p-2">Регистрация</a>
                </div>

                <button type="submit" class="text-center w-full bg-blue-900 rounded-md text-white py-3 font-medium">Войти</button>
            </form>
        </div>
    </div>
    </body>

@endsection


