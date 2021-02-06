<template>
    <div class="container pt-5">
        <div class="row mt-5 shadow p-4">
            <div class="col-12 text-center mb-4 display-4">Register</div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <img src="@/assets/image/gedung.jpg" class="img-fluid">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" v-model="formData.name">
                </div>
                <div class="form-group">
                    <label>Kelas</label>
                    <input type="text" class="form-control" v-model="formData.kelas">
                </div>
                <div class="form-group">
                    <label>Jurusan</label>
                    <select class="form-control" v-model="formData.jurusan">
                        <option v-for="item in jurusan" :value="item" :key="item">
                            {{item}}
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <label>No. Telepon</label>
                    <input type="text" class="form-control" v-model="formData.no_telepon">
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea class="form-control" v-model="formData.alamat"></textarea>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" v-model="formData.email">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" v-model="formData.password">
                </div>
                <div class="form-group mt-5">
                    <button class="btn btn-success form-control" @click="register">Register</button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios';
export default {
    name:'register',
    data: function(){
        return {
            jurusan:['TKJ','BDP','AKM'],
            formData:{
                name:'',
                kelas:'',
                jurusan:'',
                no_telepon:'',
                alamat:'',
                email:'',
                password:''
            }
        }
    },
    methods:{
        register: function(){
            let formData = new FormData();
            for(var key in this.formData){
                formData.append(key, this.formData[key]);
            }
            axios.post(this.api+'register',formData)
            .then(function(response){
                if(response.data){
                    let authData = {
                        status: 'siswa',
                        token: response.data.token
                    }
                    localStorage.setItem('smk-kristen-immanuel-pontianak', JSON.stringify(authData));
                    window.location.href = "/";
                }
            })
        }
    }
}
</script>