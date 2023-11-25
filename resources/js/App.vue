<template>
  <main>
    <section class="flex justify-center items-center bg-[linear-gradient(15deg,#13547a_0%,#80d0c7_100%)] w-full min-h-[100dvh] h-full" id="section_1">
      <div class="content--container">
        <div class="wrapper-info">
          <span class=" text-6xl font-bold leading-[1.2] font-montse text-white text-center">Discover Recommended<br />Cities</span>
          <h6 class="text-primary font-semibold font-montse text-center mb-2">platform for creatives around the world</h6>
          <div class="flex justify-center mt-4 pt-2 mb-5 w-full">
              <div class="input-group input-group-lg">
                  <span class="input-group-text bi-search" id="basic-addon1">
                  </span>
                  <input name="city" autocomplete="off" type="search" class="form-control" id="city" placeholder="Tokyo, Yokohama, Kyoto, Osaka ..." aria-label="Search">

                  <button @click="showVenuesToggle()" class="form-control">Search</button>
              </div>
          </div>
        </div>
        <transition nname="fadeHeight" :css="false" @before-enter="beforeEnter" @enter="enter">
          <div v-if="showVenues"  class="wrapper--ventue max-h-96 flex flex-wrap gap-x-3 gap-y-5 px-9 w-full">
            <div class="ventue">
              dfsd
            </div>
            <div class="ventue">
              dfsd
            </div>
            <div class="ventue">
              dfsd
            </div>
            <div class="ventue">
              dfsd
            </div>
            <div class="ventue">
              dfsd
            </div>
          </div>
        </transition>
      </div>
    </section>

    
  </main>
</template>

<script setup>
import { ref, onMounted } from 'vue';

const showVenues = ref(false)

const showVenuesToggle = () => {
  showVenues.value = !showVenues.value
}

const beforeEnter = (el) => {
  el.style.height = '0';
}
const enter = (el, done) => {
  el.offsetHeight; // Trigger reflow
  el.style.transition = 'height 300ms';
  el.style.height = el.scrollHeight + 'px';
  done();
}
</script>