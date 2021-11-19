@extends('layouts.admin')

@section('title')
    Detail Item
@endsection

@section('content')
    {{ $item->id }}
    {{ $item->name }}
    {{ $item->description }}
    {{ $office->name }}
@endsection
