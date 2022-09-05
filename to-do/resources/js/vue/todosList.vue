<template>
  <div>
    <Multiselect v-model="value" 
    :multiple="false" 
    :close-on-select="false" 
    :clear-on-select="false" :preserve-search="true" 
    placeholder="To-do" label="label" 
    :preselect-first="true"
    name="todoid"
    :options="options.map(option => option.value)" 
    :custom-label="opt => options.find(x => x.value == opt).label">

      <template v-slot="{ values, isOpen }">
        <span class="multiselect__single" v-if="values.length &amp;&amp; !isOpen">{{ values.length }} options selected</span>
      </template>
    </Multiselect>
    <pre class="language-json"><code>{{ value }}</code></pre>
    <input type="hidden" name="todo" v-model="value">  
  </div>
</template>
  
<script>
    import Multiselect from '@vueform/multiselect'

    export default {
        components: { Multiselect },
        props: {
          options: {
            type: Array,
              default: function() {
                return [];
              }
            }
        },
        data () {
            return {
                value: " "
            }
        }
    }
</script>
<style src="@vueform/multiselect/themes/default.css"></style>