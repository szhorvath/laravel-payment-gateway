<template>
  <div>
    <b-card
      class="mb-3"
      overlay
      img-src="https://picsum.photos/g/900/100/?image=1"
      img-alt="Card Image"
      text-variant="white"
      title="Checkout"
    />
    <b-row class="justify-content-md-center">
      <b-col cols="6"> <cart-summary /> </b-col>
    </b-row>
    <b-row class="justify-content-md-center mt-3">
      <b-col cols="6">
        <b-card title="Payment details">
          <b-form>
            <b-form-group id="emailGroup1" label="Email address:" label-for="email">
              <b-form-input id="email" v-model="form.email" type="email" required placeholder="Enter email" />
            </b-form-group>
            <b-form-radio-group
              id="btnradios2"
              v-model="form.selected"
              class="mb-3"
              buttons
              button-variant="outline-danger"
              name="radioBtnOutline"
            >
              <b-form-radio value="card">Card</b-form-radio>
              <b-form-radio value="paypal">Paypal</b-form-radio>
            </b-form-radio-group>

            <stripe v-if="form.selected === 'card'" @token="makeCardPayment" />
            <paypal v-else :amount="total" @token="makeCardPayment" />
          </b-form>
        </b-card>
      </b-col>
    </b-row>
    <div v-if="form.busy" class="full-loading">
      <trinity-rings-spinner :animation-duration="1500" :size="66" color="#ff1d5e" />
    </div>
  </div>
</template>
<script>
import { mapGetters, mapActions } from 'vuex'

import CartSummary from './components/CartSummary'
import Stripe from './components/Stripe'
import Paypal from './components/Paypal'
import { TrinityRingsSpinner } from 'epic-spinners'
import Form from 'vform'

export default {
  components: {
    CartSummary,
    Stripe,
    Paypal,
    TrinityRingsSpinner
  },

  data: () => ({
    form: new Form({
      selected: 'card',
      email: 'frodo.baggins@gmail.com',
      cart: [],
      token: ''
    })
  }),

  computed: {
    ...mapGetters({
      cart: 'shop/cart',
      total: 'shop/total'
    })
  },

  created() {
    if (this.cart.length === 0) {
      this.$router.push({ name: 'shop.index' })
    }
  },

  metaInfo: () => ({
    title: 'Checkout'
  }),

  methods: {
    ...mapActions({
      clearCart: 'shop/clearCart'
    }),
    async makeCardPayment(token) {
      this.form.cart = this.cart
      this.form.token = token.id

      try {
        const { data } = await this.form.post('api/payment')
        if (data.success) {
          await this.clearCart()
          this.$router.push({ name: 'checkout.success' })
        }
      } catch (e) {
        console.error(e)
      }
    }
  }
}
</script>
<style lang="scss">
.btn-group {
  width: 100%;
}

.btn-outline-danger {
  background-color: #fff;
  width: 100%;
}

.full-loading {
  position: fixed;
  z-index: 999;
  height: 100%;
  width: 100%;
  overflow: show;
  margin: auto;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  background-color: rgba(0, 0, 0, 0.7);
  display: flex;
  align-items: center;
  justify-content: center;
  color: #ccc;
}
</style>
