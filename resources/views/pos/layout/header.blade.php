<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>POS</title>

    @include('pos.layout.libraryHeader')
    
</head>
<body>
    @include('pos.layout.sidebar')
    <div class="col-md-9">