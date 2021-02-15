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
        <router-link :to="{name:'jurusan'}" class="text-decoration-none text-dark">
            <p>Jurusan</p>
        </router-link>
        <router-link :to="{name:'news'}" class="text-decoration-none text-dark">
            <p>News</p>
        </router-link>
        <router-link :to="{name:'ekskul'}" class="text-decoration-none text-dark">
            <p>Ekskul</p>
        </router-link>
        <router-link :to="{name:'karya'}" class="text-decoration-none text-dark">
            <p>Karya</p>
        </router-link>
        <router-link :to="{name:'mapel'}" class="text-decoration-none text-dark">
            <p>Mata Pelajaran</p>
        </router-link>
        <router-link :to="{name:'materi'}" class="text-decoration-none text-dark">
            <p>Materi</p>
        </router-link>
      </div>
    </b-sidebar>
  </div>
</template>