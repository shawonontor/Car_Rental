<script setup>
import { ref, computed } from 'vue';
import { useForm } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3'


const props = defineProps({
    carsdata: Object,
    carId: String
})

const startDate = ref('');
const endDate = ref('');

const form = useForm({
    start_date: '',
    end_date: '',
    car_id: props.carId,
    car_rent: props.carsdata['daily_rent_price']

})

const formSubmit = () => {
    form.post('/carbook', {
        onSuccess: () => {
            alert('car rental');
        },
        onError: () => {
            alert(' fail add brand ');
        }
    });
};

</script>
<template>
    <div class=" car-section  card mb-3">
        <div class="  ">
            <!-- Car Image -->
            <div class="col-md-4">
                <img :src="carsdata.image" class="img-fluid rounded-start" alt="Car Image"
                    style="height: 100%; object-fit: cover;" />
            </div>

            <!-- Car Details -->
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ carsdata.name }}</h5>
                    <p class="card-text mb-1"><strong>Year:</strong>{{ carsdata.year }}</p>
                    <p class="card-text mb-3"><strong>Daily Rent:</strong>{{ carsdata.daily_rent_price }}</p>
                    <p>{{ startDate }}</p>
                    <p>{{ endDate }}</p>





                    <!-- Date fields -->
                    <form @submit.prevent="formSubmit">

                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label for="startDate" class="form-label">Start Date</label>
                                <input v-model="form.start_date" type="date" class="form-control" id="startDate" />
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="endDate" class="form-label">End Date</label>
                                <input v-model="form.end_date" type="date" class="form-control" id="endDate" />
                            </div>
                        </div>

                        <button v-if=" carsdata.availability == 1" type="submit" class="btn btn-primary mt-2">
                            Book Now
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.car-section {
    max-width: 700px;
    margin: auto;
    margin-top: 100px;
}
</style>