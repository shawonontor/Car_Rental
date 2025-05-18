<script setup>
import { ref } from 'vue'
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    cars:Object
})


</script>

<template>
    <div class="d-flex">
        <!-- Sidebar -->
        <aside class="bg-success text-white p-3 vh-100" style="width: 250px;">
            <div class="text-center mb-4">
                <img src="https://via.placeholder.com/80" class="rounded-circle mb-2" alt="Admin" />
                <h5>Admin Name</h5>
            </div>
            <ul class="nav flex-column">
                <li class="nav-item"><Link href="/admindashpage" class="nav-link text-white">Dashboard</Link></li>
                <li class="nav-item"><Link href="" class="nav-link text-white">Cars</Link></li>
                <li class="nav-item"><a href="#" class="nav-link text-white">Rentals</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-white">Customers</a></li>
            </ul>
        </aside>

        <!-- Main Content -->
        <div class="flex-grow-1">
            <!-- Header -->
            <header class="d-flex justify-content-between align-items-center bg-light p-3 border-bottom">
                <input type="text" class="form-control w-25" placeholder="Search..." />
                <div class="d-flex align-items-center gap-3">
                    <i class="bi bi-bell fs-4"></i>
                    <img src="https://via.placeholder.com/40" class="rounded-circle" alt="Profile" />
                    <span>Admin Name</span>
                </div>
            </header>

            <!-- Data Table -->
            <div class="container mt-4">
              <div class="d-flex justify-content-between ">
                <h4>Car Management</h4>
              <Link href="/car-createpage" > <button class="btn btn-success ">Create</button></Link>
              </div>
                <table class="table table-bordered table-striped mt-3">
                    <thead class="table-dark">
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Brand</th>
                            <th>Model</th>
                            <th>Year</th>
                            <th>Car Type</th>
                            <th>Daily Rent Price</th>
                            <th>Availability</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(car, index) in cars" :key="car.id">
                            <td>{{ index + 1 }}</td>
                            <td>{{ car.name }}</td>
                            <td>{{ car.brand }}</td>
                            <td>{{ car.model }}</td>
                            <td>{{ car.year }}</td>
                            <td>{{ car.car_type }}</td>
                            <td>${{ car.daily_rent_price }}</td>
                            <td>
                                <span class="badge" :class="car.available ? 'bg-success' : 'bg-danger'">
                                    {{ car.available ? '0' : '1' }}
                                </span>
                            </td>
                            <td>
                                <img :src="car.image" alt="car" width="60" height="40" />
                            </td>
                            <td>
                                <button class="btn btn-sm btn-primary me-1">Edit</button>
                                <button class="btn btn-sm btn-info me-1">Show</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
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