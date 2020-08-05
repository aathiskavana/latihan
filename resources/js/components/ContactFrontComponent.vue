<template>
    <div>
        <div class="contact-form"  novalidate>
            <form class="input-line">
                <div class="form-group">
                    <input type="text" name="fname" class="form-control" placeholder="Full Name*" tabindex="1" required v-model="contact.from_name">
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email Address*" tabindex="2" required="" v-model="contact.from_email">
                </div>
                <div class="form-group">
                    <input type="text" name="phone" class="form-control" placeholder="Phone Number*" tabindex="3" required v-model="contact.from_phone">
                </div>

                <div class="form-group">
                      <select class="form-control" placeholder="Subject" v-model="contact.subject" required>
                        <option value="">Subject</option>
                        <option v-for="(contact_subject, index) in contact_subjects" :key="contact_subject.id"
                         :value="index">{{contact_subject.name}}
                        </option>
                      </select>
                </div>
                <div class="form-group">
                        <textarea name="message" class="form-control" placeholder="Message*" tabindex="7" required v-model="contact.message"></textarea rows="100">
                </div>
                <div class="form-group">
                    <button type="button" class="btn btn-warning contact-btn" @click="createContact">Submit<i class="fas fa-arrow-right contact-icon"></i></button>
                </div>
            </form>
        </div>
        <div class="form-response center" id="response-contact"></div>
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
                contacts:[],
                contact_subjects: [],
                uri_contact:'/submit/contact',
                uri_contact_subject: '/resource/contact_subject'
            }
        },
        methods:{
            loadContactSubjects(){
                axios.get(this.uri_contact_subject).then(response=>{
                  this.contact_subjects = response.data.contact_subjects;
                });
            },
            createContact(){
                axios.post(this.uri_contact, {
                    subject_name:this.contact_subjects[this.contact.subject].name,
                    subject_email:this.contact_subjects[this.contact.subject].email,
                    from_name:this.contact.from_name,
                    from_email:this.contact.from_email,
                    from_phone:this.contact.from_phone,
                    message:this.contact.message

                }).then(response=>{
                        this.contacts.push(response.data.contact);
                        toastr.success(response.data.status);
                        document.getElementById("response-contact").innerHTML = response.data.status; 
                        this.resetData();
                }).catch(error=>{
                    console.log(error);
                    if (error.response.data.name){
                        this.errors.push(error.response.data.name[0]);
                      }
                    
                });
            },
            resetData(){
                this.errors=[];
                this.contact.subject = '';
                this.contact.message = '';
                this.contact.from_name = '';
                this.contact.from_phone = '';
                this.contact.from_email = '';

            }
            
        },
        mounted() {
            this.loadContactSubjects();
        }
    }
</script>