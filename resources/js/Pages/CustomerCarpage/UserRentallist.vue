<script setup>
import { ref } from 'vue'
import { Link } from '@inertiajs/vue3';

const props = defineProps({
   
 users:Object,
 userRental:Object
})


</script>

<template>
    <div class="d-flex">
        <!-- Sidebar -->
        <aside class="bg-success text-white p-3 vh-100" style="width: 250px;">
            <div class="text-center mb-4">

                <h5>Home</h5>
                <span>{{ users.name }}</span>
            </div>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <Link href="/userdashpage" class="nav-link text-white">Dashboard</Link>
                </li>
                <li class="nav-item">
                    <Link href="#" class="nav-link text-white">rentals</Link>
                </li>
                <li class="nav-item">
                    <Link href="#" class="nav-link text-white">rental history</Link>
                </li>
            </ul>
        </aside>

        <!-- Main Content -->
        <div class="flex-grow-1">
            <!-- Header -->
            <header class="d-flex justify-content-between align-items-center bg-light p-3 border-bottom">
                <input type="text" class="form-control w-25" placeholder="Search..." />
                <div class="d-flex align-items-center gap-3">
                    <i class="bi bi-bell fs-4"></i>
                    <span>Notification</span>
                    <h4>Profile Name</h4>
                    <span>{{ users.name }}</span>
                </div>
            </header>
            <!-- Data Table -->
            <div class="container mt-4">

                <table class="table table-bordered table-striped mt-3">
                    <thead class="table-dark">
                        <tr>
                            <th>SL</th>
                            <th>Car name</th>
                            <th>Car brand</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Total cost</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- <tr v-for="(userR, index) in userRental" :key="userR.id">
                            <td>{{ index + 1 }}</td>
                            <td>{{ }}</td>
                            <td>{{ }}</td>
                            <td>{{ userR.start_date }}</td>
                            <td>{{ userR.end_date }}</td>
                            <td>{{ userR.total_cost }}</td>
                          
                            <td>
                               {{  }}
                            </td>
                            <td>
                                <button class="btn btn-sm btn-primary me-1">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<style>
body {
    margin: 0;
    font-family: Arial, sans-serif;
}
</style>