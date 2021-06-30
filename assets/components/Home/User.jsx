import React, { useState, useEffect } from "react";
import axios from "axios";

const User = () => {
    const [user, setUser] = useState([]);
    const [role, setRole] = useState([]);
    const [isUserLoading, setIsUserLoading] = useState(true);

    const fetchCurrentUser = async () => {
        const result = await axios('/user');
        setUser(result.data);
        setRole(result.data.roles[0].charAt(0) + result.data.roles[0].slice(1).replace("_", " ").toLowerCase());
        setIsUserLoading(false);
    }
    
    useEffect(() => {
        fetchCurrentUser();
    }, []);

    return (
        <section id="user">
            <div className="user-block">
                <h3>{user.name}</h3>
                <p>{user.email}</p>
                <p>{role}</p>
                <a href="/logout" className="btn btn-secondary">Logout</a>
            </div>
        </section>
    )
}

export default User;