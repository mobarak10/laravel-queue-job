<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | {{ config('app.name') }}</title>

    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ url('/') }}">
    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    {{--        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />--}}

    @vite(['resources/js/app.js'])
    <!-- Styles -->
</head>
<body>
<div class="container mt-5">
    <x-alert />
    <h1>Transfer Money</h1>
    <form action="{{ route('transfer.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <div class="form-group my-3">
                <label for="exampleInputPassword1">Amount</label>
                <input type="number" class="form-control" id="exampleInputPassword1" name="amount" value="{{ old('amount') }}" placeholder="amount">
                @error('amount')
                <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Transfer</button>
        </div>
    </form>
</div>
</body>
</html>
