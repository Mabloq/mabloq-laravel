<template lang="html">
  <a data-fancybox :href="'https://www.youtube.com/watch?v='+this.video.snippet.resourceId.videoId">
    <li>
      <div class="list-left">
          <img :src="video.snippet.thumbnails.high.url">
      </div>
      <div class="list-right">
        <h3>{{video.snippet.title}}</h3>
      </div>
    </li>
    <div class="clearfix"></div>
    
  </a>
</template>

<script>
export default {
  props: ['video'],
  data() {
    return {
          vidlink: ''
    }

  },
  computed: {
    link: function() {
      var link = 'https://www.youtube.com/watch?v=' + this.video.snippet.thumbnails.high.url;
      this.vidlink = link;
    }
  }

}
</script>

<style lang="css">
</style>
