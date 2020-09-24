<template>
  <div class="item">
    <div v-for="(value, index) in listProduct" :key="index" @click="$emit('addToCheckout', value)">
      <div>
        <div class="card bg-white mb-3 card-list-product">
          <div class="card-body">
            <div class="row">
              <div class="col-md-5">
                <h5 class="card-title">{{ value.name }}</h5>
                <p class="card-text">{{ value.price }}</p>
              </div>
              <div class="col-md-5"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    listProduct: {
      required: true
    }
  }

  // data: function() {
  //   return {
  //     products: []
  //   };
  // },
  // mounted() {
  //   this.loadProducts();
  // },
  // methods: {
  //   loadProducts: function() {
  //     axios
  //       .get("/api/products")
  //       .then(response => {
  //         this.products = response.data.data;
  //       })
  //       .catch(err => {
  //         console.log("error");
  //       });
  //   }
  // }
};
</script>

<style>
.card-list-product {
  width: 50%;
  height: 90px;
}
</style>


