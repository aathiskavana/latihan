<template>
  <div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Menus</h1>
    </div>
    <div class="row">
      <!-- Area Chart -->
      <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Menu</h6>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Menu Content</th>
                    <th colspan="2">Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Menu Content</th>
                    <th colspan="2">Action</th>
                  </tr>
                </tfoot>
                <tbody>
                  <tr v-for="(menu, index) in menus">
                      <td>{{index+1}}</td>
                      <td>{{menu.name}}</td>
                      <td>
                        <ul>
                          <template v-for="(menu_content,menu_content_index) in menu.menu_contents">
                            <li>{{menu_content.name}} ({{menu_content.url}}) <sup style="color: red;cursor: pointer;" @click="deleteMenuContent(menu_content.id)">x</sup>
                              <ul>
                               <template v-for="(menu_sub_content,menu_sub_content_index) in menu_content.menu_sub_contents">
                                 <li>{{menu_sub_content.name}} ({{menu_sub_content.url}}) <sup style="color: red;cursor: pointer;" @click="deleteMenuSubContent(menu_sub_content.id)">x</sup></li>
                               </template>
                              </ul>
                            </li>
                          </template>
                        </ul>
                      </td>
                      <td>
                        <button class="btn btn-info" @click="loadUpdateModal(index)">Edit </button></td>
                      <td><button class="btn btn-danger" @click="deleteMenu(index)">Remove </button></td>
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
            <h6 class="m-0 font-weight-bold text-primary">Add New Menu</h6>
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
                <label>Menu Name</label>
                <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Name" v-model="menu.name">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
                <label>Menu Description</label>
                <textarea class="form-control form-control-user" id="exampleLastName" placeholder="Description" v-model="menu.description"></textarea>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
                <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" @click="createMenu"><i class="fas fa-plus fa-sm text-white-50"></i> Add New Menu</button>
              </div>
            </div>
          </div>
        </div>
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Add New Content Menu</h6>
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
                <label>Menu Content Name</label>
                <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Name" v-model="menu_content.name">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
                <label>Menu Placement</label>
                <select class="form-control form-control-user" v-model="menu_content.menu_id">
                  <option selected disabled>Please select menu placement</option>
                  <option v-for="(menu,index) in menus" v-bind:value="menu.id">
                    {{menu.name}}
                  </option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
                <label>Menu Content Url</label>
                <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Url" v-model="menu_content.url">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
                <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" @click="createMenuContent()"><i class="fas fa-plus fa-sm text-white-50"></i> Add New Menu</button>
              </div>
            </div>
          </div>
        </div>
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Add New Sub Content Menu</h6>
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
                <label>Menu Sub Content Name</label>
                <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Name" v-model="menu_sub_content.name">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
                <label>Menu Placement</label>
                <select class="form-control form-control-user" v-model="menu_sub_content.menu_id" @change="loadMenuContents()">
                  <option selected disabled>Please select menu placement</option>
                  <option v-for="(menu,index) in menus" v-bind:value="menu.id">
                    {{menu.name}}
                  </option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
                <label>Menu Content</label>
                <select class="form-control form-control-user" v-model="menu_sub_content.menu_content_id">
                  <option selected disabled>Please select menu placement</option>
                  <option v-for="(menu_content,index_menu_content) in menu_contents" v-bind:value="menu_content.id">
                    {{menu_content.name}}
                  </option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
                <label>Menu Sub Content Url</label>
                <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Url" v-model="menu_sub_content.url">
              
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
                <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" @click="createMenuSubContent()"><i class="fas fa-plus fa-sm text-white-50"></i> Add New Menu</button>
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
                                  <h3 style="margin-bottom:0px;" class="text-primary">Edit Menu</h3>
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
                                                      <div class="labelinputmenu">Nama Menu</div>
                                                      <input  v-model="new_update_menu.name" id="name" class="form-control form-control-sm forminput" type="text">
                                                  </div>
                                              </div>
                                              
                                          </div>
                                          
                                          <div class="form-group">
                                              <div class="labelinputmenu">Description</div>
                                              <textarea id="description" v-model="new_update_menu.description" class="form-control form-control-sm forminput" type="text" rows="4"></textarea>
                                          </div>
                                          
                                          
                                          <div class="row margintop4020">
                                              <div class="col-md-12 text-center">
                                                  <button @click="updateMenu" class="btn btn-sm btn-primary shadow-sm" >
                                                      Edit menu
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
                menu:{
                    name:"",
                    description:"",
                    contents:"",
                },
                menu_content:{
                  name:"",
                  url:""
                },
                menu_sub_content:{
                  name:"",
                  url:""
                },
                errors: [],
                menus: [],
                menu_contents:[],
                new_update_menu:[],
                uri:'/resource/menu',
                uri_menu_content:'/resource/menu_content',
                uri_menu_sub_content:'/resource/menu_sub_content'
            }
        },
        methods:{
            loadCreateModal(){
                $("#create-modal").modal("show");
            },
            loadUpdateModal(index){
                this.errors="";
                $("#update-modal").modal("show");
                this.new_update_menu=JSON.parse(JSON.stringify(this.menus[index]));
            },
            loadMenuContents(){
                axios.get(this.uri_menu_content+'/by_menu/'+this.menu_sub_content.menu_id).then(response=>{
                    this.menu_contents = response.data.menu_contents
                });
            },
            loadMenus(){
                axios.get(this.uri).then(response=>{
                    this.menus = response.data.menus
                });
            },
            createMenu(){
                axios.post(this.uri, {
                    name:this.menu.name,
                    description:this.menu.description

                }).then(response=>{
                        this.menus.push(response.data.menus);
                        toastr.success(response.data.status);
                        this.resetData();
                }).catch(error=>{
                    if (error.response.data.name){
                        this.errors.push(error.response.data.name[0]);
                      }
                    
                });

            },
            createMenuContent(){
                axios.post(this.uri_menu_content, {
                    name:this.menu_content.name,
                    url:this.menu_content.url,
                    menu_id:this.menu_content.menu_id

                }).then(response=>{
                        toastr.success(response.data.status);
                        this.resetData();
                        this.loadMenus();
                }).catch(error=>{
                    if (error.response.data.name){
                        this.errors.push(error.response.data.name[0]);
                      }
                    
                });

            },
            createMenuSubContent(){
                axios.post(this.uri_menu_sub_content, {
                    name:this.menu_sub_content.name,
                    url:this.menu_sub_content.url,
                    menu_content_id:this.menu_sub_content.menu_content_id

                }).then(response=>{
                        toastr.success(response.data.status);
                        this.resetData();
                        this.loadMenus();
                }).catch(error=>{
                    if (error.response.data.name){
                        this.errors.push(error.response.data.name[0]);
                      }
                    
                });

            },
            updateMenu(){
                axios.patch(this.uri+"/"+this.new_update_menu.id,{
                        name:this.new_update_menu.name,
                        description:this.new_update_menu.description
                    }
                ).then(response=>{
                        console.log(response.data.menus);
                        this.resetData();
                        $("#update-modal").modal("hide");
                        toastr.success(response.data.status);
                        this.loadMenus();
                }).catch(error=>{
                    if (error.response.data.name){
                        this.errors.push(error.response.data.name[0]);
                      }
                    
                });
                console.log(this.new_update_menu.name);
            },
            deleteMenu(index){
                let confirmBox = confirm("Do you really want to delete this?");
                if(confirmBox==true){
                    axios.delete(this.uri+"/"+this.menus[index].id).then(
                        response=>{
                            this.$delete(this.menus,index);
                            toastr.success(response.data.status);
                            this.loadMenus();
                        }).catch(error=>{
                            console.log("Could not delete for some reason");
                        });
                }
            },
            deleteMenuContent(index){
                let confirmBox = confirm("Do you really want to delete this?");
                if(confirmBox==true){
                    axios.delete(this.uri_menu_content+"/"+index).then(
                        response=>{
                            toastr.success(response.data.status);
                            this.loadMenus();
                        }).catch(error=>{
                            console.log("Could not delete for some reason");
                        });
                }
            },
            deleteMenuSubContent(index){
                let confirmBox = confirm("Do you really want to delete this?");
                if(confirmBox==true){
                    axios.delete(this.uri_menu_sub_content+"/"+index).then(
                        response=>{
                            toastr.success(response.data.status);
                           this.loadMenus();
                        }).catch(error=>{
                            console.log("Could not delete for some reason");
                        });
                }
            },
            resetData(){
                this.errors=[];
                this.menu.name = '';
                this.menu.description = '';
                this.menu_content.name = '';
                this.menu_content.url = '';
                this.menu_sub_content.name = '';
                this.menu_sub_content.url = '';

            }
        },
        mounted() {
            this.loadMenus();
            console.log('Menus mounted.')
        }
    }
</script>