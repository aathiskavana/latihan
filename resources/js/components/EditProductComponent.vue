<template>
  <div>
    <div class="row">

      <!-- Pie Chart -->
      <div class="col-md-8">
        <div class="card shadow mb-8">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-description-between">
            <h6 class="m-0 font-weight-bold text-primary">Edit Product</h6>
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
                  <img :src="new_update_product.main_image" class="img-responsive" width="100%" v-if="new_update_product.main_image!=''">
                <input type="file" class="form-control form-control-user" placeholder="Main Image" @change="onUpdateMainImageChange" id="update_main_image_upload">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12 mb-3 mb-sm-0">
                <label>Name</label>
                <input type="text" class="form-control form-control-user"  placeholder="Name" v-model="new_update_product.name">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12 mb-3 mb-sm-0">
                <label>Order</label>
                <input type="number" class="form-control form-control-user"  placeholder="Order" v-model="new_update_product.order">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
                <label>Description</label>
                <editor v-model="new_update_product.description"

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
                <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" @click="updateProduct()"><i class="fa-sm text-white-50"></i> Edit Product</button>
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
        props: ['productId'],
        data(){
            return{
                file:{
                    content:"",
                    name:"",
                },
                files: [],
                errors: [],
                new_update_product:[],
                uri:'/resource/product/' + this.productId,
                uri_files:'/resource/file',
            }
        },
        components:{
          'editor':Editor
        },
        methods:{
            loadProduct(){
                axios.get(this.uri).then(response=>{
                  this.errors="";
                  this.new_update_product = response.data.product
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
                    this.new_update_product.main_image = e.target.result;
                };
                reader.readAsDataURL(file);
            },
            updateProduct(){
                let formData = new FormData();
                var update_main_image_file = document.querySelector('#update_main_image_upload');
                formData.append("_method", 'PATCH');
                formData.append('name',this.new_update_product.name);
                formData.append('order',this.new_update_product.order);
                formData.append('description',this.new_update_product.description);
                let main_image = ''
                if (update_main_image_file.files[0]) {
                  main_image = update_main_image_file.files[0]
                }
                formData.append('main_image',main_image);
                axios.post(this.uri,formData,{
                  headers: {
                    'Description-Type': 'multipart/form-data'
                  }
                }).then(response=>{
                        this.resetData();
                        $("#update-modal").modal("hide");
                        toastr.success(response.data.status);
                        window.location.href = "/admin/product";
                        this.loadProduct();
                }).catch(error=>{
                    console.log(error.response.data);
                    if (error.response.data.name){
                        this.errors.push(error.response.data.name[0]);
                    }
                });
            },
            resetData(){
                this.errors=[];
                var main_image_file = document.querySelector('#update_main_image_upload');
                main_image_file.value='';
                this.new_update_product.main_image = '';
            },
            loadFiles(){
                axios.get(this.uri_files).then(response=>{
                  this.files = response.data.files
                });
            },
        },

        mounted() {
            this.loadProduct();
            this.loadFiles();
            console.log('Products mounted.')
        }
    }
</script>