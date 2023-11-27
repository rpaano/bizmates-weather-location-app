<template>
  <div class="flex justify-center mt-4 pt-2 mb-5 w-full">
      <div class="input-group input-group-lg">
          <span class="input-group-text bi-search" id="basic-addon1">
          </span>
          <input v-model="inputValue" name="city" autocomplete="off" type="search" class="form-control" id="city" placeholder="Tokyo, Yokohama, Kyoto, Osaka ..." aria-label="Search">

          <button @click="emit('searchValue', inputValue)" class="form-control">Search</button>
      </div>
  </div>
</template>

<script setup>
  import { ref } from 'vue'

  const inputValue = ref()
  const emit = defineEmits(['completeTodo'])
</script>