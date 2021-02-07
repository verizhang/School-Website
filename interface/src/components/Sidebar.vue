<template>
  <div>
    <b-button v-b-toggle.sidebar-1 class="bg-white m-3 text-center"> 
        <img src="@/assets/icon/menu.png" style="width:15px;">
        <span class="text-dark mx-2">Menu</span>
    </b-button>
    <b-sidebar id="sidebar-1" title="SMK Kristen Immanuel Pontianak" shadow>
      <div class="px-3 py-2">
        <router-link :to="{name:'user'}" class="text-decoration-none text-dark">
            <p>User</p>
        </router-link>
        <p>Jurusan</p>
        <p>News</p>
        <p>Prestasi</p>
        <p>Ekskul</p>
        <p>Karya</p>
      </div>
    </b-sidebar>
  </div>
</template>