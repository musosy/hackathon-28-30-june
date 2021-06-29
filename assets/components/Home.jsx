import React, { useState, useEffect } from "react";
import Chat from "./Chat";
import User from "./User";

const Home = () => {

    return (
    <section id="home">
      <User/>
      <Chat/>
      {/* <div className="container mt-5">
        <section id="gigs_list">
        <h3 className="text-center">Available Gigs</h3>
        {isGigLoading ? (
          "Wait for a second ... Gigs are loading"
        ) : gigs.length > 0 ? (
            <div className="d-flex flex-wrap justify-content-evenly text-center">
              {gigs.map(gig => {
                return <Gig key={gig.id} gig={gig}/>
              })}
            </div>
        ) : (
          <div className="text-center">
            <p >No gigs found ...</p>
          </div>
          )}
          </section>
          <section id="categories_list">
              <h3 className="text-center">Available Categories</h3>
            {isCategoryLoading ? (
              "Wait a second ... Categories are loading"
            ) : categories.length > 0 ? (

              <div className="d-flex flex-wrap justify-content-evenly text-center">
              {categories.map(category => {
                return <Category key={category.id} category={category}/>
              })}
            </div>
              ) : ( 
                <div className="text-center">
                  <p >No categories found ...</p>
                </div>
              )}
          </section>
      </div> */}
      <div></div>
    </section>
    );
}
export default Home;