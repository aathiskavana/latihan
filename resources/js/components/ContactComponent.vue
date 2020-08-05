<template>
  <div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Contacts</h1>
    </div>
    <div class="row">
      <!-- Area Chart -->
      <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Contact</h6>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Subject</th>
                    <th>To Email</th>
                    <th>From Name</th>
                    <th>From Email</th>
                    <th>From Phone</th>
                    <th>Message</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>No.</th>
                    <th>Subject</th>
                    <th>To Email</th>
                    <th>From Name</th>
                    <th>From Email</th>
                    <th>From Phone</th>
                    <th>Message</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
                <tbody>
                  <tr v-for="(contact, index) in contacts">
                      <td>{{index+1}}</td>
                      <td>{{contact.subject_name}}</td>
                      <td>{{contact.subject_email}}</td>
                      <td>{{contact.from_name}}</td>
                      <td>
                        {{contact.from_email}}
                      </td>
                      <td>
                        {{contact.from_phone}}
                      </td>
                      <td>
                        {{contact.message}}
                      </td>
                      <td><button class="btn btn-danger" @click="deleteContact(index)">Remove </button></td>
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
    export default {
        data(){
            return{
                contact:{
                    subject:"",
                    from_name:"",
                    from_email:"",
                    from_phone:"",
                    message:""
                },
                errors: [],
                contacts: [],
                new_update_contact:[],
                uri:'/resource/contact'
            }
        },
        methods:{
            loadCreateModal(){
                $("#create-modal").modal("show");
            },
            loadUpdateModal(index){
                this.errors="";
                $("#update-modal").modal("show");
                this.new_update_contact=JSON.parse(JSON.stringify(this.contacts[index]));
            },
            loadContacts(){
                axios.get(this.uri).then(response=>{
                    this.contacts = response.data.contacts
                });
            },
            createContact(){
                axios.post(this.uri, {
                    name:this.contact.name,
                    description:this.contact.description

                }).then(response=>{
                        this.contacts.push(response.data.contacts);
                        toastr.success(response.data.status);
                        this.resetData();
                }).catch(error=>{
                    if (error.response.data.name){
                        this.errors.push(error.response.data.name[0]);
                      }
                    
                });

            },
            updateContact(){
                axios.patch(this.uri+"/"+this.new_update_contact.id,{
                        name:this.new_update_contact.name,
                        description:this.new_update_contact.description
                    }
                ).then(response=>{
                        console.log(response.data.contacts);
                        this.resetData();
                        $("#update-modal").modal("hide");
                        toastr.success(response.data.status);
                        this.loadContacts();
                }).catch(error=>{
                    if (error.response.data.name){
                        this.errors.push(error.response.data.name[0]);
                      }
                    
                });
                console.log(this.new_update_contact.name);
            },
            deleteContact(index){
                let confirmBox = confirm("Do you really want to delete this?");
                if(confirmBox==true){
                    axios.delete(this.uri+"/"+this.contacts[index].id).then(
                        response=>{
                            this.$delete(this.contacts,index);
                            toastr.success(response.data.status);
                        }).catch(error=>{
                            console.log("Could not delete for some reason");
                        });
                }
            },
            resetData(){
                this.errors=[];
                this.contact.name = '';
                this.contact.description = '';

            }
        },
        mounted() {
            this.loadContacts();
            console.log('Contacts mounted.')
        }
    }
</script>