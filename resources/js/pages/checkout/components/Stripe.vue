<template>
  <div class="mb-3 mt-3">
    <div ref="card" />
    <div ref="errors" role="alert">{{ errors }}</div>
    <b-button variant="danger" class="mb-3 mt-4" block @click="tokenize">Pay</b-button>
  </div>
</template>
<script>
let style = {
  base: {
    color: '#32325d',
    lineHeight: '22px',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '20px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
}

let stripe = Stripe(process.env.MIX_STRIPE_PUBLIC_KEY),
  elements = stripe.elements(),
  card = undefined
export default {
  name: 'Stripe',

  data: () => ({
    errors: ''
  }),

  mounted() {
    if (card === undefined) {
      card = elements.create('card', { style: style })
    }
    card.mount(this.$refs.card)

    card.addEventListener('change', ({ error }) => {
      if (error) {
        this.errors = error.message
      } else {
        this.errors = ''
      }
    })
  },

  methods: {
    async tokenize() {
      try {
        const { token, error } = await stripe.createToken(card)

        if (error) {
          this.errors = error.message
        } else {
          this.$emit('token', token)
        }
        console.log(token)
      } catch (e) {
        console.error(e)
      }
    }
  }
}
</script>
