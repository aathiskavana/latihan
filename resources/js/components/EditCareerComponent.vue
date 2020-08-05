<template>
  <div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Career</h1>
    </div>
    <div class="row">
      <!-- Pie Chart -->
      <div class="col-md-8">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Edit Career</h6>
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
                <label>Title</label>
                <input type="text" class="form-control form-control-user"  placeholder="Title" v-model="new_update_career.title">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
                <label>Description</label>
                <editor v-model="new_update_career.description"

                api-key="gssljk5uv5x6t2kif8srfvvuzj9g22oqase8m28dqkqrr5e4"
                :init="{
                  height: 300,
                  menubar: false,
                  mode : 'textareas',
                  force_br_newlines : false,
                  force_p_newlines : false,
                  forced_root_block : '',
                  entity_encoding: 'raw',
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
              <div class="col-sm-12 mb-3 mb-sm-0">
                <label>Order</label>
                <input type="number" class="form-control form-control-user"  placeholder="Order" v-model="new_update_career.order">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
                <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" @click="updateCareer()"><i class="fa-sm text-white-50"></i> Edit Career</button>
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
        props: ['careerId'],
        data(){
            return{
                file:{
                    content:"",
                    name:"",
                },
                files: [],
                errors: [],
                new_update_career:[],
                uri:'/resource/career/' + this.careerId,
                uri_files:'/resource/file',
            }
        },
        components:{
          'editor':Editor
        },
        methods:{
            loadCareer(){
                axios.get(this.uri).then(response=>{
                  this.errors="";
                  this.new_update_career = response.data.career
                });
            },
            updateCareer(){
                let formData = new FormData();
                formData.append("_method", 'PATCH');
                formData.append('title',this.new_update_career.title);
                formData.append('description',this.new_update_career.description);
                formData.append('order',this.new_update_career.order);
                axios.post(this.uri,formData,{
                  headers: {
                    'Content-Type': 'multipart/form-data'
                  }
                }).then(response=>{
                        this.resetData();
                        $("#update-modal").modal("hide");
                        toastr.success(response.data.status);
                        window.location.href = "/admin/career";
                }).catch(error=>{
                    if (error.response.data.title){
                        this.errors.push(error.response.data.title[0]);
                    }
                });
            },
            resetData(){
                this.errors=[];
            },
            loadFiles(){
                axios.get(this.uri_files).then(response=>{
                  this.files = response.data.files
                });
            },
        },
        mounted() {
            this.loadCareer();
            this.loadFiles();
            console.log('Projects mounted.')
        }
    }
</script>