<template>
  <div>
    <!-- <button v-on:click="loadFoodProducts()" class="btn btn-secondary btn-lg active">Makanan</button> -->
    <button type="button" @click="$emit('list-item', loadFoodProducts())">Makanan</button>
  </div>
</template>

<script>
export default {
  methods: {
    loadFoodProducts: function(event) {
      axios
        .get("/api/food")
        .then(response => {
          this.products = response.data.data;
        })
        .catch(err => {
          console.log("error");
        });
    }
  }
};
</script>