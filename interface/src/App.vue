<template>
  <div id="app">
    <Sidebar v-if="this.statusUser == 'admin'"/>
    <Navbar v-if="this.statusUser !== 'admin'"/>
    <router-view/>
  </div>
</template>
<script>
import Navbar from '@/components/Navbar.vue';
import Sidebar from '@/components/Sidebar.vue';
export default {
  components:{
    Navbar,
    Sidebar
  }
}
</script>
