<!-- <template>
    <li v-for="node in nodes" :key="node.id">
      {{ node.name }}
      <ul v-if="node.children.length > 0">
        <treenode-component :nodes="node.children"></treenode-component>
      </ul>
    </li>
</template> -->
<template>
    <ul class="list-unstyled">
      <li v-for="node in nodes" :key="node.id">
        <div class="accordion">
          <div class="accordion-item">
            <h2 class="accordion-header" :id="`heading-${node.id}`">
              <button
                class="accordion-button collapsed"
                type="button"
                data-bs-toggle="collapse"
                :data-bs-target="`#collapse-${node.id}`"
                :aria-expanded="false"
                :aria-controls="`collapse-${node.id}`"
              >
                {{ node.name }}
              </button>
            </h2>
            <div
              :id="`collapse-${node.id}`"
              class="accordion-collapse collapse"
              :aria-labelledby="`heading-${node.id}`"
            >
              <div class="accordion-body">
                <treenode-component v-if="node.children.length > 0" :nodes="node.children"></treenode-component>
              </div>
            </div>
          </div>
        </div>
      </li>
    </ul>
  </template>
  
<script>
  export default {
    props: {
      nodes: {
        type: Array,
        default: () => [],
      },
    },
  };
</script>
  