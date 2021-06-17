import PublicHome from './components/Home.vue'
import About from './components/about/About.vue'
import Contact from './components/contact/Contact.vue'
import BestSeller from './components/seller/Seller.vue'
import NewArrival from './components/arrival/Arrival.vue'
import Offers from './components/offers/Offers.vue'
import SupperDeals from './components/super/Supper.vue'
import TopRated from './components/top-rated/TopRated.vue'
import Software from './components/software/Software.vue'
import Videos from './components/video/Videos.vue'
import FreeShipping from './components/free-shipping/FreeShipping.vue'
import CarBrand from './components/brand/Brand.vue'
import CarManufacture from './components/manufacture/Manufacture.vue'
export const routes = [
    {
        path:'/',
        component:PublicHome
    },

    {
        path:'/about/us',
        component:About
    },

    {
        path:'/contact/us',
        component:Contact
    },

    {
        path:'/best/seller',
        component:BestSeller
    },

    {
        path:'/top/rated',
        component:TopRated
    },

    {
        path:'/new/arrival',
        component:NewArrival
    },

    {
        path:'/offers',
        component:Offers
    },

    {
        path:'/supper/deals',
        component:SupperDeals
    },

    {
        path:'/software',
        component:Software
    },

    {
        path:'/videos',
        component:Videos
    },

    {
        path:'/free/shipping',
        component:FreeShipping
    },

    {
        path:'/car/brand',
        component:CarBrand
    },

    {
        path:'/car/manufacture',
        component:CarManufacture
    }
]
