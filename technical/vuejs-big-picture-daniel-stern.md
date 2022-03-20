# [Vue.js: Big Picture By Daniel Stern](https://app.pluralsight.com/library/courses/vuejs-big-picture)

## Reactivity and Vue

- Reactivity, Vue'nin cozmeye calistigi ana problemlerden biridir.
- Reactivity: the way an application changes what you see in response to activity like the user hitting a button or an incoming message from the server.

Data:
['apples', 'pears']

Kullaniciya:
Your Shopping List
    - Apples
    - Pears
Seklinde gorunuyor. 
Reactivity: Data guncellendiginde Shopping List'in de hizlica guncellenmesi

Should be implemented properly, otherwise could be extremely slow

Javascript does not have built-in Reactivity
Reactivity that is not implemented correctly can be extremely slow. 

Vue bu problemi cozuyor ama Angular ve React'in yaptigi gibi degil.

Vue's Reactivity:
- Code is easire to write and maintain
- Vue uses virtual DOM to make large updates fast and declarative

- Vue components update automatically when model changes. Reactivity is not so simple for arrays or objects (mutable) (fix in Vue 3). With Mutable data, view may not update as expected
- ad-hoc -> no consistent use of frameworks or best practices
- Components allow seperation of concerns
- SPA that works on all devices, smooth transitions between views.
- Vue works as SPA by default
- MVC model allows easy forms
- Supports using React and jQuery inside a Vue component
- Fast start, little setup required
- No need to plan folder structure or implement dev ops

* Vue is small library and its core features are limitied to quickly rendering your application's view.
* To achieve the same functionality as React or Angular (which too have their own ecosystems) other libraries need to be used together with Vue.

## Nuxt (Universal rendering)
used to create universal (server-rendered) vue applications
many universal challenges are simplified by nuxt
faster loading times on all devices especially mobile

## vuex (State Management (like redux))
Provides a way of updating your state
similar to flux or redux
used to keep applications with massive state manageable

## Vuetify (Component Framework (Angular material))
Cotains sleek and performant Vue components
Has a material design aesthetic
Used as an alternative to creating own solutions for UI

## vue cli (Scaffolding & Build)
vue serve - serves the current directory as an application with app.vue as its root
vue build - assembles a .vue and ES6 project into an HTML and JS one usable by browsers
vue create / vue ui - creates a new Vue project (using CLI or UI)
vue add - installs plugins for Vue-CLI

## vue pitfalls and drawbacks
Needs support from ecosystem
Tricky reactivity 
Relatively new and untested
Many production scenarios are yet unproven
From the beginning, it is known that the finished project will be huge