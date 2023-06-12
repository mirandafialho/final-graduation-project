<template>
  <div class="mt-6 sm:flex sm:items-center sm:justify-between ">
    <div class="text-sm text-gray-500 dark:text-gray-400">
      Página <span class="font-medium text-gray-700 dark:text-gray-100">1 of 10</span>
    </div>

    <div class="flex items-center mt-4 gap-x-4 sm:mt-0">
      <a href="#" class="flex items-center justify-center w-1/2 px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md sm:w-auto gap-x-2 hover:bg-gray-100 dark:bg-gray-900 dark:text-gray-200 dark:border-gray-700 dark:hover:bg-gray-800">
        <ArrowLeftIcon class="h-4 w-4 flex-shrink-0" />

        <span>Anterior</span>
      </a>

      <a href="#" class="flex items-center justify-center w-1/2 px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md sm:w-auto gap-x-2 hover:bg-gray-100 dark:bg-gray-900 dark:text-gray-200 dark:border-gray-700 dark:hover:bg-gray-800">
        <span>Próximo</span>

        <ArrowRightIcon class="h-4 w-4 flex-shrink-0" />
      </a>

      <span class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full dark:bg-gray-800 dark:text-blue-400">240 vendors</span>
    </div>
  </div>
</template>

<script>
import { ArrowLeftIcon, ArrowRightIcon } from "@heroicons/vue/24/outline"

export default {
  name: "AppPagination",
  components: {
    ArrowRightIcon,
    ArrowLeftIcon
  }
}
</script>

<style scoped>

</style>