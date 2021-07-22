import Cookies from 'js-cookie'
import * as types from '../mutation-types'

const { school, schools } = window.config

// state
export const state = {
  
  school: Cookies.get('school') || school,
}

// getters
export const getters = {
  school: state => state.school,
  // schools: state => state.schools
}

// mutations
export const mutations = {
  [types.SET_SCHOOL] (state, { school }) {
    state.school = school
    Cookies.set('school', school, { expires: 10 })
}

}

actions
export const actions = {
  setSchool ({ commit }, { school }) {
    commit(types.SET_SCHOOL, { school })

    Cookies.set('school', school, { expires: 10 })
  }
}
