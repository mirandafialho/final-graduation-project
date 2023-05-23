import { shallowMount } from '@vue/test-utils'
import HomeView from '@/views/HomeView.vue'

describe('HomeView.vue', () => {
  it('renders component from home', () => {
    const comp = shallowMount(HomeView, {})
    expect(comp.getComponent).toBeCalled()
  })
})
