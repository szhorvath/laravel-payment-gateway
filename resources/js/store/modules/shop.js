import * as types from '../mutation-types'
import axios from 'axios'

// state
export const state = {
  products: [],
  cart: [],
  total: 0
}

// getters
export const getters = {
  products: state => state.products,
  cart: state => state.cart,
  total: state => state.total
}

// mutations
export const mutations = {
  [types.GET_PRODUCTS](state, { products }) {
    state.products = products
  },

  [types.CLEAR_CART](state) {
    state.cart = []
  },

  [types.ADD_TO_CART](state, { product }) {
    const existing = state.cart.find(item => {
      return item.id === product.id
    })

    if (existing) {
      existing.qty++
    } else {
      state.cart.push(product)
    }

    let total = 0

    state.cart.map(product => {
      let totalLine = (product.price - product.discount) * product.qty
      total += totalLine
    })
    state.total = total.toFixed(2)
  }
}

// actions
export const actions = {
  async getProducts({ commit }) {
    try {
      const { data } = await axios.get('/api/products')

      commit(types.GET_PRODUCTS, { products: data.data })
    } catch (e) {
      console.error(e)
    }
  },

  addToCart({ commit }, product) {
    try {
      commit(types.ADD_TO_CART, { product: product })
    } catch (e) {
      console.error(e)
    }
  },

  clearCart({ commit }) {
    try {
      commit(types.CLEAR_CART)
    } catch (e) {
      console.error(e)
    }
  }
}
