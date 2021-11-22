@extends('layouts.admin')

@section('title')
    {{ $item->name }}
@endsection

@section('content')
    {{ $item->id }}
    {{ $item->name }}
    {{ $item->description }}
    {{ $office->name }}
    {{ $region->name }}
@endsection
