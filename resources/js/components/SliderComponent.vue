<template>
  <div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Slider</h1>
    </div>
    <div class="row">
      <!-- Area Chart -->
      <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Slider</h6>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Main Image</th>
                    <th>Mobile Image</th>
                    <th>Order</th>
                    <th>Link</th>
                    <th colspan="2">Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>No.</th>
                    <th>Main Image</th>
                    <th>Mobile Image</th>
                    <th>Order</th>
                    <th>Link</th>
                    <th colspan="2">Action</th>
                  </tr>
                </tfoot>
                <tbody>
                  <tr v-for="(slider, index) in sliders">
                      <td>{{index+1}}</td>
                      <td><img :src="'../storage/'+slider.main_image" :alt="slider.alt+'main'" width="100px"></td>
                      <td><img :src="'../storage/'+slider.mobile_image" :alt="slider.alt+'mobile'"  width="100px"></td>
                      <td>{{slider.order}}</td>
                      <td>{{slider.link}}</td>
                      <td><button class="btn btn-info" @click="loadUpdateModal(index)">Edit </button></td>
                      <td><button class="btn btn-danger" @click="deleteSlider(index)">Remove </button></td>
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
            <h6 class="m-0 font-weight-bold text-primary">Add New Slider</h6>
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
                 <img :src="slider.main_image" class="img-responsive" width="100%" v-if="slider.main_image!=''">
                <input type="file" class="form-control form-control-user" placeholder="Main Image" @change="onMainImageChange" id="main_image_upload">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
                <label>Mobile Image</label>
                 <img :src="slider.mobile_image" class="img-responsive" width="100%" v-if="slider.mobile_image!=''">
                <input type="file" class="form-control form-control-user" placeholder="Mobile Image" @change="onMobileImageChange" id="mobile_image_upload">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12 mb-3 mb-sm-0">
                <label>Alt.</label>
                <input type="text" class="form-control form-control-user"  placeholder="Alternative Name" v-model="slider.alt">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
                <label>Order</label>
                <input type="number" class="form-control form-control-user"  placeholder="Slider Order" v-model="slider.order">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
                <label>Link</label>
                <input type="text" class="form-control form-control-user"  placeholder="Slider Link" v-model="slider.link">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
                <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" @click="createSlider()"><i class="fas fa-plus fa-sm text-white-50"></i> Add New Slider</button>
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
                                  <h3 style="margin-bottom:0px;" class="text-primary">Edit Slider</h3>
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
                               <img :src="new_update_slider.main_image" class="img-responsive" width="100%" style="display:none;">
                              <input type="file" class="form-control form-control-user" placeholder="Main Image" @change="onUpdateMainImageChange" id="update_main_image_upload">
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-sm-12">
                              <label>Mobile Image</label>
                               <img :src="new_update_slider.mobile_image" class="img-responsive" width="100%" style="display:none;">
                              <input type="file" class="form-control form-control-user" placeholder="Mobile Image" @change="onUpdateMobileImageChange" id="update_mobile_image_upload">
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                              <label>Alt.</label>
                              <input type="text" class="form-control form-control-user"  placeholder="Alternative Name" v-model="new_update_slider.alt">
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-sm-12">
                              <label>Order</label>
                              <input type="number" class="form-control form-control-user"  placeholder="Slider Order" v-model="new_update_slider.order">
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-sm-12">
                              <label>Link</label>
                              <input type="text" class="form-control form-control-user"  placeholder="Slider Link" v-model="new_update_slider.link">
                            </div>
                          </div>
                          <div class="row paddinginput">
                              <div class="col-md-12">
                                  <div class="">
                                      <div class="card-body">
                                          <div class="row margintop4020">
                                              <div class="col-md-12 text-center">
                                                  <button @click="updateSlider()" class="btn btn-sm btn-primary shadow-sm" >
                                                      Edit Slider
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
                slider:{
                    main_image:"",
                    mobile_image:"",
                    order:"",
                    link:"",
                    alt:""
                },
                errors: [],
                sliders: [],
                new_update_slider:[],
                uri:'/resource/slider'
            }
        },
        methods:{
            loadUpdateModal(index){
                this.errors="";
                $("#update-modal").modal("show");
                this.new_update_slider=JSON.parse(JSON.stringify(this.sliders[index]));
            },
            loadSliders(){
                axios.get(this.uri).then(response=>{
                    this.sliders = response.data.sliders
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
                    this.slider.main_image = e.target.result;
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
                    this.slider.mobile_image= e.target.result;
                };
                reader.readAsDataURL(file);
            },
            createSlider(){
              let formData = new FormData();
              var main_image_file = document.querySelector('#main_image_upload');
              var mobile_image_file = document.querySelector('#mobile_image_upload');
              formData.append('alt',this.slider.alt);
              formData.append('link',this.slider.link);
              formData.append('order',this.slider.order);
              formData.append('main_image',main_image_file.files[0]);
              formData.append('mobile_image',mobile_image_file.files[0]);
                axios.post(this.uri,formData,{
                  headers: {
                    'Content-Type': 'multipart/form-data'
                  }
                }).then(response=>{
                        this.sliders.push(response.data.sliders);
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
                    this.new_update_slider.main_image = e.target.result;
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
                    this.new_update_slider.mobile_image= e.target.result;
                };
                reader.readAsDataURL(file);
            },
            updateSlider(){
                let formData = new FormData();
                var update_main_image_file = document.querySelector('#update_main_image_upload');
                var update_mobile_image_file = document.querySelector('#update_mobile_image_upload');
                formData.append("_method", 'PATCH');
                formData.append('alt',this.new_update_slider.alt);
                formData.append('link',this.new_update_slider.link);
                formData.append('order',this.new_update_slider.order);
                formData.append('main_image',update_main_image_file.files[0]);
                formData.append('mobile_image',update_mobile_image_file.files[0]);
                axios.post(this.uri+"/"+this.new_update_slider.id,formData,{
                  headers: {
                    'Content-Type': 'multipart/form-data'
                  }
                }).then(response=>{
                        console.log(response.data.sliders);
                        this.resetData();
                        $("#update-modal").modal("hide");
                        toastr.success(response.data.status);
                        this.loadSliders();
                }).catch(error=>{
                    if (error.response.data.name){
                        this.errors.push(error.response.data.name[0]);
                      }
                });
            },
            deleteSlider(index){
                let confirmBox = confirm("Do you really want to delete this?");
                if(confirmBox==true){
                    axios.delete(this.uri+"/"+this.sliders[index].id).then(
                        response=>{
                            this.$delete(this.sliders,index);
                            toastr.success(response.data.status);
                        }).catch(error=>{
                            console.log("Could not delete for some reason");
                        });
                }
            },
            resetData(){
                this.errors=[];
                var main_image_file = document.querySelector('#main_image_upload');
                var mobile_image_file = document.querySelector('#mobile_image_upload');
                main_image_file.value='';
                mobile_image_file.value='';
                this.slider.alt = '';
                this.slider.link = '';
                this.slider.order = '';
                this.slider.main_image = '';
                this.slider.mobile_image = '';
                this.new_update_slider.main_image = '';
                this.new_update_slider.mobile_image = '';

            }
        },
        mounted() {
            this.loadSliders();
            console.log('Sliders mounted.')
        }
    }
</script>