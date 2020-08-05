<template>
  <div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Pre Event</h1>
    </div>
    <div class="row">
      <!-- Area Chart -->
      <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Pre Event</h6>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Logo Image</th>
                    <th>Main Image</th>
                    <th>Mobile Image</th>
                    <th>Leading Text</th>
                    <th>Description</th>
                    <th>Content Detail</th>
                    <th>Information</th>
                    <th>Video</th>
                    <th>Contact</th>
                    <th>Order</th>
                    <th colspan="2">Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Logo Image</th>
                    <th>Main Image</th>
                    <th>Mobile Image</th>
                    <th>Leading Text</th>
                    <th>Description</th>
                    <th>Content Detail</th>
                    <th>Information</th>
                    <th>Video</th>
                    <th>Contact</th>
                    <th>Order</th>
                    <th colspan="2">Action</th>
                  </tr>
                </tfoot>
                <tbody>
                  <tr v-for="(pre_event, index) in pre_events">
                      <td>{{index+1}}</td>
                      <td>{{pre_event.name}}</td>
                      <td><img :src="'../storage/'+pre_event.logo_image" :alt="pre_event.name+'main'" width="100px"></td>
                      <td><img :src="'../storage/'+pre_event.main_image" :alt="pre_event.name+'main'" width="100px"></td>
                      <td><img :src="'../storage/'+pre_event.mobile_image" :alt="pre_event.name+'mobile'"  width="100px"></td>
                      <td>{{pre_event.leading_text}}</td>
                      <td>
                        {{pre_event.description}}
                      </td>
                      <td>{{pre_event.content_detail}}</td>
                      <td>{{pre_event.information}}</td>
                      <td>{{pre_event.video}}</td>
                      <td>{{pre_event.contact}}</td>
                      <td>{{pre_event.order}}</td>
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
            <h6 class="m-0 font-weight-bold text-primary">Add New Pre Event</h6>
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
                <label>Pre Event Name</label>
                <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Name" v-model="pre_event.name">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12 mb-3 mb-sm-0">
                <label>Logo Image</label>
                 <img :src="pre_event.logo_image" class="img-responsive" width="100%" v-if="pre_event.logo_image!=''">
                <input type="file" class="form-control form-control-user" placeholder="Logo Image" @change="onLogoImageChange" id="logo_image_upload">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12 mb-3 mb-sm-0">
                <label>Main Image</label>
                 <img :src="pre_event.main_image" class="img-responsive" width="100%" v-if="pre_event.main_image!=''">
                <input type="file" class="form-control form-control-user" placeholder="Main Image" @change="onMainImageChange" id="main_image_upload">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
                <label>Mobile Image</label>
                 <img :src="pre_event.mobile_image" class="img-responsive" width="100%" v-if="pre_event.mobile_image!=''">
                <input type="file" class="form-control form-control-user" placeholder="Mobile Image" @change="onMobileImageChange" id="mobile_image_upload">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12 mb-3 mb-sm-0">
                <label>Pre Event Video</label>
                <input type="text" class="form-control form-control-user" id="Video" placeholder="Youtube Video Embed Link" v-model="pre_event.video">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
                <label>Pre Event Leading Text</label>
                <editor v-model="pre_event.leading_text"

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
              <div class="col-sm-12">
                <label>Pre Event Description</label>
                <editor v-model="pre_event.description"

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
              <div class="col-sm-12">
                <label>Pre Event Content Detail</label>
                <editor v-model="pre_event.content_detail"

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
              <div class="col-sm-12">
                <label>Pre Event Content Information</label>
                <editor v-model="pre_event.information"

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
              <div class="col-sm-12">
                <label>Pre Event Content Contact</label>
                <editor v-model="pre_event.contact"

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
                <label>Pre Event Order</label>
                <input type="number" class="form-control form-control-user" id="exampleFirstName" placeholder="Order" v-model="pre_event.order">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
                <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" @click="createPostEvent"><i class="fas fa-plus fa-sm text-white-50"></i> Add New PostEvent</button>
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
                                  <h3 style="margin-bottom:0px;" class="text-primary">Edit Pre Event</h3>
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
                                              <div class="labelinputmenu">Nama Pre Event</div>
                                              <input  v-model="new_update_pre_event.name" id="name" class="form-control form-control-sm forminput" type="text">
                                          </div>
                                          <div class="form-group row">
                                            <div class="col-sm-12 mb-3 mb-sm-0">
                                              <label>Logo Image</label>
                                               <img :src="new_update_pre_event.logo_image" class="img-responsive" width="100%" style="display:none;">
                                              <input type="file" class="form-control form-control-user" placeholder="Logo Image" @change="onUpdateLogoImageChange" id="update_logo_image_upload">
                                            </div>
                                          </div>
                                          <div class="form-group row">
                                            <div class="col-sm-12 mb-3 mb-sm-0">
                                              <label>Main Image</label>
                                               <img :src="new_update_pre_event.main_image" class="img-responsive" width="100%" style="display:none;">
                                              <input type="file" class="form-control form-control-user" placeholder="Main Image" @change="onUpdateMainImageChange" id="update_main_image_upload">
                                            </div>
                                          </div>
                                          <div class="form-group row">
                                            <div class="col-sm-12">
                                              <label>Mobile Image</label>
                                               <img :src="new_update_pre_event.mobile_image" class="img-responsive" width="100%" style="display:none;">
                                              <input type="file" class="form-control form-control-user" placeholder="Mobile Image" @change="onUpdateMobileImageChange" id="update_mobile_image_upload">
                                            </div>
                                          </div>
                                          <div class="form-group row">
                                            <div class="col-sm-12 mb-3 mb-sm-0">
                                              <label>Pre Event Video</label>
                                              <input type="text" class="form-control form-control-user" id="Video" placeholder="Youtube Video Embed Link" v-model="new_update_pre_event.video">
                                            </div>
                                          </div>
                                          <div class="form-group row">
                                            <div class="col-sm-12">
                                              <label>Pre Event Leading Text</label>
                                              <editor v-model="new_update_pre_event.leading_text"

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
                                            <div class="col-sm-12">
                                              <label>Pre Event Description</label>
                                              <editor v-model="new_update_pre_event.description"

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
                                            <div class="col-sm-12">
                                              <label>Pre Event Content Detail</label>
                                              <editor v-model="new_update_pre_event.content_detail"

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
                                            <div class="col-sm-12">
                                              <label>Pre Event Content Information</label>
                                              <editor v-model="new_update_pre_event.information"

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
                                            <div class="col-sm-12">
                                              <label>Pre Event Content Contact</label>
                                              <editor v-model="new_update_pre_event.contact"

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
                                              <label>Pre Event Order</label>
                                              <input type="number" class="form-control form-control-user" id="exampleFirstName" placeholder="Order" v-model="new_update_pre_event.order">
                                            </div>
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
                pre_event:{
                    name:"",
                    description:"",
                    order:"",
                    date:"",
                    logo_image:"",
                    main_image:"",
                    mobile_image:"",
                    pre_event_images:""
                },
                pre_event_detail:{
                  pre_event_id:"",
                  image:""
                },
                errors: [],
                pre_events: [],
                categories:[],
                new_update_pre_event:[],
                uri:'/resource/pre_event',
                uri_detail:'/resource/pre_event_detail',
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
                this.new_update_pre_event=JSON.parse(JSON.stringify(this.pre_events[index]));
            },
            loadPostEvent(){
                axios.get(this.uri).then(response=>{
                    this.pre_events = response.data.pre_events
                });
            },
            onLogoImageChange(e) {
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createLogoImage(files[0]);
            },
            createLogoImage(file) {
                let reader = new FileReader();
                reader.onload = (e) => {
                    this.pre_event.logo_image = e.target.result;
                };
                reader.readAsDataURL(file);
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
                    this.pre_event.main_image = e.target.result;
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
                    this.pre_event.mobile_image= e.target.result;
                };
                reader.readAsDataURL(file);
            },
            createPostEvent(){
              let formData = new FormData();
              var main_image_file = document.querySelector('#main_image_upload');
              var mobile_image_file = document.querySelector('#mobile_image_upload');
              var logo_image_file = document.querySelector('#logo_image_upload');
              formData.append('name',this.pre_event.name);
              formData.append('order',this.pre_event.order);
              formData.append('leading_text',this.pre_event.leading_text);
              formData.append('description',this.pre_event.description);
              formData.append('video',this.pre_event.video);
              formData.append('content_detail',this.pre_event.content_detail);
              formData.append('information',this.pre_event.information);
              formData.append('contact',this.pre_event.contact);
              formData.append('order',this.pre_event.order);
              formData.append('main_image',main_image_file.files[0]);
              formData.append('mobile_image',mobile_image_file.files[0]);
              formData.append('logo_image',logo_image_file.files[0]);
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
            onUpdateLogoImageChange(e) {
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createUpdateLogoImage(files[0]);
            },
            createUpdateLogoImage(file) {
                let reader = new FileReader();
                reader.onload = (e) => {
                    this.new_update_pre_event.logo_image = e.target.result;
                };
                reader.readAsDataURL(file);
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
                    this.new_update_pre_event.main_image = e.target.result;
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
                    this.new_update_pre_event.mobile_image= e.target.result;
                };
                reader.readAsDataURL(file);
            },
            updatePostEvent(){
                let formData = new FormData();
                var update_logo_image_file = document.querySelector('#update_logo_image_upload');
                var update_main_image_file = document.querySelector('#update_main_image_upload');
                var update_mobile_image_file = document.querySelector('#update_mobile_image_upload');
                formData.append("_method", 'PATCH');
                formData.append('name',this.new_update_pre_event.name);
                formData.append('leading_text',this.new_update_pre_event.leading_text);
                formData.append('description',this.new_update_pre_event.description);
                formData.append('video',this.new_update_pre_event.video);
                formData.append('content_detail',this.new_update_pre_event.content_detail);
                formData.append('information',this.new_update_pre_event.information);
                formData.append('contact',this.new_update_pre_event.contact);
                formData.append('order',this.new_update_pre_event.order);
                formData.append('main_image',update_main_image_file.files[0]);
                formData.append('mobile_image',update_mobile_image_file.files[0]);
                formData.append('logo_image',update_logo_image_file.files[0]);
                axios.post(this.uri+"/"+this.new_update_pre_event.id,formData,{
                  headers: {
                    'Content-Type': 'multipart/form-data'
                  }
                }).then(response=>{
                        console.log(response.data.pre_events);
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
                    axios.delete(this.uri+"/"+this.pre_events[index].id).then(
                        response=>{
                            this.$delete(this.pre_events,index);
                            toastr.success(response.data.status);
                        }).catch(error=>{
                            console.log("Could not delete for some reason");
                        });
                }
            },
            resetData(){
                this.errors=[];
                this.pre_event.name = '';
                this.pre_event.description = '';

            }
        },
        mounted() {
            this.loadPostEvent();
            console.log('PostEvent mounted.')
        }
    }
</script>