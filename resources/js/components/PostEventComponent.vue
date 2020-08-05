<template>
  <div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Post Event</h1>
    </div>
    <div class="row">
      <!-- Area Chart -->
      <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Post Event</h6>
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
                    <th>Image Detail</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Order</th>
                    <th colspan="2">Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Main Image</th>
                    <th>Mobile Image</th>
                    <th>Image Detail</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Order</th>
                    <th colspan="2">Action</th>
                  </tr>
                </tfoot>
                <tbody>
                  <tr v-for="(post_event, index) in post_events">
                      <td>{{index+1}}</td>
                      <td>{{post_event.name}}</td>
                      <td><img :src="'../storage/'+post_event.main_image" :alt="post_event.name+'main'" width="100px"></td>
                      <td><img :src="'../storage/'+post_event.mobile_image" :alt="post_event.name+'mobile'"  width="100px"></td>
                      <td>
                        <img v-for="(post_event_image,index_image) in post_event.post_event_images" :src="'../storage/'+post_event_image.image" width="100px" style="margin-bottom:10px;">
                      </td>
                      <td>
                        {{post_event.description}}
                      </td>
                      <td>{{post_event.date}}</td>
                      <td>{{post_event.order}}</td>
                      <td><button class="btn btn-info" @click="loadUpdateModal(index)">Edit </button></td>
                      <td><button class="btn btn-danger" @click="deletePostEvent(index)">Remove </button></td>
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
            <h6 class="m-0 font-weight-bold text-primary">Add New Post Event</h6>
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
                <label>Post Event Name</label>
                <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Name" v-model="post_event.name">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12 mb-3 mb-sm-0">
                <label>Main Image</label>
                 <img :src="post_event.main_image" class="img-responsive" width="100%" v-if="post_event.main_image!=''">
                <input type="file" class="form-control form-control-user" placeholder="Main Image" @change="onMainImageChange" id="main_image_upload">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
                <label>Mobile Image</label>
                 <img :src="post_event.mobile_image" class="img-responsive" width="100%" v-if="post_event.mobile_image!=''">
                <input type="file" class="form-control form-control-user" placeholder="Mobile Image" @change="onMobileImageChange" id="mobile_image_upload">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12 mb-3 mb-sm-0">
                <label>Post Event Date</label>
                <input type="date" class="form-control form-control-user" id="exampleFirstName" placeholder="Name" v-model="post_event.date">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
                <label>Post Event Description</label>
                <editor v-model="post_event.description"

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
                <label>Post Event Order</label>
                <input type="number" class="form-control form-control-user" id="exampleFirstName" placeholder="Order" v-model="post_event.order">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
                <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" @click="createPostEvent"><i class="fas fa-plus fa-sm text-white-50"></i> Add New PostEvent</button>
              </div>
            </div>
          </div>
        </div>
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Add New Post Event Detail</h6>
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
                <label>Post Event</label>
                <select v-model="post_event_detail.post_event_id" class="form-control form-control-user">
                    <option v-for="(post_event, index) in post_events"  :value="post_event.id">
                      {{post_event.name}}
                    </option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
                <label>Image Detail</label>
                 <img :src="post_event_detail.image" class="img-responsive" width="100%" v-if="post_event_detail.image!=''">
                <input type="file" class="form-control form-control-user" placeholder="Image" @change="onImageDetailChange" id="image_detail_upload">
              </div>
            </div>
            
            <div class="form-group row">
              <div class="col-sm-12">
                <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" @click="createPostEventDetail"><i class="fas fa-plus fa-sm text-white-50"></i> Add New Post Event Detail</button>
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
                                  <h3 style="margin-bottom:0px;" class="text-primary">Edit Post Event</h3>
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
                                          <div class="form-group">
                                              <div class="labelinputmenu">Nama Post Event</div>
                                              <input  v-model="new_update_post_event.name" id="name" class="form-control form-control-sm forminput" type="text">
                                          </div>
                                          <div class="form-group row">
                                            <div class="col-sm-12 mb-3 mb-sm-0">
                                              <label>Main Image</label>
                                               <img :src="new_update_post_event.main_image" class="img-responsive" width="100%" style="display:none;">
                                              <input type="file" class="form-control form-control-user" placeholder="Main Image" @change="onUpdateMainImageChange" id="update_main_image_upload">
                                            </div>
                                          </div>
                                          <div class="form-group row">
                                            <div class="col-sm-12">
                                              <label>Mobile Image</label>
                                               <img :src="new_update_post_event.mobile_image" class="img-responsive" width="100%" style="display:none;">
                                              <input type="file" class="form-control form-control-user" placeholder="Mobile Image" @change="onUpdateMobileImageChange" id="update_mobile_image_upload">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                              <div class="labelinputmenu">Date Post Event</div>
                                              <input  v-model="new_update_post_event.date" id="date" class="form-control form-control-sm forminput" type="date">
                                          </div>
                                          
                                          <div class="form-group">
                                              <div class="labelinputmenu">Description</div>
                                              <editor v-model="new_update_post_event.description"
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
                                          <div class="form-group">
                                              <div class="labelinputmenu">Order Post Event</div>
                                              <input  v-model="new_update_post_event.order" id="order" class="form-control form-control-sm forminput" type="number">
                                          </div>
                                          <div class="row margintop4020">
                                              <div class="col-md-12 text-center">
                                                  <button @click="updatePostEvent" class="btn btn-sm btn-primary shadow-sm" >
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
                post_event:{
                    name:"",
                    description:"",
                    order:"",
                    date:"",
                    main_image:"",
                    mobile_image:"",
                    post_event_images:""
                },
                post_event_detail:{
                  post_event_id:"",
                  image:""
                },
                errors: [],
                post_events: [],
                categories:[],
                new_update_post_event:[],
                uri:'/resource/post_event',
                uri_detail:'/resource/post_event_detail',
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
                this.new_update_post_event=JSON.parse(JSON.stringify(this.post_events[index]));
            },
            loadPostEvent(){
                axios.get(this.uri).then(response=>{
                    this.post_events = response.data.post_events
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
                    this.post_event.main_image = e.target.result;
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
                    this.post_event.mobile_image= e.target.result;
                };
                reader.readAsDataURL(file);
            },
            createPostEvent(){
              let formData = new FormData();
              var main_image_file = document.querySelector('#main_image_upload');
              var mobile_image_file = document.querySelector('#mobile_image_upload');
              formData.append('name',this.post_event.name);
              formData.append('order',this.post_event.order);
              formData.append('date',this.post_event.date);
              formData.append('description',this.post_event.description);
              formData.append('main_image',main_image_file.files[0]);
              formData.append('mobile_image',mobile_image_file.files[0]);
                axios.post(this.uri,formData,{
                  headers: {
                    'Content-Type': 'multipart/form-data'
                  }
                }).then(response=>{
                        toastr.success(response.data.status);
                        this.resetData();
                        this.loadPostEvent();
                }).catch(error=>{
                    if (error.response.data.name){
                        this.errors.push(error.response.data.name[0]);
                      }
                });
            },
            onImageDetailChange(e) {
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createImageDetail(files[0]);
            },
            createImageDetail(file) {
                let reader = new FileReader();
                reader.onload = (e) => {
                    this.post_event_detail.image= e.target.result;
                };
                reader.readAsDataURL(file);
            },
            createPostEventDetail(){
              let formData = new FormData();
              var image = document.querySelector('#image_detail_upload');
              formData.append('post_event_id',this.post_event_detail.post_event_id);
              formData.append('image',image.files[0]);
                axios.post(this.uri_detail,formData,{
                  headers: {
                    'Content-Type': 'multipart/form-data'
                  }
                }).then(response=>{
                        toastr.success(response.data.status);
                        this.resetData();
                        this.loadPostEvent();
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
            updatePostEvent(){
                let formData = new FormData();
                var update_main_image_file = document.querySelector('#update_main_image_upload');
                var update_mobile_image_file = document.querySelector('#update_mobile_image_upload');
                formData.append("_method", 'PATCH');
                formData.append('name',this.new_update_post_event.name);
                formData.append('order',this.new_update_post_event.order);
                formData.append('date',this.new_update_post_event.date);
                formData.append('description',this.new_update_post_event.description);
                formData.append('main_image',update_main_image_file.files[0]);
                formData.append('mobile_image',update_mobile_image_file.files[0]);
                axios.post(this.uri+"/"+this.new_update_post_event.id,formData,{
                  headers: {
                    'Content-Type': 'multipart/form-data'
                  }
                }).then(response=>{
                        console.log(response.data.post_events);
                        this.resetData();
                        $("#update-modal").modal("hide");
                        toastr.success(response.data.status);
                        this.loadPostEvent();
                }).catch(error=>{
                    if (error.response.data.name){
                        this.errors.push(error.response.data.name[0]);
                      }
                });
            },
            deletePostEvent(index){
                let confirmBox = confirm("Do you really want to delete this?");
                if(confirmBox==true){
                    axios.delete(this.uri+"/"+this.post_events[index].id).then(
                        response=>{
                            this.$delete(this.post_events,index);
                            toastr.success(response.data.status);
                        }).catch(error=>{
                            console.log("Could not delete for some reason");
                        });
                }
            },
            resetData(){
                this.errors=[];
                this.post_event.name = '';
                this.post_event.description = '';

            }
        },
        mounted() {
            this.loadPostEvent();
            console.log('PostEvent mounted.')
        }
    }
</script>