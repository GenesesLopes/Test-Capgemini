@extends('layouts.app')

@section('content')
<transition name="fade">
    <router-view />
</transition>
@endsection