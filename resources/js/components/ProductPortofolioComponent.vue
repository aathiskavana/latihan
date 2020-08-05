<template>
  <div>
    <div class="d-sm-flex align-items-center justify-description-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Product Portofolio</h1>
    </div>
    <div class="row">
      <!-- Area Chart -->
      <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-description-between">
            <h6 class="m-0 font-weight-bold text-primary">Product Portofolio</h6>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bproduct_ided" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Main Image</th>
                    <th>Name</th>
                    <th>Product</th>
                    <th colspan="2">Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>No.</th>
                    <th>Main Image</th>
                    <th>Name</th>
                    <th>Product</th>
                    <th colspan="2">Action</th>
                  </tr>
                </tfoot>
                <tbody>
                  <tr v-for="(product_portofolio, index) in product_portofolios" :key="product_portofolio.id">
                      <td>{{index+1}}</td>
                      <td><img :src="'../storage/'+product_portofolio.main_image" :alt="product_portofolio.name" width="100px"></td>
                      <td>{{product_portofolio.name}}</td>
                      <td><span v-if="products_key_using_id[product_portofolio.product_id]">
                        {{products_key_using_id[product_portofolio.product_id].name}}
                      </span></td>
                      <td><button class="btn btn-info" @click="loadUpdateModal(index)">Edit </button></td>
                      <td><button class="btn btn-danger" @click="deleteProductPortofolio(index)">Remove </button></td>
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
          <div class="card-header py-3 d-flex flex-row align-items-center justify-description-between">
            <h6 class="m-0 font-weight-bold text-primary">Add New Product Portofolio</h6>
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
                 <img :src="product_portofolio.main_image" class="img-responsive" width="100%" v-if="product_portofolio.main_image!=''">
                <input type="file" class="form-control form-control-user" placeholder="Main Image" @change="onMainImageChange" id="main_image_upload">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12 mb-3 mb-sm-0">
                <label>Name</label>
                <input type="text" class="form-control form-control-user"  placeholder="Name" v-model="product_portofolio.name">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
                <label>Product</label>
                <select class="form-control form-control-user" v-model="product_portofolio.product_id">
                  <option selected disabled>Please select project type placement</option>
                  <option v-for="(product,index) in products" v-bind:value="product.id">
                    {{product.name}}
                  </option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
                <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" @click="createProductPortofolio()"><i class="fas fa-plus fa-sm text-white-50"></i> Add New Product Portofolio</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="update-modal" tabindex="-1" role="dialog" >
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header" style="padding-right:20px; padding-bottom:0px; bproduct_id-bottom:1px solid transparent;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" style="padding-top:0px; padding-left:20px; padding-right:20px; padding-bottom:20px;">
                  <div class="row">
                      <div class="col-md-12 text-center">
                          
                          <div class="row ">
                              <div class="col-md-12 text-center">
                                  <h3 style="margin-bottom:0px;" class="text-primary">Edit Product Portofolio</h3>
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
                                <img :src="new_update_product_portofolio.main_image" class="img-responsive" width="100%" v-if="new_update_product_portofolio.main_image!=''">
                              <input type="file" class="form-control form-control-user" placeholder="Main Image" @change="onUpdateMainImageChange" id="update_main_image_upload">
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                              <label>Name</label>
                              <input type="text" class="form-control form-control-user"  placeholder="Name" v-model="new_update_product_portofolio.name">
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-sm-12">
                              <label>Product</label>
                              <select class="form-control form-control-user" v-model="new_update_product_portofolio.product_id">
                                <option selected disabled>Please select project type placement</option>
                                <option v-for="(product,index) in products" v-bind:value="product.id">
                                  {{product.name}}
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
                                                  <button @click="updateProductPortofolio()" class="btn btn-sm btn-primary shadow-sm" >
                                                      Edit Product Portofolio
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
                product_portofolio:{
                    main_image:"",
                    name:"",
                    product_id:"",
                },
                errors: [],
                product_portofolios: [],
                products: [],
                products_key_using_id: [],
                new_update_product_portofolio:[],
                uri:'/resource/product_portofolio',
                product_uri:'/resource/product',
            }
        },
        methods:{
            loadUpdateModal(index){
                this.errors="";
                $("#update-modal").modal("show");
                this.new_update_product_portofolio=JSON.parse(JSON.stringify(this.product_portofolios[index]));
            },
            loadProductPortofolios(){
                axios.get(this.uri).then(response=>{
                  this.product_portofolios = response.data.product_portofolios
                });
            },
            loadProducts(){
                axios.get(this.product_uri).then(response=>{
                  let data = [];
                  response.data.products.forEach(
                      (product) => data[product.id] = product
                  );
                  this.products = response.data.products;
                  this.products_key_using_id = data;
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
                    this.product_portofolio.main_image = e.target.result;
                };
                reader.readAsDataURL(file);
            },
            createProductPortofolio(){
              let formData = new FormData();
              var main_image_file = document.querySelector('#main_image_upload');
              formData.append('name',this.product_portofolio.name);
              formData.append('product_id',this.product_portofolio.product_id);
              formData.append('main_image',main_image_file.files[0]);
                axios.post(this.uri,formData,{
                  headers: {
                    'Description-Type': 'multipart/form-data'
                  }
                }).then(response=>{
                        this.product_portofolios.push(response.data.product_portofolios);
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
                    this.new_update_product_portofolio.main_image = e.target.result;
                };
                reader.readAsDataURL(file);
            },
            updateProductPortofolio(){
                let formData = new FormData();
                var update_main_image_file = document.querySelector('#update_main_image_upload');
                formData.append("_method", 'PATCH');
                formData.append('name',this.new_update_product_portofolio.name);
                formData.append('product_id',this.new_update_product_portofolio.product_id);
                formData.append('description',this.new_update_product_portofolio.description);
                let main_image = ''
                if (update_main_image_file.files[0]) {
                  main_image = update_main_image_file.files[0]
                }
                formData.append('main_image',main_image);
                
                axios.post(this.uri+"/"+this.new_update_product_portofolio.id,formData,{
                  headers: {
                    'Description-Type': 'multipart/form-data'
                  }
                }).then(response=>{
                        this.resetData();
                        $("#update-modal").modal("hide");
                        toastr.success(response.data.status);
                        this.loadProductPortofolios();
                }).catch(error=>{
                    if (error.response.data.name){
                        this.errors.push(error.response.data.name[0]);
                    }
                });
            },
            deleteProductPortofolio(index){
                let confirmBox = confirm("Do you really want to delete this?");
                if(confirmBox==true){
                    axios.delete(this.uri+"/"+this.product_portofolios[index].id).then(
                        response=>{
                            this.$delete(this.product_portofolios,index);
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
                this.product_portofolio.name = '';
                this.product_portofolio.product_id = '';
                this.product_portofolio.main_image = '';
                this.new_update_product_portofolio.main_image = '';
            }
        },
        mounted() {
            this.loadProductPortofolios();
            this.loadProducts();
            console.log('ProductPortofolios mounted.')
        }
    }
</script>