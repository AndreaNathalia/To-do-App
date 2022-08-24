<template>
    <div id="todoListContainer">
        <div id="heading">
            <h1 id="title">To-do list</h1>

            <!-- add item -->
            <add-item-frm
            v-on:reloadlist="getList()"
            />
        </div>

        <!-- list items  (pass prop)/get new list-->
        <list-view 
        v-on:reloadlist="getList()"
        :items="items" 
        
        /> 

    </div>
</template>

<!-- ################ -->
<script>
// import { response } from 'express';
import addItemFrm from './addItemFrm'
import listView from './listView';

export default {
    components:{
        addItemFrm,
        listView
    },

    data: function () {
        return{
            // get items from db
            items: []
        }
    },

    methods: {
        getList () {
            axios.get('api/items')
            .then( response => {
                // add the response to the prop
                this.items = response.data
            })
            .catch(error => {
                console.log( error );
            })
        }
    },
    // when created run getList
    created(){
        this.getList();
    }
}
</script>

<!-- style -->
<style scoped>
.todoListContainer{
    width: 350px;
    margin: auto;
}

.heading{
    background: pink;
    padding: 10px;
}

.title{
    text-align: center;
}

</style>