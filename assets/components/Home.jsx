import React, { useState, useEffect } from "react";
import User from "./Home/User";
import ChannelSelector from "./Home/ChannelSelector";
import Chat from "./Home/Chat";

const Home = () => {

    return (
    <section id="home">
      <section id="user">
        <User/>
      </section>
      <section id="channelSelector">
        <ChannelSelector/>
      </section>
      <section id="Chat">
        <Chat/>
      </section>
    </section>
    );
}
export default Home;