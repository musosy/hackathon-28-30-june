import React from "react";

const Category = ({category}) => {
    return (
        <div className="card my-2">
            <h5 className="card-title">{category.name}</h5>
            <p className="card-text"><small>{category.gig.name}</small></p>
        </div>
    )
}

export default Category;