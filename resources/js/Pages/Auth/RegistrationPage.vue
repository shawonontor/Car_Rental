<script setup>
import { reactive } from 'vue';
import { Link } from '@inertiajs/vue3';
import { useForm } from '@inertiajs/vue3';

const form = useForm({
  name: '',
  email: '',
  password: '',
  role: ''
});

const formSubmit = () => {
    form.post('/createprofile',{
      onSuccess: () =>{
        alert(`'Category add successfully',${form.role}`);
      },
      onError: ()=>{
        alert(' fail add brand ');
      }
    });
  };

</script>

<template>
    <div class="container mt-5">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card shadow">
            <div class="card-header text-center bg-primary text-white">
              <h4>Register</h4>
              <h4>Car Rental Service</h4>
            </div>
            <div class="card-body">
              <form @submit.prevent="formSubmit ">
                <div class="mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input v-model="form.name" type="text" class="form-control" id="name" required />
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input v-model="form.email" type="email" class="form-control" id="email" required />
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input v-model="form.password" type="password" class="form-control" id="password" required />
                </div>
                <div class="mb-3">
                  <label for="role" class="form-label">Role</label>
                  <select v-model="form.role" class="form-select" id="role" required>
                    <option disabled value="">Select a role</option>
                    <option value="admin">Admin</option>
                    <option value="customer">Customer</option>
                  </select>
                </div>
                <button type="submit" class="btn btn-primary w-100">Register</button>
              </form>
              <div class="text-center mt-3">
                <p> Already have an account?</p> <Link href="/login">Log in</Link>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>