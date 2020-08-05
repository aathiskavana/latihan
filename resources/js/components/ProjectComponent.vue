<template>
  <div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Project</h1>
    </div>
    <div class="row">
      <!-- Area Chart -->
      <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Project</h6>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Main Image</th>
                    <th>Company</th>
                    <th>Company Place</th>
                    <th>Sector</th>
                    <th>Year</th>
                    <th>Project Category</th>
                    <th colspan="2">Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>No.</th>
                    <th>Main Image</th>
                    <th>Company</th>
                    <th>Company Place</th>
                    <th>Sector</th>
                    <th>Year</th>
                    <th>Project Category</th>
                    <th colspan="2">Action</th>
                  </tr>
                </tfoot>
                <tbody>
                  <tr v-for="(project, index) in projects" :key="project.id">
                      <td>{{index+1}}</td>
                      <td><img :src="'../storage/'+project.main_image" :alt="project.company" width="100px"></td>
                      <td>{{project.company}}</td>
                      <td>{{project.company_place}}</td>
                      <td>{{project.sector}}</td>
                      <td>{{project.year}}</td>
                      <td><span v-if="project_categories_key_using_id[project.project_category_id]">
                        {{project_categories_key_using_id[project.project_category_id].name}}
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
            <h6 class="m-0 font-weight-bold text-primary">Add New Project</h6>
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
                 <img :src="project.main_image" class="img-responsive" width="100%" v-if="project.main_image!=''">
                <input type="file" class="form-control form-control-user" placeholder="Main Image" @change="onMainImageChange" id="main_image_upload">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12 mb-3 mb-sm-0">
                <label>Company</label>
                <input type="text" class="form-control form-control-user"  placeholder="Company" v-model="project.company">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12 mb-3 mb-sm-0">
                <label>Company Place</label>
                <input type="text" class="form-control form-control-user"  placeholder="Company Place" v-model="project.company_place">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12 mb-3 mb-sm-0">
                <label>Sector</label>
                <input type="text" class="form-control form-control-user"  placeholder="Sector" v-model="project.sector">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12 mb-3 mb-sm-0">
                <label>Year</label>
                <input type="number" class="form-control form-control-user"  placeholder="Year" v-model="project.year">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
                <label>Project Category</label>
                <select class="form-control form-control-user" v-model="project.project_category_id">
                  <option selected disabled>Please select project type placement</option>
                  <option v-for="(project_category,index) in project_categories" v-bind:value="project_category.id">
                    {{project_category.name}}
                  </option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
                <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" @click="createProject()"><i class="fas fa-plus fa-sm text-white-50"></i> Add New Project</button>
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
                                  <h3 style="margin-bottom:0px;" class="text-primary">Edit Project</h3>
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
                                <img :src="new_update_project.main_image" class="img-responsive" width="100%" v-if="new_update_project.main_image!=''">
                              <input type="file" class="form-control form-control-user" placeholder="Main Image" @change="onUpdateMainImageChange" id="update_main_image_upload">
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                              <label>Company</label>
                              <input type="text" class="form-control form-control-user"  placeholder="Company" v-model="new_update_project.company">
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                              <label>Company Place</label>
                              <input type="text" class="form-control form-control-user"  placeholder="Company Place" v-model="new_update_project.company_place">
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                              <label>Sector</label>
                              <input type="text" class="form-control form-control-user"  placeholder="Sector" v-model="new_update_project.sector">
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                              <label>Year</label>
                              <input type="number" class="form-control form-control-user"  placeholder="Year" v-model="new_update_project.year">
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-sm-12">
                              <label>Project Category</label>
                              <select class="form-control form-control-user" v-model="new_update_project.project_category_id">
                                <option selected disabled>Please select project type placement</option>
                                <option v-for="(project_category,index) in project_categories" v-bind:value="project_category.id">
                                  {{project_category.name}}
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
                                                      Edit Project
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
                project:{
                    main_image:"",
                    company:"",
                    company_place:"",
                    sector:"",
                    year:"",
                    project_category_id:"",
                },
                errors: [],
                projects: [],
                project_categories: [],
                project_categories_key_using_id: [],
                new_update_project:[],
                uri:'/resource/project',
                project_category_uri:'/resource/project_category',
            }
        },
        methods:{
            loadUpdateModal(index){
                this.errors="";
                $("#update-modal").modal("show");
                this.new_update_project=JSON.parse(JSON.stringify(this.projects[index]));
            },
            loadProjects(){
                axios.get(this.uri).then(response=>{
                  this.projects = response.data.projects
                });
            },
            loadProjectCategorys(){
                axios.get(this.project_category_uri).then(response=>{
                  let data = [];
                  response.data.project_categories.forEach(
                      (project_category) => data[project_category.id] = project_category
                  );
                  this.project_categories = response.data.project_categories;
                  this.project_categories_key_using_id = data;
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
                    this.project.main_image = e.target.result;
                };
                reader.readAsDataURL(file);
            },
            createProject(){
              let formData = new FormData();
              var main_image_file = document.querySelector('#main_image_upload');
              formData.append('company',this.project.company);
              formData.append('company_place',this.project.company_place);
              formData.append('sector',this.project.sector);
              formData.append('year',this.project.year);
              formData.append('project_category_id',this.project.project_category_id);
              formData.append('main_image',main_image_file.files[0]);
                axios.post(this.uri,formData,{
                  headers: {
                    'Content-Type': 'multipart/form-data'
                  }
                }).then(response=>{
                        this.projects.push(response.data.projects);
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
                    this.new_update_project.main_image = e.target.result;
                };
                reader.readAsDataURL(file);
            },
            updateProject(){
                let formData = new FormData();
                var update_main_image_file = document.querySelector('#update_main_image_upload');
                formData.append("_method", 'PATCH');
                formData.append('company',this.new_update_project.company);
                formData.append('company_place',this.new_update_project.company_place);
                formData.append('sector',this.new_update_project.sector);
                formData.append('year',this.new_update_project.year);
                formData.append('project_category_id',this.new_update_project.project_category_id);
                let main_image = ''
                if (update_main_image_file.files[0]) {
                  main_image = update_main_image_file.files[0]
                }
                formData.append('main_image',main_image);
                
                axios.post(this.uri+"/"+this.new_update_project.id,formData,{
                  headers: {
                    'Content-Type': 'multipart/form-data'
                  }
                }).then(response=>{
                        this.resetData();
                        $("#update-modal").modal("hide");
                        toastr.success(response.data.status);
                        this.loadProjects();
                }).catch(error=>{
                    if (error.response.data.name){
                        this.errors.push(error.response.data.name[0]);
                    }
                });
            },
            deleteProject(index){
                let confirmBox = confirm("Do you really want to delete this?");
                if(confirmBox==true){
                    axios.delete(this.uri+"/"+this.projects[index].id).then(
                        response=>{
                            this.$delete(this.projects,index);
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
                this.project.company = '';
                this.project.company_place = '';
                this.project.sector = '';
                this.project.year= '';
                this.project.project_category_id = '';
                this.project.main_image = '';
                this.new_update_project.main_image = '';
            }
        },
        mounted() {
            this.loadProjects();
            this.loadProjectCategorys();
            console.log('Projects mounted.')
        }
    }
</script>