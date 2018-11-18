<template>
  <b-navbar sticky toggleable="md" type="light" style="background-color: #fff;">
    <b-navbar-toggle target="nav_collapse" />

    <b-navbar-brand :to="{ name: 'shop.index' }">
      <img src="../img/logo.svg" alt="Rage Shop" width="60" />
    </b-navbar-brand>

    <b-collapse id="nav_collapse" is-nav>
      <b-navbar-nav>
        <b-nav-item href="#" disabled>home</b-nav-item>
        <b-nav-item :to="{ name: 'shop.index' }">shop</b-nav-item>
        <b-nav-item href="#" disabled>about</b-nav-item>
      </b-navbar-nav>

      <!-- Right aligned nav items -->
      <b-navbar-nav class="ml-auto">
        <b-nav-item :to="{ name: 'checkout.index' }" :disabled="cart.length === 0">
          <fa icon="shopping-cart" />
          <transition>
            <b-badge v-if="cart.length" pill variant="danger">{{ allItem }}</b-badge>
          </transition>
        </b-nav-item>
      </b-navbar-nav>
    </b-collapse>
  </b-navbar>
</template>
<script>
import { mapGetters } from 'vuex'

export default {
  name: 'TopNavBar',
  computed: {
    ...mapGetters({
      cart: 'shop/cart'
    }),
    allItem: vm => {
      let sum = 0
      vm.cart.map(product => {
        sum += product.qty
      })
      return sum
    }
  }
}
</script>
