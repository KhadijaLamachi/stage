@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center my-4">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Event') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('evenements.store') }}" enctype="multipart/form-data">
                            @csrf

                            <!-- Other input fields... -->
                            <div class="form-group row">
                                <label for="titre" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>
                                <div class="col-md-6">
                                    <input id="titre" type="text" class="form-control @error('titre') is-invalid @enderror" name="titre" value="{{ old('titre') }}" required autocomplete="titre" autofocus>
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
                                    <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" required>{{ old('description') }}</textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="date_debut" class="col-md-4 col-form-label text-md-right">{{ __('Start Date') }}</label>
                                <div class="col-md-6">
                                    <input id="date_debut" type="date" class="form-control @error('date_debut') is-invalid @enderror" name="date_debut" value="{{ old('date_debut') }}" required>
                                    @error('date_debut')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="date_fin" class="col-md-4 col-form-label text-md-right">{{ __('End Date') }}</label>
                                <div class="col-md-6">
                                    <input id="date_fin" type="date" class="form-control @error('date_fin') is-invalid @enderror" name="date_fin" value="{{ old('date_fin') }}" required>
                                    @error('date_fin')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            

                          
                            
                        

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
                                        <option value="tous" {{ in_array($domaine, old('domaines_cibles', $event->domaines_cibles ?? [])) ? 'selected' : '' }}>tous les posts</option>
                                    </select>
                                    @error('posts_cibles')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Other fields... -->

                            <div class="form-group row">
                                <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>
                                <div class="col-md-6">
                                    <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" required>
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Create') }}
                                    </button>
                                    <a href="{{ route('admin.evenements') }}" class="btn btn-secondary">
                                        {{ __('Cancel') }}
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection