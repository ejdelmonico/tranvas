@extends('layouts.app')

@section('title', 'Event')

@push('styles')
<style>
    #map {
        height: 400px;
        width: 100%;
    }
</style>
@endpush

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>{{ $event->title }}</h3>
                    </div>
                    <div class="panel-body content">
                        <p><strong>Description: </strong>{!! $event->description !!}</p>
                    </div>

                    <div id="map"></div>

                    <table class="table table-bordered table-hover table-striped">
                        <tbody>
                        <tr>
                            <td><strong>Start date:</strong></td>
                            <td>{{ $event->start_date }}</td>
                        </tr>
                        <tr>
                            <td><strong>End date:</strong></td>
                            <td>{{ $event->end_date }}</td>
                        </tr>
                        <tr>
                            <td><strong>Address:</strong></td>
                            <td>{{ $event->address }}</td>
                        </tr>
                        <tr>
                            <td><strong>Created by:</strong></td>
                            <td><a href="#">{{ $event->creator->name }}</a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
  function initMap() {
    let uluru = { lat: {{ $event->lat }}, lng: {{ $event->long }} };
    let map = new google.maps.Map(document.getElementById('map'), {
      zoom: 4,
      center: uluru
    });
    let marker = new google.maps.Marker({
      position: uluru,
      map: map
    });
    console.log(uluru);
  }
</script>
<script async
        defer
        src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAP_API_KEY')}}&callback=initMap"></script>
@endpush
