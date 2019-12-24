<template>
    <div>
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
        methods:{
            openModal(){
                $('#updateProfile').modal('show');
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>