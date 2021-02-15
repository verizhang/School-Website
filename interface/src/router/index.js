import { BIconLayoutThreeColumns } from 'bootstrap-vue';
import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import Landingpage from '../views/website/Landingpage.vue';
import LMS from '../views/website/LMS.vue';
import Login from '../views/website/Login.vue';
import Register from '../views/website/Register.vue';

//Admin Views
import User from '../views/admin/User.vue';
import News from '../views/admin/News.vue';
import Jurusan from '../views/admin/Jurusan.vue';
import Ekskul from '../views/admin/Ekskul.vue';
import Karya from '../views/admin/Karya.vue';
import Mapel from '../views/admin/Mapel.vue';
import Materi from '../views/admin/Materi.vue';

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'landingpage',
    component: Landingpage
  },
  {
    path:'/lms',
    name:'lms',
    component: LMS
  },
  {
    path:'/login',
    name:'login',
    component: Login
  },
  {
    path:'/register',
    name:'register',
    component: Register
  },
  {
    path: '/admin/user',
    name:'user',
    component: User
  },
  {
    path: '/admin/news',
    name:'news',
    component: News
  },
  {
    path: '/admin/jurusan',
    name:'jurusan',
    component: Jurusan
  },
  {
    path: '/admin/ekskul',
    name:'ekskul',
    component: Ekskul
  },
  {
    path: '/admin/karya',
    name:'karya',
    component: Karya
  },
  {
    path: '/admin/mapel',
    name:'mapel',
    component: Mapel
  },
  {
    path: '/admin/materi',
    name:'materi',
    component: Materi
  },
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
