import React from "react";

const Gig = ({gig}) => {
    return (
        <div className="card my-2">
            <h5 className="card-title">{gig.name}</h5>
        </div>
    )
}

export default Gig;