<template>
  <div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Project Category</h1>
    </div>
    <div class="row">
      <!-- Area Chart -->
      <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Project Category</h6>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Project Type</th>
                    <th colspan="2">Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Project Type</th>
                    <th colspan="2">Action</th>
                  </tr>
                </tfoot>
                <tbody>
                  <tr v-for="(project_category, index) in project_categories" :key="project_category.id">
                      <td>{{index+1}}</td>
                      <td>{{project_category.name}}</td>
                      <td><span v-if="project_types_key_using_id[project_category.project_type_id]">
                        {{project_types_key_using_id[project_category.project_type_id].name}}
                      </span></td>
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
            <h6 class="m-0 font-weight-bold text-primary">Add New Project Category</h6>
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
                <input type="text" class="form-control form-control-user"  placeholder="Name" v-model="project_category.name">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
                <label>Project  Type</label>
                <select class="form-control form-control-user" v-model="project_category.project_type_id">
                  <option selected disabled>Please select project type placement</option>
                  <option v-for="(project_type,index) in project_types" v-bind:value="project_type.id">
                    {{project_type.name}}
                  </option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
                <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" @click="createProject()"><i class="fas fa-plus fa-sm text-white-50"></i> Add New Project Category</button>
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
                                  <h3 style="margin-bottom:0px;" class="text-primary">Edit Project Category</h3>
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
                              <input type="text" class="form-control form-control-user"  placeholder="Name" v-model="new_update_project_category.name">
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-sm-12">
                              <label>Project  Type</label>
                              <select class="form-control form-control-user" v-model="new_update_project_category.project_type_id">
                                <option selected disabled>Please select project type placement</option>
                                <option v-for="(project_type,index) in project_types" v-bind:value="project_type.id">
                                  {{project_type.name}}
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
                                                  <button @click="updateProject()" class="btn btn-sm btn-primary shadow-sm" >
                                                      Edit Project Category
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
                project_category:{
                    name:"",
                    project_type_id:"",
                },
                errors: [],
                project_categories: [],
                project_types: [],
                project_types_key_using_id: [],
                new_update_project_category:[],
                uri:'/resource/project_category',
                project_type_uri:'/resource/project_type',
            }
        },
        methods:{
            loadUpdateModal(index){
                this.errors="";
                $("#update-modal").modal("show");
                this.new_update_project_category=JSON.parse(JSON.stringify(this.project_categories[index]));
            },
            loadProjectCategories(){
                axios.get(this.uri).then(response=>{
                  this.project_categories = response.data.project_categories
                });
            },
            loadProjectTypes(){
                axios.get(this.project_type_uri).then(response=>{
                  let data = [];
                  response.data.project_types.forEach(
                      (project_type) => data[project_type.id] = project_type
                  );
                  this.project_types = response.data.project_types;
                  this.project_types_key_using_id = data;
                });
            },
            createProject(){
              let formData = new FormData();
              formData.append('name',this.project_category.name);
              formData.append('project_type_id',this.project_category.project_type_id);
                axios.post(this.uri,formData,{
                  headers: {
                    'Content-Type': 'multipart/form-data'
                  }
                }).then(response=>{
                        this.project_categories.push(response.data.project_categories);
                        toastr.success(response.data.status);
                        this.resetData();
                }).catch(error=>{
                    console.log(error.response.data)
                    if (error.response.data.name){
                        this.errors.push(error.response.data.name[0]);
                    }
                });
            },
            updateProject(){
                let formData = new FormData();
                formData.append("_method", 'PATCH');
                formData.append('name',this.new_update_project_category.name);
                formData.append('project_type_id',this.new_update_project_category.project_type_id);
                
                axios.post(this.uri+"/"+this.new_update_project_category.id,formData,{
                  headers: {
                    'Content-Type': 'multipart/form-data'
                  }
                }).then(response=>{
                        this.resetData();
                        $("#update-modal").modal("hide");
                        toastr.success(response.data.status);
                        this.loadProjectCategories();
                }).catch(error=>{
                    if (error.response.data.name){
                        this.errors.push(error.response.data.name[0]);
                    }
                });
            },
            deleteProject(index){
                let confirmBox = confirm("Do you really want to delete this?");
                if(confirmBox==true){
                    axios.delete(this.uri+"/"+this.project_categories[index].id).then(
                        response=>{
                            this.$delete(this.project_categories,index);
                            toastr.success(response.data.status);
                        }).catch(error=>{
                            console.log("Could not delete for some reason");
                        });
                }
            },
            resetData(){
                this.errors=[];
                this.project_category.name = '';
                this.project_category.project_type_id = '';
            }
        },
        mounted() {
            this.loadProjectCategories();
            this.loadProjectTypes();
            console.log('Project categories mounted.')
        }
    }
</script>