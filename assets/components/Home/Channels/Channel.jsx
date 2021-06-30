import React, { useState, useEffect } from "react";
const Channel = ({channel}) => {
    return (
        <div className="channel mx-2 my-2">
            <p>
                {channel.category.name}
            </p>
            <p><small>{channel.category.gig.name}</small></p>

        </div>
    )
}
export default Channel;