<template>
  <b-card class title="Cart summary">
    <b-list-group flush>
      <b-list-group-item v-for="product in cart" :key="product.id">
        <strong>{{ product.qty }}</strong> x {{ product.name }}
        <b-badge class="float-right" pill variant="danger">
          £{{ ((product.price - product.discount) * product.qty).toFixed(2) }}
        </b-badge>
      </b-list-group-item>
    </b-list-group>
    <b-card-footer>
      Total:
      <b-badge class="float-right" pill variant="danger">£{{ total }}</b-badge>
    </b-card-footer>
  </b-card>
</template>
<script>
import { mapGetters } from 'vuex'

export default {
  name: 'CartSummary',
  computed: {
    ...mapGetters({
      cart: 'shop/cart',
      total: 'shop/total'
    })
  }
}
</script>
