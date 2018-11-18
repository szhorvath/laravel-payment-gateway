<template>
  <b-col id="products"> <product-card v-for="product in products" :key="product.id" :product="product" /> </b-col>
</template>
<script>
import ProductCard from './ProductCard'

export default {
  name: 'ShopBrowser',
  components: {
    ProductCard
  },

  props: {
    products: {
      type: Array,
      required: true
    }
  }
}
</script>
<style lang="scss"></style>
