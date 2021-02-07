<template>
    <div class="container">
        <div class="row shadow p-3">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" v-model="formData.name">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" v-model="formData.email">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" v-model="formData.password">
                </div>
                <div class="form-group">
                    <label>Kelas</label>
                    <select class="form-control" v-model="formData.kelas">
                        <option v-for="item in kelas" :value="item">{{item}}</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <label>Jurusan</label>
                    <select class="form-control" v-model="formData.jurusan">
                        <option v-for="item in jurusan" :value="item">{{item}}</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>No Telepon</label>
                    <input type="text" class="form-control" v-model="formData.no_telepon">
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea class="form-control" v-model="formData.alamat"></textarea>
                </div>
                 <div class="form-group" v-if="onEdit">
                    <label>Status</label>
                    <select class="form-control" v-model="formData.status">
                        <option v-for="item in status" :value="item">{{item}}</option>
                    </select>
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
            onEdit: false,
            kelas:['X','XI','XII'],
            jurusan:['TKJ','AK','BDP'],
            status:['admin','siswa'],
            formData:{
                name:'',
                email:'',
                password:'',
                kelas:'',
                jurusan:'',
                no_telepon:'',
                alamat:'',
                status:'',
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
        async postData(){
            let request = await axios.post(this.api+'register',this.formData)
            .then(function(response){
                
            });
            if(request){
                this.getData();
            }
        },

        getData(){
            let data ={

                    head:['Id','Name','Email','Kelas','Jurusan','No Telepon','Alamat','Status'],
                    rows:[]
                }
            axios.get(this.api + 'profile')
                .then(function(response){
                    response.data.forEach(item => {
                        data.rows.push({
                            id:item.id,
                            name:item.name,
                            email:item.email,
                            kelas:item.profile.kelas,
                            jurusan:item.profile.jurusan,
                            no_telepon:item.profile.no_telepon,
                            alamat:item.profile.alamat,
                            status:item.profile.status
                        })
                    });
            })
            this.table = data;
        },

        edit(id){
            this.id = id;
            var data = this.table.rows.filter(item => item.id == id);
            this.formData = data[0];
            this.onEdit = true;
        },

        async update(){
            let request = await axios.put(this.api+'profile/'+this.id,this.formData)
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

        del(id){
            alert(id);
        }
    }
}
</script>