
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('mabloq-playlist', require('./components/PlaylistLog.vue'));
Vue.component('mabloq-pager', require('./components/PlaylistPager.vue'));
Vue.component('mabloq-video', require('./components/YoutubeVid.vue'));

const app = new Vue({
    el: '#app',
    data: {
      playlist: [],
      tokens: {
        nextToken: undefined,
        prevToken: undefined,
      },
      errors: []

    },
    methods: {
      nextPage(token) {
        axios.post("/next-page", token).then(response => {
          this.playlist = response.data.items;
          this.tokens.nextToken = response.data.nextPageToken;
          this.tokens.prevToken = response.data.prevPageToken;
        });
      }
    },

      created() {

      axios.get("/render-playlist").then(response => {
            this.playlist = response.data.items;
            this.tokens.nextToken = response.data.nextPageToken;
            if(!(response.data.prevPageToken === undefined)){
              this.tokens.prevToken = response.data.prevPageToken;
            }


        }).catch(e => {
            this.errors.push(e)
          });



    }
});
