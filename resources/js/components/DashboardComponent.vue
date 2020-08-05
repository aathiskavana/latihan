
<template>
<div>
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
  </div>

  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pages</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ page_count }}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-columns fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Blogs</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ blog_count }}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-newspaper fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tags</div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ tag_count }}</div>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-tags fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Contacts</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ contact_count }}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-comments fa-2x text-gray-300"></i>
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
                page_count:"",
                blog_count:"",
                tag_count:"",
                contact_count:"",
                page_uri:'/resource/page',
                blog_uri:'/resource/blog',
                tag_uri:'/resource/tag',
                contact_uri:'/resource/contact',
            }
        },
        methods:{
            loadPages(){
                axios.get(this.page_uri).then(response=>{
                  this.page_count = response.data.pages ? 
                                         response.data.pages.length :
                                         0;
                });
            },
            loadBlogs(){
                axios.get(this.blog_uri).then(response=>{
                  this.blog_count = response.data.blogs ? 
                                         response.data.blogs.length :
                                         0;
                });
            },
            loadTags(){
                axios.get(this.tag_uri).then(response=>{
                  this.tag_count = response.data.tags ? 
                                         response.data.tags.length :
                                         0;
                });
            },
            loadContacts(){
                axios.get(this.contact_uri).then(response=>{
                  this.contact_count = response.data.contacts ? 
                                         response.data.contacts.length :
                                         0;
                });
            },
        },
        mounted() {
            this.loadPages();
            this.loadBlogs();
            this.loadTags();
            this.loadContacts();
            console.log('Projects mounted.')
        }
    }
</script>