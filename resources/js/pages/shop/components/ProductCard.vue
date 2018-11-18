<template>
  <b-card class="shop-card">
    <b-img
      class="shop-card__image"
      :src="`https://picsum.photos/200?image=${product.id}`"
      rounded="circle"
      alt="Product name"
    />
    <h2>{{ product.name }}</h2>
    <b-badge pill variant="danger">{{ product.percent }}% discount</b-badge>
    <p>{{ product.description }}</p>
    <price-tag
      :price="product.price"
      :discount="product.discount"
      :currency="product.currency"
      @click.native="addToCart(product)"
    />
    <socials />
  </b-card>
</template>
<script>
import PriceTag from './PriceTag'
import Socials from './Socials'
import { mapActions } from 'vuex'
export default {
  name: 'ProductCard',

  components: { PriceTag, Socials },

  props: {
    product: {
      type: Object,
      required: true
    }
  },
  methods: {
    ...mapActions({
      addToCart: 'shop/addToCart'
    })
  }
}
</script>
<style lang="scss" scoped>
.shop-card {
  text-align: center;
  max-width: 30rem;
  margin: 5rem auto;
  margin-top: 120px;

  &__image {
    position: relative;
    top: -120px;
    margin-bottom: -100px;
  }
}
</style>
