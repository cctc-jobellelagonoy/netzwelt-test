<template>
    <div>
      <ul>
        <li v-for="territory in territories" :key="territory.id">
          {{ territory.name }}
          <ul v-if="territory.children.length > 0">
            <treenode-component :nodes="territory.children"></treenode-component>
          </ul>
        </li>
      </ul>
    </div>
  </template>
   
  <script>
  import axios from "axios";
  import TreenodeComponent from "./TreenodeComponent.vue";
  
  export default {
    components: {
        TreenodeComponent,
    },
    data() {
      return {
        territories: [],
      };
    },
    async mounted() {
      const response = await axios.get("/home/territories");
      const territories = response.data.data;
      this.territories = this.buildTree(territories);
    },
    methods: {
      buildTree(list) {
        const map = {};
        const roots = [];
  
        list.forEach((item) => {
          item.children = [];
          map[item.id] = item;
  
          if (!item.parent) {
            roots.push(item);
          } else {
            const parent = map[item.parent];
            if (parent) {
              parent.children.push(item);
            }
          }
        });
  
        return roots;
      },
    },
  };
  </script>
  