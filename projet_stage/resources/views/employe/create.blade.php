@extends('layouts.layout')
@section('content')
<div class="container">
    <div class="row justify-content-center my-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-light">Ajouter un nouvel employé</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('employes.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="nom" name="nom" required>
                        </div>
                        <div class="mb-3">
                            <label for="prenom" class="form-label">Prénom</label>
                            <input type="text" class="form-control" id="prenom" name="prenom" required>
                        </div>
                        <div class="mb-3">
                            <label for="cin" class="form-label">CIN</label>
                            <input type="text" class="form-control" id="cin" name="cin" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Mot de passe</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="telephone" class="form-label">Téléphone</label>
                            <input type="text" class="form-control" id="telephone" name="telephone" required>
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-select" id="role" name="role" required>
                                <option value="">role</option>
                                <option value="Administrateur">Administrateur</option>
                                <option value="Employé">Employé</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="post" class="form-label">Poste</label>
                            <input type="text" class="form-control" id="post" name="post" required>
                        </div>
                        <div class="mb-3">
                            <label for="domaine" class="form-label">Domaine</label>
                            <input type="text" class="form-control" id="domaine" name="domaine" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
