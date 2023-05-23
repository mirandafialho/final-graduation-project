<template>
  <div class="h-screen pb-4">
    <div class="w-full container mx-auto p-6">
      <div class="w-full flex items-center justify-between">
        <a class="flex items-center text-indigo-400 no-underline hover:no-underline font-bold text-2xl lg:text-4xl" href="/"> 
           <img src="@/assets/logo.png" alt="Service Desk Logo" width="128" />
        </a>

        <div class="flex w-1/2 justify-end content-center">
          <a target="_self" href="/login">
            <button type="button" class="inline-flex items-center px-4 py-2 text-primary bg-white border rounded-md border-primary hover:bg-primary hover:text-white w-full">
              Login
            </button>
          </a>
        </div>
      </div>
    </div>

    <div class="container pt-2 px-6 mx-auto flex flex-wrap flex-col md:flex-row items-center">
      <div class="flex flex-col w-full xl:w-2/5 justify-center lg:items-start overflow-y-hidden">
        <h1 class="my-4 text-3xl md:text-5xl text-primary font-bold leading-tight text-center md:text-left slide-in-bottom-h1">
          TFG II - Service Desk com ITIL®
        </h1>
        <p class="leading-normal text-base md:text-2xl mb-8 text-center md:text-left slide-in-bottom-subtitle">
          Trabalho de conclusão do curso de Sistemas de Informação da Universidade Franciscana.
        </p>
      </div>
      
      <div class="w-full xl:w-3/5 py-6 overflow-y-hidden">
        <img class="w-5/6 mx-auto lg:mr-0 slide-in-bottom" src="@/assets/laptop.svg">
      </div>
      
      <div class="w-full pb-6 text-sm text-center md:text-left fade-in">
        <a class="text-gray-500 no-underline hover:no-underline" href="https://www.ufn.edu.br/">
          &copy; Yuri Miranda Fialho & UFN {{ currentYear }}
        </a>
      </div>
    </div>
  </div>
</template>

<script>

export default {
  name: 'HomeView',
  data() {
    return {
      currentYear: new Date().getFullYear(),
    }
  }
}
</script>
