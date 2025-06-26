import AsyncStorage from "@react-native-async-storage/async-storage";
import { useEffect, useState } from "react";

export function useAuth() {
    const [loading, setLoading] = useState(true);
    const [logged, setLogged] = useState(false);

    useEffect(() => {
        AsyncStorage.getItem("token").then((token) => {
            setLogged(!!token);
            setLoading(false);
        });
    }, []);

    return { loading, logged };
}
