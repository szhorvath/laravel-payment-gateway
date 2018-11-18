<template>
  <div>
    <b-card
      class="mb-3"
      overlay
      img-src="https://picsum.photos/g/900/100/?image=2"
      img-alt="Card Image"
      text-variant="white"
      title="Shop"
    />
    <shop />
  </div>
</template>

<script>
import { mapActions } from 'vuex'
import Shop from './components/Shop'
export default {
  components: {
    Shop
  },
  metaInfo: () => ({
    title: 'Welcome to the shop'
  }),

  data: () => ({}),

  created() {
    this.getProducts()
  },

  methods: {
    ...mapActions({
      getProducts: 'shop/getProducts'
    })
  }
}
</script>
<style scoped lang="scss"></style>
