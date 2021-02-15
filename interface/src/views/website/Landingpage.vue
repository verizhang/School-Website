<template>
    <div>
        <section class="container-fluid section-banner">
            <div class="row row-banner">
                <div class="col-lg-12 content-banner d-flex justify-content-center">
                    <div class="jumbotron jumbotron-fluid">
                        <div class="container">
                            <h1 class="display-4">SMK Kristen Immanuel 1 Pontianak</h1>
                            <p class="lead">SMK Kristen Immanuel adalah SMK yang berada di Pontianak tepatnya di Jl Jl. Letnan Jendral Sutoyo, Parit Tokaya, Kec. Pontianak Sel., Kota Pontianak, Kalimantan Barat 78113</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="container section-jurusan py-5">
            <h1 class="text-center p-3">Ada Jurusan Apa Aja Sih?</h1>
            <div class="row">
                <div v-for="item in jurusan" :key="item.id" class="col-lg-4 p-4 d-flex justify-content-center">
                    <div class="content-jurusan shadow p-3">
                        <div class="icon-container d-flex justify-content-center">
                            <img :src="image + item.gambar" class="image-jurusan">
                        </div>
                        <h3 class="text-center pt-3">{{item.jurusan}}</h3>
                        <p>{{item.deskripsi}}</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="container-fluid container-news py-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="text-center p-3 text-light">News</h1>
                    </div>
                </div>        
                <div class="row row-news d-flex">   
                    <div v-for="item in news" :key="item.id" class="col-md-6 col-lg-3 content-news">
                        <div class="card shadow">
                            <img :src="image + item.gambar" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{item.judul}}</h5>
                                <p class="card-text">{{item.subjudul}}</p>
                                <button type="button" class="btn btn-primary button-news" data-toggle="modal" data-target=".bd-example-modal-lg">Lebih Banyak</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="container-fluid container-prestasi py-5">
            <div class="container">
                <h1 class="text-center p-3">Prestasi Apa Aja Sih Yang Sudah Ditorehkan ?</h1>
                <div class="row row-prestasi">   
                    <div v-for="item in prestasi" :key="item.id" class="col-sm-6 col-lg-3 content-prestasi">
                        <div class="card shadow">
                            <img :src="image + item.gambar" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{item.judul}}</h5>
                                <p class="card-text">{{item.subjudul}}</p>
                            </div>
                        </div>
                    </div>          
                </div>
            </div>
        </section>



        <section class="container-fluid container-exschool py-5">
            <div class="container">
                <h1 class="text-center p-3 text-white">Ekskul Apa Aja Sih Yang Tersedia ?</h1>
                <div class="row row-exschool">   
                    <div v-for="item in ekskul" class="col-sm-6 col-lg-3 content-exschool">
                        <div class="card shadow">
                            <img :src="imageURL + item.gambar" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{item.ekskul}}</h5>
                                <p class="card-text">{{item.deskripsi}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="container-fluid container-karya py-5">
            <div class="container">
                <h1 class="text-center p-3">Apa Aja Sih Karya Siswa/Siswi Immanuel ?</h1>
                <div class="row row-karya">
                    <div v-for="item in karya" :key="item.id" class="col-sm-6 col-lg-4 d-flex justify-content-center">
                        <div class="card shadow">
                            <img :src="imageURL + item.gambar" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{item.karya}}</h5>
                                <p class="card-text">{{item.anggota}}</p>
                                <a :href="item.link" class="btn btn-primary">Lihat Lebih</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="container-fluid container-info-pendaftaran">
            <section class="container py-5">
                <h1 class="text-center p-3">Info Pendaftaran</h1>
                <div class="row">
                    <div class="col-lg-6">
                        <h3>Pendaftaran Gelomabang II</h3>
                        <p>
                            Yuk! bagi siswa/siswi SMP yang ingin bergabung dengan persekolahan SMK Kristen Immanuel Pontianak bisa langsung mengambil formulir pendaftaran yang berlaku dari 1 November 2020 - 30 November 2020. Lokasi pengambilan langsung di Gedung SMK Kristen Immanuel Pontianak tepatnya di Jl. Letnan Jendral Sutoyo, Parit Tokaya, Kec. Pontianak Sel., Kota Pontianak, Kalimantan Barat 78113
                        </p>

                        <table>
                            <tr>
                                <td>Instagram</td>
                                <td>:</td>
                                <td>@smkkristenimmanul</td>
                            </tr>
                            <tr>
                                <td>Whatsapp</td>
                                <td>:</td>
                                <td>0856-5453-4628</td>
                            </tr>
                            <tr>
                                <td>Facebook</td>
                                <td>:</td>
                                <td>SMK Kristen Immanuel Pontianak</td>
                            </tr>
                            <tr>
                                <td>Website</td>
                                <td>:</td>
                                <td>smk.immanuel.net</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-lg-6">
                        <img src="@/assets/image/gedung.jpg" class="w-100 rounded">
                    </div>
                </div>
            </section>
        </section>

        <footer class="container-fluid  footer py-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <img src="@/assets/logo.png" class="mb-3" width="20%">
                        <h3>SMK Kristen Immanuel Pontianak</h3>
                        <p>
                        SMK Kristen Immanuel adalah SMK yang berada di Pontianak tepatnya di Jl Jl. Letnan Jendral Sutoyo, Parit Tokaya, Kec. Pontianak Sel., Kota Pontianak, Kalimantan Barat 78113
                        </p>

                        <table>
                            <tr>
                                <td>Instagram</td>
                                <td>:</td>
                                <td>@smkkristenimmanul</td>
                            </tr>
                            <tr>
                                <td>Whatsapp</td>
                                <td>:</td>
                                <td>0856-5453-4628</td>
                            </tr>
                            <tr>
                                <td>Facebook</td>
                                <td>:</td>
                                <td>SMK Kristen Immanuel Pontianak</td>
                            </tr>
                            <tr>
                                <td>Website</td>
                                <td>:</td>
                                <td>smk.immanuel.net</td>
                            </tr>
                        </table>
                    </div>

                    <div class="col-lg-6">
                        <form>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Nama</label>
                                <input type="email" class="form-control" placeholder="Your Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Email</label>
                                <input type="email" class="form-control" placeholder="Your email">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Pesan</label>
                                <textarea class="form-control" rows="3"></textarea>
                            </div>
                            <button class="btn btn-primary w-100">Kirim</button>
                        </form>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</template>
<script>
import axios from 'axios';
export default {
    name: 'landingpage',
    data(){
        return {
            image: this.imageURL,
            jurusan:[],
            news:[],
            prestasi:[],
            ekskul:[],
            karya:[],
        }
    },
    mounted(){
        this.getJurusan()
        this.getNews()
        this.getEkskul()
        this.getKarya()
    },
    methods:{
        async getJurusan(){
            let jurusan = await axios.get(this.api + 'jurusan').then(function(response){
                return response.data
            })
            this.jurusan = jurusan
        },
        async getNews(){
            let news = [];
            let prestasi = [];
            await axios.get(this.api + 'news').then(function(response){
                return response.data.forEach(item => {
                    if(item.kategori == "berita"){
                        news.push(item)
                    }else{
                        prestasi.push(item)
                    }
                });
            })
            this.news = news;
            this.prestasi = prestasi;
        },
        async getEkskul(){
            let ekskul = await axios.get(this.api + 'ekskul').then(function(response){
                return response.data
            })
            this.ekskul = ekskul
        },
        async getKarya(){
            let karya = await axios.get(this.api + 'karya').then(function(response){
                return response.data
            })
            this.karya = karya
        },
    }
}
</script>
<style scoped src="@/assets/css/style-home.css">
</style>