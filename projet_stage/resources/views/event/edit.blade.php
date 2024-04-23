@extends('layouts.layout')

@section('title', 'Modifier un événement')
@section('content')

<link rel="stylesheet" href="css/details.css"/>
<div class="container details mt-3 m-5">
    <div class="row justify-content-center">
        <div class="card col-md-10">
            <div class="card-header">{{ __('Modifier un événement') }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('evenements.update', ['evenement' => $event->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group row">
                        <label for="titre" class="col-md-4 col-form-label text-md-right">{{ __('Titre') }}</label>
                        <div class="col-md-6">
                            <input id="titre" type="text" class="form-control @error('titre') is-invalid @enderror" name="titre" value="{{ $event->titre }}" required autocomplete="titre" autofocus>
                            @error('titre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
                        <div class="col-md-6">
                            <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" required>{{ $event->description }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="date_debut" class="col-md-4 col-form-label text-md-right">{{ __('Date de début') }}</label>
                        <div class="col-md-6">
                            <input id="date_debut" type="datetime-local" class="form-control @error('date_debut') is-invalid @enderror" name="date_debut" value="{{ $event->date_debut }}" required>
                            @error('date_debut')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="date_fin" class="col-md-4 col-form-label text-md-right">{{ __('Date de fin') }}</label>
                        <div class="col-md-6">
                            <input id="date_fin" type="datetime-local" class="form-control @error('date_fin') is-invalid @enderror" name="date_fin" value="{{ $event->date_fin }}" required>
                            @error('date_fin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <!--<div class="form-group row">
                         <label for="domaines_cibles" class="col-md-4 col-form-label text-md-right">{{ __('Domaines_cibles') }}</label>
                        <div class="col-md-6">
                            <select class="form-control" name="domaines_cibles[]" multiple>
                                @foreach($domaines as $domaine)
                                    <option value="{{ $domaine }}" {{ in_array($domaine, old('domaines_cibles', $event->domaines_cibles ?? [])) ? 'selected' : '' }}>{{ $domaine }}</option>
                                @endforeach
                            </select>
                            @error('domaines_cibles')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="posts_cibles" class="col-md-4 col-form-label text-md-right">{{ __('Posts_cibles') }}</label>
                        <div class="col-md-6">
                            <select class="form-control" name="posts_cibles[]" multiple>
                                @foreach($posts as $post)
                                    <option value="{{ $post }}" {{ in_array($post, old('posts_cibles', $event->posts_cibles ?? [])) ? 'selected' : '' }}>{{ $post }}</option>
                                @endforeach
                            </select>
                            @error('posts_cibles')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div> -->

                    <div class="form-group row">
                        <label for="domaines_cibles" class="col-md-4 col-form-label text-md-right">{{ __('Domaines_cibles') }}</label>
                        <div class="col-md-6">
                            <select class="form-control" name="domaines_cibles[]" multiple id="domaines_cibles">
                                @foreach($domaines as $domaine)
                                    <option value="{{ $domaine }}" {{ in_array($domaine, old('domaines_cibles', $event->domaines_cibles ?? [])) ? 'selected' : '' }}>{{ $domaine }}</option>
                                @endforeach
                                <option value="tous" {{ in_array($domaine, old('domaines_cibles', $event->domaines_cibles ?? [])) ? 'selected' : '' }}>tous les domaines</option>

                            </select>
                            @error('domaines_cibles')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="posts_cibles" class="col-md-4 col-form-label text-md-right">{{ __('Posts_cibles') }}</label>
                        <div class="col-md-6">
                            <select class="form-control" name="posts_cibles[]" multiple id="posts_cibles">
                                @foreach($posts as $post)
                                    <option value="{{ $post }}" {{ in_array($post, old('posts_cibles', $event->posts_cibles ?? [])) ? 'selected' : '' }}>{{ $post }}</option>
                                @endforeach
                                <option value="tous" {{ in_array($domaine, old('domaines_cibles', $event->domaines_cibles ?? [])) ? 'selected' : '' }}>tous les domaines</option>
                                <option value="tous" {{ in_array($domaine, old('domaines_cibles', $event->domaines_cibles ?? [])) ? 'selected' : '' }}>tous les posts</option>

                            </select>
                            @error('posts_cibles')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>



                    <div class="form-group row">
                        <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>
                        <div class="col-md-6">
                            <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Enregistrer les modifications') }}
                            </button>
                            <a href="{{ route('admin.evenements') }}" class="btn btn-secondary">
                                {{ __('Annuler') }}
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Assuming you have a button with id "modifier"
        document.getElementById('modifier').addEventListener('click', function() {
            var domaines = {!! json_encode(old('domaines_cibles', $event->domaines_cibles ?? [])) !!};
            var posts = {!! json_encode(old('posts_cibles', $event->posts_cibles ?? [])) !!};

            domaines.forEach(function(domaine) {
                var option = document.querySelector('#domaines_cibles option[value="' + domaine + '"]');
                if (option) {
                    option.setAttribute('selected', 'selected');
                }
            });

            posts.forEach(function(post) {
                var option = document.querySelector('#posts_cibles option[value="' + post + '"]');
                if (option) {
                    option.setAttribute('selected', 'selected');
                }
            });
        });
    });
</script>
@endsection