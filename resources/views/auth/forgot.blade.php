@extends('sample')

@section('title')Восстановление пароля@endsection

@section('content')
    <link href="https://unpkg.com/tailwindcss@2.0.3/dist/tailwind.min.css" rel="stylesheet">
    <div class="bg-white flex flex-col space-y-10 justify-center items-center" style="height: 700px">
        <div class="bg-white w-96 shadow-xl rounded p-4">
            <h1 class="text-3xl font-medium">Восстановление пароля</h1>

            <form class="space-y-5 mt-4" method="POST" action="{{ route("forgot_process") }}">
                @csrf

                <input name="email" type="text" class="w-full h-12 border rounded px-3 @error('email') border-red-500 @enderror" placeholder="Почта" />

                @error('email')
                <p class="text-red-500">{{ $message }}</p>
                @enderror

                <div>
                    <a href="{{ route("login") }}" class="font-medium text-blue-900 hover:bg-blue-300 rounded-md p-2">Вспомнил пароль</a>
                </div>

                <button type="submit" class="text-center w-full bg-blue-900 rounded-md text-white py-3 font-medium">Восстановить</button>
            </form>
        </div>
    </div>
@endsection
