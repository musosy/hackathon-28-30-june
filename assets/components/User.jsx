import React, { useState, useEffect } from "react";
import axios from "axios";

const User = () => {
    const [user, setUser] = useState([]);
    const [isUserLoading, setIsUserLoading] = useState(true);

    const fetchCurrentUser = async () => {
        const result = await axios('/user');
        setUser(result.data);
        setIsUserLoading(false);
    }
    
    useEffect(() => {
        fetchCurrentUser();
    }, []);

    return (
        <section id="user">
            <div className="container">
                <h3>Welcome {user.name}</h3>
                <a href="/logout" className="btn btn-primary">Logout</a>
            </div>
        </section>
    )
}

export default User;