// JS reference to the container where the remote feeds belong
let remoteContainer= document.getElementById("remote-container");
/**
 * @name addVideoContainer
 * @param uid - uid of the user
 * @description Helper function to add the video stream to "remote-container".
 */
function addVideoContainer(uid){
    let streamDiv=document.createElement("div"); // Create a new div for every stream
    streamDiv.id=uid;                          // Assigning id to div
    streamDiv.style.transform="rotateY(180deg)"; // Takes care of lateral inversion (mirror image)
    remoteContainer.appendChild(streamDiv);      // Add new div to container
}
/**
 * @name removeVideoContainer
 * @param uid - uid of the user
 * @description Helper function to remove the video stream from "remote-container".
 */
function removeVideoContainer (uid) {
    let remDiv=document.getElementById(uid);
    remDiv && remDiv.parentNode.removeChild(remDiv);
}

function initStop(client, localAudioTrack, localVideoTrack){
    const stopBtn = document.getElementById('stop');
    stopBtn.disabled = false; // Enable the stop button
    stopBtn.onclick = null; // Remove any previous event listener
    stopBtn.onclick = function () {
      client.unpublish(); // stops sending audio & video to agora
      localVideoTrack.stop(); // stops video track and removes the player from DOM
      localVideoTrack.close(); // Releases the resource
      localAudioTrack.stop();  // stops audio track
      localAudioTrack.close(); // Releases the resource
      client.remoteUsers.forEach(user => {
          if (user.hasVideo) {
              removeVideoContainer(user.uid) // Clean up DOM
          }
          client.unsubscribe(user); // unsubscribe from the user
      });
      client.removeAllListeners(); // Clean up the client object to avoid memory leaks
      stopBtn.disabled = true;
    }
  }
