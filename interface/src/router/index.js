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
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
