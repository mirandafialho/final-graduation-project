<template>
  <div>
    <Menu />
    <div class="flex flex-1 flex-col lg:pl-64">
      <div class="sticky top-0 z-10 bg-gray-100 pl-1 pt-1 sm:pl-3 sm:pt-3 lg:hidden">
        <button type="button" class="-ml-0.5 -mt-0.5 inline-flex h-12 w-12 items-center justify-center rounded-md text-gray-500 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
          <span class="sr-only">Open sidebar</span>
          <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
        </button>
      </div>
      <main class="flex-1">
        <div class="py-6">
          <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h1 class="text-2xl font-semibold text-gray-900">Departamentos</h1>
          </div>
          <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <DepartmentsDataTable />
          </div>
        </div>
      </main>
    </div>
  </div>
</template>

<script>
  import Menu from '@/components/AppMenu.vue'
  import DepartmentsDataTable from './DepartmentsDataTable.vue'

  export default {
    name: 'DepartmentsView',
    components: {
      Menu,
      DepartmentsDataTable
    }
  }
</script>

<style scoped>

</style>