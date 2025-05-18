<script setup>

import { Link } from '@inertiajs/vue3';
const props = defineProps({
    cars: Object
});


</script>

<template>
    <!-- Top Header -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">MySite</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><Link class="nav-link active" href="/userhomepage">Home</Link></li>
                    <li class="nav-item"><Link class="nav-link active" href="/homepage">About</Link></li>
                    <li class="nav-item"><Link class="nav-link active" href="/homepage">Rentals</Link></li>
                    <li class="nav-item"><Link class="nav-link active" href="/homepage">Contact</Link></li>
                </ul>

            </div>
        </div>
    </nav>



    <h2 class="text-center mt-4 ">Features</h2>

    <div class="container">
        <div class="row row-cols-3 ">
            <div v-for="(car) in cars" :key="car.id" class="col">
                <div v-if="car.availability == 1" class="card" style="width: 23rem; height: 23rem;">
                    <img :src="car.image" class="card-img-top" style="width: 16rem; height: 16rem;" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ car.model }}</h5>
                        <h6>Brand: {{ car.brand }}</h6>
                        <h6>Daily rent {{ car.daily_rent_price }}</h6>
                        <Link :href="`/car-details/${car.id}`" class="btn btn-primary">Booking Now</Link>
                    </div>
                </div>

            </div>
        </div>
    </div>

</template>