<template>
    <div>
        <transition name="component-fade" mode="out-in">
            <component ref="refcomponent" :is="thisComponent" @change="changeComponent" :act="action" :selected="selected_data" :id="selected_id"></component>
        </transition>
    </div>
</template>

<script>
import ViewCourseComponent from './ViewCourseComponent.vue'
import CreateCourseComponent from './CreateCourseComponent'
import ManageCourseComponent from './ManageCourseComponent.vue'
export default {
    name: 'IndexCourseComponent',
    components: {
        ViewCourseComponent,
        CreateCourseComponent,
        ManageCourseComponent
    },
    data() {
        return {
            loading: false,
            thisComponent: null,
            selected_data: {},
            action: '',
            selected_id: null
        }
    },
    created() {
        this.loadPrimaryComponent()
        // this.$store.dispatch('GetComponentName','Create Course')
    },
    methods: {
        loadPrimaryComponent() {
            this.thisComponent = ViewCourseComponent
        },
        changeComponent(value) {
            console.log(value, 'emited')
            this.action = value.mode
            this.selected_data = value.data
            if (value.mode === 'add') {
                this.thisComponent = null
                // this.data = {}
                // this.action = 'create'
                this.$store.dispatch("SetSelected", value);
                this.thisComponent = CreateCourseComponent
                this.$router.push({ name: 'New Course', replace: true })
                
            }
            if (value.mode === 'back') {
                this.thisComponent = null
                // this.data = {}
                // this.action = 'back'
                this.$store.dispatch("SetSelected", value);
                this.thisComponent = ViewCourseComponent
          
           
            }
            if (value.mode === 'edit') {
                this.thisComponent = null
                // this.data = value.data
                this.$store.dispatch("SetSelected", value);
                this.thisComponent = CreateCourseComponent 
              
                this.$router.push({ name: 'Edit Course', replace: true })
                
            }
            if (value.mode === 'manage') {
                this.thisComponent = null
                // this.data = {}
                // this.action = 'create'
                console.log(value.data)
                this.selected_data = value.data
                this.selected_id = value.data.id
                this.thisComponent = ManageCourseComponent
                this.$store.dispatch("SetSelected", value);
                setTimeout(() => {
                    this.ex_component(value);
                }, 300);
            }
        },
        ex_component(value) {
            // this.$refs.refcomponent.show(value.data.id)
            this.$router.push({ name: 'Manage Course', replace: true })
        }
   
    },
}
</script>

<style lang="scss" scoped>

</style>