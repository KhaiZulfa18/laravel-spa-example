import Home from '../components/Home.vue'
import About from '../components/About.vue'
import Contact from '../components/Contact.vue'
import IndexComponent from '../components/post/IndexComponent.vue'
import CreateComponent from '../components/post/CreateComponent.vue'
import ShowComponent from '../components/post/ShowComponent.vue'
import EditComponent from '../components/post/EditComponent.vue'

const route = [
    {
        path: '/',
        name: 'home',
        component: Home
    },
    {
        path: '/about',
        name: 'about',
        component: About
    },
    {
        path: '/contact',
        name: 'contact',
        component: Contact
    },
    {
        path: '/posts',
        name: 'posts',
        component: IndexComponent
    },
    {
        path: '/posts/:id/show',
        name: 'post.show',
        component: ShowComponent
    },
    {
        path: '/posts/create',
        name: 'posts.create',
        component: CreateComponent
    },
    {
        path: '/posts/:id/edit',
        name: 'post.edit',
        component: EditComponent
    }
]
export default{
    mode: 'history',
    routes: route,
}