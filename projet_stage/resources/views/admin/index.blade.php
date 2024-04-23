@extends('layouts.layout')
@section('title', 'dashboard')
@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        @if($isAdmin)
        <div class="col-md-4">
            <div class="card shadow bg-secondary text-white">
                <div class="card-header">Employees</div>
                <div class="card-body">
                    <h3>{{ count($employes) }}</h3>
                    <h3>employées</h3><br>
                    <a href="{{ route('admin.employes') }}" class="btn btn-primary">Gérer les employés</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow bg-secondary text-white">
                <div class="card-header">Evenements</div>
                <div class="card-body">
                    <h3>{{ count($evenements) }}</h3>
                    <h3>evenements</h3><br>
                    <a href="{{ route('admin.evenements') }}" class="btn btn-primary">Gérer les événements</a>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
