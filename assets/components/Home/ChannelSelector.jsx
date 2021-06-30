import React, { useState, useEffect } from "react";
import axios from "axios";
import Channel from './Channels/Channel';

const ChannelSelector = () => {
    const [channels, setChannels] = useState([]);
    const [isLoading, setIsLoading] = useState(true);

    const fetchChannels = async () => {
        const result = await axios('/channel');
        setChannels(result.data);
    }

    useEffect(() => {
        fetchChannels();
    }, []);


    return (
        <div className="channels">
            {
                channels.map(channel => {
                    return <Channel key={channel.id}  channel={channel}/>
                })
            }
        </div>
    )
}

export default ChannelSelector;