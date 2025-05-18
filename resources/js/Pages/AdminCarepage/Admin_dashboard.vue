<script setup>
import { ref } from 'vue'
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    availableCar:String,
    users:Object
})


</script>

<template>
    <div class="d-flex">
        <!-- Sidebar -->
        <aside class="bg-success text-white p-3 vh-100" style="width: 250px;">
            <div class="text-center mb-4">
                <img src="https://via.placeholder.com/80" class="rounded-circle mb-2" alt="Admin" />
                <h5>{{ users.name }}</h5>
            </div>
            <ul class="nav flex-column">
                <li class="nav-item"><Link href="#" class="nav-link text-white">Dashboard</Link></li>
                <li class="nav-item"><Link href="/admincarpage" class="nav-link text-white">car</Link></li>
                <li class="nav-item"><Link href="#" class="nav-link text-white">rental</Link></li>
                <li class="nav-item"><Link href="#" class="nav-link text-white">customers</Link></li>
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
                    <span>{{ users.name }}</span>
                </div>
            </header>

            <!-- cards -->

            <div class="d-flex">

                <div class=" cards card text-center mt-4 ms-4">
                    <h4>Totalcars</h4>
                     <h5>{{ props.availableCar }}</h5>
                </div>
                <div class=" cards card text-center mt-4 ms-4">
                    <h4>Totalcars</h4>
                     <h5>12</h5>
                </div>
                <div class=" cards card text-center mt-4 ms-4">
                    <h4>Totalcars</h4>
                     <h5>12</h5>
                </div>
                <div class=" cards card text-center mt-4 ms-4">
                    <h4>Totalcars</h4>
                     <h5>12</h5>
                </div>
            </div>
           
        </div>
    </div>
</template>

<style>
body {
    margin: 0;
    font-family: Arial, sans-serif;
}

.cards{
    width: 220px;
    height: max-content;
   
}
</style>