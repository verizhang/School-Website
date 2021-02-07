<template>
    <div class="container pt-5">
        <div class="row mt-5 shadow p-4">
            <div class="col-12 text-center mb-4 display-4">Login</div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <img src="@/assets/image/gedung.jpg" class="img-fluid">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div v-if="data.incredential == true" class="alert alert-danger" role="alert">
                    Opss! ada kesalahan periksa kembali password dan email anda!
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" v-model="data.email">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" v-model="data.password">
                </div>
                <div class="form-group mt-5">
                    <button class="btn btn-success form-control" @click="login">Login</button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios'
export default {
    name:'login',
    data: function(){
        return {
            data:{
                email:'',
                password:'',
                incredential:false,
            }
        }
    },
    methods:{
        login: async function () {
            let formData = new FormData()
            formData.append('email', this.data.email)
            formData.append('password', this.data.password)
            
            axios.post(this.api+'login',formData)
            .then(function(response){
                if(response.data){
                    let authData = {
                        status:response.data.user.profile.status,
                        token:response.data.token
                    };

                    localStorage.setItem('smk-kristen-immanuel-pontianak', JSON.stringify(authData));
                    if(authData.status == 'admin'){
                        window.location.href = "/admin";
                    }else{
                        window.location.href = "/";
                    }
                }
            }).catch(error => this.data.incredential = true);
        }
    }
}
</script>