<template>
  <b-col cols="4">
    <affix
      class="shopping-cart"
      relative-element-selector="#products"
      :offset="{
        top: 100,
        bottom: 40
      }"
    >
      <b-card title="In your Cart">
        <b-list-group flush>
          <b-list-group-item v-for="product in cart" :key="product.id">
            <strong>{{ product.qty }}</strong> x {{ product.name }}
            <b-badge pill variant="danger">
              £{{ ((product.price - product.discount) * product.qty).toFixed(2) }}
            </b-badge>
          </b-list-group-item>
        </b-list-group>
        <b-card-footer>
          <b-badge pill variant="danger">£{{ total }}</b-badge> in total
        </b-card-footer>
        <b-button :to="{ name: 'checkout.index' }" class="mt-2" block variant="danger">Checkout</b-button>
      </b-card>
    </affix>
  </b-col>
</template>
<script>
import { mapGetters } from 'vuex'

export default {
  name: 'ShoppingCart',
  computed: {
    ...mapGetters({
      cart: 'shop/cart'
    }),
    total: vm => {
      let total = 0
      vm.cart.map(product => {
        let totalLine = (product.price - product.discount) * product.qty
        total += totalLine
      })
      return total.toFixed(2)
    }
  },
  methods: {}
}
</script>
<style>
.vue-affix {
  width: 22rem;
}
</style>
