<template>
  <div>
    <div class="row">
      <!-- Area Chart -->
      <div class="col-md-12">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-description-between">
            <h6 class="m-0 font-weight-bold text-primary">Product</h6>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Main Image</th>
                    <th>Name</th>
                    <th>Order</th>
                    <th>Description</th>
                    <th colspan="2">Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>No.</th>
                    <th>Main Image</th>
                    <th>Name</th>
                    <th>Order</th>
                    <th>Description</th>
                    <th colspan="2">Action</th>
                  </tr>
                </tfoot>
                <tbody>
                  <tr v-for="(product, index) in products" :key="product.id">
                      <td>{{index+1}}</td>
                      <td><img :src="'../storage/'+product.main_image" :alt="product.name" width="100px"></td>
                      <td>{{product.name}}</td>
                      <td>{{product.order}}</td>
                      <td v-html="product.description"></td>
                      <td><button class="btn btn-info" @click="editProduct(product.id)">Edit </button></td>
                      <td><button class="btn btn-danger" @click="deleteProduct(index)">Remove </button></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <!-- Pie Chart -->
      <div class="col-md-8">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-description-between">
            <h6 class="m-0 font-weight-bold text-primary">Add New Product</h6>
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
                 <img :src="product.main_image" class="img-responsive" width="100%" v-if="product.main_image!=''">
                <input type="file" class="form-control form-control-user" placeholder="Main Image" @change="onMainImageChange" id="main_image_upload">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12 mb-3 mb-sm-0">
                <label>Name</label>
                <input type="text" class="form-control form-control-user"  placeholder="Name" v-model="product.name">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12 mb-3 mb-sm-0">
                <label>Order</label>
                <input type="number" class="form-control form-control-user"  placeholder="Order" v-model="product.order">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
                <label>Description</label>
                <editor v-model="product.description"

                  api-key="gssljk5uv5x6t2kif8srfvvuzj9g22oqase8m28dqkqrr5e4"
                  :init="{
                    height: 300,
                    menubar: false,
                    mode : 'textareas',
                    force_br_newlines : false,
                    force_p_newlines : false,
                    forced_root_block : '',
                    entity_encoding: 'raw',
                    relative_urls : false,
                    remove_script_host : false,
                    convert_urls : false,
                    plugins: [
                      'advlist autolink lists link image charmap print preview anchor',
                      'searchreplace visualblocks code fullscreen',
                      'insertdatetime media table paste code help wordcount'
                    ],
                    toolbar:
                      'formatselect | bold italic backcolor | \
                      alignleft aligncenter alignright alignjustify | \
                      bullist numlist outdent indent | removeformat | image'
                  }"
                />
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
                <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" @click="createProduct()"><i class="fas fa-plus fa-sm text-white-50"></i> Add New Product</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
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
                    <th>Image</th>
                    <th>Url</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>No.</th>
                    <th>Image</th>
                    <th>Url</th>
                  </tr>
                </tfoot>
                <tbody>
                  <tr v-for="(file, index) in files" :key="file.id">
                      <td>{{index+1}}</td>
                      <td><img :src="'/storage/'+file.content" :alt="file.name" width="100px"></td>
                      <td>/storage/{{file.content}}</td>
                  </tr>
                </tbody>
              </table>
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
                product:{
                    main_image:"",
                    name:"",
                    order:"",
                    description:"",
                },
                file:{
                    content:"",
                    name:"",
                },
                files: [],
                errors: [],
                products: [],
                uri:'/resource/product',
                uri_files:'/resource/file',
            }
        },
        components:{
          'editor':Editor
        },
        methods:{
            loadProducts(){
                axios.get(this.uri).then(response=>{
                  this.products = response.data.products
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
                    this.product.main_image = e.target.result;
                };
                reader.readAsDataURL(file);
            },
            createProduct(){
              let formData = new FormData();
              var main_image_file = document.querySelector('#main_image_upload');
              formData.append('name',this.product.name);
              formData.append('order',this.product.order);
              formData.append('description',this.product.description);
              formData.append('main_image',main_image_file.files[0]);
              axios.post(this.uri,formData,{
                  headers: {
                    'Description-Type': 'multipart/form-data'
                  }
                }).then(response=>{
                        this.products.push(response.data.products);
                        toastr.success(response.data.status);
                        this.resetData();
                }).catch(error=>{
                    if (error.response.data.name){
                        this.errors.push(error.response.data.name[0]);
                    }
                    console.log(error.response.data)
                });
            },
            editProduct(id) {
              window.location.href = "/admin/product/" + id;
            },
            deleteProduct(index){
                let confirmBox = confirm("Do you really want to delete this?");
                if(confirmBox==true){
                    axios.delete(this.uri+"/"+this.products[index].id).then(
                        response=>{
                            this.$delete(this.products,index);
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
                this.product.name = '';
                this.product.order = '';
                this.product.description = '';
                this.product.main_image = '';
            },
            loadFiles(){
                axios.get(this.uri_files).then(response=>{
                  this.files = response.data.files
                });
            },
        },

        mounted() {
            this.loadProducts();
            this.loadFiles();
            console.log('Products mounted.')
        }
    }
</script>