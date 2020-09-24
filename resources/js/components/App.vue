<template>
  <div>
    <Navbar />

    <div class="main">
      <div class="row">
        <div class="col-md-9">
          <div class="card card-main">
            <div class="card-header">
              <div class="row">
                <div class="col-md-6 item-header-1">
                  <div class="product-list">
                    <h5>Daftar Menu</h5>
                  </div>
                </div>
                <div class="col-md-6 item-header-2">
                  <div class="btn-search">
                    <form class="form-inline my-2 my-lg-0">
                      <input
                        class="form-control mr-sm-2"
                        type="search"
                        placeholder="Search"
                        aria-label="Search"
                      />
                      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body card-item-list">
              <div class="item-list">
                <ListProduct :listProduct="products" @addToCheckout="getItemFromList" />
              </div>
            </div>
          </div>

          <!-- <ButtonCategory /> -->

          <button v-on:click="loadFoodProducts()" class="btn btn-secondary btn-lg active">Makanan</button>
          <button v-on:click="loadDrinkProducts()" class="btn btn-secondary btn-lg active">Minuman</button>
        </div>
        <div class="col-md-3">
          <Checkout :itemCheckout="addToCheckout" />

          <button class="btn btn-primary">Checkout</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Navbar from "./Navbar.vue";
import ListProduct from "./ListProduct.vue";
import Checkout from "./Checkout.vue";
import ButtonCategory from "./ButtonCategory.vue";

export default {
  data: () => {
    return {
      products: [],
      addToCheckout: []
    };
  },
  mounted() {
    this.loadProducts();
  },
  components: {
    Navbar,
    ListProduct,
    Checkout,
    ButtonCategory
  },
  methods: {
    getData(value) {
      this.clickedItem = value;
    },
    loadProducts: function() {
      axios
        .get("/api/products")
        .then(response => {
          this.products = response.data.data;
        })
        .catch(err => {
          console.log("error");
        });
    },
    loadFoodProducts: function(event) {
      axios
        .get("/api/food")
        .then(response => {
          this.products = response.data.data;
        })
        .catch(err => {
          console.log("error");
        });
    },
    loadDrinkProducts: function(event) {
      axios
        .get("/api/drink")
        .then(response => {
          this.products = response.data.data;
        })
        .catch(err => {
          console.log("error");
        });
    },
    getItemFromList: function(value) {
      this.addToCheckout = [value.name];
    }
  }
};
</script>

<style>
.main {
  padding: 15px;
}
</style>
