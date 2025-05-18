<script setup>
import { reactive, ref } from 'vue'
import { useForm } from '@inertiajs/vue3'

const Carimage = ref(null);

const form =useForm({
  name: '',
  brand: '',
  model: '',
  year: '',
  car_type: '',
  daily_rent_price: '',
  availability: 'true',
  image: ''
})

const handleFileUpload = (event) => {
  const file = event.target.files[0]
  if(file){
    form.image = file
    Carimage.value= URL.createObjectURL(file);
  }
}

const submitted = ref(false)

function handleSubmit() {
 form.post('/car-store',{
    onSuccess: ()=>{
        alert('add car successfull')
    },
    onError:()=>{
        alert('add car failed')
    }
 })
  // You can send the form data to an API here
  console.log('Form submitted:', form)
}
</script>

<template>
    <div class="container card mt-4">
      <h2 class="mb-4">Add New Car</h2>
      <form @submit.prevent="handleSubmit">
        <div class="mb-3">
          <label class="form-label fw-medium">Name</label>
          <input type="text" class="form-control" v-model="form.name" required />
        </div>
  
        <div class="mb-3">
          <label class="form-label fw-medium">Brand</label>
          <input type="text" class="form-control" v-model="form.brand" required />
        </div>
  
        <div class="mb-3">
          <label class="form-label fw-medium">Model</label>
          <input type="text" class="form-control" v-model="form.model" required />
        </div>
  
        <div class="mb-3">
          <label class="form-label fw-medium">Year</label>
          <input type="number" class="form-control" v-model="form.year" required />
        </div>
  
        <div class="mb-3">
          <label class="form-label fw-medium">Car Type</label>
          <input type="text" class="form-control" v-model="form.car_type" required />
        </div>
  
        <div class="mb-3">
          <label class="form-label fw-medium">Daily Rent Price</label>
          <input type="number" step="0.01" class="form-control" v-model="form.daily_rent_price" required />
        </div>
  
        <div class="mb-3">
          <label class="form-label fw-medium">Availability</label>
          <select class="form-select" v-model="form.availability" required>
            <option value="1">Available</option>
            <option value="0">Not Available</option>
          </select>
        </div>
  
        <div class="mb-3">
        <label for="brandImage" class="form-label fw-medium"> Image</label>
        <input type="file" id="categoryImage" @change="handleFileUpload" class="form-control"/>
      </div>

      <div class="">
        <img class="img rounded" :src="Carimage" alt="" srcset="">
      </div>
  
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
  
      <!-- Preview Section -->
      <div v-if="submitted" class="mt-4 alert alert-success">
        <h5>Car submitted:</h5>
        <pre>{{ form }}</pre>
      </div>
    </div>
  </template>

<style scoped>
pre {
  background-color: #f8f9fa;
  padding: 10px;
  border-radius: 5px;
}

.container{
    width: 500px;
}
.img{
    height: 60px;
    width: 60px;
    margin-bottom: 5px;
}

</style>