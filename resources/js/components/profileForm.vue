<template>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="modal fade" id="updateProfile" tabindex="-1" role="dialog" 
                style="padding-right: 17px;"
                aria-labelledby="updateProfile" aria-hidden="true">
                <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title" id="modal-title-default">Get Verified</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="">

                                <div class="form-group">
                                    <label for="mother_name">Mother's Maiden Name</label>
                                    <input type="text" v-model="form.username" name="mother_name" 
                                    class="form-control" :class="{ 'is-invalid': 
                                    form.errors.has('mother_name') }" >
                                    <has-error :form="form" field="mother_name"></has-error>
                                </div>

                                <div class="form-group">
                                    <label for="date_of_birth">Date of Birth</label>
                                    <input type="date" v-model="form.date_of_birth" name="date_of_birth" 
                                    class="form-control" :class="{ 'is-invalid': 
                                    form.errors.has('date_of_birth') }" >
                                    <has-error :form="form" field="date_of_birth"></has-error>
                                </div>
                                <div class="form-group">
                                    <label for="occupation">Occupation</label>
                                    <input type="text" v-model="form.occupation" name="occupation" 
                                    class="form-control" :class="{ 'is-invalid': 
                                    form.errors.has('occupation') }" >
                                    <has-error :form="form" field="occupation"></has-error>
                                </div>
                                <div class="form-group">
                                    <label for="front_pvc">Upload Front PVC</label>
                                    <input type="file"  name="front_pvc" 
                                    class="form-control" :class="{ 'is-invalid': 
                                    form.errors.has('front_pvc') }" >
                                    <has-error :form="form" field="front_pvc"></has-error>
                                </div>

                                <div class="form-group">
                                    <label for="back_pvc">Upload Back PVC</label>
                                    <input type="file" name="back_pvc" 
                                    class="form-control" :class="{ 'is-invalid': 
                                    form.errors.has('back_pvc') }" >
                                    <has-error :form="form" field="back_pvc"></has-error>
                                </div>

                                <div class="form-group">
                                    <label for="ward">what is your ward</label>
                                    <input type="text" v-model="form.ward" name="ward" 
                                    class="form-control" :class="{ 'is-invalid': 
                                    form.errors.has('ward') }" >
                                    <has-error :form="form" field="ward"></has-error>
                                </div>

                                <div class="form-group">
                                    <label for="account_number">Accout Number</label>
                                    <input type="number" v-model="form.account_number" name="account_number" 
                                    class="form-control" :class="{ 'is-invalid': 
                                    form.errors.has('account_number') }" >
                                    <has-error :form="form" field="account_number"></has-error>
                                </div>

                                <div class="form-group">
                                    <label for="bank_name">Bank Name</label>
                                    <input type="text" v-model="form.bank_name" name="bank_name" 
                                    class="form-control" :class="{ 'is-invalid': 
                                    form.errors.has('bank_name') }" >
                                    <has-error :form="form" field="bank_name"></has-error>
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary">Proceed</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <a > <i class="menu-icon fa fa-"></i>
            <button type="button" class="btn btn-primary mb-1" 
                @click="openModal">
                Know Your Ward
            </button> 
        </a> -->
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
