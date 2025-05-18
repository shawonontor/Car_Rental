<script setup>
import { ref } from 'vue'
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    users:Object,
    availablecar:String,
    Totalcar:String
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
                <li class="nav-item"><Link href="/userdashpage" class="nav-link text-white">Dashboard</Link></li>
                <li class="nav-item"><Link href="/userrental" class="nav-link text-white">rentals</Link></li>
                <li class="nav-item"><Link href="#" class="nav-link text-white">rental history</Link></li>
            </ul>
        </aside>

        <!-- Main Content -->
        <div class="flex-grow-1">
            <!-- Header -->
            <header class="d-flex justify-content-between align-items-center bg-light p-3 border-bottom">
                <input type="text" class="form-control w-25" placeholder="Search..." />
                <div class="d-flex align-items-center gap-3">
                    <i class="bi bi-bell fs-4"></i>
                    <h2>Profile Name</h2>
                    <span>{{ users.name }}</span>
                </div>
            </header>

            <!-- cards -->

            <div class="d-flex">

                <div class=" cards card text-center mt-4 ms-4">
                    <h4>Available Car</h4>
                     <h5>{{props.availablecar }}</h5>
                </div>
                <div class=" cards card text-center mt-4 ms-4">
                    <h4>Totalcars</h4>
                     <h5>{{ props.Totalcar }}</h5>
                </div>
                <div class=" cards card text-center mt-4 ms-4">
                    <h4>Rental Cars</h4>
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