<template>
  <div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Section</h1>
    </div>
    <div class="row">
      <!-- Area Chart -->
      <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Section</h6>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Post</th>
                    <th>Order</th>
                    <th>Content</th>
                    <th colspan="2">Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>No.</th>
                    <th>Post</th>
                    <th>Order</th>
                    <th>Content</th>
                    <th colspan="2">Action</th>
                  </tr>
                </tfoot>
                <tbody>
                  <tr v-for="(section, index) in sections" :key="section.id">
                      <td>{{index+1}}</td>
                      <td>{{section.name}}</td>
                      <td><span v-if="posts_key_using_id[section.post_id]">
                        {{posts_key_using_id[section.post_id].name}}
                      </span></td>
                      <td>{{section.order}}</td>
                      <td v-html="section.content"></td>
                      <td><button class="btn btn-info" @click="loadUpdateModal(index)">Edit </button></td>
                      <td><button class="btn btn-danger" @click="deleteSection(index)">Remove </button></td>
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
            <h6 class="m-0 font-weight-bold text-primary">Add New Section</h6>
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
                <label>Name</label>
                <input type="text" class="form-control form-control-user"  placeholder="Name" v-model="section.name">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
                <label>Post</label>
                <select class="form-control form-control-user" v-model="section.post_id">
                  <option selected disabled>Please select post placement</option>
                  <option v-for="(post,index) in posts" v-bind:value="post.id">
                    {{post.name}}
                  </option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12 mb-3 mb-sm-0">
                <label>Order</label>
                <input type="text" class="form-control form-control-user"  placeholder="Order" v-model="section.order">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
                <label>Content</label>
                <editor v-model="section.content"

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
                <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" @click="createSection()"><i class="fas fa-plus fa-sm text-white-50"></i> Add New Section</button>
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
                                  <h3 style="margin-bottom:0px;" class="text-primary">Edit Section</h3>
                                  <div class="alert alert-danger" v-if="errors.length > 0">
                                      <ul>
                                          <li v-for="error in errors">{{error}}</li>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                              <label>Name</label>
                              <input type="text" class="form-control form-control-user"  placeholder="Name" v-model="new_update_section.name">
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-sm-12">
                              <label>Post</label>
                              <select class="form-control form-control-user" v-model="new_update_section.post_id">
                                <option selected disabled>Please select post placement</option>
                                <option v-for="(post,index) in posts" v-bind:value="post.id">
                                  {{post.name}}
                                </option>
                              </select>
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                              <label>Order</label>
                              <input type="text" class="form-control form-control-user"  placeholder="Order" v-model="new_update_section.order">
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-sm-12">
                              <label>Content</label>
                              <editor v-model="new_update_section.content"

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
                          <div class="row paddinginput">
                              <div class="col-md-12">
                                  <div class="">
                                      <div class="card-body">
                                          <div class="row margintop4020">
                                              <div class="col-md-12 text-center">
                                                  <button @click="updateSection()" class="btn btn-sm btn-primary shadow-sm" >
                                                      Edit Section
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
                section:{
                    name:"",
                    post_id:"",
                    order:"",
                    content:"",
                },
                errors: [],
                sections: [],
                posts: [],
                posts_key_using_id: [],
                new_update_section:[],
                uri:'/resource/section',
                post_uri:'/resource/post',
            }
        },
        components:{
          'editor':Editor
        },
        methods:{
            loadUpdateModal(index){
                this.errors="";
                $("#update-modal").modal("show");
                this.new_update_section=JSON.parse(JSON.stringify(this.sections[index]));
            },
            loadSections(){
                axios.get(this.uri).then(response=>{
                  this.sections = response.data.sections
                });
            },
            loadPosts(){
                axios.get(this.post_uri).then(response=>{
                  let data = [];
                  response.data.posts.forEach(
                      (post) => data[post.id] = post
                  );
                  this.posts = response.data.posts;
                  this.posts_key_using_id = data;
                  console.log(this.posts);
                });
            },
            createSection(){
              let formData = new FormData();
              formData.append('name',this.section.name);
              formData.append('post_id',this.section.post_id);
              formData.append('order',this.section.order);
              formData.append('content',this.section.content);
                axios.post(this.uri,formData,{
                  headers: {
                    'Content-Type': 'multipart/form-data'
                  }
                }).then(response=>{
                        this.sections.push(response.data.sections);
                        toastr.success(response.data.status);
                        this.resetData();
                }).catch(error=>{
                    if (error.response.data.name){
                        this.errors.push(error.response.data.name[0]);
                    }
                });
            },
            updateSection(){
                let formData = new FormData();
                formData.append("_method", 'PATCH');
                formData.append('name',this.new_update_section.name);
                formData.append('post_id',this.new_update_section.post_id);
                formData.append('order',this.new_update_section.order);
                formData.append('content',this.new_update_section.content);
                
                axios.post(this.uri+"/"+this.new_update_section.id,formData,{
                  headers: {
                    'Content-Type': 'multipart/form-data'
                  }
                }).then(response=>{
                        this.resetData();
                        $("#update-modal").modal("hide");
                        toastr.success(response.data.status);
                        this.loadSections();
                }).catch(error=>{
                    if (error.response.data.name){
                        this.errors.push(error.response.data.name[0]);
                    }
                });
            },
            deleteSection(index){
                let confirmBox = confirm("Do you really want to delete this?");
                if(confirmBox==true){
                    axios.delete(this.uri+"/"+this.sections[index].id).then(
                        response=>{
                            this.$delete(this.sections,index);
                            toastr.success(response.data.status);
                        }).catch(error=>{
                            console.log("Could not delete for some reason");
                        });
                }
            },
            resetData(){
                this.errors=[];
                this.section.name = '';
                this.section.post_id = '';
                this.section.order = '';
                this.section.content = '';
            }
        },
        mounted() {
            this.loadSections();
            this.loadPosts()
            console.log('Sections mounted.')
        }
    }
</script>