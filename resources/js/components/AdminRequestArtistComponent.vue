<template>
  <div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Request Artist</h1>
    </div>
    <div class="row">
      <!-- Area Chart -->
      <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Request Artist</h6>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bartisted" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Artist</th>
                    <th colspan="2">Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Artist</th>
                    <th colspan="2">Action</th>
                  </tr>
                </tfoot>
                <tbody>
                  <tr v-for="(request_artist, index) in request_artists" :key="request_artist.id">
                      <td>{{index+1}}</td>
                      <td>{{request_artist.name}}</td>
                      <td>{{request_artist.email}}</td>
                      <td>{{request_artist.artist}}</td>
                      <td><button class="btn btn-info" @click="loadUpdateModal(index)">Edit </button></td>
                      <td><button class="btn btn-danger" @click="deleteProject(index)">Remove </button></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <!-- Pie Chart -->
      <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Add New Request Artist</h6>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <div class="row ">
                <div class="col-md-12 text-center">
                    <div class="alert alert-danger" v-if="errors.length > 0">
                        <ul>
                            <li v-for="error in errors">{{error}}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12 mb-3 mb-sm-0">
                <label>Name</label>
                <input type="text" class="form-control form-control-user"  placeholder="Name" v-model="request_artist.name">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12 mb-3 mb-sm-0">
                <label>Email</label>
                <input type="email" class="form-control form-control-user"  placeholder="Email" v-model="request_artist.email">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12 mb-3 mb-sm-0">
                <label>Artist</label>
                <input type="text" class="form-control form-control-user"  placeholder="Artist" v-model="request_artist.artist">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
                <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" @click="createRequestArtist()"><i class="fas fa-plus fa-sm text-white-50"></i> Add New Request Artist</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="update-modal" tabindex="-1" role="dialog" >
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header" style="padding-right:20px; padding-bottom:0px; bartist-bottom:1px solid transparent;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" style="padding-top:0px; padding-left:20px; padding-right:20px; padding-bottom:20px;">
                  <div class="row">
                      <div class="col-md-12 text-center">
                          
                          <div class="row ">
                              <div class="col-md-12 text-center">
                                  <h3 style="margin-bottom:0px;" class="text-primary">Edit Request Artist</h3>
                                  <div class="alert alert-danger" v-if="errors.length > 0">
                                      <ul>
                                          <li v-for="error in errors">{{error}}</li>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                              <label>Name</label>
                              <input type="text" class="form-control form-control-user"  placeholder="Name" v-model="new_update_request_artist.name">
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                              <label>Email</label>
                              <input type="email" class="form-control form-control-user"  placeholder="Email" v-model="new_update_request_artist.email">
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                              <label>Artist</label>
                              <input type="text" class="form-control form-control-user"  placeholder="Artist" v-model="new_update_request_artist.artist">
                            </div>
                          </div>
                          <div class="row paddinginput">
                              <div class="col-md-12">
                                  <div class="">
                                      <div class="card-body">
                                          <div class="row margintop4020">
                                              <div class="col-md-12 text-center">
                                                  <button @click="updateRequestArtist()" class="btn btn-sm btn-primary shadow-sm" >
                                                      Edit Request Artist
                                                  </button>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
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
                    name:"",
                    email:"",
                    artist:"",
                },
                errors: [],
                request_artists: [],
                new_update_request_artist:[],
                uri:'/resource/request_artist',
            }
        },
        methods:{
            loadUpdateModal(index){
                this.errors="";
                $("#update-modal").modal("show");
                this.new_update_request_artist = JSON.parse(JSON.stringify(this.request_artists[index]));
            },
            loadRequestArtists(){
                axios.get(this.uri).then(response=>{
                  this.request_artists = response.data.request_artists;
                });
            },
            createRequestArtist(){
              let formData = new FormData();
              formData.append('name',this.request_artist.name);
              formData.append('email',this.request_artist.email);
              formData.append('artist',this.request_artist.artist);
                axios.post(this.uri,formData,{
                  headers: {
                    'Content-Type': 'multipart/form-data'
                  }
                }).then(response=>{
                        this.request_artists.push(response.data.request_artists);
                        toastr.success(response.data.status);
                        this.resetData();
                }).catch(error=>{
                    if (error.response.data.name){
                        this.errors.push(error.response.data.name[0]);
                    }
                });
            },
            updateRequestArtist(){
                let formData = new FormData();
                formData.append("_method", 'PATCH');
                formData.append('name',this.new_update_request_artist.name);
                formData.append('email',this.new_update_request_artist.email);
                formData.append('artist',this.new_update_request_artist.artist);
                axios.post(this.uri+"/"+this.new_update_request_artist.id,formData,{
                  headers: {
                    'Content-Type': 'multipart/form-data'
                  }
                }).then(response=>{
                        this.resetData();
                        $("#update-modal").modal("hide");
                        toastr.success(response.data.status);
                        this.loadRequestArtists();
                }).catch(error=>{
                    if (error.response.data.name){
                        this.errors.push(error.response.data.name[0]);
                    }
                });
            },
            deleteProject(index){
                let confirmBox = confirm("Do you really want to delete this?");
                if(confirmBox==true){
                    axios.delete(this.uri+"/"+this.request_artists[index].id).then(
                        response=>{
                            this.$delete(this.request_artists,index);
                            toastr.success(response.data.status);
                        }).catch(error=>{
                            console.log("Could not delete for some reason");
                        });
                }
            },
            resetData(){
                this.errors=[];
                this.request_artist.name = '';
                this.request_artist.email = '';
                this.request_artist.artist = '';
            }
        },
        mounted() {
            this.loadRequestArtists();
            console.log('Projects mounted.')
        }
    }
</script>