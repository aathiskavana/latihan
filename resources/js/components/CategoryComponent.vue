<template>
  <div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Categories</h1>
    </div>
    <div class="row">
      <!-- Area Chart -->
      <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Category</h6>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Slug Name</th>
                    <th>Description</th>
                    <th colspan="2">Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Slug Name</th>
                    <th>Description</th>
                    <th colspan="2">Action</th>
                  </tr>
                </tfoot>
                <tbody>
                  <tr v-for="(category, index) in categories">
                      <td>{{index+1}}</td>
                      <td>{{category.name}}</td>
                      <td>{{category.slug_name}}</td>
                      <td v-html="category.description"></td>
                      <td><button class="btn btn-info" @click="loadUpdateModal(index)">Edit </button></td>
                      <td><button class="btn btn-danger" @click="deleteCategory(index)">Remove </button></td>
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
            <h6 class="m-0 font-weight-bold text-primary">Add New Category</h6>
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
                <label>Category Name</label>
                <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Name" v-model="category.name">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
                <label>Category Description</label>
                <textarea class="form-control form-control-user" id="exampleLastName" placeholder="Description" v-model="category.description"></textarea>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
                <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" @click="createCategory"><i class="fas fa-plus fa-sm text-white-50"></i> Add New Category</button>
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
                                  <h3 style="margin-bottom:0px;" class="text-primary">Edit Category</h3>
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
                                                      <div class="labelinputmenu">Nama Category</div>
                                                      <input  v-model="new_update_category.name" id="name" class="form-control form-control-sm forminput" type="text">
                                                  </div>
                                              </div>
                                              
                                          </div>
                                          
                                          <div class="form-group">
                                              <div class="labelinputmenu">Description</div>
                                              <textarea id="description" v-model="new_update_category.description" class="form-control form-control-sm forminput" type="text" rows="4"></textarea>
                                          </div>
                                          
                                          
                                          <div class="row margintop4020">
                                              <div class="col-md-12 text-center">
                                                  <button @click="updateCategory" class="btn btn-sm btn-primary shadow-sm" >
                                                      Edit category
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
                category:{
                    name:"",
                    description:"",
                    slug_name:""
                },
                errors: [],
                categories: [],
                new_update_category:[],
                uri:'/resource/category'
            }
        },
        methods:{
            loadCreateModal(){
                $("#create-modal").modal("show");
            },
            loadUpdateModal(index){
                this.errors="";
                $("#update-modal").modal("show");
                this.new_update_category=JSON.parse(JSON.stringify(this.categories[index]));
            },
            loadCategories(){
                axios.get(this.uri).then(response=>{
                    this.categories = response.data.categories
                });
            },
            createCategory(){
                axios.post(this.uri, {
                    name:this.category.name,
                    description:this.category.description

                }).then(response=>{
                        this.categories.push(response.data.categories);
                        toastr.success(response.data.status);
                        this.resetData();
                }).catch(error=>{
                    if (error.response.data.name){
                        this.errors.push(error.response.data.name[0]);
                      }
                    
                });

            },
            updateCategory(){
                axios.patch(this.uri+"/"+this.new_update_category.id,{
                        name:this.new_update_category.name,
                        description:this.new_update_category.description
                    }
                ).then(response=>{
                        console.log(response.data.categories);
                        this.resetData();
                        $("#update-modal").modal("hide");
                        toastr.success(response.data.status);
                        this.loadCategories();
                }).catch(error=>{
                    if (error.response.data.name){
                        this.errors.push(error.response.data.name[0]);
                      }
                    
                });
                console.log(this.new_update_category.name);
            },
            deleteCategory(index){
                let confirmBox = confirm("Do you really want to delete this?");
                if(confirmBox==true){
                    axios.delete(this.uri+"/"+this.categories[index].id).then(
                        response=>{
                            this.$delete(this.categories,index);
                            toastr.success(response.data.status);
                        }).catch(error=>{
                            console.log("Could not delete for some reason");
                        });
                }
            },
            resetData(){
                this.errors=[];
                this.category.name = '';
                this.category.description = '';

            }
        },
        mounted() {
            this.loadCategories();
            console.log('Categories mounted.')
        }
    }
</script>