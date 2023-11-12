@php
    use App\Models\Picture;
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Listado de anuncios</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
    <div class="container mt-5">
        <div class="row">
            <h3 class="card-title align-items-start flex-column">Cálculo de puntuaciones</h3>
        </div>
        @foreach($ads as $ad)
        <div class="text-left mb-2">{{ $ad->typology() }}</div>
        <div class="text-left mb-2">
            @foreach(json_decode($ad->pictures()) as $picture)
                <img src="{{ Picture::find($picture)->url() }}" alt="" width="60" height="60">
            @endforeach
        </div>
        <div class="text-left mb-2">{{ $ad->description() }}</div>
        <div class="row text- mb-2">
            <div class="col-md-3">Tamaño casa</div>
            <div class="col-md-3">{{ $ad->houseSize() }}</div>
            <div class="col-md-3">Tamaño jardín</div>
            <div class="col-md-3">{{ $ad->gardenSize() }}</div>
        </div>
        <div class="row text-left mb-5">
            <div class="col-md-3">Puntuación</div>
            <div class="col-md-3">{{ $ad->score() }}</div>
        </div>
        @endforeach
    </div>
    </body>
</html>
