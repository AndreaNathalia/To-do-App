<template>
    <div class="addItem">
        <input type="text" v-model="item.name" />
        <font-awesome-icon 
            icon="fa-solid fa-square-plus" 
            @click="addItem()"
            :class="[ item.name ? 'active' : 'inactive', 'plus']" 
        />
    </div> 
</template>


<!-- ################ -->
<script>
import axios from 'axios';

export default {
    data: function () {
        return {
            item: {
                name: ""
            }
        }
    },

    methods: {
        addItem(){
            // if there is not data provided, don't execute the rest of the function
            if(this.item.name == ''){
                return;
            }

            // if there is data provided, send the name provided to item
            axios.post('api/item/store', {
                item: this.item
            })
            .then( response => {
                if(response.status == 201){
                    this.item.name = ""; //reset the item name
                    this.$emit('reloadlist');
                }
            })
            //if error
            .catch( error => {
                console.log( error );
            })

        }
    }
}
</script>


<!-- style -->
<style scoped>
.addItem{
    display: flex;
    justify-content: center;
    align-items: center;
}

input{
    background: #f7f7ff;
    border: 0px;
    outline: none;
    padding: 5px;
    margin-right: 10px;
    width: 100%;
}

.plus{
    font-size: 20px;
}

.active{
    color: #00ce25;

}

.inactive{
    color: #999999;
}

</style>