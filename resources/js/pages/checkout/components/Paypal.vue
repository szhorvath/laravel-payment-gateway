<template>
  <div><div id="paypal-button" /></div>
</template>
<script>
import { Button } from 'paypal-checkout'
export default {
  name: 'Paypal',
  props: {
    amount: {
      type: String,
      required: true
    }
  },

  data: () => ({
    env: process.env.MIX_PAYPAL_ENV,
    clienId: process.env.MIX_PAYPAL_CLIENT_ID,
    errorMessage: '',
    paypalButton: ''
  }),

  mounted() {
    this.createPaypalCheckout()
  },

  methods: {
    async createPaypalCheckout() {
      try {
        this.paypalButton = await Button.render(
          {
            env: this.env,
            commit: true,
            client: {
              sandbox: this.clienId,
              production: this.clienId
            },
            style: {
              size: 'responsive',
              color: 'gold',
              shape: 'pill'
            },
            payment: (data, actions) => this.createPayment(data, actions),
            onAuthorize: (data, actions) => this.authorizePayment(data, actions),

            onCancel: data => {
              console.log('checkout.js payment cancelled')
            },

            onError: err => {
              console.error('checkout.js error', err)
            }
          },
          '#paypal-button'
        ) // Set up PayPal with the checkout.js library
      } catch (paypalCheckoutError) {
        this.errorMessage =
          'There was an error setting up the paypal client instance. Message: ' + paypalCheckoutError.message
        this.$emit('paypalCheckoutError', this.errorMessage)
      }
    },
    async createPayment(data, actions) {
      return actions.payment.create({
        transactions: [
          {
            amount: {
              total: this.amount,
              currency: 'GBP'
            }
          }
        ]
      })
    },
    async authorizePayment(data, actions) {
      try {
        const data = await actions.payment.execute()
        this.$emit('token', data)
        console.log(data)
      } catch (e) {}
    }
  }
}
</script>
