<script setup>
import { Link } from '@inertiajs/vue3';
const props = defineProps({
    cars:Object
});

</script>

<template>
    <div>
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
                        <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                        <li class="nav-item"><Link class="nav-link" href="/car-feature">Rentals</Link></li>
                        <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                    </ul>

                    <div class="d-flex">
                      <Link href="/login"><button class="btn btn-outline-primary me-2">Login</button></Link>
                      <Link href="/ragistrationpage">  <button class="btn btn-primary">Sign Up</button></Link>
                    </div>
                    
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <section class="py-5 bg-light">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6 text-center text-md-start">
                        <h1 class="display-4 fw-bold">Find Your Perfect Rental Today</h1>
                        <p class="lead">Explore thousands of properties tailored to your needs and budget.</p>
                        <button class="btn btn-primary btn-lg mt-3">Browse Rentals</button>
                    </div>
                    <div class="col-md-6 text-center mt-4 mt-md-0">
                        <img src="/public/images/Tuning-Car-PNG-Photo.png" alt="Hero"
                            class="img-fluid rounded shadow" />
                    </div>
                </div>
            </div>
        </section>
        <!-- hero section end -->

        <h2 class="text-center mt-4 ">Features</h2>

        <div class="container">
            <div class="row row-cols-3">
                <div    v-for="(car) in cars" :key="car.id"  class="col">
                    <div v-if="car.availability == 1" class="card" style="width: 26rem;">
                        <img :src="car.image" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ car.model }}</h5>
                            <h6>Brand: {{ car.brand }}</h6>
                            <h6>Daily rent {{ car.daily_rent_price }}</h6>
                            <a href="#" class="btn btn-primary">Booking Now</a>
                        </div>
                    </div>

                </div>
               
<!--  -->
            </div>
        </div>


    </div>

</template>

<style scoped></style>