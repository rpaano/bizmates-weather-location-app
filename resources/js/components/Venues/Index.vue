<template>
  <transition name="fadeHeight" :css="false" @before-enter="beforeEnter" @enter="enter">
    <div v-if="showVenues"  class="wrapper--ventue">
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
</template>

<script setup>
  const { venues, showVenues } = defineProps(['venues', 'showVenues']);

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

<style scoped>

</style>