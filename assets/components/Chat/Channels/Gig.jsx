import React from "react";

const Gig = ({gig}) => {
    return (
        <div className="gig-btn">
            <button id={"gig-" + gig.name} className="btn">
                {gig.name}
            </button>
            <div>
            </div>
        </div>
    )
}

export default Gig;