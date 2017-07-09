<template>
    <div id="EventLocation_Wrapper">
        <label for="location">Location</label>
        <div id="location">
            <gmap-autocomplete @place_changed="setPlace"></gmap-autocomplete>
            <gmap-map
                    :center="location"
                    :zoom="6"
                    style="width: 100%; height: 300px;">
                <gmap-marker :position="location"
                             :clickable="true"
                             :draggable="true"
                             @click="center=location"
                             @place_changed="setPlace"
                             @position_changed="markerDrag($event)"
                ></gmap-marker>
            </gmap-map>
        </div>

        <input type="hidden" v-model="location.lat" name="lat">
        <input type="hidden" v-model="location.lng" name="lng">
    </div>
</template>

<script>
  export default {
    data() {
      return {
        location: {
          lat: 36.1699,
          lng: -115.1398
        },
        markers: [{
          position: { lat: 36.1, lng: -115.1 }
        }]
      };
    },
    methods: {
      setPlace(place) {
        this.location = {
          lat: place.geometry.location.lat(),
          lng: place.geometry.location.lng()
        }
      },
      markerDrag(position) {
        this.location = {
          lat: position.lat(),
          lng: position.lng()
        }
      }
    }
  }
</script>

<style>

</style>
