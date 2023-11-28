<template>
  <main>
    <section class="flex justify-center items-center bg-[linear-gradient(15deg,#13547a_0%,#80d0c7_100%)] w-full min-h-[100dvh] h-full overflow-hidden" id="section_1">
      <div class="content--container">
        <div class="wrapper-info">
          <span class="text-4xl md:text-6xl pb-6 font-bold leading-[1.2] font-montse text-white text-center">Discover Recommended<br />Cities</span>
          <div class="max-w-md w-full rounded-[50px]">
            <SelectDropdown @inputCategory="(categoryValue) => categoryId = categoryValue" />
          </div>
          <Search 
            @searchValue="showVenuesToggle"
            :searchLoading="searchLoadingBtn"
          />
        </div>

        <Venue 
          :venues="venues" 
          :showVenues="showVenues"
          @coordinates="coordinates"
        />
      </div>
    </section>
  </main>
</template>

<script setup>
import { ref } from 'vue';
import Search from './components/Search.vue';
import SelectDropdown from './components/SelectDropdown.vue';
import Venue from './components/Venues/Index.vue';

const showVenues = ref(false)
const categoryId = ref()
const searchLoadingBtn = ref(false)
const venues = ref()
const weather = ref()

const showVenuesToggle = async (inputValue) => {
  searchLoadingBtn.value = true
  
  await getVenues(inputValue)
}

const getVenues = async (inputValue) => {
  await axios.get(`api/venues`,{
    params: {
      near: inputValue,
      category_id: categoryId.value
    }
  }).then((response) => {
      showVenues.value = !showVenues.value
      searchLoadingBtn.value = false
      venues.value = response.data.data
    })
    .catch((err) => {
      alert("Error! Kindly refresh.")
    })
}

const coordinates = async ({lat, lng}) => {
  await getWeather(lat, lng) //I did this to easily transfer to a new file
}

const getWeather = async (lat, lng) => {
  await axios.get(`api/weather-coordinate`,{
    params: {
      lat,
      lon: lng,
    }
  }).then((response) => {
      weather.value = response.data.data
    })
    .catch((err) => {
      alert("Error! Kindly refresh.")
    })
}
</script>