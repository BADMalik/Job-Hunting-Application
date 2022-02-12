import React from "react";
import { CometChatUserListScreen } from "../CometChat";
import { CometChat } from "@cometchat-pro/chat";
// import { useHistory } from "react-router";
export const Video = () => {
//   const history = useHistory();
  const logout = async () => {
    CometChat.logout().then((user) => {
    //   history.push("/");
    });
  };
  React.useEffect(() => {
    const refresh = async () => {
      await CometChat.getLoggedinUser();
    };
    refresh();
  }, []);
  return (
    <div>
      <button className="btn btn-width btn-medium btn-primary" onClick={logout}>
        logout
      </button>
      <CometChatUserListScreen />
    </div>
  );
};
