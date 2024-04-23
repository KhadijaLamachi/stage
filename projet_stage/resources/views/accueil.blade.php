@extends('layouts.layout')

@section('title', 'Evenement')
@section('content')
<link rel="stylesheet" href="css/accueil.css"/>
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                class="active"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" style="background-image: url('images/event1.jpg');">
                <div class="overlay"></div>
                <div class="carousel-caption">
                    <h2>Bienvenue dans le calendrier des événements OCP</h2>
                    <p>Découvrez des événements et des activités passionnants pour les employés de l'OCP</p>
                </div>
            </div>
            <div class="carousel-item" style="background-image: url('images/event2.jpg');">
                <div class="overlay"></div>
                <div class="carousel-caption">
                    <h1>Organisez vos événements sans effort</h1>
                    <p>Des petites réunions aux grandes conférences</p>
                </div>
            </div>
            <div class="carousel-item" style="background-image: url('images/event3.jpg');">
                <div class="overlay"></div>
                <div class="carousel-caption">
                    <h1>Inscrivez-vous à des événements passionnants</h1>
                    <p>Rejoignez-nous pour des expériences inoubliables</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="main">
        <h1 class="text-center mt-5 mb-3 mb-20px">Evenements & Activitées</h1>
        <div class="container event-container">
            @foreach($events as $event)
            <div class="card event-card">
                <img src="{{ asset('images/' . $event->titre) }}" class="card-img-top" alt="Event Image">
                <div class="card-body">
                    <h5 class="card-title">{{ $event->titre }}</h5>
                    <a href="{{route('evenements.show',$event->id)}}" class="card-link">Plus de détails</a>
                </div>
            </div>
            @endforeach
            {{ $events->links() }}
        </div>
    </div>
@endsection
