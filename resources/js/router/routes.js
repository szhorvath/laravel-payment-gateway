const ShopIndex = () => import('~/pages/shop/index').then(m => m.default || m)
const CheckoutIndex = () => import('~/pages/checkout/index').then(m => m.default || m)
const Success = () => import('~/pages/checkout/success').then(m => m.default || m)
const NotFound = () => import('~/pages/errors/404').then(m => m.default || m)

export default [
  /** ---------- Guest routes. ----------  **/
  { path: '/', redirect: { name: 'shop.index' } },
  { path: '/shop', name: 'shop.index', component: ShopIndex },
  { path: '/checkout', name: 'checkout.index', component: CheckoutIndex },
  { path: '/checkout/success', name: 'checkout.success', component: Success },

  // 404 Error
  { path: '*', component: NotFound }
]
