import '@babel/polyfill'
import 'mutationobserver-shim'
import Vue from 'vue'
import './plugins/bootstrap-vue'
import App from './App.vue'
import router from './router'

Vue.config.productionTip = false
Vue.prototype.api = 'http://localhost:8000/api/'
if(localStorage.getItem('smk-kristen-immanuel-pontianak') !== 'null'){
  Vue.prototype.statusUser = JSON.parse(localStorage.getItem('smk-kristen-immanuel-pontianak')).status
}else{
  Vue.prototype.statusUser = 'null';
}
new Vue({
  router,
  render: h => h(App)
}).$mount('#app')
