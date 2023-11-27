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

<style scoped>
ul.dropdown-list {
  @apply hidden box-border bg-white absolute w-full z-10 mt-2 rounded-md border border-[--border-dropdown] font-montse font-medium text-black overflow-x-hidden 
  max-h-[calc(25dvh)] overflow-y-auto;
}

ul.dropdown-list li {
  @apply w-full block;
}

ul.dropdown-list li:not(:last-child)::after {
  @apply content-[""] block w-[calc(100%_-_0.5rem_-_0.5rem)] bg-[--border-dropdown] h-px px-2 text-center mx-2;
}

ul.dropdown-list li span {
  @apply block text-black p-2 w-full font-montse font-medium text-base;
}

ul.dropdown-list > li span:hover {
  @apply bg-[--primary-color] text-white cursor-pointer;
}

ul.dropdown-list > li li span {
  @apply ml-2;
}

.dropdown-input {
  @apply relative py-3 px-6 rounded-[50px] w-full focus:outline-none text-base font-montse font-medium;
}

.dropdown-input:disabled {
  @apply cursor-not-allowed;
}

.dropdown-input:focus + ul.dropdown-list {
  @apply block;
}

.dropdown-container:has(input:disabled)::after {
  @apply content-[''] absolute -translate-y-2/4 w-4 h-4 animate-spin opacity-100 pointer-events-none rounded-[50%] border-t-[#3498db] border-4 border-solid border-[#ccc] right-5 top-2/4;
}

@keyframes spin {
  0% { transform: translateY(-50%) rotate(0deg); }
  100% { transform: translateY(-50%) rotate(360deg); }
}
</style>