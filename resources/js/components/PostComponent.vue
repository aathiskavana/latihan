<template>
  <div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Post</h1>
    </div>
    <div class="row">
      <!-- Area Chart -->
      <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Post</h6>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Main Image</th>
                    <th>Mobile Image</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th colspan="2">Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Main Image</th>
                    <th>Mobile Image</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th colspan="2">Action</th>
                  </tr>
                </tfoot>
                <tbody>
                  <tr v-for="(post, index) in posts">
                      <td>{{index+1}}</td>
                      <td>{{post.name}}</td>
                      <td><img :src="'../storage/'+post.main_image" :alt="post.name+'main'" width="100px"></td>
                      <td><img :src="'../storage/'+post.mobile_image" :alt="post.name+'mobile'"  width="100px"></td>
                      <td>{{post.category.name}}</td>
                      <td>
                        {{post.description}}
                      </td>
                      <td><button class="btn btn-info" @click="loadUpdateModal(index)">Edit </button></td>
                      <td><button class="btn btn-danger" @click="deletePost(index)">Remove </button></td>
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
            <h6 class="m-0 font-weight-bold text-primary">Add New Post</h6>
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
                <label>Post Name</label>
                <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Name" v-model="post.name">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12 mb-3 mb-sm-0">
                <label>Main Image</label>
                 <img :src="post.main_image" class="img-responsive" width="100%" v-if="post.main_image!=''">
                <input type="file" class="form-control form-control-user" placeholder="Main Image" @change="onMainImageChange" id="main_image_upload">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
                <label>Mobile Image</label>
                 <img :src="post.mobile_image" class="img-responsive" width="100%" v-if="post.mobile_image!=''">
                <input type="file" class="form-control form-control-user" placeholder="Mobile Image" @change="onMobileImageChange" id="mobile_image_upload">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
                <label>Post Description</label>
                <editor v-model="post.description"

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
                	<label>Category Name</label>
                	<select class="form-control form-control-user" v-model="post.category_id" >
	                  <option selected disabled>Please select category</option>
	                  <option v-for="(category,index) in categories" v-bind:value="category.id">
	                    {{category.name}}
	                  </option>
	                </select>
            	</div>
        	   </div>
            <div class="form-group row">
              <div class="col-sm-12">
                <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" @click="createPost"><i class="fas fa-plus fa-sm text-white-50"></i> Add New Post</button>
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
                                  <h3 style="margin-bottom:0px;" class="text-primary">Edit Post</h3>
                                  <div class="alert alert-danger" v-if="errors.length > 0">
                                      <ul>
                                          <li v-for="error in errors">{{error}}</li>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                          
                          <div class="row paddinginput">
                              <div class="col-md-12">
                                  <div class="">
                                      <div class="card-body">
                                          
                                          <div class="row">
                                              <div class="col-12">
                                                  <div class="form-group">
                                                      <div class="labelinputmenu">Nama Post</div>
                                                      <input  v-model="new_update_post.name" id="name" class="form-control form-control-sm forminput" type="text">
                                                  </div>
                                              </div>
                                              
                                          </div>
                                          <div class="form-group row">
                                            <div class="col-sm-12 mb-3 mb-sm-0">
                                              <label>Main Image</label>
                                               <img :src="new_update_post.main_image" class="img-responsive" width="100%" style="display:none;">
                                              <input type="file" class="form-control form-control-user" placeholder="Main Image" @change="onUpdateMainImageChange" id="update_main_image_upload">
                                            </div>
                                          </div>
                                          <div class="form-group row">
                                            <div class="col-sm-12">
                                              <label>Mobile Image</label>
                                               <img :src="new_update_post.mobile_image" class="img-responsive" width="100%" style="display:none;">
                                              <input type="file" class="form-control form-control-user" placeholder="Mobile Image" @change="onUpdateMobileImageChange" id="update_mobile_image_upload">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                              <div class="labelinputmenu">Description</div>
                                              <textarea id="description" v-model="new_update_post.description" class="form-control form-control-sm forminput" type="text" rows="4"></textarea>
                                          </div>
                                          <div class="form-group">
                                              <label>Category Name</label>
                                              <select class="form-control form-control-user" v-model="new_update_post.category_id" >
                                                <option selected disabled>Please select category</option>
                                                <option v-for="(category,index) in categories" v-bind:value="new_update_post.category_id">
                                                  {{category.name}}
                                                </option>
                                              </select>
                                          </div>
                                          
                                          <div class="row margintop4020">
                                              <div class="col-md-12 text-center">
                                                  <button @click="updatePost" class="btn btn-sm btn-primary shadow-sm" >
                                                      Edit post
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
                post:{
                    name:"",
                    description:"",
                    slug_name:"",
                    main_image:"",
                    mobile_image:"",
                },
                category:{
                	name:"",
                	description:""
                },
                errors: [],
                posts: [],
                categories:[],
                new_update_post:[],
                uri:'/resource/post',
                uri_categories:'/resource/category'
            }
        },
        components:{
          'editor':Editor
        },
        methods:{
            loadCreateModal(){
                $("#create-modal").modal("show");
            },
            loadUpdateModal(index){
                this.errors="";
                $("#update-modal").modal("show");
                this.new_update_post=JSON.parse(JSON.stringify(this.posts[index]));
            },
            loadPost(){
                axios.get(this.uri).then(response=>{
                    this.posts = response.data.posts
                });
            },
            loadCategory(){
                axios.get(this.uri_categories).then(response=>{
                    this.categories = response.data.categories
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
                    this.post.main_image = e.target.result;
                };
                reader.readAsDataURL(file);
            },
            onMobileImageChange(e) {
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createMobileImage(files[0]);
            },
            createMobileImage(file) {
                let reader = new FileReader();
                reader.onload = (e) => {
                    this.post.mobile_image= e.target.result;
                };
                reader.readAsDataURL(file);
            },
            createPost(){
              let formData = new FormData();
              var main_image_file = document.querySelector('#main_image_upload');
              var mobile_image_file = document.querySelector('#mobile_image_upload');
              formData.append('name',this.post.name);
              formData.append('category_id',this.post.category_id);
              formData.append('description',this.post.description);
              formData.append('main_image',main_image_file.files[0]);
              formData.append('mobile_image',mobile_image_file.files[0]);
                axios.post(this.uri,formData,{
                  headers: {
                    'Content-Type': 'multipart/form-data'
                  }
                }).then(response=>{
                        toastr.success(response.data.status);
                        this.resetData();
                        this.loadPost();
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
                    this.new_update_post.main_image = e.target.result;
                };
                reader.readAsDataURL(file);
            },
            onUpdateMobileImageChange(e) {
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createUpdateMobileImage(files[0]);
            },
            createUpdateMobileImage(file) {
                let reader = new FileReader();
                reader.onload = (e) => {
                    this.new_update_post.mobile_image= e.target.result;
                };
                reader.readAsDataURL(file);
            },
            updatePost(){
                let formData = new FormData();
                var update_main_image_file = document.querySelector('#update_main_image_upload');
                var update_mobile_image_file = document.querySelector('#update_mobile_image_upload');
                formData.append("_method", 'PATCH');
                formData.append('name',this.new_update_post.name);
                formData.append('category_id',this.new_update_post.category_id);
                formData.append('description',this.new_update_post.description);
                formData.append('main_image',update_main_image_file.files[0]);
                formData.append('mobile_image',update_mobile_image_file.files[0]);
                axios.post(this.uri+"/"+this.new_update_post.id,formData,{
                  headers: {
                    'Content-Type': 'multipart/form-data'
                  }
                }).then(response=>{
                        console.log(response.data.posts);
                        this.resetData();
                        $("#update-modal").modal("hide");
                        toastr.success(response.data.status);
                        this.loadPost();
                }).catch(error=>{
                    if (error.response.data.name){
                        this.errors.push(error.response.data.name[0]);
                      }
                });
            },
            deletePost(index){
                let confirmBox = confirm("Do you really want to delete this?");
                if(confirmBox==true){
                    axios.delete(this.uri+"/"+this.posts[index].id).then(
                        response=>{
                            this.$delete(this.posts,index);
                            toastr.success(response.data.status);
                        }).catch(error=>{
                            console.log("Could not delete for some reason");
                        });
                }
            },
            resetData(){
                this.errors=[];
                this.post.name = '';
                this.post.description = '';

            }
        },
        mounted() {
            this.loadPost();
            this.loadCategory();
            console.log('Post mounted.')
        }
    }
</script>