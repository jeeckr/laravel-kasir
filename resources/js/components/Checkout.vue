<template>
  <div>
    <div class="card bg-light mb-3 card-checkout">
      <div class="card-header text-center">Checkout</div>
      <div class="card-body">
        <div v-for="(value, index) in itemCheckout" :key="index">{{value}}</div>
      </div>
      <div class="card-footer">
        <div class="row footer-checkout">
          <div class="total mr-auto">TOTAL</div>
          <div class="total ml-auto">Rp. 55555</div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    itemCheckout: {
      required: true
    }
  }
};
</script>

<style>
.card-checkout {
  height: 450px !important;
}

.footer-checkout {
  padding-left: 5px;
  padding-right: 5px;
}
</style>
