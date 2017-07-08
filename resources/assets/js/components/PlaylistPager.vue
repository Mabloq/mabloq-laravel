<template lang="html">
  <div v-if="tokens.prevToken == undefined">
      <button class="btn btn-primary" @click="page(tokens.nextToken)">Next</button>
  </div>
  <div v-else-if="tokens.nextToken == undefined">
      <button class="btn btn-primary" @click="page(tokens.prevToken)">Prev</button>
  </div>
  <div v-else>
    <button class="btn btn-primary"  @click="page(tokens.prevToken);">Prev</button>
    <button class="btn btn-primary"  @click="page(tokens.nextToken);">Next</button>
  </div>

</template>

<script>
export default {
    props: ['tokens'],
    data() {
      return {
        token: ''
      }
    },
    methods: {
      page(e) {
        this.token = e;
        this.$emit('pager', {
              token: this.token
          });
      }
    }
  }
</script>

<style lang="css">
</style>
