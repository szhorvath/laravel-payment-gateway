<template>
  <b-row class="mt-3">
    <shop-browser :products="products" />
    <transition name="slide"> <shopping-cart v-if="cart.length > 0" /> </transition>
  </b-row>
</template>
<script>
import { mapGetters } from 'vuex'

import ShopBrowser from './ShopBrowser'
import ShoppingCart from './ShoppingCart'

export default {
  name: 'Shop',

  components: {
    ShopBrowser,
    ShoppingCart
  },

  data: () => ({}),

  computed: {
    ...mapGetters({
      cart: 'shop/cart',
      products: 'shop/products'
    })
  }
}
</script>
<style lang="scss"></style>
