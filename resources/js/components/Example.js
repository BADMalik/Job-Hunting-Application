import React from 'react';
import ReactDOM from 'react-dom';
import {getPermissions} from './MediaHandler';
import {useState,useEffect} from 'react';

export const Home = () => {
    // alert('adasdaw')
    // const [hasMedia,setMedia] = useState(false);
    // const [playmyVideo,setPlayMyVideo] = useState(false);
    // const [otherUserId,setOtherUserId] = useState(null);
    // // const mediaHandler = new MediaHandler();
    const myVideoRef = React.useRef(null);
    const [myVideo,setMyVideo] = useState('https://www.youtube.com/watch?v=N97ZwdRIXg0');
    // const [userVideoSrc,setUserVideoSrc] = useState('');
    console.log('inside')
    useEffect(() => {
        console.log("hey")
        new Promise((res,rej)=> {
            navigator.mediaDevices.getUserMedia({video:true,audio:true})
        }).
            then((stream)=> {
                setMedia(true)

                    console.log(myVideoRef)
                    myVideoRef.current.srcObject = stream;

                myVideoRef.current.play();
            }).catch(error=>{
                console.log('aaaaaaaaaaaaaaaaaaa')
                myVideoRef.current.src = URL.createObjectURL(stream);
                console.log('aaaaaaaaaaaaaaaaaaa')
                myVideoRef.current.play();

                throw new Exception('Error while generating video stream');
            })
            console.log('111111111111111')

    },[])
        return(

            <div className="App">
             <div className="video-container">
             <video width="320" height="240" controls>
                <source ref={myVideoRef}>
                </source>
                Your browser does not support the video tag.
                </video>
                 {/* <video className="user-video"></video> */}
             </div>
         </div>
        )
}
export default Home;

if (document.getElementById('app')) {
    ReactDOM.render(<Home />, document.getElementById('app'));
}
