<template>
    <div v-if="showVenues"  class="wrapper--ventue">
      <div 
        class="ventue" 
        v-for="venue in venues"
        :key="venue.id"
        @click="emit('coordinates', {lat: venue.location.lat, lng: venue.location.lng})"
      >
        <h5 class="ventue--name">{{ venue.name }}</h5>
        <div class="ventue--details" >
          <div class="ventue--details-title">
            <span>City</span>
          </div>
          <div class="ventue--details-content">
            <span>{{ venue.location.city }}</span>
          </div>
        </div>
        <div class="ventue--details">
          <div class="ventue--details-title">
            <span>State</span>
          </div>
          <div class="ventue--details-content">
            <span>{{ venue.location.state }}</span>
          </div>
        </div>
        <div class="ventue--details">
          <div class="ventue--details-title">
            <span>Country</span>
          </div>
          <div class="ventue--details-content">
            <span>{{ venue.location.cc }}</span>
          </div>
        </div>
      </div>
    </div>
</template>

<script setup>
  const { venues, showVenues } = defineProps(['venues', 'showVenues']);
  const emit = defineEmits(['coordinates'])
</script>

<style scoped>

</style>