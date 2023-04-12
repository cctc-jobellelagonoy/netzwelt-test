<!-- <template>
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
  </template> -->
  <template>
    <div>
      <ul class="list-unstyled">
        <li v-for="territory in territories" :key="territory.id">
          <div class="accordion">
            <div class="accordion-item">
              <h2 class="accordion-header" :id="`heading-${territory.id}`">
                <button
                  class="accordion-button collapsed"
                  type="button"
                  data-bs-toggle="collapse"
                  :data-bs-target="`#collapse-${territory.id}`"
                  :aria-expanded="false"
                  :aria-controls="`collapse-${territory.id}`"
                >
                  {{ territory.name }}
                </button>
              </h2>
              <div
                :id="`collapse-${territory.id}`"
                class="accordion-collapse collapse"
                :aria-labelledby="`heading-${territory.id}`"
              >
                <div class="accordion-body">
                  <treenode-component v-if="territory.children.length > 0" :nodes="territory.children"></treenode-component>
                </div>
              </div>
            </div>
          </div>
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
  