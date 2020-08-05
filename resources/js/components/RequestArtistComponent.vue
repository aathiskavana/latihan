<template>
    <div>
    <div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close" @click="closeModel">&times;</span>
                <div class="feature-column small pt-60 pb-60 horizon" data-animate-in="preset:slideInLeftShort;duration:1000ms;" data-threshold="0.5" style="padding:0;">
                    <div class="feature-text center">
                        <h4 class="text-uppercase color-white center" style="padding:10px;margin: 0;">TELL US WHICH ARTIST DO YOU WISH TO SEE LIVE</h4>
                    </div>
                </div>
                <div class="contact-form-container">
                 <div class="request_artist-form">
                    <div class="row">
                        <div class="column width-12">
                            <input type="text" name="artistname" class="form-fname form-element large" placeholder="Artist Name" tabindex="1" required v-model="request_artist.artist">
                        </div>
                        <div class="column width-12">
                            <input type="text" name="yourname" class="form-lname form-element large" placeholder="Your Name" tabindex="2" v-model="request_artist.name">
                        </div>
                        <div class="column width-12">
                            <input type="email" name="email" class="form-email form-element large" placeholder="Email address*" tabindex="3" required v-model="request_artist.email">
                        </div>
                    </div>
                    <div class="row">
                        <div class="column width-12">
                            <button class="border-grey-light bkg-hover-charcoal color-grey-light color-hover-white text-uppercase" style="border: 5px solid white; color:white;padding:10px 40px;" @click="createRequestArtist">Submit</button>
                        </div>
                    </div>
                </div>
                <div id="form-response center"></div>
            </div>
        </div>
    </div>
</div>

</template>
<script>
    export default {
        data(){
            return{
                request_artist:{
                    artist:"",
                    name:"",
                    email:""
                },
                request_artists:[],
                uri_request_artist:'/submit/request_artist'
            }
        },
        methods:{
            createRequestArtist(){
                axios.post(this.uri_request_artist, {
                    artist:this.request_artist.artist,
                    name:this.request_artist.name,
                    email:this.request_artist.email,

                }).then(response=>{
                        this.request_artists.push(response.data.request_artist);
                        toastr.success(response.data.status);
                        this.resetData();
                        $("#myModal").modal("hide");
                }).catch(error=>{
                    if (error.response.data.name){
                        this.errors.push(error.response.data.name[0]);
                      }
                    
                });
            },
            closeModel(){
                $('#myModel').modal("hide");
            },
            resetData(){
                this.errors=[];
                this.request_artist.artist = '';
                this.request_artist.email = '';
                this.request_artist.name = '';

            }
            
        },
        mounted() {
            $('#myModel').show();
            console.log('modal show');
        }
    }
</script>