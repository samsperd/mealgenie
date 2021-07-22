import Cookies from 'js-cookie'
import * as types from '../mutation-types'

const { cart, restaurant } = window.config

// state
export const state = {
  
  cart:  [],
  restaurant: restaurant,
}

// getters
export const getters = {
  cart: state => state.cart,
  restaurant: state=> state.restaurant,
}

// mutations
export const mutations = {
  [types.SET_CART] (state, { cart }) {
    state.cart = cart
    // Cookies.set('shoppingCart', JSON.stringify(cart), { expires: 30/1440 })
    sessionStorage.setItem('shoppingCart', cart)
},
[types.SET_RESTAURANT] (state, { restaurant }) {
  state.restaurant = restaurant
  // Cookies.set('restaurant', restaurant, { expires: 30/1440 })
  sessionStorage.setItem('shoppingRestauarant', restaurant)
}
}

actions
export const actions = {
  setCart ({ commit }, { res }) {
    commit(types.SET_CART, { cart })
    sessionStorage.setItem('shoppingCart', cart)
  },
  setRestaurant ({ commit }, { restaurant }) {
    commit(types.SET_RESTAURANT, { restaurant })
    sessionStorage.setItem('shoppingRestauarant', restaurant)
  }
}
