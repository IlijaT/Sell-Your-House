<template>
    <div class="row">
        <div v-if="photos" v-for="photo in photos" v-bind:key="photo.id" class="col-md-3 galery_image">
            <a :href="'http://localhost:8000/storage/' + photo.path"  data-lity>
                <img class="thumbnail" :src="'http://localhost:8000/storage/' + photo.path" alt="slika">
            </a>
        </div>
    </div>
</template>

<script>
    export default {
         data: function () {
            return {
                photos: [ ]
            }
        },
        created() {
            console.log(this.photos);
            axios.get(window.location.pathname)
                .then(response => {
                    console.log(response);
                     this.photos = response.data;
                    //console.log(response.data);
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
            
         }
    }
</script>
