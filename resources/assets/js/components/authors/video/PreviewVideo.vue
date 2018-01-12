<template>
    <div v-cloak="" class="row">
        <div class="col-md-10">

            <div class="inner">
                <div align="center" id="player-container" style="display:none;background:url(/images/player.png);" class="video-js-box hu-css">
                    <video
                            id="vid1"
                            class="video-js vjs-default-skin"
                            controls
                            autoplay
                            width="640" height="264"
                            data-setup='{ "techOrder": ["youtube"], "sources": [{ "type": "video/youtube", "src": "https://www.youtube.com/watch?v=xjS6SftYQaQ"}], "youtube": { "customVars": { "wmode": "transparent" } } }'
                    >
                    </video>
                </div>
            </div>
        </div>


    </div>
</template>

<script>
    // Similarly, you can also introduce the plugin resource pack you want to use within the component
    // import 'some-videojs-plugin'



//    import { videoPlayer } from 'vue-video-player'
    import 'video.js/dist/video-js.css'
    import 'video.js/dist/video.js'
    import 'videojs-youtube/dist/youtube.js'
    export default {

    }
</script>