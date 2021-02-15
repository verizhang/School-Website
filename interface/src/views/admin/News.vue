<template>
    <div class="container">
        <h1>News</h1>
        <div class="row shadow rounded p-3">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <label>Judul</label>
                    <input type="text" class="form-control" v-model="formData.judul">
                </div>
                <div class="form-group">
                    <label>Subjudul</label>
                    <input type="text" class="form-control" v-model="formData.subjudul">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <label>Isi</label>
                    <textarea class="form-control" v-model="formData.isi"></textarea>
                </div>
                <div class="form-group">
                    <label>Kategori</label>
                    <select v-model="formData.kategori" class="form-control">
                        <option v-for="item in kategori" :value="item">{{item}}</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Gambar</label>
                    <input type="file" id="image" class="form-control" @change="file">
                </div>
            </div>

            <div class="form-group col-lg-12 col-sm-12">
                    <button class="btn btn-success form-control" v-if="!onEdit" @click="postData">Input</button>
                    <button class="btn btn-warning form-control" v-if="onEdit" @click="update()">Update</button>
            </div>
        </div>
        <admin-table v-bind:data="this.table" @edit="edit" @del="del"></admin-table>
    </div>
</template>
<script>
import AdminTable from '@/components/AdminTable.vue'
import axios from 'axios';
export default {
    data(){
        return {
            table:{},
            id:'',
            kategori:['berita','prestasi'],
            onEdit: false,
            formData:{
                judul:'',
                subjudul:'',
                isi:'',
                kategori:'',
                gambar:''
            }
        }
    },
    components:{
        AdminTable
    },
    
    mounted(){
        this.getData();
    },

    methods:{
        compactData(type){
            let formData = new FormData();
            for(var key in this.formData){
                formData.append(key, this.formData[key]);
            }
            if(type !== "null"){
                formData.append("_method",type)
            }
            return formData
        },
        file() {
            this.formData.gambar = document.getElementById("image").files[0]
            console.log(this.formData.gambar)
        },
        async postData(){
            let request = await axios.post(this.api+'news',this.compactData("null"))
            .then(function(response){
                if(response.data.message == 'ok'){
                    return true;
                }
            });

            if(request){
                this.getData()
            }
            
        },

        getData(){
            let data ={
                head:['Id','Title','Subtitle','Kategori','Isi'],
                rows:[]
            }
            axios.get(this.api + 'news')
                .then(function(response){
                    response.data.forEach(item => {
                        data.rows.push({
                            id:item.id,
                            judul:item.judul,
                            subjudul:item.subjudul,
                            isi:item.isi,
                            kategori:item.kategori,
                            gambar:`
                                <div style="width:200px">
                                    <img src=${"http://localhost:8000/"+item.gambar}  class="img-fluid">
                                </div>
                            `
                        })
                    });
            })
            this.table = data;
        },

        edit(id){
            this.id = id;
            let data = this.table.rows.filter(item => item.id == id);
            this.formData = Object.assign({},data[0]);
            this.onEdit = true;
        },

        async update(){
            let request = await axios.post(this.api+'news/'+this.id,this.compactData("PUT"))
            .then(function(response){
                if(response.data.message == 'ok'){
                    return true;
                }
            });
            if(request){
                this.getData();
                this.onEdit = false;
                for(var key in this.formData){
                    this.formData[key] = '';
                }
            }
        },

        async del(id){
            let request = await axios.delete(this.api+'news/'+id,this.formData)
            .then(function(response){
                if(response.data.message == 'ok'){
                    return true;
                }
            });
            if(request){
                this.getData();
            }
        }
    }
}
</script>