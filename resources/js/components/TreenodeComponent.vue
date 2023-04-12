<template>
    <li v-for="node in nodes" :key="node.id">
      {{ node.name }}
      <ul v-if="node.children.length > 0">
        <treenode-component :nodes="node.children"></treenode-component>
      </ul>
    </li>
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
  