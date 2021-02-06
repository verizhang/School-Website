<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light bg-white shadow fixed-top">
        <a class="navbar-brand" href="#">
            <img src="../assets/logo.png" width="30" height="30" class="d-inline-block align-top" loading="lazy">
            SMK Kristen Immanuel Pontianak
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <router-link :to="{ name: 'landingpage'}">
                        <a class="nav-link" href="">Home</a>
                    </router-link>
                </li>
                <li v-if="auth" class="nav-item active">
                    <router-link :to="{ name: 'lms'}">
                         <a class="nav-link" href="">LMS</a>
                    </router-link>
                </li>
                <li v-if="auth == false" class="nav-item active">
                    <router-link :to="{ name: 'register'}">
                        <a class="nav-link text-decoration-none mx-1" id="register">Register</a>
                    </router-link>
                </li>
                <li v-if="auth == false" class="nav-item active">
                    <router-link :to="{ name: 'login'}">
                        <a class="nav-link text-decoration-none mx-1" id="login">Login</a>
                    </router-link>
                </li>
                <li v-if="auth == true" class="nav-item active">
                    <a class="nav-link text-decoration-none mx-1" @click = "logout">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
</template>

<script>
export default {
    name:'Navbar',
    data: function(){
        return {
            auth: true
        }
    },
    mounted: function(){
        let authData = localStorage.getItem('smk-kristen-immanuel-pontianak')
        if(authData == "null"){
            this.auth = false;
        }
    },
    methods:{
        logout: function() {
            localStorage.setItem('smk-kristen-immanuel-pontianak','null')
            this.auth = false
        }
    }
}
</script>