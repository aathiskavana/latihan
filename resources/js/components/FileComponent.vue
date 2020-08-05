<template>
  <div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">File</h1>
    </div>
    <div class="row">
      <!-- Area Chart -->
      <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">File</h6>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Content</th>
                    <th colspan="2">Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Content</th>
                    <th colspan="2">Action</th>
                  </tr>
                </tfoot>
                <tbody>
                  <tr v-for="(file, index) in files" :key="file.id">
                      <td>{{index+1}}</td>
                      <td>{{file.name}}</td>
                      <td><img :src="'../storage/'+file.content" :alt="file.name" width="100px"></td>
                      <td><button class="btn btn-info" @click="loadUpdateModal(index)">Edit </button></td>
                      <td><button class="btn btn-danger" @click="deleteFile(index)">Remove </button></td>
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
            <h6 class="m-0 font-weight-bold text-primary">Add New File</h6>
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
                <label>Content</label>
                 <img :src="file.content" class="img-responsive" width="100%" v-if="file.content!=''">
                <input type="file" class="form-control form-control-user" placeholder="Content" @change="onContentChange" id="content_upload">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12 mb-3 mb-sm-0">
                <label>Name</label>
                <input type="text" class="form-control form-control-user"  placeholder="Name" v-model="file.name">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
                <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" @click="createFile()"><i class="fas fa-plus fa-sm text-white-50"></i> Add New File</button>
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
                                  <h3 style="margin-bottom:0px;" class="text-primary">Edit File</h3>
                                  <div class="alert alert-danger" v-if="errors.length > 0">
                                      <ul>
                                          <li v-for="error in errors">{{error}}</li>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                              <label>Content</label>
                                <img :src="new_update_file.content" class="img-responsive" width="100%" v-if="new_update_file.content!=''">
                              <input type="file" class="form-control form-control-user" placeholder="Content" @change="onUpdateContentChange" id="update_content_upload">
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                              <label>Name</label>
                              <input type="text" class="form-control form-control-user"  placeholder="Name" v-model="new_update_file.name">
                            </div>
                          </div>
                          <div class="row paddinginput">
                              <div class="col-md-12">
                                  <div class="">
                                      <div class="card-body">
                                          <div class="row margintop4020">
                                              <div class="col-md-12 text-center">
                                                  <button @click="updateFile()" class="btn btn-sm btn-primary shadow-sm" >
                                                      Edit File
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
                file:{
                    content:"",
                    name:"",
                },
                errors: [],
                files: [],
                new_update_file:[],
                uri:'/resource/file',
            }
        },
        methods:{
            loadUpdateModal(index){
                this.errors="";
                $("#update-modal").modal("show");
                this.new_update_file=JSON.parse(JSON.stringify(this.files[index]));
            },
            loadFiles(){
                axios.get(this.uri).then(response=>{
                  this.files = response.data.files
                });
            },
            onContentChange(e) {
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createContent(files[0]);
            },
            createContent(file) {
                let reader = new FileReader();
                reader.onload = (e) => {
                    this.file.content = e.target.result;
                };
                reader.readAsDataURL(file);
            },
            createFile(){
              let formData = new FormData();
              var content_file = document.querySelector('#content_upload');
              formData.append('name',this.file.name);
              formData.append('content',content_file.files[0]);
                axios.post(this.uri,formData,{
                  headers: {
                    'Content-Type': 'multipart/form-data'
                  }
                }).then(response=>{
                        this.files.push(response.data.files);
                        toastr.success(response.data.status);
                        this.resetData();
                }).catch(error=>{
                    if (error.response.data.name){
                        this.errors.push(error.response.data.name[0]);
                    }
                });
            },
            onUpdateContentChange(e) {
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createUpdateContent(files[0]);
            },
            createUpdateContent(file) {
                let reader = new FileReader();
                reader.onload = (e) => {
                    this.new_update_file.content = e.target.result;
                };
                reader.readAsDataURL(file);
            },
            updateFile(){
                let formData = new FormData();
                var update_content_file = document.querySelector('#update_content_upload');
                formData.append("_method", 'PATCH');
                formData.append('name',this.new_update_file.name);
                let content = ''
                if (update_content_file.files[0]) {
                  content = update_content_file.files[0]
                }
                formData.append('content',content);
                
                axios.post(this.uri+"/"+this.new_update_file.id,formData,{
                  headers: {
                    'Content-Type': 'multipart/form-data'
                  }
                }).then(response=>{
                        this.resetData();
                        $("#update-modal").modal("hide");
                        toastr.success(response.data.status);
                        this.loadFiles();
                }).catch(error=>{
                    if (error.response.data.name){
                        this.errors.push(error.response.data.name[0]);
                    }
                });
            },
            deleteFile(index){
                let confirmBox = confirm("Do you really want to delete this?");
                if(confirmBox==true){
                    axios.delete(this.uri+"/"+this.files[index].id).then(
                        response=>{
                            this.$delete(this.files,index);
                            toastr.success(response.data.status);
                        }).catch(error=>{
                            console.log("Could not delete for some reason");
                        });
                }
            },
            resetData(){
                this.errors=[];
                var content_file = document.querySelector('#content_upload');
                content_file.value='';
                this.file.name = '';
                this.file.content = '';
                this.new_update_file.content = '';
            }
        },
        mounted() {
            this.loadFiles();
            console.log('Files mounted.')
        }
    }
</script>