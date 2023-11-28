<template>
  <div class="relative w-full bg-white rounded-[50px] font-montse font-medium dropdown-container">
      <input 
        :disabled="!categories"
        :value="inputValue" 
        type="search" 
        placeholder="Category"
        class="dropdown-input loading"
        >
      <ul class="dropdown-list">
        <li 
          v-for="category in categories"
          :key="category.id"
        >
          <span @mousedown="selectCategory(category.id, category.name)">{{ category.name }}</span>
            <ul v-if="category.categories">
              <li 
                v-for="subCategory in category.categories" 
                :key="subCategory.id"
              >
                <span 
                  @mousedown="selectCategory(subCategory.id, subCategory.name)"
                >- {{ subCategory.name }}</span>
            </li>
          </ul>
        </li>
      </ul>
  </div>
</template>

<script setup>
  import axios from 'axios'
  import { onMounted, ref } from 'vue'

  const inputValue = ref("")
  const emit = defineEmits(['inputCategory'])
  const categories = ref()  

  onMounted(() => {
    getCagoties()
  })

  const getCagoties = async () => {
    const { data } = await axios.get(
      "api/venue-categories"
    );
    categories.value = data.response.categories;
  }

  const selectCategory = (id, name) => {
    inputValue.value = name
    emit('inputCategory', id)
  }
</script>
