<template>
    <div>
        <!-- loop item received-->
        <div v-for="(item, index) in items" :key="index">
            <!-- porp item received; pass each individual item to the list item -->
            <list-item 
            :item="item"
            class="item"
            v-on:itemchanged="$emit('reloadlist')"
            />
            <!-- v-on: if an item changes, reload the list -->

        </div>
    </div>
</template>


<!-- ################ -->
<script>
import listItem from './listItem';

export default {
    props: ['items'],

    components: {
        listItem
    }
}
</script>


<!-- style -->
<style scoped>
.item{
    background: #e6e6ee;
    padding: 5px;
    margin-top: 5px;
}
</style>