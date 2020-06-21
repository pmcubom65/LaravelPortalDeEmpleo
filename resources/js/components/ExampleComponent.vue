<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.
                        <test-component></test-component>
                    </div>
                </div>
            </div>
        </div>
        <tooltip-component></tooltip-component>
    </div>
</template>

<script>

import TooltipComponent from './TooltipComponent'

Vue.component('tooltip-component', TooltipComponent)

    export default {
        components: {
      
            TooltipComponent
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
