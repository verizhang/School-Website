<template>
    <section class="container-fluid container-file">
        <div class="container">
            <div v-for="item in materi" :key="item.id" class="row mt-5 row-file border-bottom py-4">
                <h4 class="title-file">{{item.mapel}}</h4>
                <div v-for="materi in item.materi" :key="materi.id" class="col-lg-12 py-3 rounded shadow-sm content-file border mt-2">
                    <div class="col-12 justify-content-between d-flex">
                        <strong>{{materi.judul}}</strong>
                        <a class="btn btn-success" :href="file+materi.file">Open</a>
                    </div>
                    <p class="col-12">{{materi.deskripsi}}</p>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
import axios from 'axios';
export default {
    name:'LMS',
    data(){
        return {
            materi:[],
            file: this.imageURL
        }
    },
    mounted(){
        this.getMateri();
    },
    methods:{
        async getMateri(){
            let materi = await axios.get(this.api + 'materi').then(function(response){
                console.log(response.data)

                return response.data
            })
            this.materi = materi
        }        
    }
}
</script>

<style scoped src="@/assets/css/style-lms.css">
</style>