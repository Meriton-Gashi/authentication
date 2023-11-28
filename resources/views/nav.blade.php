<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phonebook</title>
    <link href="{{ asset('style.css') }}" rel="stylesheet">
</head>
<body>
    <h2 class="h3titile" style="text-align: center;">Phone Book</h2>
    <div class="divButtons">
        @if(!Auth::guard('web')->user())
            <button class="buttonLogin"><a href="{{ route('login') }}">Login</a></button>
            <button class="buttonPhone"><a href="{{ route('phonebook') }}">Public Phone Book</a></button>
        @endif
        @if(Auth::guard('web')->user())
        <button class="buttonLogin"><a href="{{ route('logout') }}">Logout</a></button>
            <button class="buttonPhone"><a href="{{ route('phonebook') }}">Public Phone Book</a></button>
            <button class="buttonContact"><a href="{{ route('dashboard') }}">Add Contact</a></button>
            <button class="buttonContact"><a href="{{ route('editContact') }}">My Last Contact</a></button>
        @endif
    </div>

        
            