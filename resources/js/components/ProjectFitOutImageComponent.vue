<template>
  <div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Project Fit Out Image</h1>
    </div>
    <div class="row">
      <!-- Area Chart -->
      <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Project Fit Out Image</h6>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Main Image</th>
                    <th>Project Fit Out</th>
                    <th colspan="2">Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>No.</th>
                    <th>Main Image</th>
                    <th>Project Fit Out</th>
                    <th colspan="2">Action</th>
                  </tr>
                </tfoot>
                <tbody>
                  <tr v-for="(project_fit_out_image, index) in project_fit_out_images" :key="project_fit_out_image.id">
                      <td>{{index+1}}</td>
                      <td><img :src="'../storage/'+project_fit_out_image.main_image" :alt="project_fit_out_image.company" width="100px"></td>
                      <td><span v-if="project_fit_outs_key_using_id[project_fit_out_image.project_fit_out_id]">
                        {{project_fit_outs_key_using_id[project_fit_out_image.project_fit_out_id].name}}
                      </span></td>
                      <td><button class="btn btn-info" @click="loadUpdateModal(index)">Edit </button></td>
                      <td><button class="btn btn-danger" @click="deleteProjectFitOutImage(index)">Remove </button></td>
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
            <h6 class="m-0 font-weight-bold text-primary">Add New Project Fit Out Image</h6>
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
                <label>Main Image</label>
                 <img :src="project_fit_out_image.main_image" class="img-responsive" width="100%" v-if="project_fit_out_image.main_image!=''">
                <input type="file" class="form-control form-control-user" placeholder="Main Image" @change="onMainImageChange" id="main_image_upload">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
                <label>Project Fit Out</label>
                <select class="form-control form-control-user" v-model="project_fit_out_image.project_fit_out_id">
                  <option selected disabled>Please select project_fit_out_image type placement</option>
                  <option v-for="(project_fit_out,index) in project_fit_outs" v-bind:value="project_fit_out.id">
                    {{project_fit_out.name}}
                  </option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
                <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" @click="createProjectFitOutImage()"><i class="fas fa-plus fa-sm text-white-50"></i> Add New Project Fit Out Image</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="update-modal" tabindex="-1" role="dialog" >
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header" style="padding-right:20px; padding-bottom:0px; border-bottom:1px solid transparent;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" style="padding-top:0px; padding-left:20px; padding-right:20px; padding-bottom:20px;">
                  <div class="row">
                      <div class="col-md-12 text-center">
                          
                          <div class="row ">
                              <div class="col-md-12 text-center">
                                  <h3 style="margin-bottom:0px;" class="text-primary">Edit Project Fit Out Image</h3>
                                  <div class="alert alert-danger" v-if="errors.length > 0">
                                      <ul>
                                          <li v-for="error in errors">{{error}}</li>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                              <label>Main Image</label>
                                <img :src="new_update_project_fit_out_image.main_image" class="img-responsive" width="100%" v-if="new_update_project_fit_out_image.main_image!=''">
                              <input type="file" class="form-control form-control-user" placeholder="Main Image" @change="onUpdateMainImageChange" id="update_main_image_upload">
                            </div>
                          </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-sm-12">
                              <label>Project Fit Out</label>
                              <select class="form-control form-control-user" v-model="new_update_project_fit_out_image.project_fit_out_id">
                                <option selected disabled>Please select project fit out image type placement</option>
                                <option v-for="(project_fit_out,index) in project_fit_outs" v-bind:value="project_fit_out.id">
                                  {{project_fit_out.name}}
                                </option>
                              </select>
                            </div>
                          </div>
                          <div class="row paddinginput">
                              <div class="col-md-12">
                                  <div class="">
                                      <div class="card-body">
                                          <div class="row margintop4020">
                                              <div class="col-md-12 text-center">
                                                  <button @click="updateProjectFitOutImage()" class="btn btn-sm btn-primary shadow-sm" >
                                                      Edit Project Fit Out Image
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
                project_fit_out_image:{
                    main_image:"",
                    project_fit_out_id:"",
                },
                errors: [],
                project_fit_out_images: [],
                project_fit_outs: [],
                project_fit_outs_key_using_id: [],
                new_update_project_fit_out_image:[],
                uri:'/resource/project_fit_out_image',
                project_fit_out_uri:'/resource/project_fit_out',
            }
        },
        methods:{
            loadUpdateModal(index){
                this.errors="";
                $("#update-modal").modal("show");
                this.new_update_project_fit_out_image=JSON.parse(JSON.stringify(this.project_fit_out_images[index]));
            },
            loadProjectFitOutImages(){
                axios.get(this.uri).then(response=>{
                  this.project_fit_out_images = response.data.project_fit_out_images
                });
            },
            loadProjectFitOuts(){
                axios.get(this.project_fit_out_uri).then(response=>{
                  let data = [];
                  response.data.project_fit_outs.forEach(
                      (project_fit_out) => data[project_fit_out.id] = project_fit_out
                  );
                  this.project_fit_outs = response.data.project_fit_outs;
                  this.project_fit_outs_key_using_id = data;
                });
            },
            onMainImageChange(e) {
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createMainImage(files[0]);
            },
            createMainImage(file) {
                let reader = new FileReader();
                reader.onload = (e) => {
                    this.project_fit_out_image.main_image = e.target.result;
                };
                reader.readAsDataURL(file);
            },
            createProjectFitOutImage(){
              let formData = new FormData();
              var main_image_file = document.querySelector('#main_image_upload');
              formData.append('project_fit_out_id',this.project_fit_out_image.project_fit_out_id);
              formData.append('main_image',main_image_file.files[0]);
                axios.post(this.uri,formData,{
                  headers: {
                    'Content-Type': 'multipart/form-data'
                  }
                }).then(response=>{
                        this.project_fit_out_images.push(response.data.project_fit_out_images);
                        toastr.success(response.data.status);
                        this.resetData();
                }).catch(error=>{
                    if (error.response.data.name){
                        this.errors.push(error.response.data.name[0]);
                    }
                });
            },
            onUpdateMainImageChange(e) {
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createUpdateMainImage(files[0]);
            },
            createUpdateMainImage(file) {
                let reader = new FileReader();
                reader.onload = (e) => {
                    this.new_update_project_fit_out_image.main_image = e.target.result;
                };
                reader.readAsDataURL(file);
            },
            updateProjectFitOutImage(){
                let formData = new FormData();
                var update_main_image_file = document.querySelector('#update_main_image_upload');
                formData.append("_method", 'PATCH');
                formData.append('project_fit_out_id',this.new_update_project_fit_out_image.project_fit_out_id);
                let main_image = ''
                if (update_main_image_file.files[0]) {
                  main_image = update_main_image_file.files[0]
                }
                formData.append('main_image',main_image);
                
                axios.post(this.uri+"/"+this.new_update_project_fit_out_image.id,formData,{
                  headers: {
                    'Content-Type': 'multipart/form-data'
                  }
                }).then(response=>{
                        this.resetData();
                        $("#update-modal").modal("hide");
                        toastr.success(response.data.status);
                        this.loadProjectFitOutImages();
                }).catch(error=>{
                    if (error.response.data.name){
                        this.errors.push(error.response.data.name[0]);
                    }
                });
            },
            deleteProjectFitOutImage(index){
                let confirmBox = confirm("Do you really want to delete this?");
                if(confirmBox==true){
                    axios.delete(this.uri+"/"+this.project_fit_out_images[index].id).then(
                        response=>{
                            this.$delete(this.project_fit_out_images,index);
                            toastr.success(response.data.status);
                        }).catch(error=>{
                            console.log("Could not delete for some reason");
                        });
                }
            },
            resetData(){
                this.errors=[];
                var main_image_file = document.querySelector('#main_image_upload');
                main_image_file.value='';
                this.project_fit_out_image.project_fit_out_id = '';
                this.project_fit_out_image.main_image = '';
                this.new_update_project_fit_out_image.main_image = '';
            }
        },
        mounted() {
            this.loadProjectFitOutImages();
            this.loadProjectFitOuts();
            console.log('ProjectFitOutImages mounted.')
        }
    }
</script>