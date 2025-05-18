<script setup>
import { reactive } from 'vue';
import { Link ,useForm} from '@inertiajs/vue3';

const form = useForm({
    email: '',
    password: ''
});

const login = () => {
   form.post('/profilelogin',{
    onSuccess:()=>{
        alert('login successfull');
    },
    onError: ()=>{
        alert('login failed');
    }
   });
    
};
</script>
<template>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header text-center bg-success text-white">
                        <h4>Login</h4>
                        <h4> Welcome Car Rental Service</h4>
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="login">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input v-model="form.email" type="email" class="form-control" id="email" required />
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input v-model="form.password" type="password" class="form-control" id="password"
                                    required />
                            </div>
                            <button type="submit" class="btn btn-success w-100">Login</button>
                        </form>
                        <div class="text-center mt-3">
                            <p>Don't have an account? </p>
                            <Link href="/ragistrationpage">Register here</Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>