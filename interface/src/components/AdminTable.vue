<template>
    <table class="table table-borderless">
        <thead>
            <tr>
                <th v-for="items in data.head" :key="items">
                    {{items}}
                </th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="row in data.rows">
               <td v-for="item in row"><span v-html="item"></span></td>
               <td>
                   <button class="btn btn-primary mx-1" @click="edit(row.id)">Edit</button>
               </td>
               <td>
                   <button class="btn btn-danger mx-1" @click="del(row.id)">Delete</button>
               </td>


            </tr>
        </tbody>
    </table>
</template>
<script>
export default {
    name:'admin-table',
    props:{
        data:{}
    },
    methods:{
        edit(id){
            this.$emit('edit',id)
        },
        del(id){
            this.$emit('del',id)
        }
    }
}
</script>