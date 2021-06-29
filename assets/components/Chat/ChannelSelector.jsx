import React, { useState, useEffect } from "react";
import axios from "axios";
import Gig from './Channels/Gig';

const ChannelSelector = () => {
    const [gigs, setGigs] = useState([]);
    const [isGigLoading, setIsGigLoading] = useState(true);
    const [categories, setCategories] = useState([]);
    const [isCategoryLoading, setIsCategoryLoading] = useState(true);

    const fetchGigs = async () => {
        const result = await axios('/gig/all');
        setGigs(result.data);
        setIsGigLoading(false);
    }

    const fetchCategories = async () => {
      const result = await axios('/category/all');
        setCategories(result.data);
        setIsCategoryLoading(false);
    }

    useEffect(() => {
        fetchGigs();
    }, []);


    return (
        <section id="channels">
            <div className="d-flex flex-column channels">
                {
                    gigs.map(gig => {
                        return <Gig key={gig.id} gig={gig}>{gig.name}</Gig>
                    })
                }
            </div>
        </section>
    )
}

export default ChannelSelector;