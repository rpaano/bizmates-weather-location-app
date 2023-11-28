<template>
  <div class="overlay">
    <div class="weather-container">
      <button 
        type="button" 
        class="weather-container--close" 
        aria-label="Close"
        @click="emit('weatherClose')"
      >
        <span aria-hidden="true">&times;</span>
      </button>
      <h4>Weather - in {{ placeName ?? '日本確認検査センター' }}</h4>
      <div class="weather-list">
        <div v-for="weather in weathers" class="weather-content">
          <div class="weather-content-info">
            <div class="weather-content-title">
              <span>Sky</span>
            </div>
            <div class="weather-content-detail">
              <span>{{ weather.main }}</span>
            </div>  
          </div>
          <div class="weather-content-info">
            <div class="weather-content-title">
              <span>Date</span>
            </div>
            <div class="weather-content-detail">
              <span>{{ weather.date }}</span>
            </div>  
          </div>
          <div class="weather-content-info">
            <div class="weather-content-title">
              <span>Temp</span>
            </div>
            <div class="weather-content-detail">
              <span>{{ weather.temp }}</span>
            </div>  
          </div>
          <div class="weather-content-info">
            <div class="weather-content-title">
              <span>Description</span>
            </div>
            <div class="weather-content-detail">
              <span>{{ weather.description }}</span>
            </div>  
          </div>
          <div class="weather-content-info">
            <div class="weather-content-title">
              <span>Humidity</span>
            </div>
            <div class="weather-content-detail">
              <span>{{ weather.humidity }}</span>
            </div>  
          </div>
          <div class="weather-content-info">
            <div class="weather-content-title">
              <span>Pressure</span>
            </div>
            <div class="weather-content-detail">
              <span>{{ weather.pressure }}</span>
            </div>  
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>

  const emit = defineEmits(['weatherClose'])
  const { weathers, placeName } = defineProps(['weathers', 'placeName']);

</script>

<style scoped>
</style>