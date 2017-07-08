<template lang="html">
  <div class="">
    <h1 class="playlist">Code Your Face of Playlist</h1>
    <ul class="fancybox playlistBox">
      <mabloq-video v-for="video in playlist" :video="video"></mabloq-video>
    </ul>
  </div>
</template>

<script>
export default {
  props: ['playlist']
}
</script>
a
<style lang="css">
</style>
