<template>
  <div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Content</h1>
    </div>
    <div class="row">
      <!-- Area Chart -->
      <div class="col-md-12">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Content</h6>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th colspan="1">Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th colspan="1">Action</th>
                  </tr>
                </tfoot>
                <tbody>
                  <tr v-for="(content, index) in contents">
                      <td>{{index+1}}</td>
                      <td>{{content.name}}</td>
                      <td v-html="content.description"></td>
                      <td><button class="btn btn-info" @click="loadUpdateModal(index)">Edit </button></td>
                  </tr>
                </tbody>
              </table>
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
                                  <h3 style="margin-bottom:0px;" class="text-primary">Edit Content</h3>
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
                                                      <div class="labelinputmenu">Nama Content</div>
                                                      <input  v-model="new_update_content.name" id="name" class="form-control form-control-sm forminput" type="text">
                                                  </div>
                                              </div>
                                              
                                          </div>
                                          
                                          <div class="form-group">
                                              <div class="labelinputmenu">Description</div>
                                              <textarea id="description" v-model="new_update_content.description" class="form-control form-control-sm forminput" type="text" rows="4"></textarea>
                                          </div>
                                          
                                          
                                          <div class="row margintop4020">
                                              <div class="col-md-12 text-center">
                                                  <button @click="updateContent()" class="btn btn-sm btn-primary shadow-sm" >
                                                      Edit content
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
                content:{
                    name:"",
                    description:"",
                    slug_name:""
                },
                errors: [],
                contents: [],
                new_update_content:[],
                uri:'/resource/content'
            }
        },
        methods:{
            loadCreateModal(){
                $("#create-modal").modal("show");
            },
            loadUpdateModal(index){
                this.errors="";
                $("#update-modal").modal("show");
                this.new_update_content=JSON.parse(JSON.stringify(this.contents[index]));;
            },
            loadContents(){
                axios.get(this.uri).then(response=>{
                    this.contents = response.data.contents
                });
            },
            createContent(){
                axios.post(this.uri, {
                    name:this.content.name,
                    description:this.content.description

                }).then(response=>{
                        this.contents.push(response.data.contents);
                        toastr.success(response.data.status);
                        this.resetData();
                }).catch(error=>{
                    if (error.response.data.name){
                        this.errors.push(error.response.data.name[0]);
                      }
                    
                });

            },
            updateContent(){
                axios.patch(this.uri+"/"+this.new_update_content.id,{
                        name:this.new_update_content.name,
                        description:this.new_update_content.description
                    }
                ).then(response=>{
                        console.log(response.data.contents);
                        this.resetData();
                        $("#update-modal").modal("hide");
                        toastr.success(response.data.status);
                        this.loadContents();
                }).catch(error=>{
                    if (error.response.data.name){
                        this.errors.push(error.response.data.name[0]);
                      }
                    
                });
                console.log(this.new_update_content.name);
            },
            deleteContent(index){
                let confirmBox = confirm("Do you really want to delete this?");
                if(confirmBox==true){
                    axios.delete(this.uri+"/"+this.contents[index].id).then(
                        response=>{
                            this.$delete(this.contents,index);
                            toastr.success(response.data.status);
                        }).catch(error=>{
                            console.log("Could not delete for some reason");
                        });
                }
            },
            resetData(){
                this.errors=[];
                this.content.name = '';
                this.content.description = '';

            }
        },
        mounted() {
            this.loadContents();
            console.log('Contents mounted.')
        }
    }
</script>