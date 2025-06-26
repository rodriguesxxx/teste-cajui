import api from "./api";

async function login(email: string, password: string) {
    return (await api.post("/auth/login", { email, password })).data;
}

async function logout() {
    return (await api.post("/auth/logout", {})).data;
}

export { login, logout };
