import React, { useState, useEffect } from "react";
import ChannelSelector from "./Chat/ChannelSelector";


const Chat = () => {
    return (
        <section id="chat">
            <div className="contrainer p-3">
                <ChannelSelector />
            </div>
        </section>
    )
}

export default Chat;