<template>
  <div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Homepage Project</h1>
    </div>
    <div class="row">
      <!-- Area Chart -->
      <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Homepage Project</h6>
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
                    <th>Year</th>
                    <th>Description</th>
                    <th>Url</th>
                    <th colspan="2">Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>No.</th>
                    <th>Main Image</th>
                    <th>Company</th>
                    <th>Year</th>
                    <th>Description</th>
                    <th>Url</th>
                    <th colspan="2">Action</th>
                  </tr>
                </tfoot>
                <tbody>
                  <tr v-for="(homepage_project, index) in homepage_projects" :key="homepage_project.id">
                      <td>{{index+1}}</td>
                      <td><img :src="'../storage/'+homepage_project.main_image" :alt="homepage_project.company" width="100px"></td>
                      <td>{{homepage_project.company}}</td>
                      <td>{{homepage_project.year}}</td>
                      <td v-html="homepage_project.description"></td>
                      <td>{{homepage_project.url}}</td>
                      <td><button class="btn btn-info" @click="loadUpdateModal(index)">Edit </button></td>
                      <td><button class="btn btn-danger" @click="deleteHomepageProject(index)">Remove </button></td>
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
            <h6 class="m-0 font-weight-bold text-primary">Add New Homepage Project</h6>
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
                 <img :src="homepage_project.main_image" class="img-responsive" width="100%" v-if="homepage_project.main_image!=''">
                <input type="file" class="form-control form-control-user" placeholder="Main Image" @change="onMainImageChange" id="main_image_upload">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12 mb-3 mb-sm-0">
                <label>Company</label>
                <input type="text" class="form-control form-control-user"  placeholder="Company" v-model="homepage_project.company">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12 mb-3 mb-sm-0">
                <label>Year</label>
                <input type="number" class="form-control form-control-user"  placeholder="Year" v-model="homepage_project.year">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
                <label>Description</label>
                <editor v-model="homepage_project.description"

                api-key="gssljk5uv5x6t2kif8srfvvuzj9g22oqase8m28dqkqrr5e4"
                :init="{
                  height: 300,
                  menubar: false,
                  plugins: [
                    'advlist autolink lists link image charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table paste code help wordcount'
                  ],
                  toolbar:
                    'formatselect | bold italic backcolor | \
                    alignleft aligncenter alignright alignjustify | \
                    bullist numlist outdent indent | removeformat'
                }"
              />
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12 mb-3 mb-sm-0">
                <label>Url</label>
                <input type="text" class="form-control form-control-user"  placeholder="Url" v-model="homepage_project.url">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
                <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" @click="createHomepageProject()"><i class="fas fa-plus fa-sm text-white-50"></i> Add New Homepage Project</button>
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
                                  <h3 style="margin-bottom:0px;" class="text-primary">Edit Homepage Project</h3>
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
                                <img :src="new_update_homepage_project.main_image" class="img-responsive" width="100%" v-if="new_update_homepage_project.main_image!=''">
                              <input type="file" class="form-control form-control-user" placeholder="Main Image" @change="onUpdateMainImageChange" id="update_main_image_upload">
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                              <label>Company</label>
                              <input type="text" class="form-control form-control-user"  placeholder="Company" v-model="new_update_homepage_project.company">
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                              <label>Year</label>
                              <input type="number" class="form-control form-control-user"  placeholder="Year" v-model="new_update_homepage_project.year">
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-sm-12">
                              <label>Description</label>
                              <editor v-model="new_update_homepage_project.description"

                              api-key="gssljk5uv5x6t2kif8srfvvuzj9g22oqase8m28dqkqrr5e4"
                              :init="{
                                height: 300,
                                menubar: false,
                                plugins: [
                                  'advlist autolink lists link image charmap print preview anchor',
                                  'searchreplace visualblocks code fullscreen',
                                  'insertdatetime media table paste code help wordcount'
                                ],
                                toolbar:
                                  'formatselect | bold italic backcolor | \
                                  alignleft aligncenter alignright alignjustify | \
                                  bullist numlist outdent indent | removeformat'
                              }"
                            />
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                              <label>Url</label>
                              <input type="text" class="form-control form-control-user"  placeholder="Url" v-model="new_update_homepage_project.url">
                            </div>
                          </div>
                          <div class="row paddinginput">
                              <div class="col-md-12">
                                  <div class="">
                                      <div class="card-body">
                                          <div class="row margintop4020">
                                              <div class="col-md-12 text-center">
                                                  <button @click="updateHomepageProject()" class="btn btn-sm btn-primary shadow-sm" >
                                                      Edit Homepage Project
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
    import Editor from '@tinymce/tinymce-vue'
    export default {
        data(){
            return{
                homepage_project:{
                    main_image:"",
                    company:"",
                    description:"",
                    url:"",
                    year:"",
                    homepage_project_type_id:"",
                },
                errors: [],
                homepage_projects: [],
                new_update_homepage_project:[],
                uri:'/resource/homepage_project',
            }
        },
        components:{
          'editor':Editor
        },
        methods:{
            loadUpdateModal(index){
                this.errors="";
                $("#update-modal").modal("show");
                this.new_update_homepage_project=JSON.parse(JSON.stringify(this.homepage_projects[index]));
            },
            loadHomepageProjects(){
                axios.get(this.uri).then(response=>{
                  this.homepage_projects = response.data.homepage_projects
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
                    this.homepage_project.main_image = e.target.result;
                };
                reader.readAsDataURL(file);
            },
            createHomepageProject(){
              let formData = new FormData();
              var main_image_file = document.querySelector('#main_image_upload');
              formData.append('company',this.homepage_project.company);
              formData.append('description',this.homepage_project.description);
              formData.append('url',this.homepage_project.url);
              formData.append('year',this.homepage_project.year);
              formData.append('main_image',main_image_file.files[0]);
                axios.post(this.uri,formData,{
                  headers: {
                    'Content-Type': 'multipart/form-data'
                  }
                }).then(response=>{
                        this.homepage_projects.push(response.data.homepage_projects);
                        toastr.success(response.data.status);
                        this.resetData();
                }).catch(error=>{
                    if (error.response.data.company){
                        this.errors.push(error.response.data.company[0]);
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
                    this.new_update_homepage_project.main_image = e.target.result;
                };
                reader.readAsDataURL(file);
            },
            updateHomepageProject(){
                let formData = new FormData();
                var update_main_image_file = document.querySelector('#update_main_image_upload');
                formData.append("_method", 'PATCH');
                formData.append('company',this.new_update_homepage_project.company);
                formData.append('description',this.new_update_homepage_project.description);
                formData.append('url',this.new_update_homepage_project.url);
                formData.append('year',this.new_update_homepage_project.year);
                let main_image = ''
                if (update_main_image_file.files[0]) {
                  main_image = update_main_image_file.files[0]
                }
                formData.append('main_image',main_image);
                axios.post(this.uri+"/"+this.new_update_homepage_project.id,formData,{
                  headers: {
                    'Content-Type': 'multipart/form-data'
                  }
                }).then(response=>{
                        this.resetData();
                        $("#update-modal").modal("hide");
                        toastr.success(response.data.status);
                        this.loadHomepageProjects();
                }).catch(error=>{
                    if (error.response.data.company){
                        this.errors.push(error.response.data.company[0]);
                    }
                });
            },
            deleteHomepageProject(index){
                let confirmBox = confirm("Do you really want to delete this?");
                if(confirmBox==true){
                    axios.delete(this.uri+"/"+this.homepage_projects[index].id).then(
                        response=>{
                            this.$delete(this.homepage_projects,index);
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
                this.homepage_project.company = '';
                this.homepage_project.description = '';
                this.homepage_project.url = '';
                this.homepage_project.year= '';
                this.homepage_project.homepage_project_type_id = '';
                this.homepage_project.main_image = '';
                this.new_update_homepage_project.main_image = '';
            }
        },
        mounted() {
            this.loadHomepageProjects();
            console.log('HomepageProjects mounted.')
        }
    }
</script>