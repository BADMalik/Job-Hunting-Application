<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>React Home Component</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style type="text/css">
*{
    font-family: sans-serif;
}
h1,h4,p{
    text-align: center;
}
button{
    display: block;
    margin: 5px auto;
}
#remote-container video{
    height: auto;
    position: relative !important;
}
#me{
    position: relative;
    width: 50%;
    margin: 0 auto;
    display: block;
}
#me video{
    position: relative !important;
}
#remote-container{
    display: flex;
}
.flex-item {
    width:50%;
    height:500px;
}
    </style>
    </head>

        <body>

            <div class="container-fluid banner">
                <p class="banner-text">Basic Video Call</p>
                <a style="color: rgb(255, 255, 255);fill: rgb(255, 255, 255);fill-rule: evenodd; position: absolute; right: 10px; top: 4px;"
                  class="Header-link " href="https://github.com/AgoraIO-Community/AgoraWebSDK-NG/tree/master/Demo">
                  <svg class="octicon octicon-mark-github v-align-middle" height="32" viewBox="0 0 16 16" version="1.1" width="32" aria-hidden="true"><path fill-rule="evenodd" d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0016 8c0-4.42-3.58-8-8-8z"></path></svg>
                </a>
              </div>

              <div id="success-alert-with-token" class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Congratulations!</strong><span> You can invite others join this channel by click </span><a href="" target="_blank">here</a>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>



              <div class="container">
                <form id="join-form">
                  <div class="row join-info-group">
                      <div class="col-sm">
                        <p class="join-info-text">AppID</p>
                        <input id="appid" type="text" placeholder="enter appid" required>
                        <p class="tips">If you don`t know what is your appid, checkout <a href="https://docs.agora.io/en/Agora%20Platform/terms?platform=All%20Platforms#a-nameappidaapp-id">this</a></p>
                      </div>
                      <div class="col-sm">
                        <p class="join-info-text">Token(optional)</p>
                        <input id="token" type="text" placeholder="enter token">
                        <p class="tips">If you don`t know what is your token, checkout <a href="https://docs.agora.io/en/Agora%20Platform/terms?platform=All%20Platforms#a-namekeyadynamic-key">this</a></p>
                      </div>
                      <div class="col-sm">
                        <p class="join-info-text">Channel</p>
                        <input id="channel" type="text" placeholder="enter channel name" required>
                        <p class="tips">If you don`t know what is your channel, checkout <a href="https://docs.agora.io/en/Agora%20Platform/terms?platform=All%20Platforms#channel">this</a></p>
                      </div>
                  </div>

                  <div class="button-group">
                    <button id="join" type="submit" class="btn btn-primary btn-sm">Join</button>
                    <button id="leave" type="button" class="btn btn-primary btn-sm" disabled>Leave</button>
                  </div>
                </form>

                <div style="display: flex;width: 100%;flex-direction: row;" class="flex-container">
                  <div class="flex-item">
                    <p id="local-player-name" class="player-name"></p>
                    <div id="local-player"  class="player"></div>
                  </div>
                  <div class="flex-item">
                    <div id="remote-playerlist"></div>
                  </div>
                </div>
              </div>
              <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
            <script src="https://download.agora.io/sdk/release/AgoraRTC_N-4.3.0.js"></script>
            {{-- <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script> --}}
<script type="text/javascript">
    var client = AgoraRTC.createClient({ mode: "rtc", codec: "vp8" });
    $("#success-alert-with-token").css("display", "none");
    $('#success-alert').css('display', "none");
    //54f0d7fc14cd44c69a816e915fbafe40

var localTracks = {
    videoTrack: null,
    audioTrack: null
};
var remoteUsers = {};
// Agora client options
var options = {
    appid: null,
    channel: null,
    uid: null,
    token: null
};
console.log(remoteUsers)
// var joined = false
// the demo can auto join channel with params in url
$(() => {
  var urlParams = new URL(location.href).searchParams;
  options.appid = urlParams.get("appid");
  options.channel = urlParams.get("channel");
  options.token = urlParams.get("token");
  if (options.appid && options.channel) {
    $("#appid").val(options.appid);
    $("#token").val(options.token);
    $("#channel").val(options.channel);
    // joined=true;
    $("#join-form").submit();
  }
})
function sendlink()
{

        let link = `${window.location.origin}/startCallRequestToRouter?appid=${options.appid}&channel=${options.channel}&token=${options.token}`;
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: '/sendlink',
            type: 'post',
            data: {
                _token: CSRF_TOKEN,
                link:link,
                event_id:'<?php echo $event_id;?>',
                interviewee: '<?php echo $interviewee;?>',
                application: '<?php echo $application;?>'
            },
            dataType: 'JSON',
            success: function (data) {
                console.log(data.applicants)
            }
        });


}
$("#join-form").submit(async function (e) {

  e.preventDefault();
  $("#join").attr("disabled", true);
  try {
    options.appid = $("#appid").val();
    options.token = $("#token").val();
    options.channel = $("#channel").val();

    await join();
    sendlink();
    console.log('Reomte users : '+remoteUsers)
    console.log("Options : ",options)
    if(options.token) {
        $("#success-alert-with-token a").attr("href", `${window.location.origin}/startCallRequestToRouter?appid=${options.appid}&channel=${options.channel}&token=${options.token}`);
      $("#success-alert-with-token").css("display", "block");
    } else {
      $("#success-alert a").attr("href", `${window.location.origin}/startCallRequestToRouter?appid=${options.appid}&channel=${options.channel}&token=${options.token}`);
      $("#success-alert").css("display", "block");
    }
  } catch (error) {
    console.error(error);
  } finally {
    $("#leave").attr("disabled", false);
  }
})

$("#leave").click(function (e) {
  leave();
})

async function join() {

  // add event listener to play remote tracks when remote user publishes.
  client.on("user-published", handleUserPublished);



  client.on("user-unpublished", handleUserUnpublished);

  // join a channel and create local tracks, we can use Promise.all to run them concurrently
  [ options.uid, localTracks.audioTrack, localTracks.videoTrack ] = await Promise.all([
    // join the channel
    client.join(options.appid, options.channel, options.token || null),
    // create local tracks, using microphone and camera
    AgoraRTC.createMicrophoneAudioTrack(),
    AgoraRTC.createCameraVideoTrack()
  ]);

  // play local video track
  localTracks.videoTrack.play("local-player");
  $("#local-player-name").text(`localVideo(${options.uid})`);

  // publish local tracks to channel
  await client.publish(Object.values(localTracks));
  console.log("publish success");
}

async function leave() {
  for (trackName in localTracks) {
    var track = localTracks[trackName];
    if(track) {
      track.stop();
      track.close();
      localTracks[trackName] = undefined;
    }
  }
  // remove remote users and player views
  remoteUsers = {};
  $("#remote-playerlist").html("");

  // leave the channel
  await client.leave();

  $("#local-player-name").text("");
  $("#join").attr("disabled", false);
  $("#leave").attr("disabled", true);
  console.log("client leaves channel success");
}

async function subscribe(user, mediaType) {
  const uid = user.uid;
  // subscribe to a remote user
  await client.subscribe(user, mediaType);
  if (mediaType === 'video') {
    const player = $(`
      <div id="player-wrapper-${uid}">
        <p class="player-name">remoteUser(${uid})</p>
        <div id="player-${uid}" class="player"></div>
      </div>
    `);
    $("#remote-playerlist").append(player);
    user.videoTrack.play(`player-${uid}`);
  }
  if (mediaType === 'audio') {
    user.audioTrack.play();
  }
}

function handleUserPublished(user, mediaType) {
  const id = user.uid;
  remoteUsers[id] = user;
  subscribe(user, mediaType);
}

function handleUserUnpublished(user) {
  const id = user.uid;
  delete remoteUsers[id];
  $(`#player-wrapper-${id}`).remove();
}
</script>
    </body>
    </html>

