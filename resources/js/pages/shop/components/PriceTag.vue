<template>
  <div>
    <b-link class="price-tag">
      Buy for <span v-if="original !== newPrice" class="strike"> {{ symbol }}{{ original }}</span> {{ symbol
      }}{{ newPrice }}
    </b-link>
  </div>
</template>
<script>
export default {
  name: 'PriceTag',
  props: {
    price: {
      type: String,
      required: true
    },
    discount: {
      type: String,
      default: '0'
    },
    currency: {
      type: String,
      default: 'gbp'
    }
  },
  computed: {
    symbol: vm => {
      switch (vm.currency) {
        case 'gbp':
          return '£'

        case 'usd':
          return '$'

        default:
          return '£'
      }
    },
    newPrice: vm => {
      return (parseFloat(vm.price) - parseFloat(vm.discount)).toFixed(2)
    },
    original: vm => {
      return parseFloat(vm.price).toFixed(2)
    }
  }
}
</script>
<style lang="scss" scoped>
@import '~@/_variables.scss';

$price-size: 2rem;

.price-tag {
  padding: 0.3rem 1.6rem;
  border-radius: $border-radius;
  font-weight: $font-weight-bold;
  font-size: $price-size;
  background-color: $danger;
  color: #ffffff;

  &:hover {
    text-decoration: none;
    background: darken($danger, 20%);
  }

  .strike {
    font-size: $price-size * 0.5;
    text-decoration: line-through;
  }
}
</style>
