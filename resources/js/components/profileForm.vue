<template>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="modal fade" id="updateProfile" tabindex="-1" role="dialog" 
                style="padding-right: 17px;"
                aria-labelledby="updateProfile" aria-hidden="true">
                <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title" id="modal-title-default">Update Profile</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="">
                                <div class="form-group">
                                    <label for="name">Full Name</label>
                                    <input type="text" v-model="form.name" name="name" 
                                    class="form-control" :class="{ 'is-invalid': 
                                    form.errors.has('name') }" >
                                    <has-error :form="form" field="name"></has-error>
                                </div>

                                <div class="form-group">
                                    <label for="username">UserName</label>
                                    <input type="text" v-model="form.username" name="username" 
                                    class="form-control" :class="{ 'is-invalid': 
                                    form.errors.has('username') }" >
                                    <has-error :form="form" field="username"></has-error>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input type="text" v-model="form.email" name="email" 
                                    class="form-control" :class="{ 'is-invalid': 
                                    form.errors.has('email') }" >
                                    <has-error :form="form" field="email"></has-error>
                                </div>

                                <div class="form-group">
                                    <label for="phone">Mobile Number</label>
                                    <input type="text" v-model="form.phone" name="phone" 
                                    class="form-control" :class="{ 'is-invalid': 
                                    form.errors.has('phone') }" >
                                    <has-error :form="form" field="phone"></has-error>
                                </div>
                                <div class="form-group">
                                    <label for="phone">L G A </label>
                                    <select type="text" v-model="form.bio" name="bio" 
                                        class="form-control" :class="{ 'is-invalid': 
                                        form.errors.has('bio') }">
                                        <option value="">Choose your Local Goverment</option>
                                    </select>
                                    <has-error :form="form" field="bio"></has-error>
                                </div>
                                 <div class="form-group">
                                    <label for="phone">About Me</label>
                                    <textarea type="text" v-model="form.bio" name="bio" 
                                    class="form-control" :class="{ 'is-invalid': 
                                    form.errors.has('bio') }"></textarea>
                                    <has-error :form="form" field="bio"></has-error>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary">Send</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a > <i class="menu-icon fa fa-"></i>
            <button type="button" class="btn btn-primary mb-1" 
                @click="openModal">
                Know Your Ward
            </button> 
        </a>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                form: new Form({
                    name: '',
                    username: '',
                    email: '',
                    phone: '',
                    image: '',
                    address: '',
                    town_id: '',
                    bio: ''
                })
            }
        },
        methods: {
            openModal(){
               console.log('hello');
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
